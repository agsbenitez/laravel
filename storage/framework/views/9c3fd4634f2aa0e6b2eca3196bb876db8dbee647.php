<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Mega Blog</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-right links">
        <a href="<?php echo e(route('home')); ?>">Home</a>
        <a href="<?php echo e(route('section.index')); ?>">Sections</a>
        <a href="<?php echo e(route('tag.index')); ?>">Tags</a>
        <?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(url('/admin/posts')); ?>">Edit Posts</a>
            <a href="<?php echo e(url('/admin/sections')); ?>">Edit Sections</a>
            <a href="<?php echo e(url('/admin/tags')); ?>">Edit Tags</a>
            <a href="">Logout</a>
            <?php else: ?>
                <a href="">Login</a>
                <?php endif; ?>
    </div>

    <div class="content">
        <h1 class="title m-b-md">
            <?php $__env->startSection('title'); ?>
                Mi Mega Blog
            <?php echo $__env->yieldSection(); ?>
        </h1>

        <?php $__env->startSection('content'); ?>
            Welcome! :)
        <?php echo $__env->yieldSection(); ?>
    </div>
</div>
</body>
</html>
