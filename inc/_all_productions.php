<?php

foreach ($projects as $project):

    $projectID = $project['id'];
    $thumbs = $media->getProductionsPhotos($projectID, 3);
    $images = $media->getProductionsPhotos($projectID, 4);
    $videos = $media->getProductionsVideos($projectID);
    $intros = $media->getProductionsParallax($projectID);
    $prodRefs = $references->getProductionsReferences($projectID, $langID);
    $events = $venues->getVenues($langID, $projectID);
    $photoCrights = $copyrights->getCopyrights($langID, $projectID, 1);
    $videoCrights = $copyrights->getCopyrights($langID, $projectID, 2);
    $pxsections = $parallax->getParallax($langID);

    ?>

    <section id="parallax-<?= $project['html_id'] ?>" class="home-section parallax text-light text-center fixed-attachment" data-stellar-background-ratio="0.5">

        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12 text-left title-section">
                    <h3><span class="date-heading"><?= $project['date'] ?></span></h3>
                    <h2 class="big-heading wow bounceInDown" data-wow-delay="0.2s"><?= $project['title'] ?></h2>
                    <h5 class="sub-heading wow bounceInDown"><?= $project['subtitle'] ?></h5>
                </div>


                <div class="social-widget text-right">


                    <ul class="team-social">
                        <li class="social-facebook"><a href="<?= $project['fb_link'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="social-skype"><a href="callto:pozelaki"><i class="fa fa-skype"></i></a></li>
                        <li class="social-linkedin"><a href="https://gr.linkedin.com/in/olga-pozeli-08a40414" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        <li class="social-mail"><a href="mailto:olga.pozeli.com"><i class="fa fa-envelope"></i></a></li>
                    </ul>


                </div>
            </div>
        </div>
    </section>

    <section id="<?= $project['html_id'] ?>" class="productions-section">


        <div class="container">

            <div class="row main-row">

                <div class="col-xs-12 col-sm-4 col-md-4">

                    <div class="marginbot-40 ahover">
                        <p class="margintop-20 marginbot-20"><i class="fa fa-hashtag pull-left fa-lg"></i>&nbsp;</p>

                        <?= $project['staff'] ?>
                    </div>


                </div>



                <div class="col-xs-12 col-sm-8 col-md-8">


                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" class="tab-item" href="#outline-<?= $project['id'] ?>"><i class="fa fa-bookmark-o pull-left fa-lg"></i><span><?= $tran['outline'] ?></span></a></li>

                        <?php if(!empty($events)): ?>
                            <li><a data-toggle="tab" class="tab-item" href="#venue-<?= $project['id'] ?>"><i class="fa fa-calendar-check-o pull-left fa-lg"></i><span><?= $tran['venues'] ?></span></a></li>
                        <?php endif; ?>

                        <?php if(!empty($prodRefs)): ?>
                            <li><a data-toggle="tab" class="tab-item" href="#references-<?= $project['id'] ?>"><i class="fa fa-newspaper-o pull-left fa-lg"></i><span><?= $tran['reference'] ?></span></a></li>
                        <?php endif; ?>

                        <li><a data-toggle="tab" class="tab-item" href="#gallery-<?= $project['id'] ?>"><i class="fa fa-image pull-left fa-lg"></i><span><?= $tran['gallery'] ?></span></a></li>

                        <?php if(!empty($videos)) : ?>
                            <li><a data-toggle="tab" class="tab-item" href="#videos-<?= $project['id'] ?>"><i class="fa fa-video-camera pull-left fa-lg"></i><span><?= $tran['videos'] ?></span></a></li>
                        <?php endif; ?>
                    </ul>

                    <div class="tab-content">
                        <div id="outline-<?= $project['id'] ?>" class="tab-pane fade in active">

                            <?= $project['blockquote'] ?>

                            <div class="marginind marginbot-30 paddingtop-20">
                                <?= $project['description'] ?>

                            </div>



                        </div>


                        <div id="venue-<?= $project['id'] ?>" class="tab-pane fade">


                            <?php foreach ($events as $event): ?>



                                <div class="table-responsive">
                                    <table class="venue table">
                                        <?php if(!empty($event['venue_name'])): ?>
                                            <thead>
                                            <tr>
                                                <th>
                                                    <?php if(!empty($event['venue_url'])): ?>
                                                    <a href="<?= $event['venue_url'] ?>" class="venue-link" target="_blank">
                                                        <?php endif;

                                                        echo $event['venue_name'];

                                                        if(!empty($event['venue_url'])): ?>
                                                    </a>
                                                <?php endif; ?>
                                                </th>
                                            </tr>
                                            </thead>
                                        <?php endif; ?>

                                        <tbody>

                                        <?php if(!empty($event['venue_location'])): ?>

                                            <tr>
                                                <td>
                                                    <?php if(!empty($event['location_url'])): ?>
                                                    <a href="<?= $event['location_url'] ?>" class="venue-link" target="_blank">
                                                        <?php endif;
                                                        echo $event['venue_location'];
                                                        if(!empty($event['location_url'])): ?>
                                                    </a>
                                                <?php endif; ?>

                                                </td>
                                            </tr>

                                        <?php endif; if(!empty($event['tel_number'])): ?>

                                            <tr>
                                                <td><a class="venue-link" href="tel:<?= $event['tel_link'] ?>"><?= $event['tel_number'] ?></a></td>

                                            </tr>

                                        <?php endif; if(!empty($event['event_date'])): ?>

                                            <tr>
                                                <td><?= $event['event_date'] ?></td>

                                            </tr>

                                        <?php endif; if(!empty($event['tickets'])): ?>

                                            <tr>
                                                <td><?= $event['tickets'] ?></td>
                                            </tr>

                                        <?php endif; ?>

                                        </tbody>
                                    </table>

                                </div>


                            <?php  endforeach; ?>



                        </div>

                        <?php if(!empty($prodRefs)): ?>

                            <div id="references-<?= $project['id'] ?>" class="tab-pane fade">

                                <div class="smallind">

                                    <?php foreach ($prodRefs as $prodRef): ?>

                                        <p><a href="<?= $prodRef['ref_url'] ?>" target="_blank"><?= $prodRef['ref_title'] ?></a></p>

                                    <?php endforeach; ?>

                                </div>

                            </div>
                        <?php endif; ?>


                        <div id="gallery-<?= $project['id'] ?>" class="tab-pane fade">

                            <div class="row">

                                <?php foreach ($images as $index => $image): ?>
                                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 marginbot-30">
                                        <a class="lightbox-gallery" data-lightbox-gallery="gallery-<?= $project['id'] ?>" href="<?= $image['src'] ?>" title="<?= $project['title'] ?>">
                                            <img src="<?= $thumbs[$index]['src'] ?>" alt="<?= $project['html_id'] ?>" class="img-responsive"></a>
                                    </div>
                                <?php endforeach; ?>

                            </div>

                            <div class="row">


                                <?php if(!empty($photoCrights)): ?>
                                    <p class="copyright text-right">
                                        <?php foreach ($photoCrights as $photoCright): ?>
                                            © <?= $photoCright['name'] ?>
                                        <?php endforeach; ?>
                                    </p>
                                <?php endif; ?>


                            </div>


                        </div>


                        <?php if(!empty($videos)): ?>

                            <div id="videos-<?= $project['id'] ?>" class="tab-pane fade">

                                <?php foreach ($videos as $video): ?>

                                    <div class="responsive-video marginbot-20">
                                        <iframe src="<?= $video['src'] ?>" allowfullscreen></iframe>
                                    </div>

                                    <?php if(!empty($videoCrights)): ?>
                                        <p class="copyright text-right marginbot-40">
                                            <?php foreach ($videoCrights as $videoCright): ?>
                                                © <?= $videoCright['name'] ?>
                                            <?php endforeach; ?>
                                        </p>
                                    <?php endif; ?>

                                <?php endforeach; ?>


                            </div>
                        <?php endif; ?>

                    </div>


                </div>

            </div>


        </div>



    </section>


    <footer class="<?= $project['html_id'] ?>-foot">

        <div class="social-widget">


            <ul class="team-social">
                <li class="social-facebook"><a href="<?= $project['fb_link'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li class="social-skype"><a href="callto:pozelaki"><i class="fa fa-skype"></i></a></li>
                <li class="social-linkedin"><a href="https://gr.linkedin.com/in/olga-pozeli-08a40414" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <li class="social-mail"><a href="mailto:olga.pozeli.com"><i class="fa fa-envelope"></i></a></li>
            </ul>

        </div>

    </footer>

<?php endforeach; ?>


<section id="<?= $parallaxCss[3]['html_id'] ?>" class="home-section parallax text-light text-center fixed-attachment" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="testimonialslide clearfix flexslider">
                    <ul class="slides">
                        <li>
                            <blockquote style="color: transparent"><?= $pxsections[2]['body'] ?></blockquote>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
