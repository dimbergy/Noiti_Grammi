<?php

include ('config.php');
include ('database/dbh.database.php');
include ('database/productions.database.php');
include ('database/pages.database.php');
include ('database/subposts.database.php');
include ('database/media.database.php');
include ('database/links.database.php');
include ('database/references.database.php');
include ('database/parallax.database.php');
include ('database/country.database.php');
$pageID = 1;

?>

<!DOCTYPE html>
<html lang="<?= $lang ?>" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= $lang ?>">

<?php

include ('inc/header.php');

$projects = $productions->getAllProductions($langID);
$introSection = $pages->getIntroSection($langID);
$currentSection = $pages->getComingSoonSection($langID);
$productionsSection = $pages->getProductionsSection($langID);
$productionsMasonry = $media->getProductionsMasonry();
$productionsSubsections = $subposts->getProductionsSubposts($langID);
$aboutSection = $pages->getAboutSection($langID);
$aboutSubsections = $subposts->getAboutSubposts($langID);
$aboutRefs = $references->getAboutReferences($langID);
$linksSection = $pages->getLinksSection($langID);
$ulinks = $links-> getLinks($langID);
$contactSection = $pages->getContactSection($langID);
$parallaxSections = $parallax->getParallax($langID);
$countries = $country->getAllCountries();
$modals = $media->getModalPhotos($langID);

?>

<body id="page-top" data-spy="scroll" data-target="navbar-custom">

<?php include ('inc/_section_particles-test.php'); ?>

<?php include ('inc/navigation.php'); ?>

<?php include ('inc/_section_coming_soon-test.php'); ?>

<?php include ('inc/_section_productions-test.php'); ?>

<?php include ('inc/_section_about-test.php'); ?>

<?php include ('inc/_section_links-test.php'); ?>

<?php include ('inc/_section_contact-test.php'); ?>

<?php include ('inc/footer.php'); ?>

<?php include ('inc/js_scripts.php'); ?>


</body>

</html>