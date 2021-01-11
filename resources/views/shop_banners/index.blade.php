@extends('layouts.app')
@section('title')
    Shop Banners 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Banners</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopBanners.create')}}" class="btn btn-primary form-btn">Shop Banner <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_banners.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

