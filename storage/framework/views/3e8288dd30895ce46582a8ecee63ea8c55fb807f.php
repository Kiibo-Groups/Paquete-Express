<?php $__env->startSection('content'); ?>

<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b><?php echo e(__('Update User')); ?></b> </h3>
                <a class="btn btn-primary btn-sm" href="<?php echo e(route('back.staff.index')); ?>"><i class="fas fa-chevron-left"></i> <?php echo e(__('Back')); ?></a>
                </div>
        </div>
    </div>

	<div class="row">

		<div class="col-xl-12 col-lg-12 col-md-12">

			<div class="card o-hidden border-0 shadow-lg">
				<div class="card-body ">
					<!-- Nested Row within Card Body -->
					<div class="row justify-content-center">
						<div class="col-lg-12">
                                <form class="admin-form" action="<?php echo e(route('back.staff.update',$admin->id)); ?>" method="POST" enctype="multipart/form-data">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>

									<?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

									<div class="form-group">
										<label for="name"><?php echo e(__('Current Image')); ?></label>
										<br>
											<img class="admin-img"
												src="<?php echo e($admin->photo ? asset('assets/images/'.$admin->photo) : asset('assets/images/placeholder.png')); ?>"
												alt="No Image Found">
										<br>
										<span class="mt-1"><?php echo e(__('Image Size Should Be 70 x 70.')); ?></span>
									</div>

									<div class="form-group position-relative ">
										<label class="file">
											<input type="file"  accept="image/*"  class="upload-photo" name="photo" id="file" aria-label="File browser example">
											<span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
										</label>
									</div>
									<div class="form-group">
										<label for="name"><?php echo e(__('User Name')); ?> *</label>
										<input type="text" name="name" class="form-control" id="name" placeholder="<?php echo e(__('User Name')); ?>"
											value="<?php echo e($admin->name); ?>" >
									</div>


									<div class="form-group">
										<label for="email"><?php echo e(__('Email Address')); ?> *</label>
										<input type="email" name="email" class="form-control" id="email"
											placeholder="<?php echo e(__('Email Address')); ?>" value="<?php echo e($admin->email); ?>" >
									</div>

									<div class="form-group">
										<label for="phone"><?php echo e(__('Phone Number')); ?> *</label>
										<input type="text" name="phone" class="form-control" id="phone"
											placeholder="<?php echo e(__('Phone Number')); ?>" value="<?php echo e($admin->phone); ?>" >
									</div>

									<div class="form-group">
										<label for="role_id"><?php echo e(__('Select Role')); ?> *</label>
										<select name="role_id" id="role_id" class="form-control" >
											<?php $__currentLoopData = DB::table('roles')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($role->id); ?>" <?php echo e($admin->role_id == $role->id ? 'selected' : ''); ?> ><?php echo e($role->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-secondary "><?php echo e(__('Submit')); ?></button>
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Paquete-Express/resources/views/back/staff/edit.blade.php ENDPATH**/ ?>