@extends('layouts.app')
@section('title')
    Shop Reject Cause Details 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Shop Reject Cause Details</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('shopRejectCauses.index') }}"
                 class="btn btn-primary form-btn float-right">Back</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">
                    @include('shop_reject_causes.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
