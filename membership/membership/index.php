<?php 
$is_success = false;
if(isset($_POST['subbtn'])){
	include 'conn.php';
	include 'functions.php';
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
	$school = mysqli_real_escape_string($conn, $_POST['school']);
	$course = mysqli_real_escape_string($conn, $_POST['course']);
	$centre = mysqli_real_escape_string($conn, $_POST['centre']);

	// Inserting the record
	$ins_query = mysqli_query($conn, "INSERT INTO users(name, email, mobile, school, course, centre) VALUES('".$name."', '".$email."', '".$mobile."', '".$school."', '".$course."', '".$centre."')");

	/// Sending email to the user
	$email_content = 'Dear '.$name.',<br><br>The Democratic Students\' Federation (DSF) would like to formally welcome you to the organization. We hope to have a vibrant engagement with you in the future in our united struggles against anti-student and anti-people policies in the campus and in the country.<br><br>We have received the annual membership fee for the same (If not, you can contribute by contacting <b>Sarika Chaudhary</b> (Secretary, DSF JNU) at <b>+91 8800313013</b>).<br><br>To know more about the organization, you can get in touch with us at:<br><a href="https://facebook.com/dsfjnu"><img width="70" height="40" src="http://dsfofficial.org/assets/img/fb.png"></a><a href="https://twitter.com/dsfjnu"><img width="50" height="35" src="http://dsfofficial.org/assets/img/twitter.png"></a><a href="https://www.instagram.com/dsfjnu"><img style="padding-right:20px;" widh="35" height="35" src="http://dsfofficial.org/assets/img/instagram.png"></a><a href="https://t.me/DSFOfficial"><img style="padding:0 10px;" width="40" height="40" src="http://dsfofficial.org/assets/img/telegram.png"></a><a href="https://www.youtube.com/dsfofficial"><img style="padding:0 10px;" width="60" height="40" src="http://dsfofficial.org/assets/img/youtube.png"></a>';
	sendMail($email.','.'dsfjnuunit@gmail.com', 'Thank you for joining the independent student\'s movement', $email_content);
	$is_success = true;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link href="assets/css/style.css" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	</head>
	<body>
		<img src="assets/img/banner.png" style="width: 100%">
		<h1 class="my-4" style="font-family: 'Bebas Neue', cursive;color: #fff;font-size: 50px"><center>Democratic Students' Federation</center></h1>
		<div class="container-fluid">

			<div class="row d-flex justify-content-center">
				<div class="col-md-7 col-lg-4 col-12">
					<div class="card custom-card">
					  <div class="justify-content-center d-flex">
							<img class="mt-3 logo-img" width="150" src="assets/img/logo.png" />
						</div>
						<h3 class="mt-4"><center>Membership Form</center></h3>
					  <div class="card-body">
					  	<?php 
					  	if($is_success){
					  	?>
					  	<div class="alert alert-dark d-flex align-items-center" role="alert">
							  <div>
							    You have registered successfully
							  </div>
							</div>
							<?php } ?>
					    <form method="post">
							  <div class="mb-3">
							    <label class="form-label custom-form-label">Name</label>
							    <input maxlength="200" name="name" type="text" class="form-control custom-form-control" required>
							  </div>
							  <div class="mb-3">
							    <label class="form-label custom-form-label">Email</label>
							    <input maxlength="200" name="email" type="email" class="form-control custom-form-control" required>
							  </div>
							  <div class="mb-3">
							    <label class="form-label custom-form-label">Mobile</label>
							    <input name="mobile" maxlength="10" type="text" class="form-control custom-form-control" required>
							  </div>
							  <div class="mb-3">
							    <label class="form-label custom-form-label">School</label>
							    <select name="school" class="form-control custom-form-control" required>
							    	<option value="" selected disabled hidden>Choose here</option>
							    	<option value="School of International Studies">School of International Studies</option>
							    	<option value="School of Language, Literature & Culture Studies">School of Language, Literature & Culture Studies</option>
							    	<option value="School of Life Sciences">School of Life Sciences</option>
							    	<option value="School of Social Sciences">School of Social Sciences</option>
							    	<option value="School of Environment Sciences">School of Environment Sciences</option>
							    	<option value="School of Computer & System Sciences">School of Computer & System Sciences</option>
							    	<option value="School of Physical Sciences">School of Physical Sciences</option>
							    	<option value="School of Arts and Aesthetics">School of Arts and Aesthetics</option>
							    	<option value="School of Biotechnology">School of Biotechnology</option>
							    	<option value="School of Sanskrit and Indic Studies">School of Sanskrit and Indic Studies</option>
							    	<option value="School of Engineering">School of Engineering</option>
							    	<option value="ABV School of Management and Entrepreneurship">ABV School of Management and Entrepreneurship</option>
							    	<option value="Special Centre for the study of North East India">Special Centre for the study of North East India</option>
							    	<option value="Special Center for E-learning">Special Center for E-learning</option>
							    	<option value="Special Center for Molecular Medicine">Special Center for Molecular Medicine</option>
							    </select>
							  </div>
							  <div class="mb-3">
							    <label class="form-label custom-form-label">Centre (Write school name if center is same)</label>
							    <input name="centre" maxlength="200" type="text" class="form-control custom-form-control" required>
							  </div>
							  <div class="mb-3">
							    <label class="form-label custom-form-label">Course</label>
							    <select name="course" class="form-control custom-form-control" required>
							    	<option value="B.A">B.A</option>
							    	<option value="M.A">M.A</option>
							    	<option value="M.Phil">M.Phil</option>
							    	<option value="Ph.D">Ph.D</option>
							    	<option value="B.Tech">B.Tech</option>
							    	<option value="MBA">MBA</option>
							    	<option value="MCA">MCA</option>
							    	<option value="MSc">MSc</option>
							    	<option value="M.Tech">M.Tech</option>
							    	<option value="Diploma">Diploma</option>
							    	<option value="OTH">Other</option>
							    </select>
							  </div>

							  <input type="submit" name="subbtn" style="display: block;margin: 0 auto" class="btn btn-dark" />
							</form>
					  </div>
					</div>
					
					
					
				</div>
			</div>
		</div>
		<footer>
			<h6 class="mt-3" style="color: #fff"><center>Designed & Created by <a style="color: #fff" target="_blank" href="https://www.linkedin.com/in/kushalpoddar/">KP</a> in solidarity with the struggles of DSF</center></h6>

			<br>
			<h6 style="color: #fff"><center><a style="color: #fff" target="_blank" href="/privacypolicy.php">Privacy Policy</a></center></h6>
		</footer>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>