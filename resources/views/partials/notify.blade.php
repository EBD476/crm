@if(Session::has('flash_message'))
<script>
$.notify({
   icon: " ",
   message: "Information <br/> Data successfully saved."
       },{
           type: 'success',
           timer: 4000,
           placement: {
               from: 'top',
               align: 'right'
           }
       });
</script>
@endif       