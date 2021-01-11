@extends('layouts.app')
@section('title')
    Shop Questions 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shop Questions</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('shopQuestions.create')}}" class="btn btn-primary form-btn">Shop Question <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('shop_questions.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

