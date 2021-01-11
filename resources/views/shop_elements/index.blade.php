@extends('layouts.app')
@section('title')
    Shop Elements 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Elements</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopElements.create')}}" class="btn btn-primary form-btn">Shop Element <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_elements.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

