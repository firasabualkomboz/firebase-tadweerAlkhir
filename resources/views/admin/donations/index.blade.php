
@extends('layouts.admin')

@section('content-header')
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0 text-dark">الطلبات</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
<li class="breadcrumb-item active">الطلبات</li>
</ol>
</div>
</div>
</div>
</div>

@endsection
@section('content')


<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> <a class="btn btn-primary" href="{{ route('donations.create') }}">إضافة طلب جديدة</a> </h3>

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
    <th>الأسم </th>
    <th>الوصف </th>
    <th>حالة الطلب</th>
    <th>اكشن</th>
    </tr>
    </thead>

    <tbody>
    <tr>



@foreach ($donations as $key => $donation)

<tr>
<td>{{ $loop->index }}</td>
<td>{{ $donation['name'] }}</td>
<td>{{ $donation['description'] ??'' }}</td>

{{-- <td><span class="">@php  echo  date('m-d-Y', strtotime($donation['date'])) . ' - ' .
  date('g:i A', strtotime($donation['date'])); @endphp </span></td> --}}

<td><span class="btn btn-sm btn-success">{{ $donation['status'] ?? '' }}</span></td>

<td>        </td>
<td>


<button class="btn btn-sm btn-secondary" type="button" data-toggle="modal" data-target="#details{{ $donation->id() }}" data-toggle="tooltip" data-placement="left" title="details">
تفاصيل أكثر
</button>

<button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#update{{ $donation->id() }}" data-toggle="tooltip" data-placement="left" title="Edit">
تعديل
</button>

<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#delete{{ $donation->id() }}" data-toggle="tooltip" data-placement="left" title="Edit">
حذف
</button>

</td>
</tr>

<!-- details -->

<div class="modal fade bd-example-modal-lg" id="details{{ $donation->id() }}"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">تفاصيل الطلب</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body pl-4">

    <div class="row">
<div class="col-lg-6">
<h4>الصورة</h4>
<img src="{{ $donation['imageUrl'] ?? '' }}"height="50%" width="50%" alt="صورة المستخدم">
</div>

<div class="col-lg-6">
<h4>الفيديو</h4>
<video controls width="250">

<source src="{{ $donation['videoUrl']  ?? 'NAN A VIDEO '}}"
type="video/webm">

<source src="{{ $donation['videoUrl']  ?? 'NAN A VIDEO '}}"
type="video/mp4">

</video>
</div>

<div class="col-lg-4 p-2 text-center" style="background: #f8f8f8; border: solid 1px #000;">
<h6>العنوان</h6>
<hr>
{{ $donation['pickupAddress'] ?? '' }}
</div>

<div class="col-lg-4 p-2 text-center" style="background: #f8f8f8; border: solid 1px #000;">
<h6>التاريخ</h6>
<hr>
@php  echo  date('m-d-Y', strtotime($strtotime['date'] ?? '')) . ' - ' .  date('g:i A', strtotime($strtotime['date'] ?? '')); @endphp
</div>

<div class="col-lg-4 p-2 text-center" style="background: #f8f8f8; border: solid 1px #000;">
<h6>تاريخ التسليم</h6>
<hr>
@php  echo  date('m-d-Y', strtotime($strtotime['joinDate'] ?? '')) . ' - ' .  date('g:i A', strtotime($strtotime['joinDate'] ?? '')); @endphp
</div>

    </div>

</div>


</div>
</div>
</div>

<!-- details -->




<!-- Update -->
<div class="modal fade bd-example-modal-lg" id="update{{ $donation->id() }}"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">تعديل الطلب</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body pl-4">

    {!! Form::model($donation->data(), ['method'=>'PATCH', 'action'=> ['Admin\DonationController@update', $donation->id()] ]) !!}
    <div class="form-group">
    {!! Form::label('Name', 'الأسم') !!}
    {!! Form::text('name', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
    {!! Form::label('Name', 'الموقع الجغرافي') !!}
    {!! Form::text('pickupAddress', null, ['class'=>'form-control'])!!}
    </div>
    {!! Form::label('Name', 'حالة التبرع') !!}

    <div class="form-group form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="inlineRadio3" value="Awaiting Pickup">
        <label class="form-check-label" for="inlineRadio3">قيد التسليم</label>

        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="delivered">
        <label class="form-check-label" for="inlineRadio2">تم التسليم</label>
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
<div class="modal fade" id="delete{{ $donation->id() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">حذف الطلب</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
هل أنت متأكد من عملية الحذف ؟
</div>
<div class="modal-footer">

<form style="margin-top: 10px" action="{{ Url('admin/donations/' .$donation->id() )  }}" method="POST">
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




