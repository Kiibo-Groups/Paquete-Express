<?php $__env->startSection('meta'); ?>
<meta name="keywords" content="<?php echo e($setting->meta_keywords); ?>">
<meta name="description" content="<?php echo e($setting->meta_description); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('FAQ')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo e((route('front.index'))); ?>"><?php echo e(__('Home')); ?></a> </li>
                    <li class="separator">&nbsp;</li>
                    <li><?php echo e(__('FAQ')); ?></li>
                  </ul>
            </div>
        </div>
    </div>
  </div>
  <!-- Page Content-->
  <div class="container pt-3 pb-3">
    <div class="row pb-4">
        <?php $__currentLoopData = $fcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6">
                <a href="<?php echo e(route('front.faq.details',$category->slug)); ?>" class="card mb-4 faq-box">
                    <div class="card-body">
                        <h6 class="card-title"><?php echo e($category->name); ?></h6>
                        <p class="card-text"><?php echo e($category->text); ?></p>
                        <span class="text-sm text-muted link"><?php echo e(__('View Details')); ?> <i class="icon-chevron-right"></i></span>
                    </div>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Paquete-Express/resources/views/front/faq/index.blade.php ENDPATH**/ ?>