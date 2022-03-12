<?php
session_start();
$con = mysqli_connect('localhost','u1491059_newspro','Eokad23247','u1491059_newspro');
mysqli_set_charset($con, "utf8mb4");
$tarix = date('Y-m-d H:i:s',strtotime("+1 hour"));
$axtaris=true;
if(isset($_GET['id']))
{
    $id = (int)$_GET['id'];
    $sec = mysqli_query($con,"SELECT * FROM news WHERE id='".$id."'");
    $post = mysqli_fetch_array($sec);
    $axtaris= false;
}

?>

<!doctype html>
<html class="no-js" lang="">
<?php
function basliq()
{
$sehife=end(explode('/',$_SERVER['PHP_SELF']));
if($sehife=="index.php"){
    echo 'Ana Səhifə';    
}elseif($sehife=="gallery-style-1.php"){
    echo 'Qalareya';    
}elseif($sehife=="idman.php"){
    echo 'İdman';    
}elseif($sehife=="cemiyyet.php"){
    echo 'Cəmiyyət';    
}elseif($sehife=="siyaset.php"){
    echo 'Siyasət';    
}elseif($sehife=="dunya.php"){
    echo 'Dünya';    
    }
}

?>
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php if(isset($id)){echo $post['title'];}else{basliq();} ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name="keywords" content='Yeni xəbərlər, Son xəbərlər, Azerbaycan xəbərləri, xeberlerpro.tk'/>
        <meta name="description" content="xeberlerpro.tk - Azərbaycanda və dünyada baş verən ən son xəbərlər" />
    
        <meta name="robots" content="index,follow"/>
        <meta name="generator" content="xeberlerpro.tk" />
    
        <meta property="og:image" content="img/logo-dark.png"/>
        <!--<meta property="og:image:secure_url" content="" /> -->
        <meta property="og:image:width" content="640" /> 
        <meta property="og:image:height" content="442" />

        <meta property="og:url" content="https://xeberlerpro.tk/"/>
        <meta property="og:title" content='<?php if(isset($id)){echo $post['title'];}else{echo 'Azərbaycandan və dünyadan xəbərlər - Xeberlerpro.tk';} ?>'/>
        <meta property="og:description" content='<?php if(isset($id)){echo $post['metn'];}else{echo 'Xeberlerpro.tk - Azərbaycanda və dünyada baş verən ən son xəbərlər';} ?>'/>
        <meta property="og:site_name" content="Xeberlerpro"/>
        <meta property="og:type" content="article"/>

    

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content='<?php if(isset($id)){echo $post['title'];}else{echo 'Azərbaycandan və dünyadan xəbərlər - Xeberlerpro.tk';} ?>'/>
        <meta itemprop="description" content="<?php if(isset($id)){echo $post['metn'];}else{echo 'Xeberlerpro.tk - Azərbaycanda və dünyada baş verən ən son xəbərlər';} ?>"/>
        <meta itemprop="image" content="img/logo-dark.png"/>

        <!-- Twitter Card data -->
        <meta name="twitter:url" content="https://xeberlerpro.tk/" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:creator" content="@xeberlerpro" />
        <meta name="twitter:title" content="<?php if(isset($id)){echo $post['title'];}else{echo 'Azərbaycandan və dünyadan xəbərlər - Xeberlerpro.tk';} ?>" />
        <meta name="twitter:image" content="img/logo-dark.png">       
    
        <meta property="article:section" content="<?php if(isset($id)){echo $post['metn'];}else{echo 'Xeberlerpro.tk - Azərbaycanda və dünyada baş verən ən son xəbərlər';} ?>" />
        <meta property="article:tag" content="" />
        <meta property="article:published_time" content="<?php if(isset($id)){echo $post['newsdate'];}?>" />
        
        
        
        
        
        
        
        
        
        
        
        
        
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Normalize CSS -->
        <link rel="stylesheet" href="css/normalize.css">
        <!-- Main CSS -->
        <link rel="stylesheet" href="css/main.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.min.css">
        <!-- Font-awesome CSS-->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Owl Caousel CSS -->
        <link rel="stylesheet" href="vendor/OwlCarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendor/OwlCarousel/owl.theme.default.min.css">
        <!-- Main Menu CSS -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
        <!-- Magnific CSS -->
        <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
        <!-- Switch Style CSS -->
        <link rel="stylesheet" href="css/hover-min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="style.css">
        <!-- For IE -->
        <link rel="stylesheet" type="text/css" href="css/ie-only.css" />
        <!-- Modernizr Js -->
        <script src="js/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an 
        <strong>outdated</strong> browser. Please 
        <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
    </p>
    <![endif]-->
        <!-- Add your site or application content here -->
        <!-- Preloader Start Here -->
        <div id="preloader"></div>
        <!-- Preloader End Here -->
        <div id="wrapper">
            <!-- Header Area Start Here -->
            <header>
                <div id="header-layout2" class="header-style5">
                    <div class="header-top-bar">
                        <div class="top-bar-top bg-primarytextcolor box-layout">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9 col-md-12">
                                        <ul class="news-info-list text-center--md">
                                            <li>
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>Azerbaijan</li>
                                            <li>
                                                <i class="fa fa-calendar" aria-hidden="true"></i><span id="current_date"></span></li>
                                            <li><?php
                                                $lastupdates= mysqli_query($con,"SELECT tarix FROM news ORDER BY tarix DESC LIMIT 1");
                                                while($lastupdate= mysqli_fetch_array($lastupdates)){
                                                    $saniye= strtotime($lastupdate['tarix']);
                                                    
                                                    $last = date(' g:i A ',strtotime($lastupdate['tarix']));
                                                    echo'<i class="fa fa-clock-o" aria-hidden="true"></i>Last Update '.$last;
                                                }  
                                            ?>
                                            </li>
                                            <li> <?php include"hava.php";?>
                                                <i class="fa fa-cloud" aria-hidden="true"></i><?=$links[1]?>&#8451; Baku, Azerbaijan</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 d-none d-lg-block">
                                        <ul class="header-social">
                                            <li>
                                                <a href="#" title="facebook">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="twitter">
                                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="google-plus">
                                                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="linkedin">
                                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="bg-body box-layout">
                                <div class="top-bar-bottom pt-20 pb-20 d-none d-lg-block">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-lg-4">
                                            <div class="logo-area">
                                                <a href="index.php" class="img-fluid">
                                                    <img src="img/logo-dark.png" alt="xeberlerpro">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="ne-banner-layout1 pull-right">
                                                <a href="#">
                                                    <img src="img/banner/banner2.jpg" alt="ad" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-menu-area" id="sticker">
                        <div class="container">
                            <div class="bg-body box-layout">
                                <div class="bg-primarytextcolor pl-15 pr-15">
                                    <div class="row no-gutters d-flex align-items-center">
                                        <div class="col-lg-10 col-md-10 d-none d-lg-block position-static min-height-none">
                                            <div class="ne-main-menu">
                                                <nav id="dropdown">
                                                    <ul>
                                                        <?php
                                                        function aktiv($link)
                                                        {
                                                        $sehife=end(explode('/',$_SERVER['PHP_SELF']));
                                                        if($sehife==$link){
                                                        echo 'class="active"';    
                                                        }else{
                                                        echo '';    
                                                        }
                                                        }

                                                         ?>
                                                        <li <?php aktiv('index.php') ?>>
                                                            <a href="index.php">Ana Səhifə</a>
                                                        </li>
                                                        <li <?php aktiv('cemiyyet.php') ?>>
                                                            <a href="cemiyyet.php">Cəmiyyət</a>
                                                        </li>
                                                        <li <?php aktiv('siyaset.php') ?>>
                                                            <a href="siyaset.php">Siyasət</a>
                                                        </li>
                                                        <li <?php aktiv('idman.php') ?>>
                                                            <a href="idman.php">İdman</a>
                                                        </li>
                                                        <li <?php aktiv('dunya.php') ?>>
                                                            <a href="dunya.php">Dünya</a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>

                                        <?php if ($axtaris){  ?>
                                        <div class="col-lg-2 col-md-2 col-sm-4 text-right position-static min-height-none">
                                            <div class="header-action-item on-mobile-fixed">
                                                <ul>
                                                    <li>
                                                        <form  method="post" id="top-search-form" class="header-search-light">
                                                            <input type="text" name="sorgu" class="search-input" autocomplete="off" placeholder="Axtar...." required="" style="display: none;">
                                                            
                                                            <button class="search-button">                                                           
                                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                            </button>
                                                            
                                                        
                                                        </li><li>
                                                        <button type="submit" name="axtar" class="btn btn-danger">
                                                            Axtar
                                                        </button>
                                                    </li>
                                                    </form>
                                                        <?php
                                                        $axtarmaq = false;
                                                        if(isset($_POST['axtar']) && !empty($_POST['sorgu']))
                                                        {   $sorgu = trim($_POST['sorgu']);
                                                            $sorgu = strip_tags($sorgu);
                                                            $sorgu = htmlspecialchars($sorgu);
                                                            $sorgu = mysqli_real_escape_string($con,$sorgu);
                                                            $axtar = " (title LIKE '%".$sorgu."%')";
                                                            $axtarmaq = true;
                                                        }
                                                        
                                                        ?>
                                                    
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <?php } ?>                           

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Header Area End Here -->
            <!-- News Feed Area Start Here -->
           <section class="container">
                <div class="bg-body box-layout">
                    <div class="row no-gutters d-flex align-items-center">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                            <div class="topic-box mt-4 mb-5">Son xəbərlər</div>
                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-8 col-7">
                            <div class="feeding-text-dark2">
                                <ol id="sample" class="ticker">
                                    <?php
                                    $sec = mysqli_query($con,"SELECT title,id FROM news ORDER BY tarix DESC LIMIT 5");
                                    while($info=mysqli_fetch_array($sec)){

                                    echo '
                                    <li>
                                        <a href="single-news.php?id='.$info['id'].'">'.$info['title'].'</a>
                                    </li>
                                    ';
                                    }
                                    ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- News Feed Area End Here -->