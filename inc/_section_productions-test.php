
<!-- SECTION PRODUCTIONS -->

            <section id="<?= $productionsSection[0]['html_id'] ?>" class="home-section color-dark text-center bg-white">
                <div class="container marginbot-50">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
                                <div class="section-heading text-center">
                                    <h2 class="service-title pad-bt15"><?= $productionsSection[0]['title'] ?></h2>
                                    <div class="divider-header"></div>
                                    <?= $productionsSection[0]['subtitle'] ?>
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


                                        <?php foreach ($projects as $index => $project): ?>

                                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 masonry-item">
                                            <div class="box-masonry"><a href="projects#<?= $project['permalink'] ?>" title="<?= $project['title'] ?>" class="box-masonry-image with-hover-overlay with-hover-icon"><img src="<?= $productionsMasonry[$index]['src'] ?>" alt="<?= $project['title'] ?>" class="img-responsive"></a>
                                                <div class="box-masonry-hover-text-header">
                                                    <h5><?= $project['date'] ?></h5>
                                                    <h4> <a href="projects#<?= $project['permalink'] ?>" lang="<?= $lang ?>"><?= $project['title'] ?></a></h4>

                                                </div>
                                            </div>
                                        </div>

                                        <?php endforeach; ?>


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
                            <h4 class="sub-title"><?= $productionsSubsections[0]['subpost_title'] ?></h4>
                            <div class="divider-header"></div>
                        </div></div></div>

                <div class="container">


                    <div class="row">



                        <?php

                        foreach ($projects as $project):

                            $projectID = $project['id'];
                            $thumbs = $media->getProductionsPhotos($projectID, 3);
                            $images = $media->getProductionsPhotos($projectID, 4);

                            ?>

                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3" >

                            <div id="owl-<?= $project['html_id'] ?>" class="owl-carousel">
                                <div class="item">
                                    <img src="<?= $thumbs[0]['src'] ?>" class="img-responsive" alt="<?= $project['html_id'] ?>-<?= $project['id'] ?>">
                                    <a href="<?= $images[0]['src'] ?>" title="<?= $project['title'] ?>" data-lightbox-gallery="gallery-<?= $project['html_id'] ?>" class="lightbox-gallery">
                                        <div class="cap1"><p><?= $project['title'] ?></p>
                                            <p><i class="fa fa-camera fa-fw"></i></p>
                                        </div>

                                        <div class="cap2"><p class="text-center"><?= $project['date'] ?></p></div>
                                    </a>

                                </div>


                                <?php foreach ($images as $image): if($image['src'] != $images[0]['src']): ?>

                                <div class="item">
                                    <a href="<?= $image['src'] ?>" title="<?= $project['title'] ?>" data-lightbox-gallery="gallery-<?= $project['html_id'] ?>"></a>
                                </div>

                                <?php endif; endforeach; ?>

                            </div>
                        </div>

                        <?php endforeach; ?>


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
                            <blockquote><?= $parallaxSections[0]['body'] ?></blockquote>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>