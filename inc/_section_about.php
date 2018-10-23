
<!-- ABOUT SECTION -->

<section id="about" class="home-section color-dark bg-white page-alternate">
    <div class="container marginbot-50">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
                    <div class="section-heading text-center"><br /><br />
                        <h2><?= $tran['about_tit'] ?></h2>
                        <div class="divider-header"></div>
                        <?= $tran['about_desc'] ?>
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

                    <?= $tran['about_noiti'] ?>

                    <div id="owl-history1" class="owl-carousel">
                        <div class="item">
                            <a class="lightbox-gallery" href="img/team/history_01.jpg" title="<?= $tran['rehearsal'] ?>" data-lightbox-gallery="gallery-history"><img src="img/team/history_01.jpg" class="img-responsive" alt="History"></a></div>

                    </div>
                </div>
                <h3 class="profile-name"><?= $tran['history_tit'] ?></h3>

                <?= $tran['history_desc'] ?>

                <div id="owl-history2" class="owl-carousel">
                    <div class="item">
                        <a class="lightbox-gallery" href="img/team/history_02.jpg" title="<?= $tran['sets'] ?>" data-lightbox-gallery="gallery-history"><img src="img/team/history_02.jpg" class="img-responsive" alt="History"></a></div>

                </div>



            </div>

            <!-- /History -->


            <!-- Team -->


            <div class="col-xs-12 col-sm-5 col-md-5 marginbot-20">
                <div class="image-wrap">
                    <div class="hover-wrap">
                        <span class="overlay-img"></span>
                        <div class="overlay-text-thumb"><?= $tran['pozeli_spec'] ?>

                    <div class="social-icons">
								<ul class="team-social">
									<li class="social-facebook"><a href="https://www.facebook.com/olga.pozeli?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<li class="social-skype"><a href="callto:pozelaki"><i class="fa fa-skype"></i></a></li>
                                    <li class="social-linkedin"><a href="https://gr.linkedin.com/in/olga-pozeli-08a40414" target="_blank"><i class="fa fa-linkedin"></i></a></li>
									<li class="social-mail"><a href="mailto:olga.pozelil@gmail.com"><i class="fa fa-envelope"></i></a></li>
								</ul>
                          </div></div>
                    </div>
                    <img src="img/team/pozeli.jpg" alt="Olga Pozeli">
                </div>
                <h3 class="profile-name"><?= $tran['pozeli'] ?></h3>

                <?= $tran['pozeli_bio'] ?>

                <?php if($tran['ref_1'] != "" ): ?>

                <div class="reference"><h5><?= $tran['references'] ?></h5>
                    <p><a href="#" onClick="window.open('img/team/pozeli_kathimerini.pdf','_blank','toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=800');return(false)"><?= $tran['ref_1'] ?></a><br />
                        <a href="#" onClick="window.open('img/team//pozeli_timeout.pdf','_blank','toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=800');return(false)"><?= $tran['ref_2'] ?></a><br />
                        <a href="#" onClick="window.open('img/team/pozeli_vima.pdf','_blank','toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=800');return(false)"><?= $tran['ref_3'] ?></a><br />
                        <a href="#" onClick="window.open('img/team/pozeli_ependytis.pdf','_blank','toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=800');return(false)"><?= $tran['ref_4'] ?></a></p>

                </div>

                <?php endif; ?>

            </div>


            <div class="col-xs-12 col-sm-5 col-md-5">
                <div class="image-wrap">
                    <div class="hover-wrap">
                        <span class="overlay-img"></span>
                        <div class="overlay-text-thumb"><?= $tran['davaris_spec'] ?>

                     <div class="social-icons">
								<ul class="team-social">
									<li class="social-facebook"><a href="https://www.facebook.com/kostis.davaris?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<li class="social-skype"><a href="#"><i class="fa fa-skype"></i></a></li>
									<li class="social-mail"><a href="mailto:davarisk@gmail.com"><i class="fa fa-envelope"></i></a></li>
								</ul>
                          </div>

                    </div>
                    </div>
                    <img src="img/team/davaris.jpg" alt="Kostis Davaris">
                </div>
                <h3 class="profile-name"><?= $tran['davaris'] ?></h3>

                <?= $tran['davaris_bio'] ?>

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
                            <blockquote><?= $tran['parallax_2'] ?></blockquote>

                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>