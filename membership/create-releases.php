<!DOCTYPE html>
<html lang="en">
<?php 
  include './conn.php'; 
  @session_start();
  if(!isset($_SESSION['user']))
      exit();
?> 
  <head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin - Create Releases
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
  <div class="wrapper ">
    <?php include "./sidebar.php"; ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include "./navbar.php"; ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Create Releases</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" value="" required>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <div id="description" class="form-control"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="status">
                              <option class="form-control" value="1">Active</option>
                              <option class="form-control" value="0">Inactive</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <label for="image">Click to select image</label>
                      <input type="file" name="image" id="image" multiple/>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label for="facebook_link">Facebook link</label>
                        <input type="text" class="form-control" id="facebook_link" value="" required>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="twitter_link">Twitter link</label>
                        <input type="text" class="form-control" id="twitter_link" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label for="instagram_link">Instagram link</label>
                        <input type="text" class="form-control" id="instagram_link" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="button" class="btn btn-primary btn-round" onclick="addRelease()">Create Release</button>
                    </div>
                  </div>
                </form>
              </div>
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
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script>
      var description = new Quill('#description', {
          theme: 'snow' 
      });
      function addRelease(){
          const release_details={
              title:document.getElementById("title").value,
              description:description.root.innerHTML.split(" ").join("&nbsp;"),
              facebook_link:document.getElementById("facebook_link").value,
              twitter_link:document.getElementById("twitter_link").value,
              instagram_link:document.getElementById("instagram_link").value,
              status:document.getElementById("status").value,
              function:'addRelease'
          };
            const form_data = new FormData()
            for(let release_key in release_details){
              form_data.append(release_key, release_details[release_key])
            }
          // Adding files to formdata
          const files = document.getElementById("image").files
          for(let file of files){
            form_data.append("release_images[]", file)
          }
          axios.post('./controllers/release.php',form_data).then(res => {
              res_data=res.data;
              alertMsg(res_data['msg'],res_data['error']);
              if(!res_data['error']){
                setTimeout(() => {
                    window.location="./admin-releases.php";
                }, 2000);
              }
          }).catch(err => { 
              alert(err.response.data);
          })
      }
  </script>
</body>

</html>