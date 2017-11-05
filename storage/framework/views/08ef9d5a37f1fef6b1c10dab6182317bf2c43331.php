<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('post.create')); ?>">Nuevo Post</a>
    <?php if(session('ok')): ?>
        <div><?php echo e(session('ok')); ?></div>
    <?php elseif(session('error')): ?>
        <h2><?php echo e(session('error')); ?></h2>
    <?php endif; ?>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('post.teaser', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>