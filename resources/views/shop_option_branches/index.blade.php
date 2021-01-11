@extends('layouts.app')
@section('title')
    Shop Option Branches 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Option Branches</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopOptionBranches.create')}}" class="btn btn-primary form-btn">Shop Option Branch <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_option_branches.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

