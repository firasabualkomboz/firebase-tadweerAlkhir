
@extends('layouts.admin')

@section('content-header')
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0 text-dark">تعديل على بيانات الطلب</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
<li class="breadcrumb-item active"> الطلبات</li>
<li class="breadcrumb-item active">تعديل على بيانات الطلب</li>
</ol>
</div>
</div>
</div>
</div>
@endsection
@section('content')

<div class="row">
<!-- left column -->
<div class="col-md-6">
<!-- general form elements -->
<div class="card card-primary">

<!-- form start -->

<form class="" action="{{ route('donations.update' , $key) }}" method="PUT">
@csrf
@include('admin.donations._form')
</form>


</div>
<!-- /.card -->


</div>
<!--/.col (left) -->


</div>
<!-- /.row -->

@endsection

