<?php
include '../conn.php';
include '../functions/user.php';
$data = json_decode(file_get_contents("php://input"),true);

if(isset($data['function']) && ($data['function']=='user_login')){
    $login=$data['login_details'];
    $email=$login['email'];
    $password=$login['password'];
    $login_details=array("email"=>$email,"password"=>$password);
    $respo=user_login($conn,$login_details);
    echo json_encode($respo);
    exit();
}

if(isset($data['function']) && ($data['function']=='user_logout')){
    $respo=user_logout();
    echo json_encode($respo);
    exit();
}
?>