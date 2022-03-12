<?php include"header.php"; ?>

        
            <!-- News Slider Area Start Here -->




            <section class="container">
                <div class="bg-body box-layout">
                    <div class="section-space-bottom-less4">
                        <div class="row tab-space2">
                            <?php
                            $sec = mysqli_query($con,"SELECT * FROM news ORDER BY newsdate DESC LIMIT 1");
                            while($info = mysqli_fetch_array($sec))
                            {
                            $saniye= strtotime($info['newsdate']);
                            $newsdate =date('d-m-Y H:i',$saniye);
                            echo '
                            <div class="col-lg-5 col-md-12">
                                <div class="img-overlay-70 img-scale-animate mb-4">
                                    <img style="height:427px;" src="'."$info[foto]".'"  alt="'.$info['title'].'" class="img-fluid width-100">
                                    <div class="mask-content-lg">
                                        <div class="topic-box-sm color-cod-gray mb-20">'."$info[cat]".'</div>
                                        <div class="post-date-light">
                                            <ul>
                                                <li>
                                                    <a title="'.$info['title'].'" href="single-news.php?id='.$info['id'].'">'.$info['source'].'</a>
                                                </li>
                                                <li>
                                                    <span>
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>'.$newsdate.'</li>
                                            </ul>
                                        </div>
                                        <h1 class="title-medium-light">
                                            <a title="'.$info['title'].'"  href="single-news.php?id='.$info['id'].'">'."$info[title]".'</a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            ';}
                            ?>
                            <div class="col-lg-7 col-md-12">
                                <div class="row tab-space2">
                                <?php
                            $sec = mysqli_query($con,"SELECT * FROM news ORDER BY newsdate DESC LIMIT 1,4");
                            while($info = mysqli_fetch_array($sec))
                            {
                            $saniye= strtotime($info['newsdate']);
                            $newsdate =date('d-m-Y H:i',$saniye);
                            echo '
                                    <div class="col-sm-6 col-12">
                                        <div class="img-overlay-70 img-scale-animate mb-4">
                                            <div class="mask-content-sm">
                                                <div class="topic-box-sm color-cod-gray mb-10">'."$info[cat]".'</div>
                                                <h3 class="title-medium-light">
                                                    <a href="single-news.php?id='.$info['id'].'">'."$info[title]".'</a>
                                                </h3>
                                            </div>
                                            <img style="height:211px;" src="'."$info[foto]".'" alt="news" class="img-fluid width-100">
                                        </div>
                                    </div>
                                    ';}
                                    ?>
                                </div>
                            </div>
                            </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </section>
            <!-- News Slider Area End Here -->
            <!-- Popular News Area Start Here -->
            <section class="container">
                <div class="bg-body box-layout">
                    <div class="section-space-bottom-less30">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                    
                          
                                <div class="row">
                                    <div class="col-12">
                                        <div class="topic-border color-apple mb-30 width-100">
                                            <div class="topic-box-lg color-apple">Yeni xəbərlər</div>
                                        </div>
                                    </div>
                                    <?php
                                    if ($axtarmaq) {
                                        $axtar = "WHERE ".$axtar;
                                    }
                                    $sec = mysqli_query($con,"SELECT * FROM news ".$axtar." ORDER BY newsdate DESC LIMIT 5,18");
                                    while($info = mysqli_fetch_array($sec))
                                    {
                                    $saniye= strtotime($info['newsdate']);
                                    $newsdate =date('d-m-Y H:i',$saniye);
                                    echo '
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="img-overlay-70 img-scale-animate mb-30">
                                            <div class="mask-content-xs">
                                                <div class="post-date-light d-none d-sm-block">
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
                                                <h3 class="title-medium-light">
                                                    <a href="single-news.php?id='.$info['id'].'">'."$info[title]".'</a>
                                                </h3>
                                            </div>
                                            <img style="height:219px;" src="'."$info[foto]".'" alt="news" class="img-fluid width-100">
                                            <div class="topic-box-top-sm">
                                                <div class="topic-box-sm color-cod-gray mb-20">'."$info[cat]".'</div>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                                    }
                                    ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- Popular News Area End Here -->
           
            
            <?php include"footer.php"  ?>
            
        </div>
        
