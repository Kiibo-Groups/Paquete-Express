@extends('master.back')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <h3 class="mb-0 px-3 py-4"><b>{{ __('Dashboard') }}</b></h3>
    </div>

    @include('alerts.alerts')

    <!-- Content Row -->
    <div class="row">

        <!-- Ganancias -->
        <div class="col-xl-4 col-md-6">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-danger  bubble-shadow-small">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="mb-0"><b>{{ __('Total Earning') }}</b></p>
                                <h4 class="card-title">{{$totalEarning}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-4 col-md-6">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-danger  bubble-shadow-small">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="mb-0"><b>{{ __('Today Pending Earning') }}</b></p>
                                <h4 class="card-title">{{$totalTodayEarning}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-4 col-md-6">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-danger  bubble-shadow-small">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="mb-0"><b>{{ __('This Year Erning') }}</b></p>
                                <h4 class="card-title">{{$totalYearEarning}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ganancias -->

        <!-- Pedidos -->
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="mb-0"><b>{{ __('Total Orders') }}</b></p>
                                <h4 class="card-title">{{ $totalOrders }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
        <div class="card card-stats card-round">
            <div class="card-body ">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-success bubble-shadow-small">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                    <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                            <p class="mb-0"><b>{{ __('Pending Orders') }}</b></p>
                            <h4 class="card-title">{{ $totalPendingOrders }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-xl-3 col-md-6">
        <div class="card card-stats card-round">
            <div class="card-body ">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-success bubble-shadow-small">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                    <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                            <p class="mb-0"><b>{{ __('Delivered Orders') }}</b></p>
                            <h4 class="card-title">{{$totalDeliveredOrders}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="col-xl-3 col-md-6">
        <div class="card card-stats card-round">
            <div class="card-body ">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-success bubble-shadow-small">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                    <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                            <p class="mb-0"><b>{{ __('Canceled Orders') }}</b></p>
                            <h4 class="card-title">{{$totalCanceledOrders}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Pedidos -->
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{__('Monthly Product Sales Report')}} </div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="multipleLineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{__('Monthly Earnings Report')}} </div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="multipleLineChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{__('Recent Orders')}}</div>
                </div>
                <div class="card-body pb-0">
                    <div class="card-body">
                        @if ($recentOrders->count() > 0)
                        <div class="gd-responsive-table">
                            <table class="table table-bordered table-striped" id="recent-orders" width="100%" cellspacing="0">
                            <thead>
                                <th>{{ __('Customer') }}</th>
                                <th>{{ __('Order ID') }}</th>
                                <th>{{ __('Payment Method') }}</th>
                                <th>{{ __('Total') }}</th>
                            </thead>
                            <tbody>
                                @foreach($recentOrders as $data)
                                <tr>
                                    <td>
                                        <a href="{{route('back.user.show',$data->user_id)}}">{{ $data->user->displayName()}}</a>
                                    </td>
                                    <td>
                                        <a href="{{route('back.order.invoice',$data->id)}}">{{ $data->transaction_number}}</a>
                                    </td>
                                    <td>
                                        {{ $data->payment_method}}
                                    </td>
                                    <td>
                                        {{$data->currency_sign}}{{PriceHelper::OrderTotal($data)}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>

                        @else
                        <p class="d-block text-center">
                            {{ __('No Order Found') }}
                        </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
@section('scripts')
<script>
    multipleLineChart = document.getElementById('multipleLineChart').getContext('2d'),
    multipleLineChart2 = document.getElementById('multipleLineChart2').getContext('2d')


        var myMultipleLineChart = new Chart(multipleLineChart, {
			type: 'line',
			data: {
				labels: [{!! $order_days !!}],
				datasets: [{
					label: "Product Sales",
					borderColor: "#1d7af3",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#1d7af3",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: [{!! $order_sales !!}]
				}]
			},
			options : {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false
				},
				tooltips: {
					bodySpacing: 4,
					mode:"nearest",
					intersect: 0,
					position:"nearest",
					xPadding:10,
					yPadding:10,
					caretPadding:10
				},
				layout:{
					padding:{left:15,right:15,top:15,bottom:15}
				}
			}
		});

        var myMultipleLineChart2 = new Chart(multipleLineChart2, {
			type: 'line',
			data: {
				labels: [{!! $earning_days !!}],
				datasets: [ {
					label: "Earning"+' {{PriceHelper::adminCurrency()}}',
					borderColor: "#f3545d",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#f3545d",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: [{!!$total_incomess!!}]
				}]
			},
			options : {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false
				},
				tooltips: {
					bodySpacing: 4,
					mode:"nearest",
					intersect: 0,
					position:"nearest",
					xPadding:10,
					yPadding:10,
					caretPadding:10
				},
				layout:{
					padding:{left:15,right:15,top:15,bottom:15}
				}
			}
		});


</script>
@endsection