<?php

namespace App\Http\Controllers;

use App\AllModules;
use App\HomeData;
use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Since;
use test\Mockery\HasUnknownClassAsTypeHintOnMethod;

class SmartHomeDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $home_data = HomeData::select('home_data')->where('device_code',$id)->first();
        if (isset($home_data)) {
            return response($home_data->home_data);
        }
        else{
            return 'not authorized';
          //  return abort(403);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {                
        $room_id = $request->roomId - 1;
        $room = AllModules::getModules();

        $homedata = HomeData::all()->where('device_code',Auth::user()->device_id)->first();
            
        if (($room!= null || $homedata!=null) && $room_id >= -1) {
            if (isset($room[$room_id])) {              
                $room[$room_id]->room_name = $request->roomName;
                $room[$room_id]->room_type = $request->roomType;
                $room[$room_id]->room_image = $request->roomImage;
                AllModules::setModulesById($room_id,$room[$room_id]);
            } else {
                $room = ['room_name'=>$request->roomName, 'room_type'=>$request->roomType ,'room_image'=>$request->roomImage];
                $room_id = sizeof(AllModules::getModules());
                AllModules::setModulesById($room_id,$room);
            }

            $room_data = AllModules::getModules();

            $homedata = HomeData::all()->where('device_code',Auth::user()->device_id)->first();
            $room_data = str_replace('"{','{',stripslashes(json_encode($room_data,JSON_UNESCAPED_UNICODE)));
            $room_data = str_replace( '}"','}',$room_data);
            $homedata->home_data = !empty( $room_data ) ? '{"rooms":' .$room_data."}" : NULL;
            $homedata->update();

        } else{            
            $module = new Room();
            $module->setRoomName($request->roomName);
            $module->setRoomType($request->roomType);
            $module->setRoomImage($request->roomImage);
            AllModules::setModules($module);

            $homedata = new HomeData();
            $room_data = stripslashes(json_encode(AllModules::getModules(),JSON_UNESCAPED_UNICODE));
            $room_data = str_replace( '["','{"rooms":[',$room_data);
            $room_data = str_replace( '"]',']}',$room_data);
            $homedata->home_data = $room_data;
            $homedata->device_code = Auth::user()->device_id;
            $homedata->save();
        }

        return redirect('home');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storelight(Request $request)
    {
        $roomId = $request->roomId - 1;

        $lights = $request->lightName;
        $types= $request->lightType;
        $lights_module= array();
        for($i=0;$i<sizeof($lights);$i++) {
            if (isset($lights[$i])) {
                $lights_module[$i] = ["name" => $lights[$i], "type" => $types[$i]];
            }
//            $lights_module[$i] =  '{"name:" . $lights[$i] . "," . "type:" . $types[$i] }';
        }
        $room = AllModules::getModules();
        $room[$roomId]->light_module = stripslashes(json_encode($lights_module, JSON_UNESCAPED_UNICODE));

        AllModules::setModulesById($roomId,$room[$roomId]);
        $room_data = AllModules::getModules();

        $homedata = HomeData::all()->where('device_code',Auth::user()->device_id)->first();
        $room_data = str_replace('"{','{',stripslashes(json_encode($room_data, JSON_UNESCAPED_UNICODE)));
        $room_data = str_replace( '}"','}',$room_data);
        $room_data = str_replace( '"[','[',$room_data);
        $room_data = str_replace( ']"',']',$room_data);
        $homedata->home_data = !empty( $room_data ) ? '{"rooms":' .$room_data."}"  : NULL;
        $homedata->update();
    }

    public function storemodule(Request $request)
    {
        $roomId = $request->roomId - 1;

        $modules = $request->moduleName;
        $module_type = $request->moduleType;

        $module_array = array();

        for($i = 0; $i < sizeof($modules); $i++) {
            if (isset($modules[$i])) {
                $module_array[$i] = ["name" => $modules[$i]];
            }
        }
        $room = AllModules::getModules();

        if ($module_type == "2"){
            $room[$roomId]->plug_module = stripslashes(json_encode($module_array,JSON_UNESCAPED_UNICODE));
        } else if ($module_type == "3"){
            $room[$roomId]->curtain_module = stripslashes(json_encode($module_array,JSON_UNESCAPED_UNICODE));
        } else if ($module_type == "4"){
            $room[$roomId]->temp_module = stripslashes(json_encode($module_array,JSON_UNESCAPED_UNICODE));
        } else if ($module_type == "5"){
            $room[$roomId]->irrigation_module = stripslashes(json_encode($module_array,JSON_UNESCAPED_UNICODE));
        }

        AllModules::setModulesById($roomId,$room[$roomId]);
        $room_data = AllModules::getModules();

        $homedata = HomeData::all()->where('device_code',Auth::user()->device_id)->first();
        $room_data = str_replace('"{','{',stripslashes(json_encode($room_data,JSON_UNESCAPED_UNICODE)));
        $room_data = str_replace( '}"','}',$room_data);
        $room_data = str_replace( '"[','[',$room_data);
        $room_data = str_replace( ']"',']',$room_data);
        $homedata->home_data = !empty( $room_data ) ? '{"rooms":' .$room_data."}"  : NULL;
        $homedata->update();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $room_data = $request->roomData;
        $homedata = HomeData::all()->where('device_code',Auth::user()->device_id)->first();
        $homedata->home_data = str_replace( $room_data ,'',$homedata->home_data);
        $homedata->home_data = str_replace( ',]',']',$homedata->home_data);
        $homedata->home_data = str_replace( '},,','},',$homedata->home_data);
        $homedata->home_data = str_replace( '[,{','[{',$homedata->home_data);     
		$homedata->home_data = str_replace( '},]','}]',$homedata->home_data);  
        $homedata->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function upload(Request $request)
    {
        $image = $request->file('file');
        $filename=$_FILES['file']['name'];        

        if (isset($image)) {
            // $current_date = Carbon::now()->todatestring();
            if (!file_exists(public_path().'/room_images/'.Auth::user()->device_id)) {
                mkdir(public_path().'/room_images/'.Auth::user()->device_id, 0777, true);
            }
            $image->move(public_path().'/room_images/'.Auth::user()->device_id, $filename);
        } else {
            $image_name = 'default.png';
        }

        return response()->json([
            'image_name' => $filename
        ]);
    }

    public function downloadImage($id,$image)
    {
        $home_data = HomeData::select('home_data')->where('device_code',$id)->first();
        if (isset($home_data)) {
            
            $file = public_path() . '/room_images/'. $id .'/'. $image;
            $ext = pathinfo($file, PATHINFO_EXTENSION);
        
            if($ext == 'png' || 'PNG'){
              $headers = array(
                  'Content-Type' => 'image/png',
                );
            }
        
            else if($ext == 'jpg' || 'jpeg' || 'JPEG' || 'JPG'){
              $headers = array(
                  'Content-Type' => 'image/jpeg',
                );
              }              
        
            return response()->download($file, $image, $headers);

            // return response($home_data->home_data);
        }
        else{
            return 'not authorized';
          //  return abort(403);
        }
    }

}
