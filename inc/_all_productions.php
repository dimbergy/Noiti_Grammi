<?php $i = 0;

    foreach ($contents as $content):

?>

<section id="parallax-<?= $productions[$i]['id'] ?>" class="home-section parallax text-light text-center fixed-attachment" data-stellar-background-ratio="0.5">

    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12 text-left title-section">
                <h3><span class="noitigrammi"><?= $productions[$i]['dates'] ?></span></h3>
                <h2 class="big-heading wow bounceInDown" data-wow-delay="0.2s"><?= $content['title_lower'] ?></h2>
                <h5 class="wow bounceInDown"><?= $productions[$i]['subtitle'] ?></h5>
            </div>


            <div class="social-widget text-right">


                <ul class="team-social">
                    <li class="social-facebook"><a href="<?= $productions[$i]['fb'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li class="social-skype"><a href="callto:pozelaki"><i class="fa fa-skype"></i></a></li>
                    <li class="social-linkedin"><a href="https://gr.linkedin.com/in/olga-pozeli-08a40414" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <li class="social-mail"><a href="mailto:olga.pozeli.com"><i class="fa fa-envelope"></i></a></li>
                </ul>


            </div>
        </div>
    </div>
</section>

<section id="<?= $productions[$i]['id'] ?>" class="productions-section">


    <div class="container">

        <div class="row">

        <div class="col-xs-12 col-sm-4 col-md-4">

            <div class="marginbot-40 ahover">
                <p class="margintop-20 marginbot-20"><i class="fa fa-hashtag pull-left fa-lg"></i>&nbsp;</p>

               <?= $content['staff'] ?>
            </div>




<!--            <table class="home-icon">-->
<!--                <tr><td><i class="fa fa-home fa-fw pull-left fa-2x"></i></td></tr>-->
<!--            </table>-->
<!--            <div class="row" id="location">-->
<!--                <div class="col-sm-6 col-md-12">-->
<!--                    <div class="venue">-->
<!--                        <a href="http://www.fournos-culture.gr/" target="_blank"><h2><i class="fa fa-link fa-fw pull-left fa-2x"></i>ΘΕΑΤΡΟ ΦΟΥΡΝΟΣ</h2></a>-->
<!--                        <div class="data">-->
<!--                            <div class="inside">-->
<!--                                <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>Μαυρομιχάλη 168, Αθήνα</p>-->
<!--                                <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+30 210 6460748</p>-->
<!--                                <p><i class="fa fa-calendar fa-fw pull-left fa-2x"></i>Σάββατο, Κυριακή</p>-->
<!--                                <p><i class="fa fa-clock-o fa-fw pull-left fa-2x"></i>21:15</p>-->
<!--                                <p><i class="fa fa-ticket fa-fw pull-left fa-2x"></i>12€ (γενική είσοδος), 10€ (γκρουπ 6 ατόμων), 5€ (άνεργοι & ατέλειες)</p>  </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>    </div>-->
<!---->
<!--            </div>-->
<!---->
<!---->
<!---->

        </div>



        <div class="col-xs-12 col-sm-8 col-md-8">


            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#outline-<?= $i ?>"><i class="fa fa-bookmark-o pull-left fa-lg"></i><span><?= $tran['outline'] ?></span></a></li>

                <?php if($contents[$i]['venue'][0]['name'] != ""): ?>
                <li><a data-toggle="tab" href="#venue-<?= $i ?>"><i class="fa fa-calendar-check-o pull-left fa-lg"></i><span><?= $tran['venues'] ?></span></a></li>
                <?php endif; ?>

                <?php if($content['reference'] != ''): ?>
                <li><a data-toggle="tab" href="#references-<?= $i ?>"><i class="fa fa-newspaper-o pull-left fa-lg"></i><span><?= $tran['reference'] ?></span></a></li>
                <?php endif; ?>

                <li><a data-toggle="tab" href="#gallery-<?= $i ?>"><i class="fa fa-image pull-left fa-lg"></i><span><?= $tran['gallery'] ?></span></a></li>

                <?php if($productions[$i]['video'][0] != ''): ?>
                <li><a data-toggle="tab" href="#videos-<?= $i ?>"><i class="fa fa-video-camera pull-left fa-lg"></i><span><?= $tran['videos'] ?></span></a></li>
                <?php endif; ?>
            </ul>

            <div class="tab-content">
                <div id="outline-<?= $i ?>" class="tab-pane fade in active">

                    <?= $content['blockquote'] ?>

                    <div class="marginind marginbot-30 paddingtop-20">
                    <?= $content['description'] ?>

                    </div>



                </div>


                <div id="venue-<?= $i ?>" class="tab-pane fade">


                    <?php foreach ($contents[$i]['venue'] as $venue):

                        if($venue['name'] != ""): ?>



                        <div class="table-responsive">
                            <table class="venue table">
                                <thead>
                                <tr>
                                    <th><?= $venue['name'] ?></th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php if($venue['place'] != ""): ?>

                                <tr>
                                    <td><?= $venue['place'] ?></td>
                                </tr>

                                <?php endif; if($venue['tel'] != ""): ?>

                                <tr>
                                    <td><?= $venue['tel'] ?></td>

                                </tr>

                                <?php endif; if($venue['date'] != ""): ?>

                                <tr>
                                    <td><?= $venue['date'] ?></td>

                                </tr>

                                <?php endif; if ($venue['tickets'] != ""): ?>

                                <tr>
                                    <td><?= $venue['tickets'] ?></td>
                                </tr>

                                <?php endif; ?>

                                </tbody>
                            </table>

                        </div>


                   <?php  endif; endforeach; ?>



                </div>

                <?php if($content['reference'] != ''): ?>

                <div id="references-<?= $i ?>" class="tab-pane fade">

                    <div class="smallind"><?= $content['reference'] ?></div>

                </div>
                <?php endif; ?>


                <div id="gallery-<?= $i ?>" class="tab-pane fade">

                    <div class="row">

                        <div class="col-md-3 marginbot-30">
                            <a class="lightbox-gallery" data-lightbox-gallery="gallery-<?= $productions[$i]['id'] ?>" href="<?= $productions[$i]['href'] ?>" title="<?= $content['title_lower'] ?>">
                                <img src="<?= $productions[$i]['src'] ?>" alt="<?= $productions[$i]['id'] ?>" class="img-responsive"></a>
                        </div>

                        <?php foreach (array_combine($productions[$i]['thumbs'], $productions[$i]['full']) as $thumb => $src): ?>

                        <div class="col-md-3 marginbot-30">
                    <a class="lightbox-gallery" data-lightbox-gallery="gallery-<?= $productions[$i]['id'] ?>" href="<?= $src ?>" title="<?= $content['title_lower'] ?>">
                        <img src="<?= $thumb ?>" alt="<?= $productions[$i]['id'] ?>" class="img-responsive"></a>
                        </div>

                        <?php endforeach; ?>
                    </div>

                    <div class="row">

                        <p class="copyright text-right"><?= $content['copyright_img'] ?></p>

                    </div>


                </div>


                <?php if($productions[$i]['video'][0] != ''): ?>

                <div id="videos-<?= $i ?>" class="tab-pane fade">

                    <?php foreach ($productions[$i]['video'] as $video): ?>

                        <div class="responsive-video marginbot-20">
                            <iframe src="<?= $video ?>" allowfullscreen></iframe>
                        </div>

                        <p class="copyright text-right marginbot-40"><?= $content['copyright_video'] ?></p>


                    <?php endforeach; ?>


                </div>
            <?php endif; ?>

                </div>


        </div>

        </div>


    </div>



</section>


<footer class="<?= $productions[$i]['id'] ?>-foot">

    <div class="social-widget">


        <ul class="team-social">
            <li class="social-facebook"><a href="<?= $productions[$i]['fb'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li class="social-skype"><a href="callto:pozelaki"><i class="fa fa-skype"></i></a></li>
            <li class="social-linkedin"><a href="https://gr.linkedin.com/in/olga-pozeli-08a40414" target="_blank"><i class="fa fa-linkedin"></i></a></li>
            <li class="social-mail"><a href="mailto:olga.pozeli.com"><i class="fa fa-envelope"></i></a></li>
        </ul>

    </div>

</footer>

<?php $i++; endforeach; ?>


<section id="parallax2" class="home-section parallax text-light text-center fixed-attachment" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="testimonialslide clearfix flexslider">
                    <ul class="slides">
                        <li>
                            <blockquote style="color: transparent"><?= $tran['parallax_3'] ?></blockquote>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
