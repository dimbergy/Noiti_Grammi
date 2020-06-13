<?php

include ('config.php');
include ('database/dbh.database.php');
include ('database/productions.database.php');
include ('database/media.database.php');
include ('database/references.database.php');
include ('database/venues.database.php');
include ('database/copyrights.database.php');
include ('database/parallax.database.php');

$pageID = 2;

$projects = $productions->getAllProductions($langID);

?>

<!DOCTYPE html>
<html lang="<?= $lang ?>" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= $lang ?>">

<?php include ('inc/header.php'); ?>

<body id="page-top" data-spy="scroll" data-target="navbar-custom">

<?php include ('inc/navigation.php'); ?>

<?php  include ('inc/_all_productions.php'); ?>

<?php include ('inc/footer.php'); ?>

<?php include ('inc/js_scripts.php'); ?>

</body>

</html>