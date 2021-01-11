@extends('layouts.app')
@section('title')
    Shop Categories 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Categories</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopCategories.create')}}" class="btn btn-primary form-btn">Shop Category <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_categories.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

