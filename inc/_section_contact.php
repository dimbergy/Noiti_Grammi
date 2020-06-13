<!-- Section: contact -->
<section id="<?= $contactSection[0]['html_id'] ?>" class="home-section nopadd-bot color-dark bg-white text-center">
    <div class="container marginbot-50">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
                    <div class="section-heading text-center">
                        <h2><?= $contactSection[0]['title'] ?></h2>
                        <div class="divider-header"></div>
                        <p><?= $contactSection[0]['subtitle'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row marginbot-80">

            <div class="col-md-4 col-sm-5">
                <div class="loction-info white">
                    <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i><?= $tran['address'] ?></p>
                    <p><a href="mailto:olga.pozeli@gmail.com"><i class="fa fa-envelope fa-fw pull-left fa-2x"></i><span>olga.pozeli@gmail.com</span></a></p>
<!--                    <p><a href="tel:"><i class="fa fa-phone fa-fw pull-left fa-2x"></i></a></p>-->
                    <p><a href="tel:00306936456846"><i class="fa fa-mobile-phone fa-fw pull-left fa-2x"></i>+30 693 6456846</a></p>
                </div>
            </div>
            <div class="col-md-8 col-sm-7 col-xs-16">
                <div class="contact-form">
                    <div id="sendmessage"><?= $tran['success'] ?></div>
                    <div id="errormessage"><?= $tran['fail'] ?></div>
                    <form id="contactForm" action="contactform.php#contact" method="post" class="contactForm">
                        <div class="col-md-6 padding-right-zero">
                            <div class="form-group">
                                <input type="text" name="fname" class="form-control" id="fname" placeholder="<?= $tran['fname_ph'] ?>" minlength="3" maxlength="100" data-empty="<?= $tran['error_empty'] ?>" data-min="<?= $tran['error_min'] ?>" data-max="<?= $tran['error_max'] ?>" required/>
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="lname" class="form-control" id="lname" placeholder="<?= $tran['lname_ph'] ?>" minlength="3" maxlength="100" data-empty="<?= $tran['error_empty'] ?>" data-min="<?= $tran['error_min'] ?>" data-max="<?= $tran['error_max'] ?>" required/>
                                <div class="validation"></div>
                            </div>
                        </div>

                        <?php if($lang == 'el'): ?>
                        <div class="col-md-12">
                            <?php else: ?>
                            <div class="col-md-6">
                                <?php endif; ?>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" maxlength="100" data-empty="<?= $tran['error_empty'] ?>"  data-email="<?= $tran['error_email'] ?>" data-max="<?= $tran['error_max'] ?>" required/>
                                    <div class="validation"></div>
                                </div>
                            </div>


                            <?php if($lang == 'el'): ?>
                                <div class="col-md-12" style="display:none">
                                    <div class="form-group">
                                        <select class='custom-select' name='country' id='country' style='width: 100%;'><option selected>Greece</option></select>
                                    </div>
                                </div>

                            <?php else: ?>

                                <div class='col-md-6'>
                                    <div class='form-group text-left'>
                                        <select class='custom-select form-control' name='country' id='country' style='width: 100%;' data-empty="<?= $tran['error_empty'] ?>" required>
                                            <option value='' selected disabled="disabled">Country</option>

                                            <?php foreach ($countries as $country): ?>
                                                <option value="<?= $country['name'] ?>"><?= $country['name'] ?></option>
                                            <?php  endforeach; ?>

                                        </select>
                                        <div class='validation val-country'></div></div></div>


                            <?php endif; ?>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5" data-empty="<?= $tran['error_empty'] ?>" placeholder="<?= $tran['message_ph'] ?>" required></textarea>
                                    <div class="validation"></div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-submit"><?= $tran['submit'] ?></button>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<div id="map-btn1-div">
    <a id="map-btn1" class="gmap-btn close-map-button btn-show" href="#map">
        &nbsp;
    </a>
</div>