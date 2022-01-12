@extends('layouts.admin')

@section('content-header')
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0 text-dark">الفئات</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
<li class="breadcrumb-item active">الفئات</li>
</ol>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection
@section('content')


<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> <a class="btn btn-primary" href="{{ route('categories.create') }}">إضافة فئة جديدة</a> </h3>

    <div class="card-tools">
    <div class="input-group input-group-sm" style="width: 150px;">
    <input type="text" name="table_search" class="form-control float-right" placeholder="بحث">

    <div class="input-group-append">
    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
    </div>
    </div>
    </div>
    </div>

    <div class="card-body table-responsive p-0">
    <table class="table table-hover">

    <thead>
    <tr>
    <th>الرقم</th>
    <th>الأسم بالعربية</th>
    <th>الأسم بالأنجليزية</th>
    <th>الصورة</th>
    <th>اكشن</th>
    </tr>
    </thead>

    <tbody>
    <tr>


@foreach ($categories as $key => $category)

<tr>
<td>{{ $loop->index }}</td>
<td>{{ $category['arabicName'] }}</td>
<td>{{ $category['name'] }}</td>
<td><img src="{{ $category['imageUrl'] ??'' }}" height="60" alt="image category"></td>
<td>


<button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#update{{ $category->id() }}" data-toggle="tooltip" data-placement="left" title="Edit">
تعديل
</button>

<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#delete{{ $category->id() }}" data-toggle="tooltip" data-placement="left" title="Edit">
حذف
</button>

</td>
</tr>


<!-- Update -->
<div class="modal fade bd-example-modal-lg" id="update{{ $category->id() }}"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">تعديل الفئة</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body pl-4">

{!! Form::model($category->data(), ['method'=>'PATCH', 'action'=> ['Admin\CategoryController@update', $category->id()] ]) !!}
<div class="form-group">
{!! Form::label('Name', 'الأسم بالعربية') !!}
{!! Form::text('arabicName', null, ['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!! Form::label('Name', 'الأسم بالأنجليزية') !!}
{!! Form::text('name', null, ['class'=>'form-control'])!!}
</div>

</div>

<div class="modal-footer">
{!! Form::submit('حفظ التعديلات', ['class'=>'btn btn-success']) !!}
{!! Form::close() !!}
<button type="button" class="btn btn-danger" data-dismiss="modal">تراجع</button>
</div>
</div>
</div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="delete{{ $category->id() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">حذف الفئة</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
هل أنت متأكد من عملية الحذف ؟
</div>
<div class="modal-footer">

<form style="margin-top: 10px" action="{{ Url('admin/categories/' .$category->id() )  }}" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-danger"> تأكيد الحذف </button>
</form>

<button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>

</div>
</div>
</div>
</div>


@endforeach

</tr>



</tbody>
</table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>
<!-- /.row -->

@endsection
