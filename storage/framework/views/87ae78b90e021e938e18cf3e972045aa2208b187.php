<?php $__env->startSection('content'); ?>

<div class="container-fluid">

	<!-- Code Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class=" mb-0 bc-title"><b><?php echo e(__('Update Coupon')); ?></b> </h3>
                <a class="btn btn-primary btn-sm" href="<?php echo e(route('back.code.index')); ?>"><i class="fas fa-chevron-left"></i> <?php echo e(__('Back')); ?></a>
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
                            <form class="admin-form" action="<?php echo e(route('back.code.update',$code->id)); ?>"
                                method="POST" enctype="multipart/form-data">

                                <?php echo csrf_field(); ?>

                                <?php echo method_field('PUT'); ?>

                                <?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <div class="form-group">
                                    <label for="title"><?php echo e(__('Title')); ?> *</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        placeholder="<?php echo e(__('Enter Title')); ?>" value="<?php echo e($code->title); ?>" >
                                </div>

                                <div class="form-group">
                                    <label for="code"><?php echo e(__('Code')); ?> *</label>
                                    <input type="text" name="code_name" class="form-control" id="code"
                                        placeholder="<?php echo e(__('Enter Code')); ?>" value="<?php echo e($code->code_name); ?>" >
                                </div>

                                <div class="form-group">
                                    <label for="no_of_times"><?php echo e(__('Number Of Times')); ?> *</label>
                                    <input type="number" name="no_of_times" class="form-control" id="no_of_times"
                                        placeholder="<?php echo e(__('Enter Number Of Times')); ?>" value="<?php echo e($code->no_of_times); ?>" min="1" >
                                </div>

                                
                                <div class="form-group">
                                    <label for="discount"><?php echo e(__('Discount')); ?>

                                        *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <select name="type" class="form-control">
                                                    <option value="percentage" <?php echo e($code->type == 'percentage' ? 'selected' : ''); ?>><?php echo e(__('Percentage')); ?> (%)</option>
                                                    <option value="amount" <?php echo e($code->type == 'amount' ? 'selected' : ''); ?>><?php echo e(__('Amount')); ?> (<?php echo e(PriceHelper::adminCurrency()); ?>)</option>
                                                </select>
                                            </span>
                                        </div>
                                        <input type="number" id="discount"
                                            name="discount" class="form-control"
                                            placeholder="<?php echo e(__('Enter Discount')); ?>"
                                            min="0" step="0.1"
                                            value="<?php echo e($code->type == 'amount' ? round($code->discount / $curr->value,2) : $code->discount); ?>" >
                                    </div>
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

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Paquete-Express/resources/views/back/code/edit.blade.php ENDPATH**/ ?>