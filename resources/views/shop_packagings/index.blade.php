@extends('layouts.app')
@section('title')
    Shop Packagings 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Packagings</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopPackagings.create')}}" class="btn btn-primary form-btn">Shop Packaging <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_packagings.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

