<?php $__env->startSection('title'); ?>
    <?php echo e(__('Address')); ?>

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
                    <li><?php echo e(__('Shipping - Billing Address')); ?></li>
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
                <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                <h5><?php echo e(__('Billing Address')); ?></h5>
                <form id="billingForm" class="row" action="<?php echo e(route('user.billing.submit')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="billing-address1"><?php echo e(__('Address 1')); ?> *</label>
                         <input class="form-control" type="text" name="bill_address1" id="billing-address1" value="<?php echo e($user->bill_address1); ?>">
                      <?php $__errorArgs = ['bill_address1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger"><?php echo e($message); ?></p>
                      <?php endif; ?>
                        </div>
                   </div>
                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="billing-address2"><?php echo e(__('Address 2')); ?></label>
                         <input class="form-control" type="text" name="bill_address2" value="<?php echo e($user->bill_address2); ?>" id="billing-address2">
                         <?php $__errorArgs = ['bill_address2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <p class="text-danger"><?php echo e($message); ?></p>
                         <?php endif; ?>
                        </div>
                   </div>
                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="billing-zip"><?php echo e(__('Zip Code')); ?></label>
                         <input class="form-control" type="text" name="bill_zip" id="billing-zip" value="<?php echo e($user->bill_zip); ?>">
                         <?php $__errorArgs = ['bill_zip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <p class="text-danger"><?php echo e($message); ?></p>
                         <?php endif; ?>
                        </div>
                   </div>
                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="billing-company"><?php echo e(__('City')); ?> *</label>
                         <input class="form-control" type="text" name="bill_city" id="billing-city" value="<?php echo e($user->bill_city); ?>">
                         <?php $__errorArgs = ['bill_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <p class="text-danger"><?php echo e($message); ?></p>
                         <?php endif; ?>
                        </div>
                   </div>
                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="billing-company"><?php echo e(__('Company')); ?></label>
                         <input class="form-control" type="text" name="bill_company" id="billing-company" value="<?php echo e($user->bill_company); ?>">
                         <?php $__errorArgs = ['bill_company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <p class="text-danger"><?php echo e($message); ?></p>
                         <?php endif; ?>
                        </div>
                   </div>

                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="billing-country"><?php echo e(__('Country')); ?></label>
                         <select class="form-control" name="bill_country" id="billing-country">
                          <option selected><?php echo e(__('Choose Country')); ?></option>
                          <?php $__currentLoopData = DB::table('countries')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($country->name); ?>" <?php echo e($user->bill_country == $country->name ? 'selected' :''); ?> ><?php echo e($country->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>
                     <?php $__errorArgs = ['bill_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger"><?php echo e($message); ?></p>
                      <?php endif; ?>
                      </div>
                   </div>

                    
                 <div class="col-md-6">
                    <div class="form-group">
                       <label for="billing-company"><?php echo e(__('Referencia de dirección de envío')); ?></label>
                       <input class="form-control" type="text" placeholder="<?php echo e(__('Referencia de dirección de envío')); ?>" name="referencia_direccion_envio" id="billing-company" value="<?php echo e($user->referencia_direccion_envio); ?>">
                       <?php $__errorArgs = ['referencia_direccion_envio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                       <p class="text-danger"><?php echo e($message); ?></p>
                       <?php endif; ?>
                      </div>
                 </div>
                 <div class="col-md-6">
                    <div class="form-group">
                       <label for="billing-company"><?php echo e(__('Clave Pais SAT')); ?></label>
                       <input class="form-control" type="text" placeholder="<?php echo e(__('Clave Pais SAT')); ?>" name="clave_pais" id="billing-company" value="<?php echo e($user->clave_pais); ?>">
                       <?php $__errorArgs = ['clave_pais'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                       <p class="text-danger"><?php echo e($message); ?></p>
                       <?php endif; ?>
                      </div>
                 </div>
                 <div class="col-md-6">
                    <div class="form-group">
                       <label for="billing-company"><?php echo e(__('Forma de pago SAT')); ?></label>
                       <input class="form-control" type="text" placeholder="<?php echo e(__('Forma de pago SAT')); ?>" name="forma_pago_sat" id="billing-company" value="<?php echo e($user->forma_pago_sat); ?>">
                       <?php $__errorArgs = ['forma_pago_sat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                       <p class="text-danger"><?php echo e($message); ?></p>
                       <?php endif; ?>
                      </div>
                 </div>



                   <div class="col-12 ">
                      <div class="text-right">
                         <button class="btn btn-primary margin-bottom-none  btn-sm" type="submit"><span><?php echo e(__('Update Address')); ?></span></button>
                      </div>
                   </div>
                </form>
                <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                <br>
                <h5><?php echo e(__('Shipping Address')); ?></h5>
                <form id="shippingForm" class="row" action="<?php echo e(route('user.shipping.submit')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="shipping-address1"><?php echo e(__('Address 1')); ?> *</label>
                         <input class="form-control" name="ship_address1" value="<?php echo e($user->ship_address1); ?>" type="text" id="shipping-address1">
                         <?php $__errorArgs = ['ship_address1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <p class="text-danger"><?php echo e($message); ?></p>
                         <?php endif; ?>
                        </div>
                   </div>
                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="shipping-address2"><?php echo e(__('Address 2')); ?> </label>
                         <input class="form-control" value="<?php echo e($user->ship_address2); ?>" name="ship_address2" type="text" id="shipping-address2">
                         <?php $__errorArgs = ['ship_address2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <p class="text-danger"><?php echo e($message); ?></p>
                         <?php endif; ?>
                        </div>
                   </div>
                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="shipping-zip"><?php echo e(__('Zip Code')); ?></label>
                         <input class="form-control" type="text" value="<?php echo e($user->ship_zip); ?>" name="ship_zip" id="shipping-zip">
                         <?php $__errorArgs = ['ship_zip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <p class="text-danger"><?php echo e($message); ?></p>
                         <?php endif; ?>
                        </div>
                   </div>
                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="shipping-company"><?php echo e(__('City')); ?> *</label>
                         <input class="form-control" type="text" name="ship_city" id="shippingcity" value="<?php echo e($user->ship_city); ?>">
                         <?php $__errorArgs = ['ship_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <p class="text-danger"><?php echo e($message); ?></p>
                         <?php endif; ?>
                        </div>
                   </div>
                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="shipping-company"><?php echo e(__('Company')); ?></label>
                         <input class="form-control" type="text" name="ship_company" id="shipping-company" value="<?php echo e($user->ship_company); ?>">
                         <?php $__errorArgs = ['ship_company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <p class="text-danger"><?php echo e($message); ?></p>
                         <?php endif; ?>
                        </div>
                   </div>
                   <?php if(DB::table('states')->count() > 0): ?>
                   <div class="col-md-6">
                     <div class="form-group">
                        <label for="state_id"><?php echo e(__('State')); ?> <small>(<?php echo e(__('include tax')); ?>)</small> </label>
                        <select class="form-control" name="state_id" id="state_id">
                         <option value="" selected><?php echo e(__('Select Shipping State')); ?></option>
                         <?php $__currentLoopData = DB::table('states')->whereStatus(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <option value="<?php echo e($state->id); ?>" <?php echo e($user->state_id == $state->id ? 'selected' :''); ?> ><?php echo e($state->name); ?></option>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <p class="text-danger"><?php echo e($message); ?></p>
                     <?php endif; ?>
                     </div>
                  </div>
                   <?php endif; ?>

                   <div class="<?php echo e(DB::table('states')->count() > 0  ? 'col-md-12' : 'col-md-6'); ?> ">
                      <div class="form-group">
                         <label for="shipping-country"><?php echo e(__('Country')); ?></label>
                         <select class="form-control" name="ship_country" id="shipping-country">
                            <option><?php echo e(__('Choose Country')); ?></option>
                            <?php $__currentLoopData = DB::table('countries')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($country->name); ?>" <?php echo e($user->ship_country == $country->name ? 'selected' :''); ?> ><?php echo e($country->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>
                         <?php $__errorArgs = ['ship_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <p class="text-danger"><?php echo e($message); ?></p>
                         <?php endif; ?>
                      </div>
                   </div>
                   <div class="col-12 ">
                      <div class="text-right">
                         <button class="btn btn-primary margin-bottom-none btn-sm" type="submit"><span><?php echo e(__('Update Address')); ?></span></button>
                      </div>
                   </div>
                </form>
              </div>
          </div>
       </div>
    </div>
 </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Paquete-Express/resources/views/user/dashboard/address.blade.php ENDPATH**/ ?>