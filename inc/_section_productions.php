<!-- SECTION PRODUCTIONS -->

            <section id="works" class="home-section color-dark text-center bg-white">
                <div class="container marginbot-50">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
                                <div class="section-heading text-center">
                                    <h2 class="service-title pad-bt15"><?= $tran['prod_tit']?></h2>
                                    <div class="divider-header"></div>
                                    <?= $tran['prod_desc']?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


<!--            Productions Masonry-->

                <div class="text-center">
                    <div class="container marginbot-50">
                        <div class="row row-offcanvas row-offcanvas-left">


                            <div class="col-xs-12 col-sm-12 col-md-12 content-column">

                                <div class="grid">
                                    <div class="row">


                                        <?php

                                        $i=0;

                                        foreach ($contents as $content): ?>

                                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 masonry-item">
                                            <div class="box-masonry"><a href="projects#<?= $content['permalink'] ?>" title="<?= $content['title_lower'] ?>" class="box-masonry-image with-hover-overlay with-hover-icon"><img src="<?= $productions[$i]['masonry_img'] ?>" alt="<?= $content['title_lower'] ?>" class="img-responsive"></a>
                                                <div class="box-masonry-hover-text-header">
                                                    <h5><?= $productions[$i]['dates'] ?></h5>
                                                    <h4> <a href="projects#<?= $content['permalink'] ?>"><?= $content['title_upper'] ?></a></h4>

                                                </div>
                                            </div>
                                        </div>


                                        <?php $i++;

                                        endforeach; ?>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!--/Productions Masonry-->


<!--                Productions Gallery-->

                <div id="gallery" class="container">
                    <div class="row">

                        <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
                            <h4 class="sub-title"><?= $tran['prod_sub']?></h4>
                            <div class="divider-header"></div>
                        </div></div></div>

                <div class="container">


                    <div class="row">



                        <?php $i=0;

                            foreach ($productions as $production):
                        ?>

                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3" >

                            <div id="owl-<?= $production['id'] ?>" class="owl-carousel">
                                <div class="item">
                                    <img src="<?= $production['src'] ?>" class="img-responsive" alt="<?= $production['id'] ?>-<?= $i ?>">
                                    <a href="<?= $production['href'] ?>" title="<?= $contents[$i]['title_lower'] ?>" data-lightbox-gallery="gallery-<?= $production['id'] ?>" class="lightbox-gallery">
                                        <div class="cap1"><p><?= $contents[$i]['title_lower'] ?></p>
                                            <p><i class="fa fa-camera fa-fw"></i></p>
                                        </div>

                                        <div class="cap2"><p class="text-center"><?= $production['dates'] ?></p></div>
                                    </a>

                                </div>


                                <?php foreach ($production['full'] as $img): if($img != ''): ?>

                                <div class="item">
                                    <a href="<?= $img ?>" title="<?= $contents[$i]['title_lower'] ?>" data-lightbox-gallery="gallery-<?= $production['id'] ?>"></a>
                                </div>

                                <?php endif; endforeach; ?>

                            </div>
                        </div>

                        <?php $i++;

                        endforeach; ?>



                    </div>
                </div>

                <!--                /Productions Gallery-->


</section>

<!-- /SECTION PRODUCTIONS -->


<section id="parallax3" class="home-section parallax text-light text-center fixed-attachment" data-stellar-background-ratio="0.5">
    <div class="container marginbot-50">
        <div class="row">
            <div class="col-md-12">
                <div class="testimonialslide clearfix flexslider">
                    <ul class="slides">
                        <li>
                            <blockquote><?= $tran['parallax_1'] ?></blockquote>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>