@extends('layouts.app')
@section('title')
    Shop Order Items 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Order Items</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopOrderItems.create')}}" class="btn btn-primary form-btn">Shop Order Item <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_order_items.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

