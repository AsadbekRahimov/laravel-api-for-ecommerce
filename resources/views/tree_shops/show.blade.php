@extends('layouts.app')
@section('title')
    Tree Shop Details 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Tree Shop Details</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('treeShops.index') }}"
                 class="btn btn-primary form-btn float-right">Back</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">
                    @include('tree_shops.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
