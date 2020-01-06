<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="robots" content="all" />

    <title><?= $tran['site'] ?></title>

    <meta name="keywords" content="<?= $tran['keywords'] ?>" />
    <meta name="description" content="<?= $tran['description'] ?>" />
    <meta property="og:image" content="<?= $gen['og-img'] ?>" />
    <meta name="author" content="Dimitrios Vergados | dimbergy@gmail.com" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=greek" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="/img/icons/noiti-favicon.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/spectrum.css">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/custom.css">


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="/js/spectrum.js"></script>


    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=0d022ubobbmwostpb224uj7i5jljglj4ibruz8xpi787yx36"></script>


    <link rel="alternate" href="http://<?= $_SERVER['HTTP_HOST'] ?>" hreflang="<?= $lang ?>" />


    <style>

        <?php foreach ($projectsSmall as $showSmall): ?>


        .project-img:not(:checked)+label[for=sm-<?= $showSmall['id'] ?>]:before {

            background-image: url("/<?= $showSmall['src'] ?>");
        }

        .project-img:checked+label[for=sm-<?= $showSmall['id'] ?>]:before {

            background-image: url("/<?= $showSmall['src'] ?>");
        }


        <?php endforeach; ?>



    </style>

</head>