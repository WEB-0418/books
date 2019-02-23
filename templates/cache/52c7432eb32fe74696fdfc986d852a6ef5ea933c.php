<div class="nav-scroller py-1 mb-2">
	<nav class="nav d-flex justify-content-between">

		<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<a class="p-2 text-muted" href="#"><?php echo e($category->name); ?></a>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	</nav>
</div>