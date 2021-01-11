@extends('layouts.app')
@section('title')
    Shop Orders 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Orders</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopOrders.create')}}" class="btn btn-primary form-btn">Shop Order <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_orders.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

