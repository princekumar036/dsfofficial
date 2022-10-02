
function alertMsg(message,err){     
    var notyf = new Notyf({
        position:
        {
            x:'center',
            y:'top'
        },
        types: [
        {
            type: 'success',
            background: 'green'
        },
        {
            type: 'error',
            background: 'red'
        }]
        });   
        if(err==true){
            // Display an error notification
            notyf.error(
                {type:"error",message,duration:2000}
                );
        }
        else{
            // Display a success notification
            notyf.success(
                {type:"success",message,duration:2000}
                );
            //window.location="login.php";
        }
}