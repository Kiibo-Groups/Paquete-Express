
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Dashboard')); ?>

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
                        <li><?php echo e(__('Welcome Back')); ?>, <?php echo e($user->first_name); ?></li>
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
                        <form class="row" action="<?php echo e(route('user.profile.update')); ?>" method="POST"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="avater" class="form-label">Default file input example</label>
                                    <input class="form-control" type="file" name="photo" id="avater">
                                    <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account-fn"><?php echo e(__('First Name')); ?></label>
                                    <input class="form-control" name="first_name" type="text" id="account-fn"
                                        value="<?php echo e($user->first_name); ?>">
                                    <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account-ln"><?php echo e(__('Last Name')); ?></label>
                                    <input class="form-control" type="text" name="last_name" id="account-ln"
                                        value="<?php echo e($user->last_name); ?>">
                                    <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-ln"><?php echo e(__('Colonia Envío')); ?></label>
                                    <input class="form-control" type="text" name="colonia_envio"
                                        placeholder="<?php echo e(__('Colonia Envío')); ?>" id="reg-ln"
                                        value="<?php echo e($user->colonia_envio); ?>">
                                    <?php $__errorArgs = ['colonia_envio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="reg-ln"><?php echo e(__('Localidad Envío')); ?></label>
                                        <input class="form-control" type="text" name="localidad_envio"
                                            placeholder="<?php echo e(__('Localidad Envío')); ?>" id="reg-ln"
                                            value="<?php echo e($user->localidad_envio); ?>">
                                        <?php $__errorArgs = ['localidad_envio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="reg-ln"><?php echo e(__('Municipio de Envío')); ?></label>
                                            <input class="form-control" type="text" name="municipio_envio"
                                                placeholder="<?php echo e(__('Municipio de Envío')); ?>" id="reg-ln"
                                                value="<?php echo e($user->municipio_envio); ?>">
                                            <?php $__errorArgs = ['municipio_envio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="reg-ln"><?php echo e(__('Estado de Envío')); ?></label>
                                                <input class="form-control" type="text" name="estado_envio"
                                                    placeholder="<?php echo e(__('Estado de Envío')); ?>" id="reg-ln"
                                                    value="<?php echo e($user->estado_envio); ?>">
                                                <?php $__errorArgs = ['estado_envio'];
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
                                                    <label for="account-phone"><?php echo e(__('Phone Number')); ?></label>
                                                    <input class="form-control" name="phone" type="text" id="account-phone"
                                                        value="<?php echo e($user->phone); ?>">
                                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <p class="text-danger"><?php echo e($message); ?></p>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="account-email"><?php echo e(__('E-mail Address')); ?></label>
                                                    <input class="form-control" name="email" type="email" id="account-email"
                                                        value="<?php echo e($user->email); ?>">
                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <p class="text-danger"><?php echo e($message); ?></p>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="account-pass"><?php echo e(__('New Password')); ?></label>
                                                    <input class="form-control" name="password" type="text" id="account-pass"
                                                        placeholder="<?php echo e(__('Change your password')); ?>">
                                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <p class="text-danger"><?php echo e($message); ?></p>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <h6>Datos Fiscales</h6>
                                            <hr />

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="reg-ln"><?php echo e(__('Rc Fiscal')); ?></label>
                                                    <input class="form-control" type="text" name="rc_fiscal"
                                                        placeholder="<?php echo e(__('Rc Fiscal')); ?>" id="reg-ln"
                                                        value="<?php echo e($user->rc_fiscal); ?>">
                                                    <?php $__errorArgs = ['colonia_envio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <p class="text-danger"><?php echo e($message); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="reg-ln"><?php echo e(__('Calle Fiscal')); ?></label>
                                                        <input class="form-control" type="text" name="calle_fiscal"
                                                            placeholder="<?php echo e(__('Calle Fiscal')); ?>" id="reg-ln"
                                                            value="<?php echo e($user->calle_fiscal); ?>">
                                                        <?php $__errorArgs = ['calle_fiscal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <p class="text-danger"><?php echo e($message); ?></p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="reg-ln"><?php echo e(__('Número interior Fiscal')); ?></label>
                                                            <input class="form-control" type="text" name="numero_interior"
                                                                placeholder="<?php echo e(__('Número interior Fiscal')); ?>" id="reg-ln"
                                                                value="<?php echo e($user->numero_interior); ?>">
                                                            <?php $__errorArgs = ['numero_interior'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="reg-ln"><?php echo e(__('Número Exterior Fiscal')); ?></label>
                                                                <input class="form-control" type="text" name="numero_exterior"
                                                                    placeholder="<?php echo e(__('Número Exterior Fiscal')); ?>" id="reg-ln"
                                                                    value="<?php echo e($user->numero_exterior); ?>">
                                                                <?php $__errorArgs = ['numero_exterior'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <p class="text-danger"><?php echo e($message); ?></p>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="reg-ln"><?php echo e(__('Colonia Fiscal')); ?></label>
                                                                    <input class="form-control" type="text" name="colonia_fiscal"
                                                                        placeholder="<?php echo e(__('Colonia Fiscal')); ?>" id="reg-ln"
                                                                        value="<?php echo e($user->colonia_fiscal); ?>">
                                                                    <?php $__errorArgs = ['colonia_fiscal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        <p class="text-danger"><?php echo e($message); ?></p>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="reg-ln"><?php echo e(__('Código Postal Fiscal')); ?></label>
                                                                        <input class="form-control" type="number" name="codigo_postal"
                                                                            placeholder="<?php echo e(__('Código Postal Fiscal')); ?>" id="reg-ln"
                                                                            value="<?php echo e($user->codigo_postal); ?>">
                                                                        <?php $__errorArgs = ['codigo_postal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                            <p class="text-danger"><?php echo e($message); ?></p>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="reg-ln"><?php echo e(__('Localidad Fiscal')); ?></label>
                                                                            <input class="form-control" type="text" name="localidad_fiscal"
                                                                                placeholder="<?php echo e(__('Localidad Fiscal')); ?>" id="reg-ln"
                                                                                value="<?php echo e($user->localidad_fiscal); ?>">
                                                                            <?php $__errorArgs = ['localidad_fiscal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="reg-ln"><?php echo e(__('Régimen Fiscal')); ?></label>
                                                                                <input class="form-control" type="text" name="regimen_fiscal"
                                                                                    placeholder="<?php echo e(__('Régimen Fiscal')); ?>" id="reg-ln"
                                                                                    value="<?php echo e($user->regimen_fiscal); ?>">
                                                                                <?php $__errorArgs = ['regimen_fiscal'];
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
                                                                                <label for="billing-company"><?php echo e(__('Referencia de dirección')); ?></label>
                                                                                <input class="form-control" type="text" placeholder="<?php echo e(__('Referencia de dirección')); ?>" name="referencia_direccion" id="billing-company" value="<?php echo e($user->referencia_direccion); ?>">
                                                                                <?php $__errorArgs = ['referencia_direccion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                                                <?php endif; ?>
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12">
                                                                                <hr class="mt-2 mb-3">
                                                                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                                                    <div class="custom-control custom-checkbox d-block">
                                                                                        <input class="custom-control-input" name="newsletter" type="checkbox"
                                                                                            id="subscribe_me" <?php echo e($check_newsletter ? 'checked' : ''); ?>>
                                                                                        <label class="custom-control-label"
                                                                                            for="subscribe_me"><?php echo e(__('Subscribe')); ?></label>
                                                                                    </div>
                                                                                    <button class="btn btn-primary margin-right-none"
                                                                                        type="submit"><span><?php echo e(__('Update Profile')); ?></span></button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\Paquete-Express\ecommerce\resources\views/user/dashboard/index.blade.php ENDPATH**/ ?>