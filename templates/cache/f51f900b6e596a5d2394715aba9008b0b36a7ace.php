<?php $__env->startSection('content'); ?>
	<div class="container">
		<?php echo $__env->make('home.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('home.nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('home.jumbo-tron', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('home.test2', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>

	<?php echo $__env->make('home.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('home.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>