<?php $__env->startSection('body'); ?>
    <body class="login loading">
        <div id="app">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <!-- BEGIN: JS Assets-->
        <script src="<?php echo e(mix('dist/js/app.js'), false); ?>"></script>
        <script src="<?php echo e(mix('dist/js/libs.js'), false); ?>"></script>
        <!-- END: JS Assets-->
    </body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layout/base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>