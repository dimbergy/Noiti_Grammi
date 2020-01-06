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

<section id="shows">

<div class="container mt-5">

    <div class="row">
        <div id="response" style="word-break: break-word"></div>
    </div>


<div class="row">


    <div class="nav flex-column nav-pills col-md-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

        <?php foreach ($shows as $show): ?>
        <a class="nav-link" id="v-pills-<?= $show['id'] ?>-tab" data-toggle="pill" href="#v-pills-<?= $show['id'] ?>" role="tab" aria-controls="v-pills-<?= $show['id'] ?>" aria-selected="false"><?= $show['title'] ?></a>
        <?php endforeach; ?>
        <button type="button" id="v-pills-addNew-tab" data-toggle="pill" href="#v-pills-addNew" role="tab" aria-controls="v-pills-addNew" aria-selected="false" class="btn btn-outline-light mt-3 nav-link">Add new</button>
    </div>
    <div class="tab-content col-md-9 mb-5" id="v-pills-tabContent">



        <?php foreach ($shows as $key => $show):

            $showsParallax = $media->getProductionsParallax($show['id']);
            $showsSmall = $media->getProductionsPhotos($show['id'], 3);
            $showsOriginal = $media->getProductionsPhotos($show['id'], 4);
            $showsVideos = $media->getProductionsVideos($show['id']);
            $venuesGr = $venues->getVenues(1, $show['id']);
            $venuesEn = $venues->getVenues(2, $show['id']);
            $referencesGr = $references->getProductionsReferences($show['id'], 1);
            $referencesEn = $references->getProductionsReferences($show['id'], 2);
            $photosCopyrightsGr = $copyrights->getCopyrights(1, $show['id'], 1);
            $videosCopyrightsGr = $copyrights->getCopyrights(1, $show['id'], 2);
            $photosCopyrightsEn = $copyrights->getCopyrights(2, $show['id'], 1);
            $videosCopyrightsEn = $copyrights->getCopyrights(2, $show['id'], 2);
            ?>

        <div class="tab-pane fade" id="v-pills-<?= $show['id'] ?>" role="tabpanel" aria-labelledby="v-pills-<?= $show['id'] ?>-tab">

            <h3>Globals</h3>

            <form class="mt-4" data-id="<?= $show['id'] ?>" id="form-<?= $show['id'] ?>" enctype="multipart/form-data">

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="permalink-<?= $show['id'] ?>">Permalink</label>
                        <input type="text" class="form-control" name="permalink-<?= $show['id'] ?>" id="permalink-<?= $show['id'] ?>" value="<?= $show['permalink'] ?>">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="html-id-<?= $show['id'] ?>">Section-id</label>
                        <input type="text" class="form-control" name="html-id-<?= $show['id'] ?>" id="html-id-<?= $show['id'] ?>" value="<?= $show['html_id'] ?>">
                    </div>


                    <div class="form-group col-md-2">
                        <label for="date-<?= $show['id'] ?>">Date</label>
                        <input type="text" class="form-control" name="date-<?= $show['id'] ?>" id="date-<?= $show['id'] ?>" value="<?= $show['date'] ?>">
                    </div>

                    <div class="form-group col-md-5">
                        <label for="facebook-<?= $show['id'] ?>">Facebook</label>
                        <input type="text" class="form-control" name="facebook-<?= $show['id'] ?>" id="facebook-<?= $show['id'] ?>" value="<?= $show['fb_link'] ?>">
                    </div>
                </div>


                <h5>Colors</h5>

                <div class="form-row justify-content-between">

                    <div class="form-group col-auto">
                        <label for="title-color-<?= $show['id'] ?>">Title color</label>
                        <input type="text" class="form-control spectrum" name="title-color-<?= $show['id'] ?>" id="title-color-<?= $show['id'] ?>" value="<?= $show['title_color'] ?>">
                    </div>

                    <div class="form-group col-auto">
                        <label for="shadow-color-<?= $show['id'] ?>">Title shadow color</label>
                        <input type="text" class="form-control spectrum" name="shadow-color-<?= $show['id'] ?>" id="shadow-color-<?= $show['id'] ?>" value="<?= $show['text_shadow'] ?>">
                    </div>

                    <div class="form-group col-auto">
                        <label for="date-color-<?= $show['id'] ?>">Date color</label>
                        <input type="text" class="form-control spectrum" name="date-color-<?= $show['id'] ?>" id="date-color-<?= $show['id'] ?>" value="<?= $show['date_color'] ?>">
                    </div>

                    <div class="form-group col-auto">
                        <label for="subtitle-color-<?= $show['id'] ?>">Subtitle color</label>
                        <input type="text" class="form-control spectrum" name="subtitle-color-<?= $show['id'] ?>" id="subtitle-color-<?= $show['id'] ?>" value="<?= $show['subtitle_color'] ?>">
                    </div>

                    <div class="form-group col-auto">
                        <label for="bg-color-<?= $show['id'] ?>">Background</label>
                        <input type="text" class="form-control spectrum" name="bg-color-<?= $show['id'] ?>" id="bg-color-<?= $show['id'] ?>" value="<?= $show['bg_color'] ?>">
                    </div>

                    <div class="form-group col-auto">
                        <label for="bg-footer-<?= $show['id'] ?>">Footer background</label>
                        <input type="text" class="form-control spectrum" name="bg-footer-<?= $show['id'] ?>" id="bg-footer-<?= $show['id'] ?>" value="<?= $show['bg_footer'] ?>">
                    </div>

                    <div class="form-group col-auto">
                        <label for="blockquote-color-<?= $show['id'] ?>">Intro paragraph color</label>
                        <input type="text" class="form-control spectrum" name="blockquote-color-<?= $show['id'] ?>" id="blockquote-color-<?= $show['id'] ?>" value="<?= $show['blockquote_color'] ?>">
                    </div>

                    <div class="form-group col-auto">
                        <label for="description-color-<?= $show['id'] ?>">Description color</label>
                        <input type="text" class="form-control spectrum" name="description-color-<?= $show['id'] ?>" id="description-color-<?= $show['id'] ?>" value="<?= $show['description_color'] ?>">
                    </div>


                    <div class="form-group col-auto">
                        <label for="tab-active-color-<?= $show['id'] ?>">Tab active color</label>
                        <input type="text" class="form-control spectrum" name="tab-active-color-<?= $show['id'] ?>" id="tab-active-color-<?= $show['id'] ?>" value="<?= $show['tab_active_color'] ?>">
                    </div>

                    <div class="form-group col-auto">
                        <label for="tab-inactive-color-<?= $show['id'] ?>">Tab inactive color</label>
                        <input type="text" class="form-control spectrum" name="tab-inactive-color-<?= $show['id'] ?>" id="tab-inactive-color-<?= $show['id'] ?>" value="<?= $show['tab_inactive_color'] ?>">
                    </div>

                    <div class="form-group col-auto">
                        <label for="icon-active-color-<?= $show['id'] ?>">Icon inactive color</label>
                        <input type="text" class="form-control spectrum" name="icon-inactive-color-<?= $show['id'] ?>" id="icon-inactive-color-<?= $show['id'] ?>" value="<?= $show['icon_inactive_color'] ?>">
                    </div>

                    <div class="form-group col-auto">
                        <label for="icon-inactive-color-<?= $show['id'] ?>">Tab border color</label>
                        <input type="text" class="form-control spectrum" name="tab-border-color-<?= $show['id'] ?>" id="tab-border-color-<?= $show['id'] ?>" value="<?= $show['tab_border_color'] ?>">
                    </div>

                    <div class="form-group col-auto">
                        <label for="thead-color-<?= $show['id'] ?>">Table head color</label>
                        <input type="text" class="form-control spectrum" name="thead-color-<?= $show['id'] ?>" id="thead-color-<?= $show['id'] ?>" value="<?= $show['thead_color'] ?>">
                    </div>

                    <div class="form-group col-auto">
                        <label for="thead-hover-color-<?= $show['id'] ?>">Table head hover color</label>
                        <input type="text" class="form-control spectrum" name="thead-hover-color-<?= $show['id'] ?>" id="thead-hover-color-<?= $show['id'] ?>" value="<?= $show['thead_hover_color'] ?>">
                    </div>

                    <div class="form-group col-auto">
                        <label for="thead-border-color-<?= $show['id'] ?>">Table head border color</label>
                        <input type="text" class="form-control spectrum" name="thead-border-color-<?= $show['id'] ?>" id="thead-border-color-<?= $show['id'] ?>" value="<?= $show['thead_border_color'] ?>">
                    </div>

                    <div class="form-group col-auto">
                        <label for="tbody-color-<?= $show['id'] ?>">Table body color</label>
                        <input type="text" class="form-control spectrum" name="tbody-color-<?= $show['id'] ?>" id="tbody-color-<?= $show['id'] ?>" value="<?= $show['tbody_color'] ?>">
                    </div>

                </div>



                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input activeCheck" type="checkbox" name="activeCheck-<?= $show['id'] ?>" id="activeCheck-<?= $show['id'] ?>" value="<?= $show['active'] ?>" <?php if($show['active'] == 1): echo 'checked'; endif; ?>>
                        <label class="form-check-label published-label" for="activeCheck-<?= $show['id'] ?>">
                            Published
                        </label>
                    </div>
                </div>


                <h5 class="mt-3 mb-0">Photos</h5>
                <label class="my-0">Delete photos</label>
            <div class="form-group">

                <?php foreach ($showsSmall as $small): ?>

                <div class="form-check form-check-inline">
                    <input class="form-check-input project-img" name="project-img[]" id="sm-<?= $small['id'] ?>" type="checkbox" value="<?= $small['src'] ?>">
                    <label class="form-check-label" for="sm-<?= $small['id'] ?>"></label>
                </div>

                <?php endforeach; ?>
            </div>

                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="thumbs-<?= $show['id'] ?>">Upload thumbs</label>
                    <input type="file" name="thumbUpload[]" id="thumbs-<?= $show['id'] ?>" multiple>
                </div>

                <div class="form-group col-md-4">
                    <label for="originals-<?= $show['id'] ?>">Upload full size</label>
                    <input type="file" name="originalUpload[]" id="originals-<?= $show['id'] ?>" multiple>
                </div>

                    <div class="form-group col-md-4">
                        <label for="parallax-<?= $show['id'] ?>">Change parallax</label>
                        <input type="file" name="parallaxChange-<?= $show['id'] ?>" id="parallax-<?= $show['id'] ?>">
                    </div>

                </div>

                <h5 class="mb-2">Videos</h5>

                <div class="form-row">

                    <?php if(sizeof($showsVideos) > 0): ?>
                    <div class="form-group col-md-6">
                        <label for="remove-video-<?= $show['id'] ?>">Remove video</label>
                        <select name="remove-video-<?= $show['id'] ?>" id="remove-video-<?= $show['id'] ?>" class="form-control">
                            <option value="">Select video</option>
                            <?php foreach ($showsVideos as $video): ?>
                            <option value="<?= $video['id'] ?>"><?= $video['src'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php endif; ?>

                    <div class="form-group col-md-6">
                        <label for="add-video-<?= $show['id'] ?>">Add video</label>
                        <input type="text" class="form-control" name="add-video-<?= $show['id'] ?>" id="add-video-<?= $show['id'] ?>">
                    </div>

                </div>

                <h3 class="pt-3">Locals</h3>

            <nav>
                <div class="nav nav-tabs mt-4" id="nav-tab" role="tablist">

                    <a class="nav-item nav-link active" id="nav-gr<?= $show['id'] ?>-tab" data-toggle="tab" href="#nav-gr<?= $show['id'] ?>" role="tab" aria-controls="nav-gr<?= $show['id'] ?>" aria-selected="true">ΕΛ</a>
                    <a class="nav-item nav-link" id="nav-en<?= $show['id'] ?>-tab" data-toggle="tab" href="#nav-en<?= $show['id'] ?>" role="tab" aria-controls="nav-en<?= $show['id'] ?>" aria-selected="false">EN</a>

                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade show active" id="nav-gr<?= $show['id'] ?>" role="tabpanel" aria-labelledby="nav-gr<?= $show['id'] ?>-tab">


                        <div class="form-row mt-4">
                            <div class="form-group col-md-7">
                                <label for="title-<?= $show['id'] ?>">Title</label>
                                <input type="text" class="form-control" name="title-<?= $show['id'] ?>" id="title-<?= $show['id'] ?>" value="<?= $show['title'] ?>">
                            </div>



                            <div class="form-group col-md-5">
                                <label for="subtitle-<?= $show['id'] ?>">Subtitle</label>
                                <input type="text" class="form-control" name="subtitle-<?= $show['id'] ?>" id="subtitle-<?= $show['id'] ?>" value="<?= $show['subtitle'] ?>">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="blockquote-<?= $show['id'] ?>">Intro paragraph</label>
                            <textarea class="form-control" name="blockquote-<?= $show['id'] ?>" id="blockquote-<?= $show['id'] ?>"><?= $show['blockquote'] ?></textarea>
                        </div>



                        <div class="form-group">
                            <label for="description-<?= $show['id'] ?>n">Description</label>
                            <textarea class="form-control" name="description-<?= $show['id'] ?>" id="description-<?= $show['id'] ?>"><?= $show['description'] ?></textarea>
                        </div>



                        <div class="form-group">
                            <label for="staff-<?= $show['id'] ?>">Staff</label>
                            <textarea class="form-control" name="staff-<?= $show['id'] ?>" id="staff-<?= $show['id'] ?>"><?= $show['staff'] ?></textarea>
                        </div>




                    <div class="form-row">


                        <div class="form-group col-md-6">

                            <div class="form-group mb-0">
                                <label>Venues</label>
                            </div>


                            <?php foreach ($venuesGr as $venueGr): ?>
                                <div class="form-group">
                                    <button type="button" class="btn btn-outline-dark w-100" data-toggle="modal" data-target="#venue-<?= $venueGr['id_venue'] ?>-<?= $show['id'] ?>"><?= $venueGr['venue_name'] ?></button>
                                </div>



                                <div class="modal fade" id="venue-<?= $venueGr['id_venue'] ?>-<?= $show['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel-<?= $venueGr['id_venue'] ?>-<?= $show['id'] ?>" aria-hidden="true">

                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel-<?= $venueGr['id_venue'] ?>-<?= $show['id'] ?>">Edit venue</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">



                                                <div class="form-group">

                                                    <label for=venue-name-<?= $venueGr['id'] ?>-<?= $show['id'] ?>"">Venue name</label>
                                                    <input type="text" class="form-control" name="venue-name-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" id="venue-name-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" value="<?= $venueGr['venue_name'] ?>">

                                                </div>
                                                <div class="form-group">

                                                    <label for="venue-url-<?= $venueGr['id'] ?>-<?= $show['id'] ?>">Venue URL</label>
                                                    <input type="text" class="form-control" name="venue-url-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" id="venue-url-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" value="<?= $venueGr['venue_url'] ?>">

                                                </div>


                                                <div class="form-row">

                                                    <div class="form-group col-md-6">

                                                        <label for="venue-phone-<?= $venueGr['id'] ?>-<?= $show['id'] ?>">Venue telephone</label>
                                                        <input type="text" class="form-control" name="venue-phone-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" id="venue-phone-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" value="<?= $venueGr['tel_number'] ?>">

                                                    </div>
                                                    <div class="form-group col-md-6">

                                                        <label for="venue-phoneLink-<?= $venueGr['id'] ?>-<?= $show['id'] ?>">Venue telephone link</label>
                                                        <input type="text" class="form-control" name="venue-phoneLink-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" id="venue-phoneLink-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" value="<?= $venueGr['tel_link'] ?>">

                                                    </div>

                                                </div>


                                                <div class="form-group">

                                                    <label for=venue-location-<?= $venueGr['id'] ?>-<?= $show['id'] ?>"">Venue location</label>
                                                    <input type="text" class="form-control" name="venue-location-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" id="venue-location-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" value="<?= $venueGr['venue_location'] ?>">

                                                </div>
                                                <div class="form-group">

                                                    <label for="location-url-<?= $venueGr['id'] ?>-<?= $show['id'] ?>">Venue URL</label>
                                                    <input type="text" class="form-control" name="location-url-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" id="location-url-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" value="<?= $venueGr['location_url'] ?>">

                                                </div>


                                                <div class="form-row">

                                                    <div class="form-group col-md-6">

                                                        <label for="event-date-<?= $venueGr['id'] ?>-<?= $show['id'] ?>">Event date</label>
                                                        <input type="text" class="form-control" name="event-date-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" id="event-date-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" value="<?= $venueGr['event_date'] ?>">

                                                    </div>
                                                    <div class="form-group col-md-6">

                                                        <label for="event-url-<?= $venueGr['id'] ?>-<?= $show['id'] ?>">Event URL</label>
                                                        <input type="text" class="form-control" name="event-url-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" id="event-url-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" value="<?= $venueGr['event_url'] ?>">

                                                    </div>

                                                </div>


                                                <div class="form-group">
                                                    <label for="tickets-<?= $venueGr['id'] ?>-<?= $show['id'] ?>">Tickets</label>
                                                    <textarea rows="8" class="form-control" name="tickets-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" id="tickets-<?= $venueGr['id'] ?>-<?= $show['id'] ?>"><?= $venueGr['tickets'] ?></textarea>
                                                </div>


                                                <div class="form-group">

                                                    <label for="venue-order-<?= $venueGr['id'] ?>-<?= $show['id'] ?>">Venue ordering</label>
                                                    <input type="number" class="form-control" name="venue-order-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" id="venue-order-<?= $venueGr['id'] ?>-<?= $show['id'] ?>" value="<?= $venueGr['event_tabindex'] ?>">

                                                </div>




                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>


                            <button type="button" class="btn btn-outline-light w-100" data-toggle="modal" data-target="#venue-new-<?= $show['id'] ?>">Add venue</button>


                            <div class="modal fade" id="venue-new-<?= $show['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabelNew-<?= $show['id'] ?>" aria-hidden="true">

                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabelNew-<?= $show['id'] ?>">Add new venue</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">


                                            <div class="form-group">

                                                <label for=venue-name-new-<?= $show['id'] ?>"">Venue name</label>
                                                <input type="text" class="form-control" name="venue-name-new-<?= $show['id'] ?>" id="venue-name-new-<?= $show['id'] ?>" value="">

                                            </div>
                                            <div class="form-group">

                                                <label for="venue-url-new-<?= $show['id'] ?>">Venue URL</label>
                                                <input type="text" class="form-control" name="venue-url-new-<?= $show['id'] ?>" id="venue-url-new-<?= $show['id'] ?>" value="">

                                            </div>


                                            <div class="form-row">

                                                <div class="form-group col-md-6">

                                                    <label for="venue-phone-new-<?= $show['id'] ?>">Venue telephone</label>
                                                    <input type="text" class="form-control" name="venue-phone-new-<?= $show['id'] ?>" id="venue-phone-new-<?= $show['id'] ?>" value="">

                                                </div>
                                                <div class="form-group col-md-6">

                                                    <label for="venue-phoneLink-new-<?= $show['id'] ?>">Venue telephone link</label>
                                                    <input type="text" class="form-control" name="venue-phoneLink-new-<?= $show['id'] ?>" id="venue-phoneLink-new-<?= $show['id'] ?>" value="">

                                                </div>

                                            </div>


                                            <div class="form-group">

                                                <label for=venue-location-new-<?= $show['id'] ?>"">Venue location</label>
                                                <input type="text" class="form-control" name="venue-location-new-<?= $show['id'] ?>" id="venue-location-new-<?= $show['id'] ?>" value="">

                                            </div>
                                            <div class="form-group">

                                                <label for="location-url-new-<?= $show['id'] ?>">Venue URL</label>
                                                <input type="text" class="form-control" name="location-url-new-<?= $show['id'] ?>" id="location-url-new-<?= $show['id'] ?>" value="">

                                            </div>


                                            <div class="form-row">

                                                <div class="form-group col-md-6">

                                                    <label for="event-date-new-<?= $show['id'] ?>">Event date</label>
                                                    <input type="text" class="form-control" name="event-date-new-<?= $show['id'] ?>" id="event-date-new-<?= $show['id'] ?>" value="">

                                                </div>
                                                <div class="form-group col-md-6">

                                                    <label for="event-url-new-<?= $show['id'] ?>">Event URL</label>
                                                    <input type="text" class="form-control" name="event-url-new-<?= $show['id'] ?>" id="event-url-new-<?= $show['id'] ?>" value="">

                                                </div>

                                            </div>


                                            <div class="form-group">
                                                <label for="tickets-new-<?= $show['id'] ?>">Tickets</label>
                                                <textarea rows="8" class="form-control" name="tickets-new-<?= $show['id'] ?>" id="tickets-new-<?= $show['id'] ?>"></textarea>
                                            </div>


                                            <div class="form-group">

                                                <label for="venue-order-new-<?= $show['id'] ?>">Venue ordering</label>
                                                <input type="number" class="form-control" name="venue-order-new-<?= $show['id'] ?>" id="venue-order-new-<?= $show['id'] ?>" value="">

                                            </div>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <div class="form-group col-md-6">


                            <div class="form-group mb-0">
                                <label>References</label>
                            </div>

                            <?php foreach ($referencesGr as $referenceGr): ?>

                            <div class="form-group">
                                <button type="button" class="btn btn-outline-dark w-100" data-toggle="modal" data-target="#reference-<?= $referenceGr['id'] ?>"><?= $referenceGr['ref_title'] ?></button>
                            </div>

                           <div class="modal fade" id="reference-<?= $referenceGr['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel-<?= $referenceGr['id'] ?>" aria-hidden="true">

                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel-<?= $referenceGr['id'] ?>">Edit reference</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">



                                                <div class="form-group">

                                                    <label for="ref_title-<?= $referenceGr['id'] ?>">Reference title</label>
                                                    <textarea class="form-control" name="ref-title-<?= $referenceGr['id'] ?>" id="ref-title-<?= $referenceGr['id'] ?>"><?= $referenceGr['ref_title'] ?></textarea>

                                                </div>


                                                <?php if (strpos($referenceGr['ref_url'], 'http') === 0): ?>

                                                    <div class="form-group">

                                                        <label for="ref-url-<?= $referenceGr['id'] ?>">Reference URL</label>
                                                        <input type="text" class="form-control" name="ref-url-<?= $referenceGr['id'] ?>" id="ref-url-<?= $referenceGr['id'] ?>" value="<?= $referenceGr['ref_url'] ?>">

                                                    </div>


                                                <?php else: ?>

                                                    <div class="form-group">

                                                        <label class="ref-file" for="ref-url-<?= $referenceGr['id'] ?>">Upload pdf</label>
                                                        <input type="file" name="ref-url-<?= $referenceGr['id'] ?>" id="ref-url-<?= $referenceGr['id'] ?>">

                                                    </div>

                                                <?php endif; ?>


                                                <div class="form-group">

                                                    <label for="ref-order-<?= $referenceGr['id'] ?>">Reference ordering</label>
                                                    <input type="number" class="form-control" name="ref-order-<?= $referenceGr['id'] ?>" id="ref-order-<?= $referenceGr['id'] ?>" value="<?= $referenceGr['ref_tabindex'] ?>">

                                                </div>




                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <?php endforeach; ?>


                            <button type="button" class="btn btn-outline-light w-100" data-toggle="modal" data-target="#ref-new-<?= $show['id'] ?>">Add reference</button>

                            <div class="modal fade" id="ref-new-<?= $show['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel-<?= $show['id'] ?>" aria-hidden="true">

                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel-<?= $show['id'] ?>">Add new reference</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">



                                            <div class="form-group">

                                                <label for="ref_title-new-<?= $show['id'] ?>">Reference title</label>
                                                <textarea class="form-control" name="ref-title-new-<?= $show['id'] ?>" id="ref-title-new-<?= $show['id'] ?>"></textarea>

                                            </div>
                                            <div class="form-group">

                                                <label  class="ref-file" for="ref-url-new-<?= $show['id'] ?>">Upload pdf</label>
                                                <input type="file"  name="ref-url-new-<?= $show['id'] ?>" id="ref-url-new-<?= $show['id'] ?>">

                                            </div>

                                            <label>Or</label>

                                            <div class="form-group">

                                                <label for="ref-url-new-<?= $show['id'] ?>">Reference URL</label>
                                                <input type="text" class="form-control" name="ref-url-new-<?= $show['id'] ?>" id="ref-url-new-<?= $show['id'] ?>">

                                            </div>

                                            <div class="form-group">

                                                <label for="ref-order-new-<?= $show['id'] ?>">Reference ordering</label>
                                                <input type="number" class="form-control" name="ref-order-new-<?= $show['id'] ?>" id="ref-order-new-<?= $show['id'] ?>" value="">

                                            </div>




                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>



                    <div class="form-row">


                        <div class="form-group col-md-6">


                            <div class="form-group">
                                <label for="photo-copy-<?= $show['id'] ?>">Photos Copyrights</label>
                                <input type="text" class="form-control" name="photo-copy-<?= $show['id'] ?>" id="photo-copy-<?= $show['id'] ?>" value="<?= $photosCopyrightsGr[0]['name'] ?>">

                            </div>


                        </div>


                        <div class="form-group col-md-6">


                                <div class="form-group">
                                    <label for="video-copy-<?= $show['id'] ?>">Video Copyrights</label>
                                    <input type="text" class="form-control" name="video-copy-<?= $show['id'] ?>" id="video-copy-<?= $show['id'] ?>" value="<?= $videosCopyrightsGr[0]['name'] ?>">

                                </div>


                        </div>

                    </div>


                </div>



                <div class="tab-pane fade" id="nav-en<?= $show['id'] ?>" role="tabpanel" aria-labelledby="nav-en<?= $show['id'] ?>-tab">


                        <div class="form-row mt-4">
                            <div class="form-group col-md-7">
                                <label for="title-en-<?= $show['id'] ?>">Title</label>
                                <input type="text" class="form-control" name="title-en-<?= $show['id'] ?>" id="title-en-<?= $show['id'] ?>" value="<?= $shows_en[$key]['title'] ?>">
                            </div>


                            <div class="form-group col-md-5">
                                <label for="subtitle-en-<?= $show['id'] ?>">Subtitle</label>
                                <input type="text" class="form-control" name="subtitle-en-<?= $show['id'] ?> id="subtitle-en-<?= $show['id'] ?>" value="<?= $shows_en[$key]['subtitle'] ?>">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="blockquote-en-<?= $show['id'] ?>">Intro paragraph</label>
                            <textarea rows="8" class="form-control" name="blockquote-en-<?= $show['id'] ?> id="blockquote-en-<?= $show['id'] ?>"><?= $shows_en[$key]['blockquote'] ?></textarea>
                        </div>


                        <div class="form-group">
                            <label for="description-en-<?= $show['id'] ?>">Description</label>
                            <textarea rows="8" class="form-control" name="description-en-<?= $show['id'] ?>" id="description-en-<?= $show['id'] ?>"><?= $shows_en[$key]['description'] ?></textarea>
                        </div>


                        <div class="form-group">
                            <label for="staff-en-<?= $show['id'] ?>">Staff</label>
                            <textarea rows="8" class="form-control" name="staff-en-<?= $show['id'] ?>" id="staff-en-<?= $show['id'] ?>"><?= $shows_en[$key]['staff'] ?></textarea>
                        </div>



                    <div class="form-row">

                        <div class="col-md-6">

                            <div class="form-group mb-0">
                                <label>Venues</label>
                            </div>
                            <?php foreach ($venuesEn as $venueEn): ?>
                            <div class="form-group">
                                <button type="button" class="btn btn-outline-dark w-100" data-toggle="modal" data-target="#venue-en-<?= $venueEn['id_venue'] ?>-<?= $show['id'] ?>"><?= $venueEn['venue_name'] ?></button>
                            </div>
                                <div class="modal fade" id="venue-en-<?= $venueEn['id_venue'] ?>-<?= $show['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel-en-<?= $venueEn['id_venue'] ?>-<?= $show['id'] ?>" aria-hidden="true">

                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel-en-<?= $venueEn['id_venue'] ?>-<?= $show['id'] ?>"><?= $venueEn['venue_name'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">



                                                <div class="form-group">

                                                    <label for="venue-name-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>">Venue name</label>
                                                    <input type="text" class="form-control" name="venue-name-en<?= $venueEn['id'] ?>-<?= $show['id'] ?>" id="venue-name-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" value="<?= $venueEn['venue_name'] ?>">

                                                </div>
                                                <div class="form-group">

                                                    <label for="venue-url-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>">Venue URL</label>
                                                    <input type="text" class="form-control" name="venue-url-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" id="venue-url-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" value="<?= $venueEn['venue_url'] ?>">

                                                </div>


                                                <div class="form-row">

                                                    <div class="form-group col-md-6">

                                                        <label for="venue-phone-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>">Venue telephone</label>
                                                        <input type="text" class="form-control" name="venue-phone-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" id="venue-phone-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" value="<?= $venueEn['tel_number'] ?>">

                                                    </div>
                                                    <div class="form-group col-md-6">

                                                        <label for="venue-phoneLink-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>">Venue telephone link</label>
                                                        <input type="text" class="form-control" name="venue-phoneLink-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" id="venue-phoneLink-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" value="<?= $venueEn['tel_link'] ?>">

                                                    </div>

                                                </div>


                                                <div class="form-group">

                                                    <label for=venue-location-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>"">Venue location</label>
                                                    <input type="text" class="form-control" name="venue-location-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" id="venue-location-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" value="<?= $venueEn['venue_location'] ?>">

                                                </div>
                                                <div class="form-group">

                                                    <label for="location-url-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>">Venue URL</label>
                                                    <input type="text" class="form-control" name="location-url-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" id="location-url-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" value="<?= $venueEn['location_url'] ?>">

                                                </div>


                                                <div class="form-row">

                                                    <div class="form-group col-md-6">

                                                        <label for="event-date-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>">Event date</label>
                                                        <input type="text" class="form-control" name="event-date-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" id="event-date-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" value="<?= $venueEn['event_date'] ?>">

                                                    </div>
                                                    <div class="form-group col-md-6">

                                                        <label for="event-url-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>">Event URL</label>
                                                        <input type="text" class="form-control" name="event-url-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" id="event-url-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" value="<?= $venueEn['event_url'] ?>">

                                                    </div>

                                                </div>


                                                <div class="form-group">
                                                    <label for="tickets-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>">Tickets</label>
                                                    <textarea rows="8" class="form-control" name="tickets-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" id="tickets-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>"><?= $venueEn['tickets'] ?></textarea>
                                                </div>


                                                <div class="form-group">

                                                    <label for="venue-order-en<?= $venueEn['id'] ?>-<?= $show['id'] ?>">Venue ordering</label>
                                                    <input type="number" class="form-control" name="venue-order-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" id="venue-order-en-<?= $venueEn['id'] ?>-<?= $show['id'] ?>" value="<?= $venueEn['event_tabindex'] ?>">

                                                </div>




                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>

                            <button type="button" class="btn btn-outline-light w-100" data-toggle="modal" data-target="#venue-new-en-<?= $show['id'] ?>">Add venue</button>

                            <div class="modal fade" id="venue-new-en-<?= $show['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabelNew-en-<?= $show['id'] ?>" aria-hidden="true">

                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabelNew-en-<?= $show['id'] ?>">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">


                                            <div class="form-group">

                                                <label for="venue-name-new-en-<?= $show['id'] ?>">Venue name</label>
                                                <input type="text" class="form-control" name="venue-name-new-en-<?= $show['id'] ?>" id="venue-name-new-en-<?= $show['id'] ?>" value="">

                                            </div>
                                            <div class="form-group">

                                                <label for="venue-url-new-en-<?= $show['id'] ?>">Venue URL</label>
                                                <input type="text" class="form-control" name="venue-url-new-en-<?= $show['id'] ?>" id="venue-url-new-en-<?= $show['id'] ?>" value="">

                                            </div>


                                            <div class="form-row">

                                                <div class="form-group col-md-6">

                                                    <label for="venue-phone-new-en-<?= $show['id'] ?>">Venue telephone</label>
                                                    <input type="text" class="form-control" name="venue-phone-new-en-<?= $show['id'] ?>" id="venue-phone-new-en-<?= $show['id'] ?>" value="">

                                                </div>
                                                <div class="form-group col-md-6">

                                                    <label for="venue-phoneLink-new-en-<?= $show['id'] ?>">Venue telephone link</label>
                                                    <input type="text" class="form-control" name="venue-phoneLink-new-en-<?= $show['id'] ?>" id="venue-phoneLink-new-en-<?= $show['id'] ?>" value="">

                                                </div>

                                            </div>


                                            <div class="form-group">

                                                <label for=venue-location-new-en-<?= $show['id'] ?>"">Venue location</label>
                                                <input type="text" class="form-control" name="venue-location-new-en-<?= $show['id'] ?>" id="venue-location-new-en-<?= $show['id'] ?>" value="">

                                            </div>
                                            <div class="form-group">

                                                <label for="location-url-new-en-<?= $show['id'] ?>">Venue URL</label>
                                                <input type="text" class="form-control" name="location-url-new-en-<?= $show['id'] ?>" id="location-url-new-en-<?= $show['id'] ?>" value="">

                                            </div>


                                            <div class="form-row">

                                                <div class="form-group col-md-6">

                                                    <label for="event-date-new-en-<?= $show['id'] ?>">Event date</label>
                                                    <input type="text" class="form-control" name="event-date-new-en-<?= $show['id'] ?>" id="event-date-new-en-<?= $show['id'] ?>" value="">

                                                </div>
                                                <div class="form-group col-md-6">

                                                    <label for="event-url-new-en-<?= $show['id'] ?>">Event URL</label>
                                                    <input type="text" class="form-control" name="event-url-new-en-<?= $show['id'] ?>" id="event-url-new-en-<?= $show['id'] ?>" value="">

                                                </div>

                                            </div>


                                            <div class="form-group">
                                                <label for="tickets-new-en-<?= $show['id'] ?>">Tickets</label>
                                                <textarea rows="8" class="form-control" name="tickets-new-en-<?= $show['id'] ?>" id="tickets-new-en-<?= $show['id'] ?>"></textarea>
                                            </div>


                                            <div class="form-group">

                                                <label for="venue-order-new-en-<?= $show['id'] ?>">Venue ordering</label>
                                                <input type="number" class="form-control" name="venue-order-new-en-<?= $show['id'] ?>" id="venue-order-new-en-<?= $show['id'] ?>" value="">

                                            </div>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>





                        <div class="form-group col-md-6">


                            <div class="form-group mb-0">
                                <label>References</label>
                            </div>

                            <?php foreach ($referencesEn as $referenceEn): ?>

                                <div class="form-group">
                                    <button type="button" class="btn btn-outline-dark w-100" data-toggle="modal" data-target="#reference-en-<?= $referenceEn['id'] ?>"><?= $referenceEn['ref_title'] ?></button>
                                </div>

                                <div class="modal fade" id="reference-en-<?= $referenceEn['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel-en-<?= $referenceEn['id'] ?>" aria-hidden="true">

                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel-en-<?= $referenceEn['id'] ?>">Edit reference</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">



                                                <div class="form-group">

                                                    <label for="ref_title-en-<?= $referenceEn['id'] ?>">Reference title</label>
                                                    <textarea class="form-control" name="ref-title-en-<?= $referenceEn['id'] ?>" id="ref-title-en-<?= $referenceEn['id'] ?>"><?= $referenceEn['ref_title'] ?></textarea>

                                                </div>


                                                <?php if (strpos($referenceEn['ref_url'], 'http') === 0): ?>

                                                    <div class="form-group">

                                                        <label for="ref-url-en-<?= $referenceEn['id'] ?>">Reference URL</label>
                                                        <input type="text" class="form-control" name="ref-url-en-<?= $referenceEn['id'] ?>" id="ref-url-en-<?= $referenceEn['id'] ?>" value="<?= $referenceEn['ref_url'] ?>">

                                                    </div>


                                                <?php else: ?>

                                                    <div class="form-group">

                                                        <label class="ref-file" for="ref-url-en-<?= $referenceEn['id'] ?>">Upload pdf</label>
                                                        <input type="file" name="ref-url-en-<?= $referenceEn['id'] ?>" id="ref-url-en-<?= $referenceEn['id'] ?>">

                                                    </div>

                                                <?php endif; ?>


                                                <div class="form-group">

                                                    <label for="ref-order-en-<?= $referenceEn['id'] ?>">Reference ordering</label>
                                                    <input type="number" class="form-control" name="ref-order-en-<?= $referenceEn['id'] ?>" id="ref-order-en-<?= $referenceEn['id'] ?>" value="<?= $referenceEn['ref_tabindex'] ?>">

                                                </div>




                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <?php endforeach; ?>


                            <button type="button" class="btn btn-outline-light w-100" data-toggle="modal" data-target="#ref-new-en-<?= $show['id'] ?>">Add reference</button>

                            <div class="modal fade" id="ref-new-en-<?= $show['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabelNew-en-<?= $show['id'] ?>" aria-hidden="true">

                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabelNew-en-<?= $show['id'] ?>">Add new reference</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">



                                            <div class="form-group">

                                                <label for="ref_title-new-en-<?= $show['id'] ?>">Reference title</label>
                                                <textarea class="form-control" name="ref-title-new-en-<?= $show['id'] ?>" id="ref-title-new-en-<?= $show['id'] ?>"></textarea>

                                            </div>
                                            <div class="form-group">

                                                <label  class="ref-file" for="ref-url-new-en-<?= $show['id'] ?>">Upload pdf</label>
                                                <input type="file"  name="ref-url-new-en-<?= $show['id'] ?>" id="ref-url-new-en-<?= $show['id'] ?>">

                                            </div>

                                            <label>Or</label>

                                            <div class="form-group">

                                                <label for="ref-url-new-en-<?= $show['id'] ?>">Reference URL</label>
                                                <input type="text" class="form-control" name="ref-url-new-en-<?= $show['id'] ?>" id="ref-url-new-en-<?= $show['id'] ?>">

                                            </div>

                                            <div class="form-group">

                                                <label for="ref-order-new-en-<?= $show['id'] ?>">Reference ordering</label>
                                                <input type="number" class="form-control" name="ref-order-new-en-<?= $show['id'] ?>" id="ref-order-new-en-<?= $show['id'] ?>" value="">

                                            </div>




                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>


                    <div class="form-row">


                        <div class="form-group col-md-6">


                            <div class="form-group">
                                <label for="photo-copy-en-<?= $show['id'] ?>">Photos Copyrights</label>
                                <input type="text" class="form-control" name="photo-copy-en<?= $show['id'] ?>" id="photo-copy-en<?= $show['id'] ?>" value="<?= $photosCopyrightsEn[0]['name'] ?>">

                            </div>


                        </div>


                        <div class="form-group col-md-6">


                            <div class="form-group">
                                <label for="video-copy-en-<?= $show['id'] ?>">Video Copyrights</label>
                                <input type="text" class="form-control" name="video-copy-en-<?= $show['id'] ?>" id="video-copy-en-<?= $show['id'] ?>" value="<?= $videosCopyrightsEn[0]['name'] ?>">

                            </div>


                        </div>

                    </div>


                </div>

            </div>

                <div class="form-group">

                    <button type="submit" data-id="<?= $show['id'] ?>" name="update-btn-<?= $show['id'] ?>" id="update-btn-<?= $show['id'] ?>" class="btn btn-dark w-100 updateBtn">Update</button>

                </div>





            </form>

        </div>
        <?php endforeach; ?>

        <div class="tab-pane fade" id="v-pills-addNew" role="tabpanel" aria-labelledby="v-pills-addNew-tab">

            <h3>Globals</h3>

            <form class="mt-4" enctype="multipart/form-data">

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="permalink-new">Permalink</label>
                        <input type="text" class="form-control" name="permalink-new" id="permalink-new" value="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="html-id-new">Section-id</label>
                        <input type="text" class="form-control" name="html-id-new" id="html-id-new" value="">
                    </div>


                    <div class="form-group col-md-2">
                        <label for="date-new">Date</label>
                        <input type="text" class="form-control" name="date-new" id="date-new" value="">
                    </div>

                    <div class="form-group col-md-5">
                        <label for="facebook-new">Facebook</label>
                        <input type="text" class="form-control" name="facebook-new" id="facebook-new" value="">
                    </div>
                </div>


                <h5>Colors</h5>

                <div class="form-row justify-content-between">

                    <div class="form-group col-auto">
                        <label for="title-color-new">Title color</label>
                        <input type="text" class="form-control spectrum" name="title-color-new" id="title-color-new" value=">">
                    </div>

                    <div class="form-group col-auto">
                        <label for="shadow-color-new">Title shadow color</label>
                        <input type="text" class="form-control spectrum" name="shadow-color-new" id="shadow-color-new" value="">
                    </div>

                    <div class="form-group col-auto">
                        <label for="date-color-new">Date color</label>
                        <input type="text" class="form-control spectrum" name="date-color-new" id="date-color-new" value="#ff1493">
                    </div>

                    <div class="form-group col-auto">
                        <label for="subtitle-color-new">Subtitle color</label>
                        <input type="text" class="form-control spectrum" name="subtitle-color-new" id="subtitle-color-new" value="#444444">
                    </div>

                    <div class="form-group col-auto">
                        <label for="bg-color-new">Background</label>
                        <input type="text" class="form-control spectrum" name="bg-color-new" id="bg-color-new" value="">
                    </div>

                    <div class="form-group col-auto">
                        <label for="bg-footer-new">Footer background</label>
                        <input type="text" class="form-control spectrum" name="bg-footer-new" id="bg-footer-new" value="">
                    </div>

                    <div class="form-group col-auto">
                        <label for="blockquote-color-new">Intro paragraph color</label>
                        <input type="text" class="form-control spectrum" name="blockquote-color-new" id="blockquote-color-new" value="#222222">
                    </div>

                    <div class="form-group col-auto">
                        <label for="description-color-new">Description color</label>
                        <input type="text" class="form-control spectrum" name="description-color-new" id="description-color-new" value="#000000">
                    </div>


                    <div class="form-group col-auto">
                        <label for="tab-active-color-new">Tab active color</label>
                        <input type="text" class="form-control spectrum" name="tab-active-color-new" id="tab-active-color-new" value="#ff1493">
                    </div>

                    <div class="form-group col-auto">
                        <label for="tab-inactive-color-new">Tab inactive color</label>
                        <input type="text" class="form-control spectrum" name="tab-inactive-color-new" id="tab-inactive-color-new" value="#000000">
                    </div>

                    <div class="form-group col-auto-new">
                        <label for="icon-active-color">Icon inactive color</label>
                        <input type="text" class="form-control spectrum" name="icon-inactive-color-new" id="icon-inactive-color-new" value="rgba(255,255,255,0.8)	">
                    </div>

                    <div class="form-group col-auto">
                        <label for="icon-inactive-color-new">Tab border color</label>
                        <input type="text" class="form-control spectrum" name="tab-border-color-new" id="tab-border-color-new" value="#dddddd">
                    </div>

                    <div class="form-group col-auto">
                        <label for="thead-color-new">Table head color</label>
                        <input type="text" class="form-control spectrum" name="thead-color-new" id="thead-color-new" value="#111111">
                    </div>

                    <div class="form-group col-auto">
                        <label for="thead-hover-color-new">Table head hover color</label>
                        <input type="text" class="form-control spectrum" name="thead-hover-color-new" id="thead-hover-color-new" value="#ff1493">
                    </div>

                    <div class="form-group col-auto">
                        <label for="thead-border-color-new">Table head border color</label>
                        <input type="text" class="form-control spectrum" name="thead-border-color-new" id="thead-border-color-new" value="#ff1493">
                    </div>

                    <div class="form-group col-auto">
                        <label for="tbody-color-new">Table body color</label>
                        <input type="text" class="form-control spectrum" name="tbody-color-new" id="tbody-color-new" value="#000000">
                    </div>

                </div>



                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input activeCheck" type="checkbox" name="activeCheck-new" id="activeCheck-new" value="0">
                        <label class="form-check-label published-label" for="activeCheck-new">
                            Published
                        </label>
                    </div>
                </div>


                <h5 class="mt-4 mb-2">Photos</h5>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="thumbs-new">Upload thumbs</label>
                        <input type="file" name="thumbUpload[]" id="thumbs-new" multiple>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="originals-new">Upload full size</label>
                        <input type="file" name="originalUpload[]" id="originals-new" multiple>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="parallax-new">Change parallax</label>
                        <input type="file" name="parallax-new" id="parallax-new">
                    </div>

                </div>

                <h5 class="mb-2">Videos</h5>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="add-video-new">Add video</label>
                        <input type="text" class="form-control" name="add-video-new" id="add-video-new">
                    </div>

                </div>


                <h3 class="pt-3">Locals</h3>

                <nav>
                    <div class="nav nav-tabs mt-4" id="nav-tab" role="tablist">

                        <a class="nav-item nav-link active" id="nav-gr-addNew-tab" data-toggle="tab" href="#nav-gr-addNew>" role="tab" aria-controls="nav-gr-addNew" aria-selected="true">ΕΛ</a>
                        <a class="nav-item nav-link" id="nav-en-addNew-tab" data-toggle="tab" href="#nav-en-addNew" role="tab" aria-controls="nav-en-addNew" aria-selected="false">EN</a>

                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="nav-gr-addNew" role="tabpanel" aria-labelledby="nav-gr-addNew-tab">


                        <div class="form-row mt-4">
                            <div class="form-group col-md-7">
                                <label for="title-new">Title</label>
                                <input type="text" class="form-control" name="title-new" id="title-new" value="">
                            </div>



                            <div class="form-group col-md-5">
                                <label for="subtitle-new">Subtitle</label>
                                <input type="text" class="form-control" name="subtitle-new" id="subtitle-new" value="">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="blockquote-new">Intro paragraph</label>
                            <textarea rows="8" class="form-control" name="blockquote-new" id="blockquote-new"></textarea>
                        </div>



                        <div class="form-group">
                            <label for="description-new">Description</label>
                            <textarea rows="8" class="form-control" name="description-new" id="description-new"></textarea>
                        </div>



                        <div class="form-group">
                            <label for="staff-new">Staff</label>
                            <textarea rows="8" class="form-control" name="staff-new" id="staff-new"></textarea>
                        </div>


                    </div>



                    <div class="tab-pane fade" id="nav-en-addNew" role="tabpanel" aria-labelledby="nav-en-addNew-tab">


                        <div class="form-row mt-4">
                            <div class="form-group col-md-7">
                                <label for="title-en-new">Title</label>
                                <input type="text" class="form-control" name="title-en-new" id="title-en-new" value="">
                            </div>


                            <div class="form-group col-md-5">
                                <label for="subtitle-en-new">Subtitle</label>
                                <input type="text" class="form-control" name="subtitle-en-new" id="subtitle-en-new" value="">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="blockquote-en-new">Intro paragraph</label>
                            <textarea rows="8" class="form-control" name="blockquote-en-new" id="blockquote-en-new"></textarea>
                        </div>


                        <div class="form-group">
                            <label for="description-en-new">Description</label>
                            <textarea rows="8" class="form-control" name="description-en-new" id="description-en-new"></textarea>
                        </div>


                        <div class="form-group">
                            <label for="staff-en-new">Staff</label>
                            <textarea rows="8" class="form-control" name="staff-en-new" id="staff-en-new"></textarea>
                        </div>



                    </div>

                </div>

                    <div class="form-group">
                        <button type="submit" id="addNew-btn" class="btn btn-dark w-100">Add</button>

                    </div>


            </form>


        </div>

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


    $('#v-pills-tab nav-link').on('click', function () {


        var Tab = $('#v-pills-tabContent .tab-pane.fade');

        if (Tab.hasClass('active show')) {

            var activeTextarea = $('#v-pills-tabContent .tab-pane.fade.active.show textarea');

            tinymce.init({

                selector:activeTextarea,
                height: 300,
                plugins: [
                    'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                    'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                    'save table contextmenu directionality emoticons template paste textcolor'
                ],
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
                entity_encoding : 'raw'

            });


        }


    });



    $('#v-pills-tab').find('a.nav-link:first-child').addClass('active');
    $('#v-pills-tabContent').find('.tab-pane:first-child').addClass('show active');


    var tabShow = $('#v-pills-tabContent .tab-pane.active.show');



    tabShow.find('.spectrum').spectrum({
        showAlpha: true,
        showInput: true,
        className: "full-spectrum",
        showInitial: true,
        showPalette: true,
        showSelectionPalette: true,
        maxSelectionSize: 10,
        preferredFormat: "hex",
        localStorageKey: "spectrum.demo",
        move: function (color) {

        },
        show: function () {

        },
        beforeShow: function () {

        },
        hide: function () {

        },
        change: function() {

        },
        palette: [
            ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
                "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
            ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
                "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"],
            ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)",
                "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)",
                "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)",
                "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)",
                "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)",
                "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
                "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
                "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
                "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)",
                "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
        ]
    });


    // tinymce.init({
    //
    //     selector:'#v-pills-tabContent .tab-pane.active.show textarea',
    //     height: 300,
    //     plugins: [
    //         'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
    //         'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
    //         'save table contextmenu directionality emoticons template paste textcolor'
    //     ],
    //     toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
    //     entity_encoding : 'raw'
    //
    // });



    $('.nav-pills a').on('show.bs.tab', function(){

        var _this = $(this),
            tabId = _this.attr('href').replace('#', ''),
            tabActive = $('#' + tabId),
            spectrumElm = tabActive.find('.spectrum'),
            textareaElm = tabActive.find('textarea');
            textareaElm.addClass('textareaActive');



            spectrumElm.spectrum({
            showAlpha: true,
            showInput: true,
            className: "full-spectrum",
            showInitial: true,
            showPalette: true,
            showSelectionPalette: true,
            maxSelectionSize: 10,
            preferredFormat: "hex",
            localStorageKey: "spectrum.demo",
            move: function (color) {

            },
            show: function () {

            },
            beforeShow: function () {

            },
            hide: function () {

            },
            change: function() {

            },
            palette: [
                ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
                    "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
                ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
                    "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"],
                ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)",
                    "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)",
                    "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)",
                    "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)",
                    "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)",
                    "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
                    "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
                    "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
                    "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)",
                    "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
            ]
        });



        tinymce.init({

            selector: '.textareaActive',
            height: 300,
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'save table contextmenu directionality emoticons template paste textcolor'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
            entity_encoding : 'raw'

        });



    });








    $('#shows').on('click', '.activeCheck', function () {

        var _this = $(this);

        _this.attr('checked', false);

        if(_this.is(':checked')) {

            _this.val(1);
            _this.attr('checked', true);

        } else {

            _this.val(0);
            _this.attr('checked', false);
        }

    });


    $('.project-img').on('click', function () {

        var _this = $(this);

        if(_this.is(':checked')) {

            _this.attr('checked', true);

        } else {

            _this.attr('checked', false);
        }

    });




    $('.updateBtn').on('click', function (e) {

        e.preventDefault();

        var _this = $(this),
            showID = _this.attr('data-id'),
            form = _this.closest('form'),
            active = form.find('input[name="activeCheck-' + showID + '"]'),
            // deleteImg = form.find('input.project-img'),
            images = [],
            imgIds = [],
            thumbsName = [],
            thumbs = form.find('input[name="thumbUpload[]"]')[0].files,
            originalsName = [],
            originals = form.find('input[name="originalUpload[]"]')[0].files,
            i;



            // response = $('#response');

        $('.project-img:checked').each(function(i){
            images[i] = $(this).val();
            imgIds[i] = $(this).attr('id').replace('sm-', '');
        });


        for (i = 0; i < thumbs.length; i++)
        {
            thumbsName[i] = thumbs[i].name;
        }

        for (i = 0; i < originals.length; i++)
        {
            originalsName[i] = originals[i].name;
        }



        console.log(images);
        console.log(imgIds);
        console.log(thumbsName);
        console.log(originals);


        // response.append('<p>' + form.attr('id') + '</p><p> ActiveName: ' + active.attr('id') + ' - ActiveValue =' + active.val() + '</p><p> DeleteImg: ' + deleteImg.attr('id') + ' - ActiveValue =' + deleteImg.val() + '</p>');

        // form = $('form[data-id=' + showID + ']'),
        //     data = form.serializeArray();
        //
        // $.each(data, function (i, field) {
        //     $('#response').append(field.name + ":" + field.value + "<br />");
        //
        // });



    });



    // $('#thumbs-17').on('change', function () {
    //     var _this = $(this), thumbs = [];
    //     for (var i = 0; i < _this.files.length; ++i) {
    //         thumbs[i] = _this.files[i].name;
    //     }
    //     _this.val(thumbs);
    //     console.log(thumbs);
    // });



</script>

</body>

</html>
