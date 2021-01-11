@extends('layouts.app')
@section('title')
    Shop Coupons 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Coupons</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopCoupons.create')}}" class="btn btn-primary form-btn">Shop Coupon <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_coupons.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

