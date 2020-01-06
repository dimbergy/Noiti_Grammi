<?php

    include ('config.php');
    include ('database/dbh.database.php');
    include ('database/contacts.database.php');

    $users = $contacts->getAllContacts();


       include ('actions/login.php');
        include ('actions/logout.php');

?>

<!DOCTYPE html>
<html lang="<?= $lang ?>" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= $lang ?>">


<?php include ('inc/_admin-header.php'); ?>

<body>


<?php


if(isset($_SESSION['success'])):

    session_start();

    include ('inc/_admin-navbar.php');

    ?>




<div class="container">

    <div class="row mt-5 justify-content-center">


        <h1 class="pb-5">Contact List</h1>



            <div id="alert-message" class="alert w-100 d-none" role="alert">
                <h6 class="text-center"></h6>
            </div>


        <table class="table">
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

            <?php foreach ($users as $user): ?>

            <tr data-id="<?= $user['ID'] ?>">
                <th scope="row"><?= $user['ID'] ?></th>
                <td><?= $user['firstname'] ?></td>
                <td><?= $user['lastname'] ?></td>
                <td><a href="mailto:<?= $user['email'] ?>"><?= $user['email'] ?></a></td>
                <td><?= $user['message'] ?></td>
                <td><?= date('d-m-y', strtotime($user['date_sent'])) ?></td>
                <td class="d-flex justify-content-center">
                    <button type="button" class="btn btn-danger modalBtn" data-toggle="modal" data-target="#deleteModal">
                        <i class="fa fa-close"></i>
                    </button>
                </td>
            </tr>

            <?php endforeach; ?>

            </tbody>
        </table>


        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        Θέλετε να διαγράψετε την επαφή;

                        <form id="deleteForm" name="deleteForm" action="actions/deleteContact.php" method="post">
                            <input id="contactId" class="form-control" type="text" name="contactId" hidden>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">

                        <button type="submit" class="btn btn-danger" name="deleteSubmit">Διαγραφή</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Ακύρωση</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>




    </div>

</div>





<?php else: ?>



    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

                <div class="mt-5">
                    <a href="/">
                <img src="img/logos/NoitiGrammiGR.png" alt="noiti-logo" class="logo"/>
                    </a>
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


<script>


    $('.modalBtn').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        let _this = $(this);

        let id = _this.closest('tr').attr('data-id');
        let modal = $('#deleteModal');
        $('#contactId').attr('value', id);
        modal.modal('show');

    });

    let form = $('#deleteForm'),
        modal = $('#deleteModal');

    form.submit(function (e) {
        e.preventDefault();


        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            dataType: 'json',
            success: function (response) {
                $('#alert-message').removeClass('d-none').addClass(response.class).find('h6').text(response.message);
                $('tr[data-id="' + response.id + '"]').addClass('d-none');
                modal.modal('hide');
                form[0].reset();
            }, error: function () {
                $('#alert-message').removeClass('d-none').addClass('alert-danger').find('h6').text("Η διαγραφή της επαφής απέτυχε.");
                modal.modal('hide');
                form[0].reset();
            }
        });

        return false;

    });


    </script>
</body>

</html>
