<?php
@session_start();
function addEvent($conn,$data){ 
    if($data['title']!="" && $data['description']!="" && $data['venue']!="" && $data['speaker']!="" && $data['date']!="" && $data['facebook_link']!="" && $data['instagram_link']!="" && $data['twitter_link']!=""){            
        foreach ($data as $key =>$val){
            $data[$key]=mysqli_real_escape_string($conn,$val);
        }
        if(isset($data['image_url'])){
            $sql0="insert into events (title,description,venue,speaker,date,status,facebook_link,twitter_link,instagram_link,image_url) values ('".$data['title']."','".$data['description']."','".$data['venue']."','".$data['speaker']."','".$data['date']."','".$data['status']."','".$data['facebook_link']."','".$data['twitter_link']."','".$data['instagram_link']."','".$data['image_url']."')";
            $query2=mysqli_query($conn,$sql0);
            if($query2)
                return array("msg"=>"Event Added", "error"=>false);
            return array("msg"=>"Oops something went wrong", "error"=>true);   
        }
        else{
            return array("msg"=>"*Please add image","error"=>true);
        }
    }
    else{
        return array("msg"=>"*Please enter all details", "error"=>true);
    } 
}
// function addImages($conn,$data){
//     $sql1="select p.id from product p where title='".$data['title']."'";
//     $querytitle=mysqli_query($conn,$sql1);
//     $arr=mysqli_fetch_assoc($querytitle);
//     $sql2="insert into product_images (product_id,img_path,product) values ('".$arr['id']."','".$data['file']."','".$data['title']."')";
//     $query1=mysqli_query($conn,$sql2);
//     if($query1)
//         return array("msg"=>"Product Added", "error"=>false);
//     return array("msg"=>"Oops something went wrong", "error"=>true);
// }
// function updateProduct($conn,$data){ 
//     $sql0="update product set title = '".$data['title']."', description = '".$data['des']."', specification = '".$data['specs']."', introduction = '".$data['intro']."', price = '".$data['price']."', mrp = '".$data['mrp']."', weight = '".$data['weight']."', category_id = '".$data['category']."', status = '".$data['status']."', remarks = '".$data['remark']."', created_by = 'user',is_featured='".$data['is_featured']."' where id='".$data['up_id']."' ";
//     $query3=mysqli_query($conn,$sql0);
//     if($query3)
//         return array("msg"=>"Product Updated", "error"=>false);
//     return array("msg"=>"Oops something went wrong", "error"=>true);
// }
function deleteEvent($conn,$data){ 
    
        $query=mysqli_query($conn,"select * from events where id='".$data."'");
        $arr=mysqli_fetch_assoc($query);
        if(isset($arr['image_url'])){
            $link="../".$arr['image_url'];
            unlink($link);
        }   
        $sql0="delete from events where id='".$data."'";
        $query3=mysqli_query($conn,$sql0);
        if($query3)
        return array("msg"=>"Event deleted", "error"=>false);
    return array("msg"=>"Oops something went wrong", "error"=>true);
}
// function deleteImage($conn,$data){ 
//     $query=mysqli_query($conn,"select * from product_images where id='".$data."'");
//     $arr=mysqli_fetch_assoc($query);
//     unlink("../".$arr['img_path']);
//     $sql0="delete from product_images where id='".$data."'";
//     $query3=mysqli_query($conn,$sql0);
//     if($query3)
//         return array("msg"=>"Image deleted", "error"=>false);
//     return array("msg"=>"Oops something went wrong", "error"=>true);
// }
?>