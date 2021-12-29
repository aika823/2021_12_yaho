<?php
# Include header
include_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
include_once(ROOT . "/admin/common/check_session.php");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- Head -->
    <?php include_once('./common/head.php'); ?>
</head>

<body>
    <!-- Left Panel -->
    <?php include_once('./common/navbar.php'); ?>

    <!-- Right Panel -->
    <?php include_once('./detail_form_main.php') ?>

    <!-- Javascripts -->
    <script src="./vendors/jquery/dist/jquery.min.js"></script>
    <script src="./vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="./vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="./vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>
    <script src="./vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/input_media.js"></script>
</body>

</html>