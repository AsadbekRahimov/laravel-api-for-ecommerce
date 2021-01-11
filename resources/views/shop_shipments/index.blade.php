@extends('layouts.app')
@section('title')
    Shop Shipments 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Shipments</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopShipments.create')}}" class="btn btn-primary form-btn">Shop Shipment <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_shipments.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

