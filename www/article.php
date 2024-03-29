<?php
include("path.php");
$conn = mysqli_connect("localhost", "root", "root", "my_blog");
//$result = $conn->query("SELECT * FROM `articles`");
//$result_cookie = $conn->query("SELECT * FROM `users`");
//$user = mysqli_fetch_assoc($result_cookie);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="front/css/style.css" rel="stylesheet">

    <!-- My fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500;1,600&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>My blog</title>
</head>
<body>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
-->


<?php include("include/header.php"); ?>

<!--Error if not found-->
<?php
$article = $conn->query("SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);
if (mysqli_num_rows($article) <= 0)
{
?>
<div class="container">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <!-- <strong class="d-inline-block mb-2 text-primary">World</strong> -->
            <h3 class="mb-0">Ooops... Something is going wrong!</h3>
            <p class="card-text mb-auto">Article not found!</p>

            <?php } else
            {
            $new_post = mysqli_fetch_assoc($article);
            ?>
<!--Main block-->
<div class="container">
    <div class="content row">
        <!--Main content-->
        <div class="main-content col-md-9 col-12">
            <h2><?php
                echo $new_post['title'];?>
            </h2>
                <div class="single-post row">
                    <div class="img col-12">
                        <img src="front/images/image4.jpeg" class="img-thumbnail">
                    </div>
                    <div class="info">
                        <i class="far fa-user"> Author name</i><br>
                        <i class="far fa-calendar-alt">

                        <?php
                        echo $mysqldate = date("j M y",strtotime($new_post['pubdate']))
                        ?>
                    </i>
                    </div>

                    <div class="single-post-text col-12">
                        <p>
                            <a><?php echo $new_post['text'];?>
                        </p>

                       <div class="info-static mt-1 text-muted">
                            <i class="far fa-comment"> 12</i>
                            <i class="far fa-eye"> 666</i>
                        </div>
                        <div>
                            <a href="">Photography, Sport</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <!--Sidebar-->
        <div class="sidebar col-md-3 col-12">
            <div class="section search">
                <h3>Search</h3>
                <form action="" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Search...">
                </form>
            </div>
            <div class="section categories">
                <h3>Categories</h3>
                <ul>
                    <li><a href="#">Automobiles</a></li>
                    <li><a href="#">Life</a></li>
                    <li><a href="#">Sport</a></li>
                    <li><a href="#">Nature</a></li>
                    <li><a href="#">Photography</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<!--Main block ending-->


<!--<div class="container">
        <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
        </nav>
</div>-->

<?php include("include/footer.php"); ?>
</body>
</html>
