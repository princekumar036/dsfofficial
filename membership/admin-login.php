<!DOCTYPE html>
<html lang="en">
<?php 
    include './conn.php'; 
?>
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin login
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
</head>

<body class="">
  <div class="wrapper " style="background-color:#f4f3ef;">
    <!-- <div class="sidebar" data-color="white" data-active-color="danger"> -->
      <!-- <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div> -->
          <!-- <p>CT</p> -->
        <!-- </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim -->
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        <!-- </a>
      </div> -->
      <!-- </div> -->
    <!-- <div class="main-panel" > -->
      <!-- Navbar -->
      <!-- End Navbar -->
      <div class="content" style="padding-top:63px; ">
         <div class="col-md-12">
            <div class="card card-user" style="padding-top:60px;padding-bottom:50px;">
              <div class="card-header">
                <h5 class="card-title" style="text-align:center;">Admin Login</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                  <div class="col-md-4 pr-1"></div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group" >
                        <label for="email">Email</label>
                        <input type="email" onkeypress="checkEnterClick(event)" class="form-control" id="email" value="">
                      </div>
                    </div>
                  <div class="col-md-4 pr-1"></div>    
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1"></div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" onkeypress="checkEnterClick(event)" class="form-control" id="password" value="">
                      </div>
                    </div>
                  <div class="col-md-4 pr-1"></div>  
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="button" class="btn btn-primary btn-round" onclick="login()">Sign in</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php include "./footer.php"; ?>
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
      function login(){
          const login_details={
              email:document.getElementById("email").value,
              password:document.getElementById("password").value
            };
          axios.post('./controllers/user.php', {
              login_details,
              function:'user_login'
          }).then(res => {
              res_data=res.data;
              alertMsg(res_data['msg'],res_data['error']);
              if(!res_data['error'])
              setTimeout(() => {
                  window.location="./admin-events.php";
              }, 2000);
          }).catch(err => {
              alert(err.response.data);
          })
      }
      function checkEnterClick(e){
        if(e.keyCode == 13){
          login();
        }
      }
  </script>
</body>

</html>