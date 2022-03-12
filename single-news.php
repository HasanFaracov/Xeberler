<?php include"header.php"; ?>
           
            <!-- Breadcrumb Area Start Here -->
            <section class="breadcrumbs-area" style="background-image: url('img/banner/breadcrumbs-banner.jpg');">
                <div class="container">
                    <div class="breadcrumbs-content">
                        <h1><?=$post['cat']?></h1>
                        <ul>
                            <li>
                                <a href="index.php">Ana Səhifə</a> -</li>
                            <li>
                                <a href="#"><?=$post['cat']?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End Here -->
            <?php
                                if (isset($_POST['paylas'])) {
                                    $ad = trim($_POST['ad']);
                                    $ad = strip_tags($ad);
                                    $ad = htmlspecialchars($ad);
                                    $ad = mysqli_real_escape_string($con,$ad);

                                    $email = trim($_POST['email']);
                                    $email = strip_tags($email);
                                    $email = htmlspecialchars($email);
                                    $email = mysqli_real_escape_string($con,$email);

                                    $metn = trim($_POST['metn']);
                                    $metn = strip_tags($metn);
                                    $metn = htmlspecialchars($metn);
                                    $metn = mysqli_real_escape_string($con,$metn);




                                    if($_SESSION['token']==$_POST['token']){
                                    if ($ad<>""  && $email<>"" && $metn<>""){
                                    $daxilet = mysqli_query($con,"INSERT INTO comments(news_id,ad,email,metn,tarix)
                                    VALUES('".$post['id']."','".$ad."','".$email."','".$metn."','".$tarix."')");   
                                    }
                                    }
                                }





                                $comment = mysqli_query($con,"SELECT * FROM comments WHERE news_id='".$post['id']."'");
                                $commentsay = mysqli_num_rows($comment);
            
            ?>
            <!-- News Details Page Area Start Here -->
            <section class="bg-body section-space-less30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 mb-30">
                            <div class="news-details-layout1">
                                <div class="position-relative mb-30">
                                    <img src="<?=$post['foto']?>" alt="news-details" class="img-fluid width-100">
                                    <div class="topic-box-top-sm">
                                        <div class="topic-box-sm color-cinnabar mb-20"><?=$post['cat']?></div>
                                    </div>
                                </div>
                                <h2 class="title-semibold-dark size-c30"><?=$post['title']?></h2>
                                <ul class="post-info-dark mb-30">
                                    <li>
                                        <a href="#">Mənbə: 
                                        <?=$post['source']?></a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-calendar" aria-hidden="true"></i><?php $newsdate=date('d-m-Y H:i',strtotime($post['newsdate'])); echo $newsdate;?></a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-eye" aria-hidden="true"></i>202</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-comments" aria-hidden="true"></i><?=$commentsay?></a>
                                    </li>
                                </ul>
                                <p><?=$post['metn']?></p>
                                <blockquote cite="#" class="bg-accent mt-50 mb-50">
                                Yalan ilə dünyanı gəzmək olar, qayıtmaq olmaz.
                                </blockquote>
                                <ul class="blog-tags item-inline">
                                    <li>Etiketlər</li>
                                    <li>
                                        <a href="cemiyyet.php">#Cəmiyyət</a>
                                    </li>
                                    <li>
                                        <a href="dunya.php">#Dünya</a>
                                    </li>
                                    <li>
                                        <a href="siyaset.php">#Siyasət</a>
                                    </li>
                                    <li>
                                        <a href="idman.php">#İdman</a>
                                    </li>
                                </ul>
                                <?php
                                $evvelkixeber= $post['id']-1;
                                $evvelkixebersec = mysqli_query($con,"SELECT * FROM news WHERE id='".$evvelkixeber."'");
                                $evvelkixebergetir = mysqli_fetch_array($evvelkixebersec);

                                $sonrakixeber= $post['id']+1;
                                $sonrakixebersec = mysqli_query($con,"SELECT * FROM news WHERE id='".$sonrakixeber."'");
                                $sonrakixebergetir = mysqli_fetch_array($sonrakixebersec);
                                
                                $ensonxeber = mysqli_query($con,"SELECT id FROM news ORDER BY newsdate DESC LIMIT 1");
                                $ensonxeberid = mysqli_fetch_array($ensonxeber);
                                echo'
                                <div class="row no-gutters divider blog-post-slider">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <a href="single-news.php?id='.$evvelkixebergetir['id'].'" class="prev-article">
                                            <i class="fa fa-angle-left" aria-hidden="true"></i>Əvvəlki Xəbər</a>
                                        <h3 class="title-medium-dark pr-50">'.$evvelkixebergetir['title'].'</h3>
                                    </div>';
                                    if ($sonrakixeber<=$ensonxeberid['id']) {
                                       echo'
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-right">
                                            <a href="single-news.php?id='.$sonrakixebergetir['id'].'" class="next-article">Sonrakı Xəbər
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </a>
                                            <h3 class="title-medium-dark pl-50">'.$sonrakixebergetir['title'].'</h3>
                                        </div>';}echo'
                                </div> '; ?>

                                
                                
                                

                                        <?php
                                echo'
                                <div class="comments-area">
                                    <h2 class="title-semibold-dark size-xl border-bottom mb-40 pb-20">'.$commentsay.' Şərh</h2>
                                    <ul>';
                                        while($info = mysqli_fetch_array($comment)){
                                            $serhtarix =date('d-m-Y H:i',strtotime($info['tarix']));
                                        echo'
                                        <li>
                                            <div class="media media-none-xs">
                                                <img src="img/blog.png" class="img-fluid rounded-circle" alt="comments">
                                                <div class="media-body comments-content media-margin30">
                                                    <h3 class="title-semibold-dark">
                                                        <a href="#">'.$info['ad'].' ,
                                                            <span> '.$serhtarix.'</span>
                                                        </a>
                                                    </h3>
                                                    <p>'.$info['metn'].'</p>
                                                </div>
                                            </div>
                                        </li>';
                                        }
                                        echo'
                                    </ul>
                                </div>
                                ';
                                $_SESSION['token'] = md5(rand());
                                
                                ?>


                                <div class="leave-comments">
                                    <h2 class="title-semibold-dark size-xl mb-40">Şərhlər yazın</h2>
                                    <form id="leave-comments" method="post">
                                        <input type="hidden" name="token" value="<?=$_SESSION['token'] ?>">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <input placeholder="Ad*" class="form-control" autocomplete="off" type="text" name="ad">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <input placeholder="Email*" class="form-control" autocomplete="off"  type="email" name="email">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea placeholder="Şərh*" class="textarea form-control" autocomplete="off"  name="metn"  id="form-message" rows="8" cols="20"></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group mb-none">
                                                    <button type="submit" name="paylas" class="btn-ftg-ptp-45">Şərhi paylaş</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>





                            </div>
                        </div>
                        <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                            <div class="sidebar-box">
                                <div class="topic-border color-cod-gray mb-30">
                                    <div class="topic-box-lg color-cod-gray">İzləmədə qalın</div>
                                </div>
                                <ul class="stay-connected overflow-hidden">
                                    <li class="facebook">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <div class="connection-quantity">50.2 k</div>
                                        <p>İzləyicilər</p>
                                    </li>
                                    <li class="twitter">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                        <div class="connection-quantity">10.3 k</div>
                                        <p>İzləyicilər</p>
                                    </li>
                                    <li class="linkedin">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                        <div class="connection-quantity">25.4 k</div>
                                        <p>Fanatlar</p>
                                    </li>
                                    <li class="rss">
                                        <i class="fa fa-rss" aria-hidden="true"></i>
                                        <div class="connection-quantity">20.8 k</div>
                                        <p>Abonəçilər</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="sidebar-box">
                                <div class="ne-banner-layout1 text-center">
                                    <a href="#">
                                        <img src="img/banner/banner3.jpg" alt="ad" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="sidebar-box">
                                <div class="topic-border color-cod-gray mb-5">
                                    <div class="topic-box-lg color-cod-gray">Bənzər Xəbərlər</div>
                                </div>
                                <div class="row">
                                <?php
 
                                    $sec = mysqli_query($con,"SELECT * FROM news WHERE cat='".$post['cat']."' ORDER BY newsdate DESC LIMIT 3,8");
                                    while($info = mysqli_fetch_array($sec))
                                    {
                                    echo '

                                    <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                                        <div class="mt-25 position-relative">
                                            <div class="topic-box-top-xs">
                                                <div class="topic-box-sm color-cod-gray mb-20">'.$info['cat'].'</div>
                                            </div>
                                            <a href="single-news.php?id='.$info['id'].'" class="mb-10 display-block img-opacity-hover">
                                                <img style="height:110px;"  src="'.$info['foto'].'" alt="ad" class="img-fluid m-auto width-100">
                                            </a>
                                            <h3 class="title-medium-dark size-md mb-none">
                                                <a href="single-news.php?id='.$info['id'].'">'.$info['title'].'</a>
                                            </h3>
                                        </div>
                                    </div>
                                    ';} ?>
                                    
                                </div>
                            </div>
                            
                            
                            <div class="sidebar-box">
                                <div class="topic-border color-cod-gray mb-30">
                                    <div class="topic-box-lg color-cod-gray">Ən Çox Baxılan</div>
                                </div>
                                <?php
                            $sec = mysqli_query($con,"SELECT * FROM news ORDER BY newsdate DESC LIMIT 1,5");
                            while($info = mysqli_fetch_array($sec))
                            {
                            $saniye= strtotime($info['newsdate']);
                            $newsdate =date('d-m-Y H:i',$saniye);
                            echo '
                                <div class="position-relative mb30-list bg-body">
                                    <div class="topic-box-top-xs">
                                        <div class="topic-box-sm color-cod-gray mb-20">'."$info[cat]".'</div>
                                    </div>
                                    <div class="media">
                                        <a class="img-opacity-hover" href="single-news.php?id='.$info['id'].'">
                                            <img style="width:124px; height:108px;" src="'."$info[foto]".'" alt="news" class="img-fluid">
                                        </a>
                                        <div class="media-body">
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>'.$newsdate.'</li>
                                                </ul>
                                            </div>
                                            <h3 class="title-medium-dark mb-none">
                                                <a href="single-news.php?id='.$info['id'].'">'."$info[title]".'</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>'; } ?>                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- News Details Page Area End Here -->
           
            
        </div>
        <!-- Wrapper End -->
        <?php include"footer.php"; ?>
