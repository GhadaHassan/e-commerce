@extends('dashboard.layouts.app')
@section('content')

<section class="content">
    <h2>Dashboard</h2>
    {{-- <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ \App\Models\User::count() }}</h3>
        
                    <p>TOTAL USERS</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{url('/dashboard/users')}}" class="small-box-footer">MORE INFO<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ \App\Models\Tour::count() }}</h3>

                    <p>TOTAL TOURS</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-pricetag-outline"></i>
                </div>
                <a href="{{url('/dashboard/tours')}}" class="small-box-footer">MORE INFO<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ \App\Models\Customer::count() }}</h3>

                    <p>TOTAL CUSTOMERS</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-people-outline"></i>
                </div>
                <a href="{{url('/dashboard/customers')}}" class="small-box-footer">MORE INFO<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div> --}}
</section>
@endsection