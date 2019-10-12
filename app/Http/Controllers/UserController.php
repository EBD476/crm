<?php

namespace App\Http\Controllers;

use App\User;
use App\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Bluerhinos\phpMQTT;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Get all roles and pass it to the view
        $roles = Role::get();
        return view('admin.users.create', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate name, email and password fields
            $this->validate($request, [
                'name'=>'required|max:120',
                'username'=>'required|max:20|min:4',
                'device_id' => 'required',
                'password'=>'required|min:6|confirmed'
            ]);

            $user = User::create($request->only( 'name', 'password','username','device_id')); //Retrieving only the email and password data

            $roles = $request['roles']; //Retrieving the roles field
            //Checking if a role was selected
            if (isset($roles)) {

                foreach ($roles as $role) {
                    $role_r = Role::where('id', '=', $role)->firstOrFail();
                    $user->assignRole($role_r); //Assigning role to user
                }
            }
 
            // Add options for selected device
            $user_options = Options::create(['user_id'=> $user->id,'user_options'=>160]);            

        //Redirect to the users.index view and display message
        return redirect()->route('users.index')
            ->with('flash_message',
                'User successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); //Get user with specified id
        $roles = Role::get(); //Get all roles
        $options = Options::get()
                            ->where('user_id' ,$id)
                            ->first()
                            ->user_options;
        $options = decbin($options) ;      
        $options = sprintf("%012s",$options);  

        return view('admin.users.edit', compact('user', 'roles','options')); //pass user and roles data to view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		if ($request->password != null){
				$this->validate($request, [
					'password' => 'required|min:6|confirmed'
				]);					
			
				$user = User::findOrFail($id);
				$input = $request->only(['password']);
				$user->fill($input)->save();
		}
			
        else if (isset($request->options)){
      
            $result = "0000000000000";         
            for ($i=0; $i < count($request->options) ; $i++) { 
                $result[$request->options[$i]] = "1";
            }
            $user_options = Options::get()
                                    ->where('user_id' ,$id)
                                    ->first();
            
            $user_options->user_options = bindec($result);
            $user_options->save();			

            //publish to mqtt

            include(app_path().'\phpMQTT.php');

            $server = "195.248.241.187";     // change if necessary
            $port = 4776;                     // change if necessary
            $username = "admin";                   // set your username
            $password = "admin";                   // set your password
            $client_id = "690a8aa4-bb64-486a-a746-bfbfc0a38745" . auth()->user()->id; // make sure this is unique for connecting to sever - you could use uniqid()

            $device =  User::findOrFail($id)->device_id;

            $mqtt = new phpMQTT($server, $port, $client_id);

            if ($mqtt->connect(true, NULL, $username, $password)) {
                $device_code =md5(User::findOrFail($id)->device_id);
                $publish_topic = 'HANTASMARTHOME/v1/' . $device_code . '/cmd';
                $data = ["msg"=>"options","value" =>(string)bindec($result) ];  
				$topics[$publish_topic] = array("qos" => 0, "function" => "procmsg");
                $mqtt->subscribe($topics, 0);
                $mqtt->publish($publish_topic, json_encode($data), 1); //. date("r")
                // $data = ["msg"=>"message","title" =>"Notice","message" =>"Smart home options actived !" ];      
                $data = ["msg"=>"message","title" =>"کاربر گرامی","message" =>"قابلیت های سیستم هوشمند برای شما فعال شد." ];      
                $mqtt->publish($publish_topic,json_encode($data), 1);
                $mqtt->close();
            } else {
                echo "Time out!\n";
            }

            // return redirect()->route('users.index')
            // ->with('flash_message',
            //     'User successfully edited.');
        }


        if ($request->has('name')) {
            $user = User::findOrFail($id); //Get role specified by id

            //Validate name, email and password fields
            $this->validate($request, [
                'name' => 'required|max:120',
            ]);

            $input = $request->only(['name','username', 'device_id']);
            $roles = $request['roles']; //Retreive all roles
            $user->fill($input)->save();

            if (isset($roles)) {
                $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
            } else {
                $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
            }
			
            return redirect()->route('users.index')
                ->with('flash_message',
                    'User successfully edited.');
        } 
//		else {
//		
//            $this->validate($request, [
//                'password' => 'required|min:6|confirmed'
//            ]);					
//            
//            $input = $request->only(['password']);
//            $user = Auth()->user();
//            $user->fill($input)->save();
//        }   
  
		if ($user->hasRole('role_user')){
			 return redirect()->route('home')
				->with('flash_message',
					'User successfully edited.');
		}
	
        return redirect()->route('users.index')
            ->with('flash_message',
                'User successfully edited.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('flash_message',
                'User successfully deleted.');
    }
}
