<?php include"header.php";?>
           
            
            <!-- Breadcrumb Area Start Here -->
            <section class="breadcrumbs-area" style="background-image: url('img/banner/breadcrumbs-banner.jpg');">
                <div class="container">
                    <div class="breadcrumbs-content">
                        <h1>Dünya Xəbərləri</h1>
                        <ul>
                            <li>
                                <a href="index.php">Ana Səhifə</a></li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End Here -->
            <!-- Gallery Page Area Start Here -->
            <section class="bg-body section-space-default">
                <div class="container menu-list-wrapper">
                    <div class="row zoom-gallery menu-list">

                    <?php           if ($axtarmaq) {          
                        $axtar = "AND ".$axtar;}
                                    $sec = mysqli_query($con,"SELECT * FROM news WHERE cat='Dünya'  ".$axtar."  ORDER BY newsdate DESC LIMIT 9");
                                    while($info = mysqli_fetch_array($sec))
                                    {
                                        $saniye= strtotime($info['newsdate']);
                                    $newsdate =date('d-m-Y H:i',$saniye);
                                    echo '
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 menu-item">
                            <div class="gallery-layout-1 mb-40 border-bottom pb-10">
                                <div class="popup-icon-hover img-overlay-hover mb-30">
                                    <a class="" href="single-news.php?id='.$info['id'].'">
                                        <img style="height:219px" src="'."$info[foto]".'" alt="news" class="width-100 img-fluid">
                                    </a>
                                    <a href="'."$info[foto]".'" class="ne-zoom img-popup-icon" title="'."$info[title]".'">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">'."$info[cat]".'</div>
                                </div>
                                <div class="post-date-dark">
                                    <ul>
                                        <li>
                                            <a href="single-news.php?id='.$info['id'].'">'."$info[source]".'</a>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>'.$newsdate.'</li>
                                    </ul>
                                </div>
                                <h3 class="title-semibold-dark size-c22">
                                    <a href="single-news.php?id='.$info['id'].'">'."$info[title]".'</a>
                                </h3>
                            </div>
                        </div>
                                        ';}
                                        $sec = mysqli_query($con,"SELECT * FROM news WHERE cat='Dünya'  ".$axtar." ORDER BY newsdate DESC LIMIT 9,50");
                                    while($info = mysqli_fetch_array($sec))
                                    {
                                        $saniye= strtotime($info['newsdate']);
                                    $newsdate =date('d-m-Y H:i',$saniye);
                                    echo '
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 menu-item hidden">
                            <div class="gallery-layout-1 mb-40 border-bottom pb-10">
                                <div class="popup-icon-hover img-overlay-hover mb-30">
                                    <a class="" href="single-news.php?id='.$info['id'].'">
                                        <img style="height:219px" src="'."$info[foto]".'" alt="news" class="width-100 img-fluid">
                                    </a>
                                    <a href="'."$info[foto]".'" class="ne-zoom img-popup-icon" title="Title Here">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">'."$info[cat]".'</div>
                                </div>
                                <div class="post-date-dark">
                                    <ul>
                                        <li>
                                            <a href="single-news.php?id='.$info['id'].'">'."$info[source]".'</a>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>'.$newsdate.'</li>
                                    </ul>
                                </div>
                                <h3 class="title-semibold-dark size-c22">
                                    <a href="single-news.php?id='.$info['id'].'">'."$info[title]".'</a>
                                </h3>
                            </div>
                        </div>
                                        ';} ?>
                    </div>
                    <div class="row mt-30">
                        <div class="col-12">
                            <div class="loadmore text-center">
                                <a href="#" class="btn-gtf-dtp-50">
                                    <i class="fa fa-circle-o-notch fa-spinner fa-spin" aria-hidden="true"></i>Daha Çox Yüklə...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Gallery Page Area End Here -->
            
            
        </div>
        <!-- Wrapper End -->
        <?php include"footer.php";?>
