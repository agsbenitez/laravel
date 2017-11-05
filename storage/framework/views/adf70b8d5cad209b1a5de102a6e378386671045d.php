<h2>
<a href="<?php echo e(route('post.show', [$post->id])); ?>">
    <?php echo e($post->title); ?>

</a>
</h2>
<div class="body">
    <?php echo e(Str::words($post->body, 20, '...')); ?>

</div>
<div class="date">
    <?php echo e($post->created_at); ?>

</div>
<div class="section">
    <span class="label">Seccion:</span>
    <a href="<?php echo e(route('section.show', [$post->section()->id])); ?>">
        <?php echo e($post->section()->section); ?>

    </a>
</div>
<div class="tags">
    <span class="label">Tags:</span>
    <?php $__currentLoopData = $post->tags(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('tag.show', [$tags->id])); ?>">
            <?php echo e($tags->tag); ?>

        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>