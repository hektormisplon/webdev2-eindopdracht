<?php $__env->startSection('title', 'Creunite'); ?>
<?php $__env->startSection('content'); ?>
    <div class="flex-center position-ref full-height">
        <ul>
            <?php $__currentLoopData = $titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($title); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php if(Route::has('login')): ?>
            <div class="top-right links">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(url('/home')); ?>">Home</a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>">Login</a>
                    <?php if(Route::has('register')): ?>
                        <a href="<?php echo e(route('register')); ?>">Register</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>
            <div class="links">
                <a href="/contact">Contact</a>
                <a href="/about">About</a>
            </div>
        </div>
    </div>
</html>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/h/my_app/resources/views/welcome.blade.php ENDPATH**/ ?>