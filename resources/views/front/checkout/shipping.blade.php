@extends('master.front')

@section('title')
    {{ __('Shipping') }}
@endsection
<style>
    .seleccion{
        background-color: #111111;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('content')
    <!-- Page Title-->
    <div class="page-title">
        <div class="container">
            <div class="column">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('front.index') }}">{{ __('Home') }}</a> </li>
                    <li class="separator"></li>
                    <li>{{ __('Shipping address') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-1  checkut-page">
        <div class="row">
            <!-- Shipping Adress-->
            <div class="col-xl-9 col-lg-8">
                <div class="steps flex-sm-nowrap mb-5"><a class="step" href="{{ route('front.checkout.billing') }}">
                        <h4 class="step-title">1. {{ __('Billing Address') }}:</h4>
                    </a><a class="step active" href="{{ route('front.checkout.shipping') }}">
                        <h4 class="step-title">2. {{ __('Shipping Address') }}:</h4>
                    </a><a class="step" href="{{ route('front.checkout.payment') }}">
                        <h4 class="step-title">3. {{ __('Review and pay') }}</h4>
                    </a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h6>{{ __('Shipping Address') }}</h6>

                        <form id="checkoutShipping" action="{{ route('front.checkout.shipping.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-fn">{{ __('First Name') }}</label>
                                        <input class="form-control" name="ship_first_name" type="text" id="checkout-fn"
                                            value="{{ isset($user) ? $user->first_name : '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-ln">{{ __('Last Name') }}</label>
                                        <input class="form-control" name="ship_last_name" type="text" id="checkout-ln"
                                            value="{{ isset($user) ? $user->last_name : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-email">{{ __('E-mail Address') }}</label>
                                        <input class="form-control" name="ship_email" type="email" id="checkout-email"
                                            value="{{ isset($user) ? $user->email : '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-phone">{{ __('Phone Number') }}</label>
                                        <input class="form-control" name="ship_phone" type="text" id="checkout-phone"
                                            value="{{ isset($user) ? $user->phone : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-zip">{{ __('Zip Code') }} </label>
                                        <input class="form-control" name="ship_zip" type="text" id="checkout-zip"
                                            value="{{ isset($user) ? $user->ship_zip : '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-city">{{ __('City') }}</label>
                                        {{-- <input class="form-control" name="ship_city" required type="text" id="checkout-city" value="{{isset($user) ? $user->ship_city : ''}}" > --}}
                                        <select class="form-control select2 select-search" name="ship_city"
                                            id="checkout-city" required disabled>
                                            <option value="{{ isset($user) ? $user->ship_city : '' }}">Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="checkout-company">{{ __('Company') }}</label>
                                        <input class="form-control" name="ship_company" type="text" id="checkout-company"
                                            required value="{{ isset($user) ? $user->ship_company : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-address1">{{ __('Address') }} 1</label>
                                        <input class="form-control" name="ship_address1" required type="text"
                                            id="checkout-address1" value="{{ isset($user) ? $user->ship_address1 : '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-address2">{{ __('Address') }} 2</label>
                                        <input class="form-control" name="ship_address2" type="text"
                                            id="checkout-address2" value="{{ isset($user) ? $user->ship_address2 : '' }}">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="checkout-country">{{ __('Country') }}</label>
                                        <select class="form-control" name="ship_country" required id="billing-country">
                                            {{-- <option selected>__('ChooseCountry') </option> --}}
                                            @foreach (DB::table('countries')->where('name', 'Mexico')->get() as $country)
                                                <option value="{{ $country->name }}"
                                                    {{ isset($user) && $user->ship_country == $country->name ? 'selected' : '' }}>
                                                    {{ $country->name }}</option>
                                            @endforeach
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
                                id="peso" value="{{ $peso }}">

                            <input class="form-control" name="alto" type="hidden" step="0.1" id="alto"
                                value="{{ $alto }}">

                            <input class="form-control" name="ancho" required type="hidden" step="0.1"
                                id="ancho" value="{{ $ancho }}">

                            <input class="form-control" name="largo" type="hidden" step="0.1" id="largo"
                                value="{{ $largo }}">
                                <input class="form-control" name="pvolum" type="hidden"  id="pvolum"
                                value="{{ $pvolum }}">



                            <div class="d-flex justify-content-between paddin-top-1x mt-4">
                                <a class="btn btn-primary btn-sm" href="{{ route('front.cart') }}"><span
                                        class="hidden-xs-down"><i class="icon-arrow-left"></i>
                                        {{ __('Back To Cart') }}</span>
                                </a>

                                    <div id="envioOff">
                                        <button disabled class="btn btn-primary  btn-sm" type="button"><span
                                            class="hidden-xs-down">Por favor seleccione método de envío</span><i
                                            ></i>
                                        </button>
                                    </div>

                                    <div id="envioOn" style="display: none">
                                        <button class="btn btn-primary  btn-sm" type="submit"><span
                                            class="hidden-xs-down">{{ __('Continue') }}</span><i
                                            class="icon-arrow-right"></i>
                                        </button>
                                    </div>

                            </div>









                            <input id="transporte" name="transporte" type="hidden">
                            <input id="precio_shipp" name="precio_shipp" type="hidden">
                            <input id="rateToken" name="rateToken" type="hidden">
                            <input id="entrega" name="entrega" type="hidden">


                        </form>


                        <input id="token_compomex" type="hidden" value="{{ $token }}">
                        <input id="code_zip" type="hidden" value="{{ $code_zip }}">
                        <input id="token_express" type="hidden" value="{{ $token_express }}">
                    </div>
                </div>
            </div>
            <!-- Sidebar          -->
            @include('includes.checkout_sitebar', $cart)
        </div>
    </div>
@endsection


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
                url: '{{ route('user.shipping.code.submit') }}',
                type: "GET",
                data: {
                    codezip: input_value,
                    token_compomex: token_compomex,
                    _token: '{{ csrf_token() }}'
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
                url: '{{ route('user.shipping.paquete.submit') }}',
                type: "GET",
                data: {
                    codezip: input_value,
                    code_zip_tienda: code_zip,
                    token_express: token_express,
                    pvolum: pvolum,
                    alto: alto,
                    ancho: ancho,
                    largo: largo,
                    _token: '{{ csrf_token() }}'
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
                                    '<img max-width="50%" src="{{ asset('public/assets/logos/') }}/' + value
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
            url: '{{ route('front.envio.setup') }}',
            type: "GET",
            data: {
                precio: p,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(response) {

                $("#envioOff").hide();
                $("#envioOn").show();

                $('.shipping_total_set').text(response.shipping_price);
                $('.grand_total_set').text(response.grand_total);
            }
        });


    }
</script>
