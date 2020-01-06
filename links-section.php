<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 18/11/2018
 * Time: 10:26
 */

include ('config.php');
include ('database/dbh.database.php');
include ('database/productions.database.php');
include ('database/media.database.php');
include ('database/venues.database.php');
include ('database/references.database.php');
include ('database/copyrights.database.php');
include ('actions/logout.php');
$projectsSmall = $media->getProductionsSmall();
?>


<!DOCTYPE html>
<html lang="<?= $lang ?>" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= $lang ?>">

<?php include ('inc/_admin-header.php'); ?>

<body>


<?php

if(isset($_SESSION['success'])):

    session_start();

    include ('inc/_admin-navbar.php');

    $shows = $productions->getAllProductions(1);
    $shows_en = $productions->getAllProductions(2);

    ?>

    <section id="links">

        <div class="container mt-5">



            <div class="row">


                <div class="col-12 col-md-6">

                    <form id="insertLinksForm" name="insertLinksForm" action="actions/links.php" method="post" enctype="multipart/form-data">

                        <h4 class="text-white font-weight-normal mb-4">Εισαγωγή Συνδέσμου</h4>

                        <div class="form-row">

                            <div class="form-group col-12 col-md-6">

                                <label for="linkTitleGr">Τίτλος Συνδέσμου (ΕΛ)</label>
                                <input type="text" id="linkTitleGr" name="linkTitleGr" class="form-control">
                                <div class="invalid-feedback error-feedback"></div>
                            </div>

                            <div class="form-group col-12 col-md-6">

                                <label for="linkTitleEn">Link Title (EN)</label>
                                <input type="text" id="linkTitleEn" name="linkTitleEn" class="form-control">
                                <div class="invalid-feedback error-feedback"></div>
                            </div>

                      <div class="form-group col-12 col-md-6">
                            <label for="linkUrlGr">Διεύθυνση Συνδέσμου (ΕΛ)</label>
                            <input type="text" id="linkUrlGr" name="linkUrlGr" class="form-control">
                          <div class="invalid-feedback error-feedback"></div>
                        </div>

                        <div class="form-group col-12 col-md-6">

                            <label for="linkUrlEn">Link Address (EN)</label>
                            <input type="text" id="linkUrlEn" name="linkUrlEn" class="form-control">
                            <div class="invalid-feedback error-feedback"></div>
                        </div>

                            <div class="form-group col-12 col-md-6">

                                <label for="linkOrigin">Έδρα Συνδέσμου</label>
                                <select name="linkOrigin" id="linkOrigin" class="form-control">
                                    <option value="" selected>Επιλογή Έδρας</option>
                                    <option value="el">Ελλάδα</option>
                                    <option value="en">Εξωτερικό</option>
                                </select>
                                <div class="invalid-feedback error-feedback"></div>
                            </div>


                            <div class="form-group col-12 col-md-6 d-flex flex-column justify-content-end">
                                <label for="linkImgUpload">Upload Link Image</label>
                                <input type="file" name="linkImgUpload" id="linkImgUpload">
                                <div class="invalid-feedback error-feedback"></div>
                            </div>

                            <div class="form-group col-12">

                                <button id="insertLinkSubmit" name="insertLinkSubmit" type="submit" class="btn btn-secondary w-100 mt-3">Εισαγωγή</button>

                            </div>


                </div>

                    </form>

                </div>


            </div>


        </div>

    </section>
<?php

else:
    header('Location: /admin');
endif;

?>


<script>

    var insertForm = $('#insertLinksForm');

    insertForm.submit(function (e) {
       e.preventDefault();

        e.stopImmediatePropagation();

        var formData = new FormData(insertForm[0]);


        $.ajax({
            url: insertForm.attr('action'),
            type: insertForm.attr('method'),
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {

                console.log(response.msgTitleGr);
                console.log(response.msgTitleEn);
                console.log(response.msgUrlGr);
                console.log(response.msgUrlEn);
                console.log(response.msgOrigin);
                console.log(response.msgFile);
                console.log(response.fail);
            }

        });


    });

</script>

</body>

</html>
