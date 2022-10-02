<?php 
    include './conn.php'; 
    if(!isset($_SESSION['user']))
    {
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin - Releases
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
  <style>
    p{
      margin:0px;
    }
  </style>
</head>

<body class="">
  <div class="wrapper ">
   <?php include "./sidebar.php"; ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include "./navbar.php";?>
      <!-- End Navbar -->
      <?php
          $search="";
          if(isset($_GET['search'])){
          $search=$_GET['search'];
          }
          if($search==""){  
            $sql0="select * from releases";
          }
          if($search!=""){
            $sql0="select * from releases where title like '%$search%'";
          }
      ?>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-3">
                  <h4>Releases</h4>  
                  </div>
                  <div class="col-md-6" style="padding-top:30px;">
                  </div>
                  <div class="col-md-3" style="text-align:center;padding-top:40px;">
                  <h6><button type="submit"><a href="./create-releases.php">Create release</a></button><h6>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4" style="padding-top:10px;">
                    <div class="input-group no-border">
                      <input type="text" value="<?php echo $search; ?>" id="search-in" onkeypress="checkEnterClick(event)" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <i class="nc-icon nc-zoom-split" onclick="search()"></i>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Id
                      </th>
                      <th>
                        Image
                      </th>
                      <th>
                        Title
                      </th>
                      <th >
                        Status
                      </th>
                      <th>
                      </th>  
                    </thead>
                    <?php
                      $release_query=mysqli_query($conn,$sql0);
                      while($release_arr=mysqli_fetch_assoc($release_query)){
                      $release_id=$release_arr['id'];
                      $release_title=$release_arr['title'];
                      $release_description=$release_arr['description'];
                      $release_status=$release_arr['status']; 
                      $release_img_url=$release_arr['image_url']; 
                      $release_created_at=$release_arr['created_at'];
                    ?>
                    <tbody>
                      <tr>
                        <td>
                          <?php echo $release_id; ?>
                        </td>
                        <td>
                        <div class="form-group">
                          <img src="<?php echo $release_img_url;?>" style="width:200px;" alt="images">
                        </div>
                        </td>
                        <td>
                          <?php echo $release_title; ?>
                        </td>
                        <td>
                          <?php 
                            if($release_status==1){
                          ?>
                          <img src="./assets/img/check1.png"/>
                          <?php } ?>
                          <?php
                            if($release_status==0){
                          ?>
                          <img src="./assets/img/close.png"/>
                          <?php } ?>
                        </td>
                        <td>
                          <button type="submit" onclick="deleteRelease(<?php echo $release_id; ?>)">Delete</button>
                        </td>
                      </tr>
                    </tbody>
                    <?php
                    }
                    ?>
                    </table>
                </div>
              </div>
            </div>
          </div>
          <?php include "./footer.php"; ?>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
  <!-- Chart JS -->
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <!-- <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
  <script src="./general_functions.js"></script>
  <script>
      function deleteRelease(release_id){    
          if (confirm("Do you want to delete?") == true) {
              axios.post('./controllers/release.php', {
                release_id,
                function:'deleteRelease'
              }).then(res => {
                  res_data=res.data;
                  alertMsg(res_data['msg'],res_data['error']);
                  setTimeout(() => {
                      window.location=window.location.href;
                  }, 2000);
              }).catch(err => {
                  alert(err.response.data);
              })
          } 
      }
      
      function search(){  
        const value=document.getElementById("search-in").value
        window.location="./admin-releases.php?search="+value
      }
      
      function checkEnterClick(e){
        if(e.keyCode == 13){
        search();
        }
      }

      
  </script>
</body>

</html>