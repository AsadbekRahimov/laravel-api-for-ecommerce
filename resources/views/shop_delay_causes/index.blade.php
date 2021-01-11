@extends('layouts.app')
@section('title')
    Shop Delay Causes 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Delay Causes</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopDelayCauses.create')}}" class="btn btn-primary form-btn">Shop Delay Cause <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_delay_causes.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

