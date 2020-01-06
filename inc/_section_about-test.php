
<!-- ABOUT SECTION -->

<section id="<?= $aboutSection[0]['html_id'] ?>" class="home-section color-dark bg-white page-alternate">
    <div class="container marginbot-50">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
                    <div class="section-heading text-center"><br /><br />
                        <h2><?= $aboutSection[0]['title'] ?></h2>
                        <div class="divider-header"></div>
                        <?= $aboutSection[0]['subtitle'] ?>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <div class="container">

        <div class="row">

            <!-- History -->

            <div class="col-xs-12 col-sm-7 col-md-7">
                <div class="marginbot-40">

                    <?= $aboutSubsections[0]['subpost_content'] ?>

                    <div id="owl-history1" class="owl-carousel">
                        <div class="item">
                            <a class="lightbox-gallery" href="<?= $aboutSubsections[0]['src'] ?>" title="<?= $aboutSubsections[0]['media_title'] ?>" data-lightbox-gallery="gallery-history"><img src="<?= $aboutSubsections[0]['src'] ?>" class="img-responsive" alt="History"></a></div>

                    </div>
                </div>
                <h3 class="profile-name"><?= $aboutSubsections[1]['subpost_title'] ?></h3>

                <?= $aboutSubsections[1]['subpost_content'] ?>

                <div id="owl-history2" class="owl-carousel">
                    <div class="item">
                        <a class="lightbox-gallery" href="<?= $aboutSubsections[1]['src'] ?>" title="<?= $tran['sets'] ?>" data-lightbox-gallery="gallery-history"><img src="<?= $aboutSubsections[1]['src'] ?>" class="img-responsive" alt="History"></a></div>

                </div>



            </div>

            <!-- /History -->


            <!-- Team -->


            <div class="col-xs-12 col-sm-5 col-md-5 marginbot-20">
                <div class="image-wrap">
                    <div class="hover-wrap">
                        <span class="overlay-img"></span>
                        <div class="overlay-text-thumb"><?= $aboutSubsections[2]['media_title'] ?>

                    <div class="social-icons">
								<ul class="team-social">
                                    <?php if(!empty($aboutSubsections[2]['facebook'])): ?>
									<li class="social-facebook"><a href="<?= $aboutSubsections[2]['facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <?php endif; if(!empty($aboutSubsections[2]['skype'])): ?>
									<li class="social-skype"><a href="<?= $aboutSubsections[2]['skype'] ?>"><i class="fa fa-skype"></i></a></li>
                                    <?php endif; if(!empty($aboutSubsections[2]['linkedin'])): ?>
                                    <li class="social-linkedin"><a href="<?= $aboutSubsections[2]['linkedin'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                    <?php endif; if(!empty($aboutSubsections[2]['mail'])): ?>
									<li class="social-mail"><a href="<?= $aboutSubsections[2]['mail'] ?>"><i class="fa fa-envelope"></i></a></li>
                                    <?php endif; ?>
								</ul>
                          </div></div>
                    </div>
                    <img src="<?= $aboutSubsections[2]['src'] ?>" alt="<?= $aboutSubsections[2]['subpost_title'] ?>">
                </div>
                <h3 class="profile-name"><?= $aboutSubsections[2]['subpost_title'] ?></h3>

                <?= $aboutSubsections[2]['subpost_content'] ?>

                <?php if(!empty($aboutRefs)): ?>

                <div class="reference"><h5><?= $tran['references'] ?></h5>

                    <p>
                    <?php foreach ($aboutRefs as $aboutRef): ?>
                        <a href="<?= $aboutRef['ref_url'] ?>" target="_blank"> <?= $aboutRef['ref_title'] ?></a><br />
                    <?php endforeach; ?>
                    </p>

                </div>

                <?php endif; ?>

            </div>


            <div class="col-xs-12 col-sm-5 col-md-5">
                <div class="image-wrap">
                    <div class="hover-wrap">
                        <span class="overlay-img"></span>
                        <div class="overlay-text-thumb"><?= $aboutSubsections[3]['media_title'] ?>

                     <div class="social-icons">
								<ul class="team-social">
                                    <?php if(!empty($aboutSubsections[3]['facebook'])): ?>
                                        <li class="social-facebook"><a href="<?= $aboutSubsections[3]['facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <?php endif; if(!empty($aboutSubsections[3]['skype'])): ?>
                                        <li class="social-skype"><a href="<?= $aboutSubsections[3]['skype'] ?>"><i class="fa fa-skype"></i></a></li>
                                    <?php endif; if(!empty($aboutSubsections[3]['linkedin'])): ?>
                                        <li class="social-linkedin"><a href="<?= $aboutSubsections[3]['linkedin'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                    <?php endif; if(!empty($aboutSubsections[3]['mail'])): ?>
                                        <li class="social-mail"><a href="<?= $aboutSubsections[3]['mail'] ?>"><i class="fa fa-envelope"></i></a></li>
                                    <?php endif; ?>
								</ul>
                          </div>

                    </div>
                    </div>
                    <img src="<?= $aboutSubsections[3]['src'] ?>" alt="<?= $aboutSubsections[3]['subpost_title'] ?>">
                </div>
                <h3 class="profile-name"><?= $aboutSubsections[3]['subpost_title'] ?></h3>

                <?= $aboutSubsections[3]['subpost_content'] ?>

            </div>

            <!-- /Team -->

        </div>

    </div>


</section>
<!-- End About Section -->


<section id="parallax1" class="home-section parallax text-light text-center fixed-attachment" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="testimonialslide clearfix flexslider">
                    <ul class="slides">
                        <li>
                            <blockquote><?= $parallaxSections[1]['body'] ?></blockquote>

                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>