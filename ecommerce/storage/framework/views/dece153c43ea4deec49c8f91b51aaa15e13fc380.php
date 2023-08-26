<?php $__env->startSection('title'); ?>
    <?php echo e(__('Orders')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                    <li class="separator"></li>
                    <li><?php echo e(__('Orders')); ?></li>
                 </ul>
            </div>
        </div>
    </div>
 </div>
 <!-- Page Content-->
 <div class="container padding-bottom-3x mb-1">
    <div class="row">
       <?php echo $__env->make('includes.user_sitebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
        <div class="u-table-res">
          <table class="table table-bordered mb-0">
            <thead>
              <tr>
                <th><?php echo e(__('Order')); ?> #</th>
                <th><?php echo e(__('Total')); ?></th>
                <th><?php echo e(__('Order Status')); ?></th>
                <th><?php echo e(__('Payment Status')); ?></th>
                <th><?php echo e(__('Date Purchased')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
              </tr>
            </thead>
            <tbody>
             <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <tr>
              <td><a class="navi-link" href="#" data-toggle="modal" data-target="#orderDetails"><?php echo e($order->transaction_number); ?></a></td>
              <td>
                <?php if($setting->currency_direction == 1): ?>
                <?php echo e($order->currency_sign); ?><?php echo e(PriceHelper::OrderTotal($order)); ?>

                <?php else: ?>
                <?php echo e(PriceHelper::OrderTotal($order)); ?><?php echo e($order->currency_sign); ?>

                <?php endif; ?>

              </td>
              <td>
                <?php if($order->order_status == 'Pending'): ?>
                <span class="text-info"><?php echo e($order->order_status); ?></span>
                <?php elseif($order->order_status == 'In Progress'): ?>
                <span class="text-warning"><?php echo e($order->order_status); ?></span>
                <?php elseif($order->order_status == 'Delivered'): ?>
                <span class="text-success">	<?php echo e($order->order_status); ?></span>
                <?php else: ?>
                <span class="text-danger"><?php echo e(__('Canceled')); ?></span>
                <?php endif; ?>
              </td>
              <td>
                <?php if($order->payment_status == 'Paid'): ?>
                <span class="text-success"><?php echo e($order->payment_status); ?></span>
                <?php else: ?>
                <span class="text-danger"><?php echo e($order->payment_status); ?></span>
                <?php endif; ?>
              </td>

              <td><?php echo e($order->created_at->format('D/M/Y')); ?></td>
              <td>
                  <a href="<?php echo e(route('user.order.invoice',$order->id)); ?>" class="btn btn-info btn-sm"><?php echo e(__('Invoice')); ?></a>
              </td>
            </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
            </div>
        </div>

      </div>
    </div>
 </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Paquete-Express/resources/views/user/order/index.blade.php ENDPATH**/ ?>