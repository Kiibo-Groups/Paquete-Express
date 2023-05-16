<?php $__env->startSection('title'); ?>
    <?php echo e(__('Payment')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
    <div class="page-title">
        <div class="container">
            <div class="column">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                    <li class="separator"></li>
                    <li><?php echo e(__('Review your order and pay')); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-1  checkut-page">
        <div class="row">
            <!-- Payment Methode-->
            <div class="col-xl-9 col-lg-8">
                <div class="steps flex-sm-nowrap mb-5"> <a class="step" href="<?php echo e(route('front.checkout.billing')); ?>">
                        <h4 class="step-title"><i class="icon-check-circle"></i>1. <?php echo e(__('Invoice to')); ?>:</h4>
                    </a> <a class="step" href="<?php echo e(route('front.checkout.shipping')); ?>">
                        <h4 class="step-title"><i class="icon-check-circle"></i>2. <?php echo e(__('Ship to')); ?>:</h4>
                    </a> <a class="step active" href="<?php echo e(route('front.checkout.payment')); ?>">
                        <h4 class="step-title">3. <?php echo e(__('Review and pay')); ?></h4>
                    </a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h6 class="pb-2"><?php echo e(__('Review Your Order')); ?> :</h6>
                        <hr>
                        <div class="row padding-top-1x  mb-4">
                            <div class="col-sm-6">
                                <h6><?php echo e(__('Invoice address')); ?> :</h6>
                                <?php

                                    $ship = Session::get('shipping_address');
                                    $bill = Session::get('billing_address');

                                ?>

                                <ul class="list-unstyled">
                                    <li><span class="text-muted"><?php echo e(__('Name')); ?>:
                                        </span><?php echo e($ship['ship_first_name']); ?> <?php echo e($ship['ship_last_name']); ?></li>
                                    <?php if(PriceHelper::CheckDigital()): ?>
                                        <li><span class="text-muted"><?php echo e(__('Address')); ?>:
                                            </span><?php echo e($ship['ship_address1']); ?> <?php echo e($ship['ship_address2']); ?></li>
                                    <?php endif; ?>
                                    <li><span class="text-muted"><?php echo e(__('Phone')); ?>: </span><?php echo e($ship['ship_phone']); ?>

                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <h6><?php echo e(__('Shipping address')); ?> :</h6>
                                <ul class="list-unstyled">
                                    <li><span class="text-muted"><?php echo e(__('Name')); ?>:
                                        </span><?php echo e($bill['bill_first_name']); ?> <?php echo e($bill['bill_last_name']); ?></li>
                                    <?php if(PriceHelper::CheckDigital()): ?>
                                        <li><span class="text-muted"><?php echo e(__('Address')); ?>:
                                            </span><?php echo e($ship['ship_address1']); ?> <?php echo e($ship['ship_address2']); ?></li>
                                    <?php endif; ?>
                                    <li><span class="text-muted"><?php echo e(__('Phone')); ?>: </span><?php echo e($bill['bill_phone']); ?>

                                    </li>
                                </ul>

                                <?php if(DB::table('states')->whereStatus(1)->count() > 0): ?>
                                    <select name="state_id" class="form-control" id="state_id_select" required>
                                        <option value="" selected disabled><?php echo e(__('Select Shipping State')); ?></option>
                                        <?php $__currentLoopData = DB::table('states')->whereStatus(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($state->id); ?>"
                                                data-href="<?php echo e(route('front.state.setup', $state->id)); ?>"
                                                <?php echo e(Auth::check() && Auth::user()->state_id == $state->id ? 'selected' : ''); ?>>
                                                <?php echo e($state->name); ?>

                                                <?php if($state->type == 'fixed'): ?>
                                                    (<?php echo e(PriceHelper::setCurrencyPrice($state->price)); ?>)
                                                <?php else: ?>
                                                    (<?php echo e($state->price); ?>%)
                                                <?php endif; ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <small class="text-primary"><?php echo e(__('please select shipping state')); ?></small>
                                    <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <?php endif; ?>


                            </div>


                        </div>

                        <h6><?php echo e(__('Pay with')); ?> :</h6>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="payment-methods">
                                    <?php
                                        $gateways = DB::table('payment_settings')
                                            ->whereStatus(1)
                                            ->get();
                                    ?>
                                    <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(PriceHelper::CheckDigitalPaymentGateway()): ?>
                                            <?php if($gateway->unique_keyword != 'cod'): ?>
                                                <div class="single-payment-method">
                                                    <a class="text-decoration-none " href="#" data-bs-toggle="modal"
                                                        data-bs-target="#<?php echo e($gateway->unique_keyword); ?>">
                                                        <img class=""
                                                            src="<?php echo e(asset('assets/images/' . $gateway->photo)); ?>"
                                                            alt="<?php echo e($gateway->name); ?>" title="<?php echo e($gateway->name); ?>">
                                                        <p><?php echo e($gateway->name); ?></p>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <div class="single-payment-method">
                                                <a class="text-decoration-none" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#<?php echo e($gateway->unique_keyword); ?>">
                                                    <img class="" src="<?php echo e(asset('assets/images/' . $gateway->photo)); ?>"
                                                        alt="<?php echo e($gateway->name); ?>" title="<?php echo e($gateway->name); ?>">
                                                    <p><?php echo e($gateway->name); ?></p>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <?php echo $__env->make('includes.checkout_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
            <?php echo $__env->make('includes.checkout_sitebar', $cart, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Paquete-Express/resources/views/front/checkout/payment.blade.php ENDPATH**/ ?>