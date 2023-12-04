
<?php

    session_start();

    $sqluser = "onlinebook";
    $sqlpassword = "#125Yb3qf";
    $sqldatabase = "onlinebook";
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=".$sqldatabase,$sqluser,$sqlpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
    $st = $pdo->prepare('SELECT * FROM list WHERE user_name=?');
    $st->execute(array($_SESSION["uname"]));
    if(($r=$st->fetch())==null||($r["password"]!=$_SESSION["pass"])) {
        header("Location:login.php");
        exit;
    }
    if ($_SERVER['REQUEST_METHOD']=='POST') {
    	session_destroy();
        header("Location:login.php");
        exit;
    	
    }
?>
<head>
    <meta charset="utf-8">
    <title>Maths Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Template Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700" rel="stylesheet">

    <!-- Template CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/preloader.min.css" rel="stylesheet">
    <link href="css/circle.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/fm.revealator.jquery.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- CSS Skin File -->
    <link href="css/skins/yellow.css" rel="stylesheet">

    <!-- Live Style Switcher - demo only -->
    <link rel="alternate stylesheet" type="text/css" title="blue" href="css/skins/blue.css" />
    <link rel="alternate stylesheet" type="text/css" title="green" href="css/skins/green.css" />
    <link rel="alternate stylesheet" type="text/css" title="yellow" href="css/skins/yellow.css" />
    <link rel="alternate stylesheet" type="text/css" title="blueviolet" href="css/skins/blueviolet.css" />
    <link rel="alternate stylesheet" type="text/css" title="goldenrod" href="css/skins/goldenrod.css" />
    <link rel="alternate stylesheet" type="text/css" title="magenta" href="css/skins/magenta.css" />
    <link rel="alternate stylesheet" type="text/css" title="orange" href="css/skins/orange.css" />
    <link rel="alternate stylesheet" type="text/css" title="purple" href="css/skins/purple.css" />
    <link rel="alternate stylesheet" type="text/css" title="red" href="css/skins/red.css" />
    <link rel="alternate stylesheet" type="text/css" title="yellowgreen" href="css/skins/yellowgreen.css" />
    <link rel="stylesheet" type="text/css" href="css/styleswitcher.css" />

    <!-- Modernizr JS File -->
    <script src="js/modernizr.custom.js"></script>
</head>

<body class="blog">
<!-- Live Style Switcher Starts - demo only -->
<div id="switcher" class="">
    <div class="content-switcher">
        <h4>STYLE SWITCHER</h4>
        <ul>
            <li>
                <a href="#" onclick="setActiveStyleSheet('purple');" title="purple" class="color"><img src="img/styleswitcher/purple.png" alt="purple"/></a>
            </li>
            <li>
                <a href="#" onclick="setActiveStyleSheet('red');" title="red" class="color"><img src="img/styleswitcher/red.png" alt="red"/></a>
            </li>
            <li>
                <a href="#" onclick="setActiveStyleSheet('blueviolet');" title="blueviolet" class="color"><img src="img/styleswitcher/blueviolet.png" alt="blueviolet"/></a>
            </li>
            <li>
                <a href="#" onclick="setActiveStyleSheet('blue');" title="blue" class="color"><img src="img/styleswitcher/blue.png" alt="blue"/></a>
            </li>
            <li>
                <a href="#" onclick="setActiveStyleSheet('goldenrod');" title="goldenrod" class="color"><img src="img/styleswitcher/goldenrod.png" alt="goldenrod"/></a>
            </li>
            <li>
                <a href="#" onclick="setActiveStyleSheet('magenta');" title="magenta" class="color"><img src="img/styleswitcher/magenta.png" alt="magenta"/></a>
            </li>
            <li>
                <a href="#" onclick="setActiveStyleSheet('yellowgreen');" title="yellowgreen" class="color"><img src="img/styleswitcher/yellowgreen.png" alt="yellowgreen"/></a>
            </li>
            <li>
                <a href="#" onclick="setActiveStyleSheet('orange');" title="orange" class="color"><img src="img/styleswitcher/orange.png" alt="orange"/></a>
            </li>
            <li>
                <a href="#" onclick="setActiveStyleSheet('green');" title="green" class="color"><img src="img/styleswitcher/green.png" alt="green"/></a>
            </li>
            <li>
                <a href="#" onclick="setActiveStyleSheet('yellow');" title="yellow" class="color"><img src="img/styleswitcher/yellow.png" alt="yellow"/></a>
            </li>
        </ul>

       <div id="hideSwitcher">&times;</div>
    </div>
</div>
<div id="showSwitcher" class="styleSecondColor"><i class="fa fa-cog fa-spin"></i></div>
<!-- Live Style Switcher Ends - demo only -->
<!-- Header Starts -->
<header class="header" id="navbar-collapse-toggle">
    <!-- Fixed Navigation Starts -->
    <ul class="icon-menu d-none d-lg-block revealator-slideup revealator-once revealator-delay1">
        <li class="icon-box active">
            <i class="fa fa-home"></i>
            <a href="category.php">
                <h2>Home</h2>
            </a>
        </li>
        <li class="icon-box">
            <i class="fa fa-envelope-open"></i>
            <a href="contact.html">
                <h2>Contact</h2>
            </a>
        </li>
        <li class="icon-box">
            <i class="fa fa-sign-out"></i>
            <a href="Home.php">
                <h2>LOGOUT</h2>
            </a>
        </li>
    </ul>
    <!-- Fixed Navigation Ends -->
    <!-- Mobile Menu Starts -->
    <nav role="navigation" class="d-block d-lg-none">
        <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul class="list-unstyled" id="menu">
                <li><a href=category.php><i class="fa fa-home"></i><span>Home</span></a></li>
                <li><a href="contact.html"><i class="fa fa-envelope-open"></i><span>Contact</span></a></li>
                <li class="active"><a href="Home.php"><i class="fa fa-comments"></i><span>LOGOUT</span></a></li>
            </ul>
        </div>
    </nav>
    <!-- Mobile Menu Ends -->
</header>
<!-- Header Ends -->
<!-- Page Title Starts -->
<section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
    <h1>MATHS <span> BOOKS</span></h1>
    <span class="title-bg">E-book manager</span>
</section>
<!-- Page Title Ends -->
<!-- Main Content Starts -->
<section class="main-content revealator-slideup revealator-once revealator-delay1">
    <div class="container">
        <!-- Articles Starts -->
        <div class="row">
            <!-- Article Starts -->
            <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="#" class="d-block position-relative overflow-hidden">
                            <img src="books\Mathbook\Image\1.jpg" class="img-fluid" alt="Blog Post">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">Mathematical Physics</a></h3>
                        </div>
                        <a href="books\Mathbook\MathematicaPhysics.pdf" target="_blank" class="btn btn-pdf">View</a> <a href="books\Mathbook\MathematicaPhysics.pdf" download="Mathematical Physics.pdf" class="btn btn-download">Download</a>
                    </div>
                </article>
            </div>
            <!-- Article Ends -->
            <!-- Article Starts -->
            <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="#" class="d-block position-relative overflow-hidden">
                            <img src="books\Mathbook\Image\2.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">An Introduction To Mathematics</a></h3>
                        </div>
                        <a href="books\Mathbook\AnIntroductionToMathematics.pdf" target="_blank" class="btn btn-pdf">View</a> <a href="books\Mathbook\AnIntroductionToMathematics.pdf" download="An Introduction To Mathematics.pdf" class="btn btn-download">Download</a>
                    </div>
                
                </article>
            </div>
            <!-- Article Ends -->
            <!-- Article Starts -->
            <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="#" class="d-block position-relative overflow-hidden">
                            <img src="books/Mathbook/Image/3.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">Advanced Book On Mathematics Olympiad</a></h3>
                        </div>
                        <a href="books\Mathbook\AdvancedBookOnMathematicsOlympiad.pdf" target="_blank" class="btn btn-pdf">View</a> <a href="books\Mathbook\AdvancedBookOnMathematicsOlympiad.pdf" download="Advanced Book On Mathematics Olympiad" class="btn btn-download">Download</a>
                    </div>
                </article>
            </div>
            <!-- Article Ends -->
            <!-- Article Starts -->
            <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="#" class="d-block position-relative overflow-hidden">
                            <img src="books\Mathbook\Image\4.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">Methods Of Geometry</a></h3>
                        </div>
                        <a href="books\Mathbook\MethodsOfGeometry.pdf" target="_blank" class="btn btn-pdf">View</a> <a href="books\Mathbook\MethodsOfGeometry.pdf" download="Methods Of Geometry.pdf" class="btn btn-download">Download</a>
                </article>
            </div>
            <!-- Article Ends -->
            <!-- Article Starts -->
            <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="#" class="d-block position-relative overflow-hidden">
                            <img src="books\Mathbook\Image\5.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">Business Mathematics And Statistics.</a></h3>
                        </div>
                        <a href="books\Mathbook\BusinessMathematicsAndStatistics..pdf" target="_blank" class="btn btn-pdf">View</a> <a href="books\Mathbook\BusinessMathematicsAndStatistics..pdf" download="Business Mathematics And Statistics..pdf" class="btn btn-download">Download</a>
                    </div>
                </article>
            </div>
            <!-- Article Ends -->
            <!-- Article Starts -->
            <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="#" class="d-block position-relative overflow-hidden">
                            <img src="books\Mathbook\Image\6.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">A History Of Mathematics From Mesopotamia To Modernity</a></h3>
                        </div>
                        <a href="books\Mathbook\AHistoryOfMathematicsFromMesopotamiaToModernity.pdf" target="_blank" class="btn btn-pdf">View</a> <a href="books\Mathbook\AHistoryOfMathematicsFromMesopotamiaToModernity.pdf" download="A History Of Mathematics From Mesopotamia To Modernity.pdf" class="btn btn-download">Download</a>
                    </div>
                </article>
            </div>
            <!-- Article Ends -->
                        <!-- Article Starts -->
                        <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="#" class="d-block position-relative overflow-hidden">
                            <img src="books\Mathbook\Image\7.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">Mathematics Made Easy For Children With Visual Impairment.</a></h3>
                        </div>
                        <a href="books\Mathbook\MathematicsMadeEasyForChildrenWithVisualImpairment..pdf" target="_blank" class="btn btn-pdf">View</a> <a href="books\Mathbook\MathematicsMadeEasyForChildrenWithVisualImpairment..pdf" download="Mathematics Made Easy For Children With Visual Impairment.pdf" class="btn btn-download">Download</a>
                    </div>
                </article>
            </div>
            <!-- Article Ends -->
                        <!-- Article Starts -->
                        <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="#" class="d-block position-relative overflow-hidden">
                            <img src="books\Fantasy\Image\8.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">Wise And Otherwise - A Salute To Life</a></h3>
                        </div>
                        <a href="books\Fantasy\8WiseAndOtherwiseASaluteToLife.pdf" target="_blank" class="btn btn-pdf">View</a> <a href="books\Fantasy\8WiseAndOtherwiseASaluteToLife.pdf" download="Wise And Otherwise - A Salute To Life.pdf" class="btn btn-download">Download</a>
                    </div>
                </article>
            </div>
            <!-- Article Ends -->
            <!-- Article Starts -->
            <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="#" class="d-block position-relative overflow-hidden">
                            <img src="books\Fantasy\Image\5.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">Business Mathematics And Statistics.</a></h3>
                        </div>
                        <a href="books\Fantasy\5TheMonkWhoSoldHisFerrari.pdf" target="_blank" class="btn btn-pdf">View</a> <a href="books\Fantasy\5TheMonkWhoSoldHisFerrari.pdf" download="Business Mathematics And Statistics..pdf" class="btn btn-download">Download</a>
                    </div>
                </article>
            </div>
            <!-- Article Ends -->
            <!-- Article Starts -->
            <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="#" class="d-block position-relative overflow-hidden">
                            <img src="books\Mathbook\Image\8.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">Children's Mathematics</a></h3>
                        </div>
                        <a href="books\Mathbook\Children'sMathematics.pdf" target="_blank" class="btn btn-pdf">View</a> <a href="books\Mathbook\Children'sMathematics.pdf" download="Children's Mathematics.pdf" class="btn btn-download">Download</a>
                    </div>
                </article>
            </div>
            <!-- Article Ends -->
                        <!-- Article Starts -->
                        <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="#" class="d-block position-relative overflow-hidden">
                            <img src="books\Mathbook\Image\11.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">Secondary Mathematics Curriculum</a></h3>
                        </div>
                        <a href="books\Mathbook\SecondaryMathematicsCurriculum.pdf" target="_blank" class="btn btn-pdf">View</a> <a href="books\Mathbook\SecondaryMathematicsCurriculum.pdf" download="Secondary Mathematics Curriculum.pdf" class="btn btn-download">Download</a>
                    </div>
                </article>
            </div>
            <!-- Article Ends -->
                             <!-- Article Starts -->
                             <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="#" class="d-block position-relative overflow-hidden">
                            <img src="books\Mathbook\Image\10.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">MATHEMATICS AND ORIGAMI.</a></h3>
                        </div>
                        <a href="books\Mathbook\MATHEMATICSANDORIGAMI.pdf" target="_blank" class="btn btn-pdf">View</a> <a href="books\Mathbook\MATHEMATICSANDORIGAMI.pdf" download="MATHEMATICS AND ORIGAMI.pdf" class="btn btn-download">Download</a>
                    </div>
                </article>
            </div>
            <!-- Article Ends -->
                             <!-- Article Starts -->
                             <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="#" class="d-block position-relative overflow-hidden">
                            <img src="books\Mathbook\Image\9.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">How Math Explains The World.</a></h3>
                        </div>
                        <a href="books\Mathbook\HowMathExplainsTheWorld.pdf" target="_blank" class="btn btn-pdf">View</a> <a href="books\Mathbook\HowMathExplainsTheWorld.pdf" download="How Math Explains The World.pdf" class="btn btn-download">Download</a>
                    </div>
                </article>
            </div>
            <!-- Article Ends -->
            <!-- Pagination Starts -->
            <div class="col-12 mt-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mb-0">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Pagination Ends -->
        </div>
        <!-- Articles Ends -->
    </div>

</section>

<!-- Template JS Files -->
<script src="js/jquery-3.5.0.min.js"></script>
<script src="js/styleswitcher.js"></script>
<script src="js/preloader.min.js"></script>
<script src="js/fm.revealator.jquery.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpGridGallery.js"></script>
<script src="js/jquery.hoverdir.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/custom.js"></script>

</body>


</html>
