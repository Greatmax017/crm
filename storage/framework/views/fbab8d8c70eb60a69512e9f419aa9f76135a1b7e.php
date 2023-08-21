<!DOCTYPE html>
<!--
Template Name: Letz - Laravel Admin Dashboard Starter Kit
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale()), false); ?>">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="<?php echo e(asset('dist/images/logo.svg'), false); ?>" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Letz admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Letz admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">

    <?php echo $__env->yieldContent('head'); ?>

    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="<?php echo e(mix('dist/css/app.css'), false); ?>" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<?php echo $__env->yieldContent('body'); ?>

</html>