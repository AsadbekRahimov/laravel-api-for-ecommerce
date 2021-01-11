@extends('layouts.app')
@section('title')
    Shop Discounts 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Discounts</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopDiscounts.create')}}" class="btn btn-primary form-btn">Shop Discount <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_discounts.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

