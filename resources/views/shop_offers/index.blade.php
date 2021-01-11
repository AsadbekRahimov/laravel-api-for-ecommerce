@extends('layouts.app')
@section('title')
    Shop Offers 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Offers</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopOffers.create')}}" class="btn btn-primary form-btn">Shop Offer <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_offers.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

