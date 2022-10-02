<?php
function user_login($conn,$data){ 
    if($data['email']!="" && $data['password']!=""){
        $sql0="select * from user where email='".$data['email']."' and password='".$data['password']."'";
        $query2=mysqli_query($conn,$sql0);
        if(mysqli_num_rows($query2)>0){
            $arr=mysqli_fetch_assoc($query2);
            $_SESSION['user']=$arr['name'];
            return array("msg"=>"Login Successfully", "error"=>false);
        }
        else if(mysqli_num_rows($query2)==0){
            return array("msg"=>"Wrong credentials", "error"=>true);
        }
        return array("msg"=>"Oops something went wrong", "error"=>true);
    }
    else{
        return array("msg"=>"*Please enter the credentials", "error"=>true);
    }
}   

function user_logout(){ 
    unset($_SESSION);
    session_destroy();
    if(!isset($_SESSION)){
        return array("msg"=>"Logout Successfully", "error"=>false);
    }
    return array("msg"=>"Oops something went wrong", "error"=>true);
}
?>