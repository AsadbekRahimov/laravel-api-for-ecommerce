@extends('layouts.app')
@section('title')
    Shop Payments 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Payments</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopPayments.create')}}" class="btn btn-primary form-btn">Shop Payment <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_payments.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

