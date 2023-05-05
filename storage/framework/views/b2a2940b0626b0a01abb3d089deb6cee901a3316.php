<?php $__env->startSection('content'); ?>

<!-- Start of Main Content -->
<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="d-sm-flex align-items-center justify-content-between">
        <h5 class=" mb-0 text-gray-800 pl-3"><?php echo e(__('Manage Features')); ?></h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('back.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
            <li class="breadcrumb-item"><a href="#"><?php echo e(__('Notifications List')); ?></a></li>
        </ol>
        </div>
    </div>


	<div class="card shadow mb-4">
		<div class="card-body">
			<?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="d-block text-right">
                <a class="btn  btn-primary btn-sm py-1" data-href="<?php echo e(route('back.notifications.clear')); ?>" href="javascript:;">
                    <small><?php echo e(__('Clear All')); ?></small>
                </a>
            </div>
            <?php $__empty_1 = true; $__currentLoopData = App\Models\Notification::orderby('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if($notf->user_id != null): ?>
                <div class="d-flex align-items-center">
                    <a class="btn btn-sm" href="<?php echo e(route('back.notification.delete',$notf->id)); ?>">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('back.user.show',$notf->user_id)); ?>">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                        <i class="fas fa-user text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500"><?php echo e($notf->created_at->diffForHumans()); ?></div>
                        <?php echo e(__('A new user has registered.')); ?>

                    </div>
                    </a>
                </div>
                <br>
            <?php endif; ?>
            <?php if($notf->order_id != null): ?>
                <div class="d-flex align-items-center">
                    <a class="btn btn-sm" href="<?php echo e(route('back.notification.delete',$notf->id)); ?>">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('back.order.invoice',$notf->order_id)); ?>">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                        <i class="fas fa-donate text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500"><?php echo e($notf->created_at->diffForHumans()); ?></div>
                        <?php echo e(__('You have recieved a new order.')); ?>

                    </div>
                    </a>
                </div>
                <br>
            <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p><?php echo e(__('No Notifications')); ?></p>
            <?php endif; ?>
		</div>
	</div>

</div>

</div>
<!-- End of Main Content -->



  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

		<!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Confirm Delete?')); ?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
		</div>

		<!-- Modal Body -->
        <div class="modal-body">
			<?php echo e(__('You are going to delete this feature. All contents related with this feature will be lost.')); ?> <?php echo e(__('Do you want to delete it?')); ?>

		</div>

		<!-- Modal footer -->
        <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
			<form action="" class="d-inline btn-ok" method="POST">

                <?php echo csrf_field(); ?>

                <?php echo method_field('DELETE'); ?>

                <button type="submit" class="btn btn-danger"><?php echo e(__('Delete')); ?></button>

			</form>
		</div>

      </div>
    </div>
  </div>



<?php $__env->stopSection(); ?>




<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Paquete-Express/resources/views/back/notification/notification.blade.php ENDPATH**/ ?>