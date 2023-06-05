<?php $__env->startSection('meta'); ?>
<meta name="keywords" content="<?php echo e($category->meta_keywords); ?>">
<meta name="description" content="<?php echo e($category->meta_descriptions); ?>">
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
                    <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a>
                    </li>
                    <li class="separator">&nbsp;</li>
                    <li><a href="<?php echo e(route('front.faq')); ?>"><?php echo e(__('FAQ')); ?></a>
                    </li>
                    <li class="separator">&nbsp;</li>
                    <li><?php echo e($category->name); ?></li>
                  </ul>
            </div>
        </div>
    </div>
  </div>
  <!-- Page Content-->
  <div class="container padding-bottom-1x mb-3">
      <?php $__currentLoopData = $category->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="accordion" id="accordion1">
        <div class="card accordion-item mb-4">
            <div class="card-header accordion-header" id="heading<?php echo e($key); ?>">
              <h6 class="accordion-button">
                  <a href="#collapse<?php echo e($key); ?>" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($key); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($key); ?>"><?php echo e($faq->title); ?></a>
                </h6>
            </div>
            <div id="collapse<?php echo e($key); ?>" class="accordion-collapse collapse"  aria-labelledby="heading<?php echo e($key); ?>" data-bs-parent="#accordion1">
              <div class="card-body"><?php echo e($faq->details); ?></div>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Paquete-Express/resources/views/front/faq/show.blade.php ENDPATH**/ ?>