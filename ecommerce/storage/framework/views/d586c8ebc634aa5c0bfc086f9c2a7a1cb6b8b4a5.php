<?php $__env->startSection('content'); ?>

<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b><?php echo e(__('Edit Ticket')); ?></b> </h3>
                <a class="btn btn-primary btn-sm" href="<?php echo e(route('back.ticket.index')); ?>"><i class="fas fa-chevron-left"></i> <?php echo e(__('Back')); ?></a>
                </div>
        </div>
    </div>

	<!-- Form -->
	<div class="row">

		<div class="col-xl-12 col-lg-12 col-md-12">

			<div class="card ">
				<div class="card-body">
					<!-- Nested Row within Card Body -->
					<div class="row justify-content-center">
						<div class="col-lg-12">
								<form class="admin-form" action="<?php echo e(route('back.ticket.update',$ticket->id)); ?>" method="POST"
									enctype="multipart/form-data">
                                    <?php echo method_field('PUT'); ?>
                                    <?php echo csrf_field(); ?>

									<?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <div class="mb-2">
                                        <div class="card">
                                            <div class="card-body d-flex flex-row justify-content-between ">
                                                <h4><span class="badge badge-primary text-white mr-2"><?php echo e($ticket->status); ?></span> <?php echo e(__('Subject :')); ?> <?php echo e($ticket->subject); ?></h4>

                                                <div>
                                                    <?php if($ticket->file): ?>
                                                <a href="<?php echo e(asset('assets/files/'.$ticket->file)); ?>" title="Download" class="btn btn-primary btn-sm" download> <?php echo e(__('Attachment')); ?></a>
                                                <?php endif; ?>
                                                <?php if($ticket->status != 'Closed'): ?>
                                                <a href="<?php echo e(route('back.ticket.status',$ticket->id)); ?>" class="btn btn-primary btn-sm"><?php echo e(__('Ticket Close')); ?></a>
                                                <?php else: ?>
                                                    <span class="btn btn-danger btn-sm text-white"><?php echo e(__('Closed')); ?></span>
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <?php if($ticket->messages->count() > 0): ?>
                                    <?php $__currentLoopData = $ticket->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($message->user_id == 0): ?>
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="width-100 mr-3" >
                                                        <?php echo e(__('Admin')); ?>

                                                    </div>
                                                    <div class="media-body">
                                                        <h6><?php echo e(__('Posted on')); ?> <?php echo e(\Carbon\Carbon::parse($message->created_at)->diffForHumans()); ?></h6>
                                                        <p><?php echo e($message->message); ?></p>
                                                    </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <?php else: ?>
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="width-100 mr-3" >
                                                        <?php echo e($ticket->user->first_name); ?>

                                                    </div>
                                                    <div class="media-body">
                                                        <h6><?php echo e(__('Posted on')); ?> <?php echo e(\Carbon\Carbon::parse($message->created_at)->diffForHumans()); ?></h6>
                                                        <p><?php echo e($message->message); ?></p>
                                                    </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                        <input type="hidden" value="<?php echo e($ticket->id); ?>" name="ticket_id">
                                        <?php if($ticket->status != 'Closed'): ?>
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label for="inputMessage"><?php echo e(__('Message')); ?></label>
                                                <textarea name="message" class="form-control"  id="inputMessage" placeholder="<?php echo e(__('Message')); ?>" rows="6"></textarea>
                                            </div>
                                        </div>

                                        <div class=" mt-3">
                                            <button class="btn btn-primary" type="submit"><?php echo e(__('Reply')); ?></button>
                                        </div>
                                        <?php endif; ?>



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

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Paquete-Express/resources/views/back/ticket/edit.blade.php ENDPATH**/ ?>