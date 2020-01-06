
<!--    LINKS SECTION-->

<section id="<?= $linksSection[0]['html_id'] ?>" class="home-section color-dark bg-white">
    <div class="container marginbot-50">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
                    <div class="section-heading text-center">
                        <h2><?= $linksSection[0]['title'] ?></h2>
                        <div class="divider-header"></div>
                        <p><?= $linksSection[0]['subtitle'] ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Links Masonry -->
    <div id="link-masonry" class="text-center parent">
        <div class="container marginbot-50">


            <div class="row row-offcanvas row-offcanvas-left">

                <div class="col-xs-12 col-sm-12 col-md-12 content-column">

                    <div class="grid masonry">
                        <div class="row">


                            <?php foreach ($ulinks as $ulink): ?>

                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 masonry-item filter institutions origin-<?= $ulink['link_origin'] ?>">
                                    <div class="box-masonry">
                                        <a href="<?= $ulink['link_url'] ?>" title="<?= $ulink['link_title'] ?>" target="_blank" class="box-masonry-image with-hover-overlay with-hover-icon">
                                            <img src="<?= $ulink['src'] ?>" alt="<?= $ulink['link_title'] ?>" class="img-responsive">
                                        </a>
                                        <div class="box-masonry-text">
                                            <h4> <a href="<?= $ulink['link_url'] ?>" target="_blank" lang="<?= $lang ?>"><?= $ulink['link_title'] ?></a></h4>

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

    <!-- /Links Masonry -->


</section>

<!--    /LINKS SECTION-->

<section id="<?= $parallaxCss[3]['html_id'] ?>" class="home-section parallax text-light text-center fixed-attachment" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="testimonialslide clearfix flexslider">
                    <ul class="slides">
                        <li>
                            <blockquote><?= $parallaxSections[2]['body'] ?></blockquote>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
