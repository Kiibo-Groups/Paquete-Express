<?php $__env->startSection('content'); ?>

<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
       <div class="card-body">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class=" mb-0 "><b><?php echo e(__('Edit Service')); ?></b></h3>
            <a class="btn btn-primary btn-sm" href="<?php echo e(route('back.service.index')); ?>"><i class="fas fa-chevron-left"></i> <?php echo e(__('Back')); ?></a>
            </div>
       </div>
    </div>

	<!-- Form -->
	<div class="row">

		<div class="col-xl-12 col-lg-12 col-md-12">

			<div class="card o-hidden border-0 shadow-lg">
				<div class="card-body ">
					<!-- Nested Row within Card Body -->
					<div class="row justify-content-center">
						<div class="col-lg-12">
								<form class="admin-form" action="<?php echo e(route('back.service.update',$service->id)); ?>"
									method="POST" enctype="multipart/form-data">

                                    <?php echo csrf_field(); ?>

                                    <?php echo method_field('PUT'); ?>

									<?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

									<div class="form-group">
										<label for="name"><?php echo e(__('Current Image')); ?> *</label>
										<br>
											<img class="admin-img"
												src="<?php echo e($service->photo ? asset('assets/images/'.$service->photo) : asset('assets/images/placeholder.png')); ?>"
												alt="No Image Found">
										<br>
										<span class="mt-1"><?php echo e(__('Image Size Should Be 65 x 65.')); ?></span>
									</div>

									<div class="form-group position-relative ">
										<label class="file">
											<input type="file"  accept="image/*"  class="upload-photo" name="photo" id="file"
												aria-label="File browser example">
											<span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
										</label>
									</div>
									<div class="form-group">
										<label for="title"><?php echo e(__('Title')); ?> *</label>
										<input type="text" name="title" class="form-control" id="title"
											placeholder="<?php echo e(__('Enter Title')); ?>" value="<?php echo e($service->title); ?>" >
									</div>


									<div class="form-group">
										<label for="details"><?php echo e(__('Details')); ?> *</label>
										<textarea name="details" id="details" class="form-control" rows="5"
											placeholder="<?php echo e(__('Enter Details')); ?>"
											><?php echo e($service->details); ?></textarea>
									</div>


								<div class="form-group">
										<button type="submit"
											class="btn btn-secondary "><?php echo e(__('Submit')); ?></button>
									</div>
								</form>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kiibo_pv\core\resources\views/back/service/edit.blade.php ENDPATH**/ ?>