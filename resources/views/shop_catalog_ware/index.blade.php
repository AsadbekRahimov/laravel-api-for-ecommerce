@extends('layouts.app')
@section('title')
    Shop Catalog Ware 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Catalog Ware</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopCatalogWare.create')}}" class="btn btn-primary form-btn">Shop Catalog Ware <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_catalog_ware.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

