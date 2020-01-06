<?php

include ('database/meta.database.php');
include ('database/css.database.php');

$metaTags = $meta->getMeta($pageID, $langID);
$pagesCss = $css->getPagesCss();
$productionsCss = $css->getProductionsCss();
$parallaxCss = $css->getParallaxCss();
?>


<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="robots" content="all" />

    <?php foreach ($metaTags as $metaTag): ?>

    <title><?= $metaTag['title']; ?></title>

    <meta name="keywords" content="<?= $metaTag['keywords'] ?>" />
    <meta name="description" content="<?= $metaTag['description'] ?>" />
    <meta property="og:title" content="<?= $metaTag['og_title'] ?>" />
    <meta property="og:description" content="<?= $metaTag['og_description'] ?>" />
    <meta property="og:image" content="<?= $metaTag['og_image'] ?>" />

    <?php endforeach; ?>

    <meta name="author" content="Dimitrios Vergados | dimbergy@gmail.com" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=greek" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link href="/css/nivo-lightbox.css" rel="stylesheet" />
    <link href="/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
    <link href="/css/owl.carousel.css" rel="stylesheet" media="screen" />
    <link href="/css/owl.theme.css" rel="stylesheet" media="screen" />
    <link href="/css/animate.css" rel="stylesheet"/>
    <link href="/css/languages.min.css" rel="stylesheet" type="text/css">
<!--    <link rel="shortcut icon" href="/img/icons/noiti-favicon.png"/>-->
    <link rel="shortcut icon" href="/img/logos/noitigrammi_logo_small.jpg"/>
    <link rel="alternate" href="http://<?= $_SERVER['HTTP_HOST'] ?>" hreflang="<?= $lang ?>" />


    <style>


    <?php foreach ($pagesCss as $pageCss): if(!empty($pageCss['bg_color'])): ?>

    #<?= $pageCss['html_id'] ?> {
        background: <?= $pageCss['bg_color'] ?>;
    }

    <?php endif; endforeach; ?>

    <?php foreach ($parallaxCss as $pxCss): ?>

    #<?= $pxCss['html_id'] ?> {
        background-image: url("<?= $pxCss['src'] ?>");
    }

    #<?= $pxCss['html_id'] ?> blockquote {
        color: <?= $pxCss['blockquote_color'] ?>;
    }

    <?php endforeach; ?>

    <?php foreach ($productionsCss as $productionCss): ?>

    #<?= $productionCss['permalink'] ?> {
        background-image: url("<?= $productionCss['src'] ?>");
    }

    #<?= $productionCss['permalink'] ?> .date-heading {
        color: <?= $productionCss['date_color'] ?>;
    }

    #<?= $productionCss['permalink'] ?> .big-heading {
        color: <?= $productionCss['title_color'] ?>;
        text-shadow: 1px 1px <?= $productionCss['text_shadow'] ?>;
    }

    #<?= $productionCss['permalink'] ?> .sub-heading {
        color: <?= $productionCss['subtitle_color'] ?>;
        font-weight: 300;
    }

    #<?= $productionCss['html_id'] ?> {
        background: <?= $productionCss['bg_color'] ?>;
    }

    #<?= $productionCss['html_id'] ?> p {
        color: <?= $productionCss['description_color'] ?>;
    }

    #<?= $productionCss['html_id'] ?> blockquote {
        color: <?= $productionCss['blockquote_color'] ?>;
    }

    footer.<?= $productionCss['html_id'] ?>-foot {
        background: <?= $productionCss['bg_footer'] ?>;
    }

    <?php endforeach; ?>

    </style>


</head>