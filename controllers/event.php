<?php
include '../conn.php';
include '../functions/event.php';
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($_POST['function'])){
    $_POST['function']="";
}

// if(isset($_POST) && ($_POST['function'] == "updateProduct")){
//     $id=$_POST['up_id'];
//     $title=$_POST['title'];
//     $des=$_POST['des'];
//     $specs=$_POST['specs'];
//     $intro=$_POST['intro'];
//     $price=$_POST['price'];
//     $weight=$_POST['weight'];
//     $category=$_POST['category'];
//     $mrp=$_POST['mrp'];
//     $status=$_POST['status'];
//     $remark=$_POST['remark'];
//     $is_featured=$_POST['featured'];
//     $baseurl="uploaded-images/products/";
//     $up_details=array("up_id"=>$id,"title"=>$title,"des"=>$des,"specs"=>$specs,"intro"=>$intro,"price"=>$price,"weight"=>$weight,"category"=>$category,"mrp"=>$mrp,"status"=>$status,"remark"=>$remark,"is_featured"=>$is_featured);
//     $resp=updateProduct($conn,$up_details);
//     if(isset($_FILES['upload_image'])){
//         $file_name=$_FILES['upload_image']['name'];
//         $file_tmp=$_FILES['upload_image']['tmp_name'];
//         foreach($file_name as $i => $val){
//             $filename=$val;
//             $filetmp=$file_tmp[$i];
//             $filelocation=$baseurl.$filename;
//             move_uploaded_file($filetmp,"../uploaded-images/products/".$filename);
//             $pr_details=array("title"=>$title,"des"=>$des,"specs"=>$specs,"intro"=>$intro,"price"=>$price,"weight"=>$weight,"category"=>$category,"mrp"=>$mrp,"status"=>$status,"remark"=>$remark,"is_featured"=>$is_featured,"file"=>$filelocation);
//             $resp=addImages($conn,$pr_details);      
//         }
//     }
//     echo json_encode($resp);
//     exit();
// }
if(isset($data['function']) && ($data['function']=='deleteEvent')){
    $event_id=$data['event_id'];
    $re=deleteEvent($conn,$event_id);
    echo json_encode($re);
    exit();
}

// if(isset($data['function']) && ($data['function']=='deleteImage')){
//     $id=$data['id'];
//     $re=deleteImage($conn,$id);
//     echo json_encode($re);
//     exit();
// }

if(isset($_POST) && $_POST['function'] == "addEvent"){
    $title=$_POST['title'];
    $description=$_POST['description'];
    $venue=$_POST['venue'];
    $speaker=$_POST['speaker'];
    $date=$_POST['date'];
    $facebook_link=$_POST['facebook_link'];
    $instagram_link=$_POST['instagram_link'];
    $twitter_link=$_POST['twitter_link'];
    $status=$_POST['status'];
    $baseurl="./upload/events/";
    $event_details=array("title"=>$title,"description"=>$description,"venue"=>$venue,"speaker"=>$speaker,"date"=>$date,"status"=>$status,"facebook_link"=>$facebook_link,"instagram_link"=>$instagram_link,"twitter_link"=>$twitter_link);
    if(isset($_FILES['event_images'])){
        $file_name=$_FILES['event_images']['name'];
        $file_tmp=$_FILES['event_images']['tmp_name'];
        foreach($file_name as $i => $val){
            $filename=$val;
            $filetmp=$file_tmp[$i];
            $filelocation=$baseurl.$filename;
            move_uploaded_file($filetmp,"../upload/events/".$filename);
            $event_details=array("title"=>$title,"description"=>$description,"venue"=>$venue,"speaker"=>$speaker,"date"=>$date,"status"=>$status,"facebook_link"=>$facebook_link,"instagram_link"=>$instagram_link,"twitter_link"=>$twitter_link,"image_url"=>$filelocation);
            $respo=addEvent($conn,$event_details);      
        }
    }
    else{
        $respo=addEvent($conn,$event_details);   
    }
    echo json_encode($respo);
    exit();
}
?>