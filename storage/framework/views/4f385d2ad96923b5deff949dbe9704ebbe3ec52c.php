<?php $__env->startSection('content'); ?>

<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class=" mb-0 bc-title"><b><?php echo e(__('Create Sitemap')); ?></b> </h3>
                <a class="btn btn-primary  btn-sm" href="<?php echo e(route('admin.sitemap.index')); ?>"><i class="fas fa-chevron-left"></i> <?php echo e(__('Back')); ?></a>
                </div>
        </div>
    </div>

	<!-- Form -->
	<div class="row">

		<div class="col-xl-12 col-lg-12 col-md-12">

			<div class="card o-hidden border-0 shadow-lg">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row justify-content-center">
						<div class="col-lg-10">
							<div class="p-5">
								<form class="admin-form" action="<?php echo e(route('admin.sitemap.store')); ?>" method="POST"
									enctype="multipart/form-data">

                                    <?php echo csrf_field(); ?>

									<?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <input type="hidden" name="filename">

									<div class="form-group">
										<label for="sitemap_url"><?php echo e(__('Sitemap Url')); ?> *</label>

										<input type="text" name="sitemap_url" class="form-control" id="sitemap_url"
											placeholder="<?php echo e(__('Sitemap Url')); ?>" value="<?php echo e(old('sitemap_url')); ?>" required>
									</div>

									<div class="form-group text-center">
										<button type="submit" class="btn btn-secondary"><?php echo e(__('Submit')); ?></button>
									</div>

									<div>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Paquete-Express/resources/views/back/settings/sitemap/add.blade.php ENDPATH**/ ?>