<?php $__env->startSection('title'); ?>
    <?php echo e(__('Shipping')); ?>

<?php $__env->stopSection(); ?>
<style>
    .seleccion{
        background-color: #111111;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
    <div class="page-title">
        <div class="container">
            <div class="column">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                    <li class="separator"></li>
                    <li><?php echo e(__('Shipping address')); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-1  checkut-page">
        <div class="row">
            <!-- Shipping Adress-->
            <div class="col-xl-9 col-lg-8">
                <div class="steps flex-sm-nowrap mb-5"><a class="step" href="<?php echo e(route('front.checkout.billing')); ?>">
                        <h4 class="step-title">1. <?php echo e(__('Billing Address')); ?>:</h4>
                    </a><a class="step active" href="<?php echo e(route('front.checkout.shipping')); ?>">
                        <h4 class="step-title">2. <?php echo e(__('Shipping Address')); ?>:</h4>
                    </a><a class="step" href="<?php echo e(route('front.checkout.payment')); ?>">
                        <h4 class="step-title">3. <?php echo e(__('Review and pay')); ?></h4>
                    </a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h6><?php echo e(__('Shipping Address')); ?></h6>

                        <form id="checkoutShipping" action="<?php echo e(route('front.checkout.shipping.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-fn"><?php echo e(__('First Name')); ?></label>
                                        <input class="form-control" name="ship_first_name" type="text" id="checkout-fn"
                                            value="<?php echo e(isset($user) ? $user->first_name : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-ln"><?php echo e(__('Last Name')); ?></label>
                                        <input class="form-control" name="ship_last_name" type="text" id="checkout-ln"
                                            value="<?php echo e(isset($user) ? $user->last_name : ''); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-email"><?php echo e(__('E-mail Address')); ?></label>
                                        <input class="form-control" name="ship_email" type="email" id="checkout-email"
                                            value="<?php echo e(isset($user) ? $user->email : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-phone"><?php echo e(__('Phone Number')); ?></label>
                                        <input class="form-control" name="ship_phone" type="text" id="checkout-phone"
                                            value="<?php echo e(isset($user) ? $user->phone : ''); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-zip"><?php echo e(__('Zip Code')); ?> </label>
                                        <input class="form-control" name="ship_zip" type="text" id="checkout-zip"
                                            value="<?php echo e(isset($user) ? $user->ship_zip : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-city"><?php echo e(__('City')); ?></label>
                                        
                                        <select class="form-control select2 select-search" name="ship_city"
                                            id="checkout-city" required disabled>
                                            <option value="<?php echo e(isset($user) ? $user->ship_city : ''); ?>">Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="checkout-company"><?php echo e(__('Company')); ?></label>
                                        <input class="form-control" name="ship_company" type="text" id="checkout-company"
                                            required value="<?php echo e(isset($user) ? $user->ship_company : ''); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-address1"><?php echo e(__('Address')); ?> 1</label>
                                        <input class="form-control" name="ship_address1" required type="text"
                                            id="checkout-address1" value="<?php echo e(isset($user) ? $user->ship_address1 : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-address2"><?php echo e(__('Address')); ?> 2</label>
                                        <input class="form-control" name="ship_address2" type="text"
                                            id="checkout-address2" value="<?php echo e(isset($user) ? $user->ship_address2 : ''); ?>">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="checkout-country"><?php echo e(__('Country')); ?></label>
                                        <select class="form-control" name="ship_country" required id="billing-country">
                                            
                                            <?php $__currentLoopData = DB::table('countries')->where('name', 'Mexico')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($country->name); ?>"
                                                    <?php echo e(isset($user) && $user->ship_country == $country->name ? 'selected' : ''); ?>>
                                                    <?php echo e($country->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div id="mostrarcotizacion" style="display: none">
                                <h6>Cotizar Envío</h6>
                                <div class="row mt-4" >
                                    <div class="col-12" >
                                        <div class="payment-methods" id="tablaexpress">


                                        </div>

                                    </div>
                                </div>
                            </div>



                            <input class="form-control" name="peso" required type="hidden" step="0.1"
                                id="peso" value="<?php echo e($peso); ?>">

                            <input class="form-control" name="alto" type="hidden" step="0.1" id="alto"
                                value="<?php echo e($alto); ?>">

                            <input class="form-control" name="ancho" required type="hidden" step="0.1"
                                id="ancho" value="<?php echo e($ancho); ?>">

                            <input class="form-control" name="largo" type="hidden" step="0.1" id="largo"
                                value="<?php echo e($largo); ?>">
                                <input class="form-control" name="pvolum" type="hidden"  id="pvolum"
                                value="<?php echo e($pvolum); ?>">



                            <div class="d-flex justify-content-between paddin-top-1x mt-4">
                                <a class="btn btn-primary btn-sm" href="<?php echo e(route('front.cart')); ?>"><span
                                        class="hidden-xs-down"><i class="icon-arrow-left"></i>
                                        <?php echo e(__('Back To Cart')); ?></span>
                                </a><button class="btn btn-primary  btn-sm" type="submit"><span
                                        class="hidden-xs-down"><?php echo e(__('Continue')); ?></span><i
                                        class="icon-arrow-right"></i></button>
                            </div>

                            <input id="transporte" name="transporte" type="hidden">
                            <input id="precio_shipp" name="precio_shipp" type="hidden">
                            <input id="rateToken" name="rateToken" type="hidden">
                            <input id="entrega" name="entrega" type="hidden">
                        </form>
                        <input id="token_compomex" type="hidden" value="<?php echo e($token); ?>">
                        <input id="code_zip" type="hidden" value="<?php echo e($code_zip); ?>">
                        <input id="token_express" type="hidden" value="<?php echo e($token_express); ?>">
                    </div>
                </div>
            </div>
            <!-- Sidebar          -->
            <?php echo $__env->make('includes.checkout_sitebar', $cart, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<script>
    $(document).ready(function() {


        var checkout_zip = $("#checkout-zip").val();
        if (checkout_zip != '') {
            check();
        }
        $("#checkout-zip").blur(function() {
            check();
        });

        function check() {

            var input_value    = $("#checkout-zip").val();
            var token_compomex = $("#token_compomex").val();
            var code_zip       = $("#code_zip").val();
            var token_express  = $("#token_express").val();
            var pvolum         = $("#pvolum").val();
            var alto           = $("#alto").val();
            var ancho          = $("#ancho").val();
            var largo          = $("#largo").val();

            $.ajax({
                url: '<?php echo e(route('user.shipping.code.submit')); ?>',
                type: "GET",
                data: {
                    codezip: input_value,
                    token_compomex: token_compomex,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                dataType: 'json',
                success: function(response) {

                    $("#checkout-city").prop('disabled', false);
                    if (response.code == 200) {

                        $.each(response.data, function(key, value) {
                            $("#checkout-city").append('<option value="' + value
                                .ciudad + '">' + value.ciudad + '</option>');
                        });
                    }
                }
            });

            $.ajax({
                url: '<?php echo e(route('user.shipping.paquete.submit')); ?>',
                type: "GET",
                data: {
                    codezip: input_value,
                    code_zip_tienda: code_zip,
                    token_express: token_express,
                    pvolum: pvolum,
                    alto: alto,
                    ancho: ancho,
                    largo: largo,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                dataType: 'json',
                success: function(response) {
                    if (response.code == 200) {
                        $("#mostrarcotizacion").show();
                        $.each(response.data, function(key, value) {
                            $("#tablaexpress").append(
                                '<div  class="single-payment-method eliminar '+ key +'"  >' +
                                    '<a class="text-decoration-none " onclick="valores(\'' +
                                    (value.price).replace(/,/g, '') + '\',\'' + value
                                    .description + '\' ,\'' + value
                                    .rateToken + '\', '+ key +',\'' + value
                                    .display + '\')">' +
                                    '<img max-width="50%" src="<?php echo e(asset('public/assets/logos/')); ?>/' + value
                                    .provider + '.png"  >' +
                                    '<h5> <b> $' + value.price + '</b></h5>' +
                                    '<h6>' + value.description + '</h6>' +
                                    '<p>' + value.display + '</p>' +
                                    '</a>' +
                                '</div>'
                            );
                        });
                    }
                }
            });

        }

    });

    function valores(p, d, r, k, l) {
        var precio = Number(p);
        var transporte = $("#transporte").val(d);
        var precio_shipp = $("#precio_shipp").val(precio);
        var rateToken = $("#rateToken").val(r);
        var entrega = $("#entrega").val(l);
        var key = k;

        $(".eliminar").removeClass("seleccion");

        $('.'+k).addClass("seleccion");
        $.ajax({
            url: '<?php echo e(route('front.envio.setup')); ?>',
            type: "GET",
            data: {
                precio: p,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            dataType: 'json',
            success: function(response) {

                $('.shipping_total_set').text(response.shipping_price);
                $('.grand_total_set').text(response.grand_total);
            }
        });


    }
</script>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Paquete-Express/resources/views/front/checkout/shipping.blade.php ENDPATH**/ ?>