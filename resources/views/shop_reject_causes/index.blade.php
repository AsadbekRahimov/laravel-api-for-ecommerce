@extends('layouts.app')
@section('title')
    Shop Reject Causes 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Reject Causes</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopRejectCauses.create')}}" class="btn btn-primary form-btn">Shop Reject Cause <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_reject_causes.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

