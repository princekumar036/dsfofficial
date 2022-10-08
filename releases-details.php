<!DOCTYPE html>
<html lang="en">
<?php 
    include './conn.php';
    $id=$_GET['id'];
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSF | Releases</title>
    <link rel="icon" type="image/x-icon" href="/files/favicon.ico">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="output.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1fac2f10ac.js" crossorigin="anonymous"></script>

    <style>
        .long-text {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2; /* number of lines to show */
                    line-clamp: 2; 
            -webkit-box-orient: vertical;
          word-break: break-word;
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
                <li><a class="navlink" href="index.html">HOME</a></li>
                <li><a class="navlink" href="about.html">ABOUT</a></li>
                <li><a class="navlink active" href="releases.php">RELEASES</a></li>
                <li><a class="navlink" href="events.php">EVENTS</a></li>
                <li><a class="navlink" href="contact-us.html">CONTACT US</a></li>
                <li class="mt-2 lg:mt-0 lg:hover:scale-105 transition-transform"><a class="navbutton bg-red-800 px-5 py-1 rounded text-white lg:px-10 lg:py-2" href="membership.php">JOIN US</a></li>
            </ul>
        </nav>
    </header>
    <?php
        $sql0="select * from releases where id=$id";
        $release_query=mysqli_query($conn,$sql0);
        $release_arr=mysqli_fetch_assoc($release_query);
        $release_id=$release_arr['id'];
        $release_title=$release_arr['title'];
        $release_description=$release_arr['description'];
        $release_facebook_link=$release_arr['facebook_link'];
        $release_twitter_link=$release_arr['twitter_link'];
        $release_instagram_link=$release_arr['instagram_link'];
        $release_status=$release_arr['status']; 
        $release_img_url=$release_arr['image_url']; 
        $release_created_at=$release_arr['created_at'];
    ?>
    <main class="p-5 lg:px-20">
    <div class="text-4xl font-rbto-cnsd font-bold text-center my-10"><?php echo $release_title; ?></div>
    <img src="<?php echo $release_img_url; ?>" class="w-80 mr-5"><br>
    <div style="word-break: break-word;"><?php echo $release_description; ?></div><br>
    <p class="text-sm text-gray-500 pb-2 italic">Published on: <?php echo date("d/m/Y", strtotime($release_created_at)); ?></p>
    <div class="mt-3 float-right">
        <a class="px-3" href="<?php echo $release_facebook_link; ?>"><i class="fa fa-facebook"></i></a>
        <a class="px-3" href="<?php echo $release_twitter_link; ?>"><i class="fa fa-twitter"></i></a>
        <a class="px-3" href="<?php echo $release_instagram_link; ?>"><i class="fa fa-instagram"></i></a>
    </div><br>
    </main>
    
    
    <!-- FOOTER -->
    <footer class="bg-red-800 text-white/75 py-5 px-10 lg:px-40 text-center md:text-left">

    <div class="font-rbto-cnsd text-sm text-center">
        <p>All Rights Reserved DSF © 2022</p>
    </div>

    </footer>

<script src="index.js"></script>
</body>
</html>