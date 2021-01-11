@extends('layouts.app')
@section('title')
    Shop Review Options 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Review Options</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopReviewOptions.create')}}" class="btn btn-primary form-btn">Shop Review Option <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_review_options.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

