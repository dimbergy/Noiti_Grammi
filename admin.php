<?php include ('config.php'); ?>
<?php include ('noiti_connect.php'); ?>


<?php

    $contacts = $conn->query("SELECT ID, lastname, firstname, email, message, date_sent FROM contact ORDER BY date_sent DESC");
        if($contacts->num_rows > 0):
            while($row = $contacts->fetch_assoc()):

                $results[] = $row;

            endwhile;
        endif;



        if(isset($_POST['loginSubmit']) && !empty($_POST['email']) && !empty($_POST['password'])):


            if($_POST['email'] === 'olga.pozeli@gmail.com' && $_POST['password'] === 'olga6544242@!'):


                session_start();
                $_SESSION['success'] = TRUE;

            else:

                session_unset();
                session_destroy();

                endif;



        endif;


        if(isset($_POST['deleteSubmit'])):

            $tmp = $_POST['contactId'];
            $id = (int)$tmp;

            $del = $conn->query("DELETE FROM contact WHERE ID =".$id);

            if($del):

                $message = "Η εγγραφή διαγράφηκε με επιτυχία.";
                $class = "alert-success";
                else:

                $message = "Η διαγραφή της επαφής απέτυχε.";
                $class = "alert-danger";
                    endif;
        ?>



            <form method="post" id="resetPost"></form>
             <script>$("#deleteForm").submit()</script>

       <?php endif;

if(isset($_POST['logoutSubmit'])):

    session_start();
    session_unset();
    session_destroy();


    else:

    session_start();

endif;

?>

<!DOCTYPE html>
<html lang="<?= $lang ?>" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= $lang ?>">


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
    <link rel="shortcut icon" href="img/icons/noiti-favicon.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/custom.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <link rel="alternate" href="http://<?= $_SERVER['HTTP_HOST'] ?>" hreflang="en" />


</head>

<body>



<?php


if(isset($_SESSION['success'])):

    session_start();

    ?>


    <nav class="navbar sticky-top navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand" href="/"><img src="img/logos/NoitiGrammiLogo.png" alt="noiti-logo" width="50"></a>

            <ul class="navbar-nav mr-auto ml-auto">
                <li class="nav-item active">
                    <a class="nav-link d-flex align-items-center" href=""><span class="noitigrammi">ΝΟΗΤΗ ΓΡΑΜΜΗ</span>&emsp;|&emsp;Administration Panel<span class="sr-only">(current)</span></a>
                </li>
            </ul>

        <form class="form-inline" name="logoutForm" action="" method="post">
<!--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit" name="logoutSubmit">Logout</button>
        </form>
        </div>
    </nav>

<div class="container">

    <div class="row mt-5 justify-content-center">


        <h1>Contact List</h1>

        <table class="table mt-5">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Όνομα</th>
                <th scope="col">Επώνυμο</th>
                <th scope="col">Email</th>
                <th scope="col">Μήνυμα</th>
                <th scope="col">Ημερομηνία</th>
                <th scope="col">Διαγραφή</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($results as $result): ?>

            <tr>
                <th scope="row"><?= $result['ID'] ?></th>
                <td><?= $result['firstname'] ?></td>
                <td><?= $result['lastname'] ?></td>
                <td><a href="mailto:<?= $result['email'] ?>"><?= $result['email'] ?></a></td>
                <td><?= $result['message'] ?></td>
                <td><?= date('d-m-y', strtotime($result['date_sent'])) ?></td>
                <td class="d-flex justify-content-center"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $result['ID'] ?>">
                        <i class="fa fa-close"></i>
                    </button></td>
            </tr>

            <?php endforeach; ?>

            </tbody>
        </table>



        <?php foreach ($results as $result): ?>

        <div class="modal fade" id="deleteModal<?= $result['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal<?= $result['ID'] ?>Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        Θέλετε να διαγράψετε την επαφή;

                        <form id="deleteForm" name="deleteForm" action="" method="post">
                            <input class="form-control d-none" type="text" name="contactId" value="<?= $result['ID'] ?>">

                    </div>
                    <div class="modal-footer d-flex justify-content-center">

                        <button type="submit" class="btn btn-danger" name="deleteSubmit">Διαγραφή</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Ακύρωση</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php endforeach; ?>

        <?php if(isset($_POST['deleteSubmit'])): ?>


            <div class="alert <?= $class ?> w-100" role="alert">
                <h6 class="text-center"><?= $message ?></h6>
            </div>


        <?php endif; ?>





    </div>

</div>





<?php else: ?>



    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

                <div class="mt-5">
                <img src="img/logos/NoitiGrammiGR.png" alt="noiti-logo" class="logo"/>
                </div>

                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Log In</h5>
                        <form class="form-signin" id="loginForm" name="loginForm" action="" method="post">
                            <div class="form-label-group">
                                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                                <label for="inputEmail">Email</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                            </div>


                            <button class="btn btn-lg btn-warning btn-block text-uppercase" type="submit" name="loginSubmit">Log in</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php endif; ?>

</body>

</html>
