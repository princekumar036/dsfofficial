<?php
include '../conn.php';
include '../functions/release.php';
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
if(isset($data['function']) && ($data['function']=='deleteRelease')){
    $release_id=$data['release_id'];
    $re=deleteRelease($conn,$release_id);
    echo json_encode($re);
    exit();
}

// if(isset($data['function']) && ($data['function']=='deleteImage')){
//     $id=$data['id'];
//     $re=deleteImage($conn,$id);
//     echo json_encode($re);
//     exit();
// }

if(isset($_POST) && $_POST['function'] == "addRelease"){
    $title=$_POST['title'];
    $description=$_POST['description'];
    $facebook_link=$_POST['facebook_link'];
    $twitter_link=$_POST['twitter_link'];
    $instagram_link=$_POST['instagram_link'];
    $status=$_POST['status'];
    $baseurl="./upload/releases/";
    $release_details=array("title"=>$title,"description"=>$description,"facebook_link"=>$facebook_link,"twitter_link"=>$twitter_link,"instagram_link"=>$instagram_link,"status"=>$status);
    if(isset($_FILES['release_images'])){        
        $file_name=$_FILES['release_images']['name'];
        $file_tmp=$_FILES['release_images']['tmp_name'];
        foreach($file_name as $i => $val){
            $filename=$val;
            $filetmp=$file_tmp[$i];
            $filelocation=$baseurl.$filename;
            move_uploaded_file($filetmp,"../upload/releases/".$filename);
            $release_details=array("title"=>$title,"description"=>$description,"facebook_link"=>$facebook_link,"twitter_link"=>$twitter_link,"instagram_link"=>$instagram_link,"status"=>$status,"image_url"=>$filelocation);
            $respo=addRelease($conn,$release_details);      
        }
    }
    else{
        $respo=addRelease($conn,$release_details);    
    }
    echo json_encode($respo);
    exit();
}
?>