<?php $__env->startSection('content'); ?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="card mb-4">
    <div class="card-body">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class=" mb-0 bc-title"><b><?php echo e(__('Language')); ?></b> </h3>
            <a class="btn btn-primary btn-sm" href="<?php echo e(route('back.language.index')); ?>"><i class="fas fa-chevron-left"></i> <?php echo e(__('Back')); ?></a>
            </div>
    </div>
</div>

  <!-- Content Row -->

  <div class="row">

    <div class="col-xl-12 col-lg-12">


        <form class="geniusform" action="<?php echo e(route('back.language.update',$data->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input type="hidden"  name="language" value="<?php echo e($data->language); ?>">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Set Language Name')); ?> </h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Language Name *</label>
                        <input type="text" class="form-control"  name="language" value="<?php echo e($data->language); ?>"
                            placeholder="<?php echo e(__('Enter Language Name')); ?>">

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary"><?php echo e(__('Submit')); ?></button>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Set Keywords & Values of : ')); ?> <?php echo e($data->language); ?></h6>
                </div>
                <div class="card-body p-4">
                    <div class="gd-responsive-table">
                        <table class="table table table-bordered">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Key')); ?></th>
                                    <th><?php echo e(__('Value')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody class="new-field">
                                <?php $__currentLoopData = $lang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="keys[]" value="<?php echo e($key); ?>">
                                    </td>
                                    <td><input type="text" class="form-control" name="values[]" value="<?php echo e($val); ?>"></td>
                                    <td>
                                        <div class="delete_language_field">
                                        <button class="btn btn-danger btn-sm"> <i class="fas fa-trash "></i></button>
                                    </div></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

               
                    <div class="row justify-content-center mt-4">
                      <button type="button" class="btn btn-secondary" id="add_more_language"><i class="fas fa-plus"> </i> <?php echo e(__('Add More')); ?></button>
                    </div>
                    <div class="row justify-content-center mt-4">
                      <button type="submit" class="btn btn-secondary"><?php echo e(__('Submit')); ?></button>
                    </div>

                </div>
            </div>
        </form>

    </div>

  </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Paquete-Express/resources/views/back/language/edit.blade.php ENDPATH**/ ?>