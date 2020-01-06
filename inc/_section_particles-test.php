
<!--    SECTION PARTICLES-->

<section id="<?= $introSection[0]['html_id'] ?>" class="home-video text-light">
    <div class="home-video-wrapper">

        <div class="homevideo-container" id="particle-canvas">

            <div class="overlay">

                <div class="text-center video-caption">
                    <div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.8s">
                        <a href="/" class="todown"><img src="<?= $introSection[0]['src'] ?>" width="380" alt="logo"></a>
                    </div>
                    <div class="wow bounceInUp" data-wow-offset="0" data-wow-delay="0.8s">
                        <div class="margintop-30">
                            <a href="#current-production" class="totop"><i class="fa fa-angle-down fa-2x"></i></a>
                        </div>
                    </div>
                </div>
            </div>


            <script type="text/javascript" src="js/particle-network.min.js"></script>
            <script type="text/javascript">
                var particleCanvas = new ParticleNetwork(canvasDiv, options);
            </script>

        </div>

    </div>
</section>

<!--    /SECTION PARTICLES-->