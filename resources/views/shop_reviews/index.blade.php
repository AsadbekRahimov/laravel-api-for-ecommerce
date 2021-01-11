@extends('layouts.app')
@section('title')
    Shop Reviews 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Reviews</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopReviews.create')}}" class="btn btn-primary form-btn">Shop Review <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_reviews.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

