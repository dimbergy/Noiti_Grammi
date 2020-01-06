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

    $showsGR = $productions->getAllProductions(1);
    $showsEN = $productions->getAllProductions(2);

    ?>

    <section id="references">

        <div class="container">
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="text-center">ΑΝΑΦΟΡΕΣ</h3>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="showSelectGr">Επιλέξτε Παράσταση</label>
                        <select name="showSelectGr" id="showSelectGr" class="form-control">
                            <option value="" selected>Επιλογή Παράστασης</option>
                            <?php foreach ($showsGR as $show): ?>
                                <option value="<?= $show['id'] ?>"><?= $show['title'] ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                    <form action="actions/references-post.php" id="addReferencesFormGr" name="addReferencesFormGr" method="post" class="mt-5">

                        <h4 class="text-white font-weight-normal mb-4">Εισαγωγή Αναφοράς</h4>

                        <div class="form-row">

                            <div id="addRefResponseGr" class="form-group col-12 d-none">
                                <div class="alert" role="alert"></div>
                            </div>


                            <div class="form-group col-12">
                                <input type="text" name="addRefShowGr" id="addRefShowGr" value="" class="form-control" hidden data-msg="Δεν έχετε επιλέξει παράσταση">
                                <div class="invalid-feedback error-feedback"></div>
                            </div>

                            <div class="form-group col-12">
                                <label for="addRefTitleGr">Τίτλος Αναφοράς (ΕΛ)</label>
                                <textarea name="addRefTitleGr" id="addRefTitleGr" class="form-control" data-msg="Δεν έχετε ορίσει τίτλο για την αναφορά"></textarea>
                                <div class="invalid-feedback error-feedback"></div>
                            </div>

                            <div class="form-group col-12">
                                <label for="addRefUrlGr">Διεύθυνση Αναφοράς (ΕΛ)</label>
                                <input type="text" id="addRefUrlGr" name="addRefUrlGr" class="form-control" data-msg="Δεν έχετε ορίσει διεύθυνση συνδέσμου για την αναφορά">
                                <div class="invalid-feedback error-feedback"></div>
                            </div>

                            <div class="form-group col-12 col-md-4">
                                <label for="addRefOrderGr">Ιεράρχηση Αναφοράς</label>
                                <input type="number" class="form-control" name="addRefOrderGr" id="addRefOrderGr" value="1" min="1" data-msg="Δεν έχετε ιεραρχήσει την αναφορά">
                                <div class="invalid-feedback error-feedback"></div>
                            </div>

                            <div class="form-group col-12 col-md-8">
                                <label for="addRefSubmitGr">&nbsp;</label>
                                <button type="submit" class="btn btn-secondary w-100" name="addRefSubmitGr" id="addRefSubmitGr">ΕΙΣΑΓΩΓΗ</button>
                            </div>



                        </div>

                    </form>


                </div>

                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="showSelectEn">Select Show</label>
                        <select name="showSelectEn" id="showSelectEn" class="form-control">
                            <option value="" selected>Select Show</option>
                            <?php foreach ($showsEN as $show): ?>
                                <option value="<?= $show['id'] ?>"><?= $show['title'] ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                    <form action="actions/references-post.php" id="addReferencesFormEn" name="addReferencesFormEn" method="post" class="mt-5">

                        <h4 class="text-white font-weight-normal mb-4">Add Reference</h4>

                        <div class="form-row">

                            <div class="form-group col-12">
                                <input type="text" name="addRefShowEn" id="addRefShowEn" value="" class="form-control" hidden data-msg="No show has been selected">
                                <div class="invalid-feedback error-feedback"></div>
                            </div>

                            <div class="form-group col-12">
                                <label for="addRefTitleEn">Reference Title</label>
                                <textarea name="addRefTitleEn" id="addRefTitleEn" class="form-control" data-msg="Reference title is not defined"></textarea>
                                <div class="invalid-feedback error-feedback"></div>
                            </div>

                            <div class="form-group col-12">
                                <label for="addRefUrlEn">Reference URL</label>
                                <input type="text" id="addRefUrlEn" name="addRefUrlEn" class="form-control" data-msg="Reference URL is not defined">
                                <div class="invalid-feedback error-feedback"></div>
                            </div>

                            <div class="form-group col-12 col-md-4">
                                <label for="addRefOrderEn">Reference Order</label>
                                <input type="number" class="form-control" name="addRefOrderEn" id="addRefOrderEn" value="1" min="1" data-msg="Reference has not been ordered">
                                <div class="invalid-feedback error-feedback"></div>
                            </div>
                            <div class="form-group col-12 col-md-8">
                                <label for="addRefSubmitEn">&nbsp;</label>
                                <button type="submit" class="btn btn-secondary w-100" name="addRefSubmitEn" id="addRefSubmitEn">ADD</button>
                            </div>

                            <div id="addRefResponseEn" class="form-group col-12">
                                <div class="invalid-feedback error-feedback"></div>
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


    tinymce.init({

        selector: 'textarea',
        height: 300,
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
        entity_encoding : 'raw'

    });


    String.prototype.isEmpty = function () {
        return (this.length === 0 || !this.trim());
    };

    var addRefFormGr = $('#addReferencesFormGr'),
        addRefFormEn = $('#addReferencesFormEn');

    $('#showSelectGr').on('change', function () {
        var show = $(this).val();
        $('#addRefShowGr').attr('value', show);
        validateForms(addRefFormGr);
    });

    $('#showSelectEn').on('change', function () {
        var show = $(this).val();
        $('#addRefShowEn').attr('value', show);
        validateForms(addRefFormEn);
    });



    var validateForms = function (form) {

        let valid = true,
            inputs = form.find('input'),
            textarea = form.find('textarea');

        inputs.each(function () {

            var input = $(this),
                value = input.val(),
                error = input.attr('data-msg'),
                isValid = true;

            if (value.isEmpty()) {

                input.parent().find('.invalid-feedback.error-feedback').addClass('d-block').text(error);
                isValid = valid = false;

            }
            else {
                input.parent().find('.invalid-feedback.error-feedback').removeClass('d-block').text(error);
                isValid = valid = true;
            }


            if (isValid) {

                input.parent().find('.invalid-feedback.input-feedback').removeClass('d-block');
                input.removeClass('error-input');

            } else {
                input.addClass('error-input');

            }
        });


        textarea.each(function () {

            var tinyInput = $(this),
                value,
                error = tinyInput.attr('data-msg'),
                isValid = true;

            if(form == addRefFormGr) {
                value = tinymce.get("addRefTitleGr").save();
            } else if (form == addRefFormEn){
                value = tinymce.get("addRefTitleEn").save();
            }


            if (value.isEmpty()) {

                tinyInput.parent().find('.invalid-feedback.error-feedback').addClass('d-block').text(error);
                isValid = valid = false;

            }
            else {
                tinyInput.parent().find('.invalid-feedback.error-feedback').removeClass('d-block').text(error);
                isValid = valid = true;
            }


            if (isValid) {

                tinyInput.parent().find('.invalid-feedback.input-feedback').removeClass('d-block');
                tinyInput.removeClass('error-input');

            } else {
                tinyInput.addClass('error-input');

            }
        });


        return valid;

    };


    addRefFormGr.on('keyup', 'input', function () {
        validateForms(addRefFormGr);
    }).submit(function(e){
        e.preventDefault();
        e.stopPropagation();
        tinymce.get("addRefTitleGr").save();

        if(validateForms(addRefFormGr)) {

            var formData = new FormData(addRefFormGr[0]);
            formData.append('formId', 1);

            $.ajax({
                url: addRefFormGr.attr('action'),
                type: addRefFormGr.attr('method'),
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {

                    addRefFormGr.find($('#addRefShowGr')).closest('.form-group').find('.invalid-feedback').addClass('d-block').text(response.show);
                    addRefFormGr.find($('#addRefTitleGr')).closest('.form-group').find('.invalid-feedback').addClass('d-block').text(response.refTitle);
                    addRefFormGr.find($('#addRefUrlGr')).closest('.form-group').find('.invalid-feedback').addClass('d-block').text(response.refUrl);
                    addRefFormGr.find($('#addRefResponseGr')).removeClass('d-none').find('.alert').addClass('alert-success').text(response.result);

                    addRefFormGr[0].reset();
                },
                error: function() {
                    addRefFormGr.find($('#addRefResponseGr')).find('.alert').addClass('alert-danger').text('Σημείωθηκε πρόβλημα στη διαδικασία εισαγωγής της εγγραφής.');
                }

            });

            return false;
        }



    });



    addRefFormEn.on('keyup', 'input', function () {
        validateForms(addRefFormEn);
    }).submit(function(e) {
        e.preventDefault();
        e.stopPropagation();
        tinymce.get("addRefTitleEn").save();

        if(validateForms(addRefFormEn)) {

            var formData = new FormData(addRefFormEn[0]);
            formData.append('formId', 2);

            // var showId = $('#addRefShow').val();


            $.ajax({
                url: addRefFormEn.attr('action'),
                type: addRefFormEn.attr('method'),
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {

                    addRefFormGr.find($('#addRefShowEn')).closest('.form-group').find('.invalid-feedback').addClass('d-block').text(response.show);
                    addRefFormEn.find($('#addRefTitleEn')).closest('.form-group').find('.invalid-feedback').addClass('d-block').text(response.refTitle);
                    addRefFormEn.find($('#addRefUrlEn')).closest('.form-group').find('.invalid-feedback').addClass('d-block').text(response.refUrl);
                    addRefFormEn.find($('#addRefResponseEn')).removeClass('d-none').find('.alert').addClass('alert-success').text(response.result);

                    addRefFormGr[0].reset();
                },
                error: function () {
                    addRefFormEn.find($('#addRefResponseEn')).removeClass('d-none').find('.alert').addClass('alert-danger').text('Something went wrong! Please, try again.');
                }

            });

            return false;


        }
    });



</script>

</body>

</html>
