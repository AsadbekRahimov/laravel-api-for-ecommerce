@extends('layouts.app')
@section('title')
    Shop Products 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Products</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopProducts.create')}}" class="btn btn-primary form-btn">Shop Product <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_products.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

