@extends('layouts.app')
@section('title')
    Tree Shops 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tree Shops</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('treeShops.create')}}" class="btn btn-primary form-btn">Tree Shop <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('tree_shops.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

