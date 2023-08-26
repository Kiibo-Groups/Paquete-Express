@extends('master.front')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('content')
    <!-- Page Title-->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('front.index') }}">{{ __('Home') }}</a> </li>
                        <li class="separator"></li>
                        <li>{{ __('Welcome Back') }}, {{ $user->first_name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-1">
        <div class="row">
            @include('includes.user_sitebar')
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                        <form class="row" action="{{ route('user.profile.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="avater" class="form-label">Default file input example</label>
                                    <input class="form-control" type="file" name="photo" id="avater">
                                    @error('photo')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account-fn">{{ __('First Name') }}</label>
                                    <input class="form-control" name="first_name" type="text" id="account-fn"
                                        value="{{ $user->first_name }}">
                                    @error('first_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account-ln">{{ __('Last Name') }}</label>
                                    <input class="form-control" type="text" name="last_name" id="account-ln"
                                        value="{{ $user->last_name }}">
                                    @error('last_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-ln">{{ __('Colonia Envío') }}</label>
                                    <input class="form-control" type="text" name="colonia_envio"
                                        placeholder="{{ __('Colonia Envío') }}" id="reg-ln"
                                        value="{{ $user->colonia_envio }}">
                                    @error('colonia_envio')
                                        <p class="text-danger">{{ $message }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="reg-ln">{{ __('Localidad Envío') }}</label>
                                        <input class="form-control" type="text" name="localidad_envio"
                                            placeholder="{{ __('Localidad Envío') }}" id="reg-ln"
                                            value="{{ $user->localidad_envio }}">
                                        @error('localidad_envio')
                                            <p class="text-danger">{{ $message }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="reg-ln">{{ __('Municipio de Envío') }}</label>
                                            <input class="form-control" type="text" name="municipio_envio"
                                                placeholder="{{ __('Municipio de Envío') }}" id="reg-ln"
                                                value="{{ $user->municipio_envio }}">
                                            @error('municipio_envio')
                                                <p class="text-danger">{{ $message }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="reg-ln">{{ __('Estado de Envío') }}</label>
                                                <input class="form-control" type="text" name="estado_envio"
                                                    placeholder="{{ __('Estado de Envío') }}" id="reg-ln"
                                                    value="{{ $user->estado_envio }}">
                                                @error('estado_envio')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @endif
                                                </div>
                                            </div>





                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="account-phone">{{ __('Phone Number') }}</label>
                                                    <input class="form-control" name="phone" type="text" id="account-phone"
                                                        value="{{ $user->phone }}">
                                                    @error('phone')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="account-email">{{ __('E-mail Address') }}</label>
                                                    <input class="form-control" name="email" type="email" id="account-email"
                                                        value="{{ $user->email }}">
                                                    @error('email')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="account-pass">{{ __('New Password') }}</label>
                                                    <input class="form-control" name="password" type="text" id="account-pass"
                                                        placeholder="{{ __('Change your password') }}">
                                                    @error('password')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <h6>Datos Fiscales</h6>
                                            <hr />

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="reg-ln">{{ __('Rc Fiscal') }}</label>
                                                    <input class="form-control" type="text" name="rc_fiscal"
                                                        placeholder="{{ __('Rc Fiscal') }}" id="reg-ln"
                                                        value="{{ $user->rc_fiscal }}">
                                                    @error('colonia_envio')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="reg-ln">{{ __('Calle Fiscal') }}</label>
                                                        <input class="form-control" type="text" name="calle_fiscal"
                                                            placeholder="{{ __('Calle Fiscal') }}" id="reg-ln"
                                                            value="{{ $user->calle_fiscal }}">
                                                        @error('calle_fiscal')
                                                            <p class="text-danger">{{ $message }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="reg-ln">{{ __('Número interior Fiscal') }}</label>
                                                            <input class="form-control" type="text" name="numero_interior"
                                                                placeholder="{{ __('Número interior Fiscal') }}" id="reg-ln"
                                                                value="{{ $user->numero_interior }}">
                                                            @error('numero_interior')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="reg-ln">{{ __('Número Exterior Fiscal') }}</label>
                                                                <input class="form-control" type="text" name="numero_exterior"
                                                                    placeholder="{{ __('Número Exterior Fiscal') }}" id="reg-ln"
                                                                    value="{{ $user->numero_exterior }}">
                                                                @error('numero_exterior')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="reg-ln">{{ __('Colonia Fiscal') }}</label>
                                                                    <input class="form-control" type="text" name="colonia_fiscal"
                                                                        placeholder="{{ __('Colonia Fiscal') }}" id="reg-ln"
                                                                        value="{{ $user->colonia_fiscal }}">
                                                                    @error('colonia_fiscal')
                                                                        <p class="text-danger">{{ $message }}</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="reg-ln">{{ __('Código Postal Fiscal') }}</label>
                                                                        <input class="form-control" type="number" name="codigo_postal"
                                                                            placeholder="{{ __('Código Postal Fiscal') }}" id="reg-ln"
                                                                            value="{{ $user->codigo_postal }}">
                                                                        @error('codigo_postal')
                                                                            <p class="text-danger">{{ $message }}</p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="reg-ln">{{ __('Localidad Fiscal') }}</label>
                                                                            <input class="form-control" type="text" name="localidad_fiscal"
                                                                                placeholder="{{ __('Localidad Fiscal') }}" id="reg-ln"
                                                                                value="{{ $user->localidad_fiscal }}">
                                                                            @error('localidad_fiscal')
                                                                                <p class="text-danger">{{ $message }}</p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="reg-ln">{{ __('Régimen Fiscal') }}</label>
                                                                                <input class="form-control" type="text" name="regimen_fiscal"
                                                                                    placeholder="{{ __('Régimen Fiscal') }}" id="reg-ln"
                                                                                    value="{{ $user->regimen_fiscal }}">
                                                                                @error('regimen_fiscal')
                                                                                    <p class="text-danger">{{ $message }}</p>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="billing-company">{{__('Referencia de dirección')}}</label>
                                                                                <input class="form-control" type="text" placeholder="{{__('Referencia de dirección')}}" name="referencia_direccion" id="billing-company" value="{{$user->referencia_direccion}}">
                                                                                @error('referencia_direccion')
                                                                                <p class="text-danger">{{$message}}</p>
                                                                                @endif
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12">
                                                                                <hr class="mt-2 mb-3">
                                                                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                                                    <div class="custom-control custom-checkbox d-block">
                                                                                        <input class="custom-control-input" name="newsletter" type="checkbox"
                                                                                            id="subscribe_me" {{ $check_newsletter ? 'checked' : '' }}>
                                                                                        <label class="custom-control-label"
                                                                                            for="subscribe_me">{{ __('Subscribe') }}</label>
                                                                                    </div>
                                                                                    <button class="btn btn-primary margin-right-none"
                                                                                        type="submit"><span>{{ __('Update Profile') }}</span></button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endsection
