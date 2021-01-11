@extends('layouts.app')
@section('title')
    Shop Channels 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Channels</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopChannels.create')}}" class="btn btn-primary form-btn">Shop Channel <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_channels.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

