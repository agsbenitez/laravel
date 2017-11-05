<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('post.store')); ?>" method="post">
        <p>
            <label for="titulo">Titulo</label>
                <input type="text" name="title">
            <label for="cuerpo">Body</label>
            <textarea name="body"></textarea>
            <label for="seccion">Seccion</label>
            <select name="section">
                <?php $__currentLoopData = $secciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value=<?php echo e($section->id); ?>><?php echo e($section['section']); ?>-</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <input type="submit" value="Guardar">

            <?php echo e(csrf_field()); ?>

        </p>


    </form>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>