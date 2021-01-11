@extends('layouts.app')
@section('title')
    Shop Delay Cause Details 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Shop Delay Cause Details</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('shopDelayCauses.index') }}"
                 class="btn btn-primary form-btn float-right">Back</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">
                    @include('shop_delay_causes.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
