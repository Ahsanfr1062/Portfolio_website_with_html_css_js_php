<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}


?>

<?php

$saved = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'partials/_db.php';
    $niche = $_POST["niche"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $blogimg = $_POST["blog-img"];
    $blogdesc = $_POST["blogdesc"];
    $sql = "INSERT INTO `articles` (`sno`, `niche`, `title`, `author`, `blogimg`, `blogDesc`, `timestamp`) VALUES (NULL, '$niche', '$title', '$author', '$blogimg', '$blogdesc', current_timestamp());";
    $result =  mysqli_query($conn, $sql);
    // $num = mysqli_num_rows($result);
    $saved = true;



}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Qwigley' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <title>Admin Panel</title>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <img src="images/logo.png" alt="">
        </div>
        <div class="nav-content">
            <div class="navbar">
                <a href="landing.php">Home</a>
                <a href="blog_posts.php">Delete Blogs</a>
                <a href="">Blogs</a>
                <a href="logout.php">Logout</a>
                <!-- it will scroll down -->
            </div>
        </div>
    </div>

    <?php
    if($saved){
        echo 'Article has been published';
    }

    ?>
    
    <section class="admin-article">

        <div class="admin-hero">
            <h1>Hello <?php echo $_SESSION['username'] ?> ,  Have a Good Day Ahead</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti harum voluptates soluta?</p>
        
        <div class="add-article">
            <div class="container">
                <div class="row">
                    <h1>Add <span>Articles</span></h1>
                </div>
                <div class="row">
                    <h4 style="text-align:center">We'd love to hear from you!</h4>
                </div>
                <form action="admin.php" method="post">

                    <div class="row input-container">
                        <div class="col-xs-12">
                        <div class="styled-input wide">
                            <input type="text" name="niche" id="niche" required />
                            <label>Niche</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="styled-input">
                            <input type="text" name="title" id="title" required />
                            <label>Title</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="styled-input">
                            <input type="text" name="author" id="author" required />
                            <label>Author</label>
                        </div>
                    </div>
                    <input type="file" name="blog-img" id="blog-img">
                    <div class="col-xs-12">
                        <div class="styled-input wide">
                            <textarea name="blogdesc" id="blogdesc" required></textarea>
                            <label>Description</label>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <button class="btn-lrg submit-btn" type="submit">Add Article</button>
                    </div>
                </form>
                </div>
            </div>
        </section>



<p>@ 2021, AhsanFr, Ecommerce Website</p>
</body>

</html>