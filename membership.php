<?php 
$is_success = false;
if(isset($_POST['subbtn'])){
	include 'membership/conn.php';
	include 'membership/functions.php';
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
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>DSF | Membership</title>
		<link rel="stylesheet" href="index.css">
    	<link rel="stylesheet" href="output.css">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/1fac2f10ac.js" crossorigin="anonymous"></script>

		<style>
			textarea:focus, input:focus {
			outline: none;
		}
		</style>
	</head>


	<body>
    <!-- HEADER -->
        <header class="font-rbto-cnsd font-bold text-lg bg-gray-300 px-10 py-2 lg:flex justify-between items-center lg:text-xl">
            
            <div class="flex justify-between items-center">

                <div>
                    <a href="index.html" class="lg:flex items-center gap-2">
                        <div><img class="w-14 lg:w-20" src="files/logo-color.png" alt="DSF Logo"></div>
                        <h1 class="hidden lg:block">
                            <span class="block">democratic</span>
                            <span class="block">students'</span>
                            <span class="block">federation</span>
                        </h1>
                    </a>
                </div>

                <button id="navtoggle" class="lg:hidden">
                    <span id="navtoggle-open"><i class="fa-solid fa-bars text-2xl"></i></span>
                    <span id="navtoggle-close" class="hidden"><i class="fa-solid fa-xmark text-3xl"></i></span>
                </button>

            </div>

            <nav id="navmenu" class="hidden text-right lg:block">
                <ul class="lg:flex gap-8 items-center">
                    <li><a class="navlink active" href="index.html">HOME</a></li>
                    <li><a class="navlink" href="about.html">ABOUT</a></li>
                    <li><a class="navlink" href="releases.php">RELEASES</a></li>
                    <li><a class="navlink" href="events.php">EVENTS</a></li>
                    <li><a class="navlink" href="contact-us.html">CONTACT US</a></li>
                    <li class="mt-2 lg:mt-0 lg:hover:scale-105 transition-transform"><a class="navbutton bg-red-800 px-5 py-1 rounded text-white lg:px-10 lg:py-2" href="membership.php">JOIN US</a></li>
                </ul>
            </nav>
        </header>

			<main>
				<div class="container-fluid">
					<div class="px-10 md:w-1/3 mx-auto row d-flex justify-content-center">
						<div class="col-md-7 col-lg-4 col-12">
							<div class="card custom-card">
							<!-- <div class="justify-content-center d-flex">
									<img class="mt-3 logo-img" width="150" src="files/star-black-lg.svg" />
								</div> -->
								<h3 class="font-rbto-cnsd font-bold text-2xl my-10"><center>Membership Form</center></h3>
							<div class="mb-20">
								<!-- <?php 
								if($is_success){
								?>
								<div class="alert alert-dark d-flex align-items-center" role="alert">
									<div>
										You have registered successfully
									</div>
									</div>
									<?php } ?> -->
								<form class="border-2 font-rbto-cnsd px-5 py-10" method="post" action="registration-success.html">
									<div class="mb-3">
										<label class="block font-bold form-label custom-form-label">Name*</label>
										<input class="block w-full border-b-2 focus:border-b-black mb-10" maxlength="200" name="name" type="text" class="form-control custom-form-control" required>
									</div>
									<div class="mb-3">
										<label class="block font-bold form-label custom-form-label">Email*</label>
										<input class="block w-full border-b-2 focus:border-b-black mb-10" maxlength="200" name="email" type="email" class="form-control custom-form-control" required>
									</div>
									<div class="mb-3">
										<label class="block font-bold form-label custom-form-label">Mobile*</label>
										<input class="block w-full border-b-2 focus:border-b-black mb-10" name="mobile" maxlength="10" type="text" class="form-control custom-form-control" required>
									</div>
									<div class="mb-3">
										<label class="block font-bold form-label custom-form-label">School*</label>
										<select class="block w-full border-b-2 focus:border-b-black mb-10" name="school" class="form-control custom-form-control" required>
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
										<label class="block font-bold form-label custom-form-label">Centre* (Write school name if center is same)</label>
										<input class="block w-full border-b-2 focus:border-b-black mb-10" name="centre" maxlength="200" type="text" class="form-control custom-form-control" required>
									</div>
									<div class="mb-10">
										<label class="block font-bold form-label custom-form-label">Course*</label>
										<select class="block w-full border-b-2 focus:border-b-black mb-10" name="course" class="form-control custom-form-control" required>
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

									<input type="submit" name="subbtn" style="display: block;margin: 0 auto" class="bg-red-800 px-10 py-2 rounded text-white text-lg font-rbto-cnsd font-bold hover:scale-110 transition-transform inline-block" />
									</form>
							</div>
							</div>
							
							
							
						</div>
					</div>
				</div>
		</main>

		<footer class="bg-red-800 text-white/75 py-5 px-10 lg:px-40 text-center md:text-left">

			<div class="font-rbto-cnsd text-sm text-center">
				<p>All Rights Reserved DSF © 2022</p>
			</div>

		</footer>

	</body>
	<script src="index.js"></script>
</html>