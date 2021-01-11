@extends('layouts.app')
@section('title')
    Shop Option Types 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Option Types</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopOptionTypes.create')}}" class="btn btn-primary form-btn">Shop Option Type <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_option_types.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

