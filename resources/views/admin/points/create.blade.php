
@extends('layouts.admin')

@section('content-header')
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0 text-dark">إضافة نقطة تسليم جديدة</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
<li class="breadcrumb-item active">نقاط التسليم</li>
<li class="breadcrumb-item active">اضافة نقطة تسليم جديدة</li>
</ol>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection
@section('content')

<div class="row">
<!-- left column -->
<div class="col-md-6">
<!-- general form elements -->
<div class="card card-primary">

<!-- form start -->

<form role="form" class="" action="{{ route('points.store') }}" method="post">
@csrf
@include('admin.points._form')
</form>

</div>
<!-- /.card -->


</div>
<!--/.col (left) -->


</div>
<!-- /.row -->

@endsection

