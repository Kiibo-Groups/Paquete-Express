
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Order Track')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-title">
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
            <ul class="breadcrumbs">
                <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                <li class="separator"></li>
                <li><?php echo e(__('Track Order')); ?></li>
              </ul>
          </div>
      </div>
    </div>
  </div>
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input class="form-control" type="text" id="order_number" name="order_number" placeholder="<?php echo e(__('Order Number')); ?>">
                            <span class="input-group-addon"><i class="icon-map-pin"></i></span>
                        </div>
                    </div>
                    <div class="col-sm-3 mt-4 mt-sm-0">
                        <button class="btn btn-primary btn-block mt-0" id="submit_number"  data-href="<?php echo e(route('front.order.track.submit')); ?>" type="submit"><span><?php echo e(__('Track Now')); ?></span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-4">
            <div class="col-lg-12">
                <div id="track-order">

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Paquete-Express\ecommerce\resources\views/front/track_order.blade.php ENDPATH**/ ?>