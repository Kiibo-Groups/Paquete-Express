<?php $__env->startSection('content'); ?>

<!-- Start of Main Content -->
<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b><?php echo e(__('Manage Tickets')); ?></b></h3>
                <a class="btn btn-primary btn-sm" href="<?php echo e(route('back.ticket.create')); ?>"><i class="fas fa-plus"></i> <?php echo e(__('Add')); ?></a>
                </div>
        </div>
    </div>

    <input type="hidden" id="tickets_url" value="<?php echo e(route('back.ticket.index')); ?>">

	<!-- DataTales -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="form-check">
                <h4 class="mb-2"><b><?php echo e(__('Filter by type :')); ?></b></h4><br>
                <label class="form-radio-label mx-3">
                    <input class="form-radio-input tickets_sort" type="radio" name="optionsRadios" value="" <?php echo e(request()->input('type') == '' ? 'checked' : ''); ?>>
                    <span class="form-radio-sign"><?php echo e(__('All Tickets')); ?></span>
                </label>
                <label class="form-radio-label mx-3">
                    <input class="form-radio-input tickets_sort" type="radio" name="optionsRadios" value="Pending" <?php echo e(request()->input('type') == 'Pending' ? 'checked' : ''); ?>>
                    <span class="form-radio-sign"><?php echo e(__('Pending Tickets')); ?></span>
                </label>
                <label class="form-radio-label mx-3">
                    <input class="form-radio-input tickets_sort" type="radio" name="optionsRadios" value="Open" <?php echo e(request()->input('type') == 'Open' ? 'checked' : ''); ?>>
                    <span class="form-radio-sign"><?php echo e(__('Open Tickets')); ?></span>
                </label>
                <label class="form-radio-label mx-3">
                    <input class="form-radio-input tickets_sort" type="radio" name="optionsRadios" value="Closed" <?php echo e(request()->input('type') == 'Closed' ? 'checked' : ''); ?>>
                    <span class="form-radio-sign "><?php echo e(__('Closed Tickets')); ?></span>
                </label>

            </div>
            <br>
			<div class="gd-responsive-table">
				<table class="table table-bordered table-striped" id="admin-table" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="15%"><?php echo e(__('User Name')); ?></th>
							<th width="10%"><?php echo e(__('Status')); ?></th>
							<th width="15%"><?php echo e(__('Last Reply')); ?></th>
							<th width="15%"><?php echo e(__('Actions')); ?></th>
						</tr>
					</thead>

					<tbody>
                        <?php echo $__env->make('back.ticket.table',compact('datas'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</tbody>

				</table>
			</div>
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
			<?php echo e(__('You are going to delete this Ticket. All contents related with this ticket will be lost.')); ?> <?php echo e(__('Do you want to delete it?')); ?>

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

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Paquete-Express/resources/views/back/ticket/index.blade.php ENDPATH**/ ?>