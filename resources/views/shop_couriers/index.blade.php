@extends('layouts.app')
@section('title')
    Shop Couriers 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Couriers</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopCouriers.create')}}" class="btn btn-primary form-btn">Shop Courier <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_couriers.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

