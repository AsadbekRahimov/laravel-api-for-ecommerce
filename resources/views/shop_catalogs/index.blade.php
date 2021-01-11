@extends('layouts.app')
@section('title')
    Shop Catalogs 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Catalogs</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopCatalogs.create')}}" class="btn btn-primary form-btn">Shop Catalog <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_catalogs.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

