<!DOCTYPE html>
<html lang="en">
<?php 
    include './conn.php'
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSF | Events</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="output.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1fac2f10ac.js" crossorigin="anonymous"></script>

    <style>
        main {min-height: 100vh; display: flex; justify-content: center; align-items: center;}
        *{
            font-family:"Roboto Condensed", sans-serif;
        }
    </style>
</head>

<body class="max-w-screen-2xl mx-auto">

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
                <li><a class="navlink" href="index.html">HOME</a></li>
                <li><a class="navlink" href="about.html">ABOUT</a></li>
                <li><a class="navlink" href="releases.php">RELEASES</a></li>
                <li><a class="navlink active" href="events.php">EVENTS</a></li>
                <li><a class="navlink" href="contact-us.html">CONTACT US</a></li>
                <li class="mt-2 lg:mt-0 lg:hover:scale-105 transition-transform"><a class="navbutton bg-red-800 px-5 py-1 rounded text-white lg:px-10 lg:py-2" href="join-us.html">JOIN US</a></li>
            </ul>
        </nav>

    </header>
    
    <div style="text-align:center;margin-top:30px;font-size:40px;font-weight:700">Events</div>
    <div class="row" style="padding:100px;padding-top:30px">
    
    <?php 
        $sql0="select * from events where status=1";
        $event_query=mysqli_query($conn,$sql0);
        while($event_arr=mysqli_fetch_assoc($event_query)){
        $event_id=$event_arr['id'];
        $event_title=$event_arr['title']; 
        $event_description=$event_arr['description'];
        $event_venue=$event_arr['venue'];
        $event_speaker=$event_arr['speaker'];
        $event_date=$event_arr['date'];
        $event_facebook_link=$event_arr['facebook_link'];
        $event_twitter_link=$event_arr['twitter_link'];
        $event_instagram_link=$event_arr['instagram_link'];
        $event_status=$event_arr['status'];
        $event_img_url=$event_arr['image_url'];
        $event_created_at=$event_arr['created_at'];
    ?>
    <div class="col-12" style="display:flex;flex-direction:row;margin-bottom:20px;padding:10px;">
        <img src="<?php echo $event_img_url; ?>" style="width:auto;max-width:300px;margin-right:20px">
        <div style="display:block;width:100%;">
            <div style="font-size:33px;word-break: break-all;"><b><?php echo $event_title; ?> :-</b></div>
            <div style="font-size:17px;word-break: break-all;"><?php echo $event_description; ?></div><br>
            <div style="font-size:17px;display:inline;word-break: break-all;"><b>Venue:</b><?php echo $event_venue; ?></div>
            <div style="font-size:17px;display:inline;word-break: break-all;"><b>Guest/Speaker:</b><?php echo $event_speaker; ?></div>
            <div style="font-size:17px;display:inline;word-break: break-all;"><b>Date:</b> <?php echo $event_date; ?></div>
            <div style="text-align:right;word-break: break-all;">
                <a style="padding:10px" href="<?php echo $event_facebook_link; ?>"><i class="fa fa-facebook"></i></a>
                <a style="padding:10px" href="<?php echo $event_twitter_link; ?>"><i class="fa fa-twitter"></i></a>
                <a style="padding:10px" href="<?php echo $event_instagram_link; ?>"><i class="fa fa-instagram"></i></a>
                <b>Published at:</b> <?php echo date("d/m/Y h:m:sa", strtotime($event_created_at)); ?>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    </div>
<!-- FOOTER -->
    <footer class="bg-red-800 text-white/75 py-5 px-10 lg:px-40 text-center md:text-left">

        <div class="font-rbto-cnsd text-sm text-center">
            <p>All Rights Reserved DSF © 2022</p>
        </div>

    </footer>

    <script src="index.js"></script>
</body>
</html>