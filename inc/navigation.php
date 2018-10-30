<?php

$uri = $_SERVER['REQUEST_URI'];

if (strpos($uri, '/en/') == true) {
    $gr = str_replace('/en', '', $uri);
    $en = $uri;

} else {
//    $gr = $uri;
    $gr = str_replace('/en', '', $uri);
    $request_uri_arr = explode('/', substr($uri, 0));
    $en = '/' . $request_uri_arr[0] . 'en/' . $request_uri_arr[1];
//    $en = '/en/' . $request_uri_arr[0];
    $counter = 0;
    if (is_array($request_uri_arr) && count($request_uri_arr) > 0) {
        foreach ($request_uri_arr as $k => $v) {
            if ($counter > 1) {
                $en .= '/' . $v;
            }
            $counter++;
        }
    }
}

$path = parse_url($uri, PHP_URL_PATH);
$replace = str_replace('en/', '', $path);
$components = explode('/', $replace);
$active = $components[1];

if($active == '') {
    $project = 'projects';
    $index = '';
} else {

    $project ='';
    $index ='/';
}


$split = explode('#', $_COOKIE['anchor']);
$test = $split[1];

?>


<!-- NAVIGATION -->

    <div id="navigation">
        <nav class="navbar navbar-custom" role="navigation">
                              <div class="container">
                                    <div class="row">
                                          <div class="col-md-2 col-sm-1 mob-logo">
                                                <div class="row">
                                                      <div class="site-logo">
                                                            <a href="/"><img src="<?= $gen['logo'] ?>" alt="noiti-logo" width="40"/></a>
                                                      </div>
                                                </div>
                                          </div>


                                          <div class="col-md-10 col-sm-11 mob-menu">
                                                <div class="row">
                                                      <!-- Brand and toggle get grouped for better mobile display -->
                                          <div class="navbar-header">
                                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                                                <i class="fa fa-bars fa-lg"></i>
                                                </button>
                                          </div>
                                                      <!-- Collect the nav links, forms, and other content for toggling -->
                                                      <div class="collapse navbar-collapse" id="menu">
                                                            <ul class="nav navbar-nav navbar-right">
                                                                  <li class="active"><a href="/" ><?= $tran['home'] ?></a></li>
                                                                 <li class="dropdown nav-toggle">
                                                                        <a href="<?= $index ?>#works" class="dropdown-toggle" data-toggle="dropdown"><?= $tran['productions'] ?><b class="caret"></b></a>

                                                                     <ul class="dropdown-menu dropdown-menu-left">
                                                                         <?php foreach ($contents as $content): ?>
                                                                          <li><a href="<?= $project ?>#<?= $content['permalink'] ?>"><?= $content['title_upper'] ?></a></li>
                                                                         <?php endforeach; ?>
                                                                     </ul>

                                                                  </li>
                                                                  <li><a href="<?= $index ?>#about"><?= $tran['team'] ?></a></li>

								                                <li><a href="<?= $index ?>#service"><?= $tran['links'] ?></a></li>

                                                                <li><a href="<?= $index ?>#contact"><?= $tran['contact'] ?></a></li>


                                                                <li id="lang" class="btn-group">

                                                                    <?php if($lang == 'el'): ?>

                                    <a href="<?= $en ?>"><span class="lang-sm" lang="en"></span></a>

                                                                    <?php else: ?>

                                    <a href="<?= $gr ?>"><span class="lang-sm" lang="el"></span></a>

                                                                    <?php endif; ?>

                                                                </li>

                                                            </ul>
                                                      </div>
                                                      <!-- /.Navbar-collapse -->
                                                </div>
                                          </div>



                                        </div>
                              </div>
                              <!-- /.container -->
                        </nav>
    </div>

    <!-- /NAVIGATION -->

