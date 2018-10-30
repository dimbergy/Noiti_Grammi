<!--  <section id="parallax-exlibris" class="home-section parallax text-light text-center">-->
<section id="current-production" class="home-section parallax text-light text-center">


    <div class="full-width-div">
        <div class="row">


            <div class="text-left col-sm-6 col-md-5 col-lg-4 col-xl-3 highlight-dark">
                <p class="wow bounceInDown" data-wow-delay="0.5s"><?= $tran['coming_soon'] ?>
                <ul class="nav navbar-nav navbar-right wow bounceInUp" data-wow-delay="0.5s">
                <li>

             <a href="<?= $project ?>#<?= $contents[1]['permalink'] ?>" role="button" class="btn btn-info btn-readmore"><?= $tran['read_more'] ?></a>
          </li>
                </ul>
                </p>


            </div>


        </div>
    </div>

</section>

<div class="modal fade" id="coming_soon" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-body" style="padding:0;">
                <button type="button" class="close" data-dismiss="modal" style="position: absolute; right: 15px; top: 10px; opacity:1; color:white; font-size:22px">&times;</button>
                <a href="projects#parallax-karaoke"><img src="<?= $tran['coming_soon_modal'] ?>" alt="karaoke-night" style="width: 100%; border-radius: 6px"></a>
            </div>
        </div>

    </div>
</div>