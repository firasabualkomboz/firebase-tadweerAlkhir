@extends('layout.admin')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <h1> التبرعات</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Donations</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        {{-- <a class="btn btn-primary btn-sm" href="{{ route('donations.create') }}">Add New Donation</a> --}}


      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> كل التبرعات </h3>
              <div class="box-tools">
                <div class="input-group">
                  <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                  <div class="input-group-btn">
                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th> الأسم </th>
                  <th>الوصف</th>
                  <th>عنوان التسليم</th>
                  <th>التاريخ</th>
                  <th>تاريخ التسليم</th>
                  <th>الحالة</th>
                  <th>الصورة</th>
                  <th>الفيديو</th>
                  <th>أكشن</th>
                </tr>
            
                @foreach ($donations as $key => $donation)

                <tr>

                    <td>{{ $loop->index }}</td>
                    <td>{{ $donation['name'] }}</td>
                    <td>{{ $donation['description'] ??'' }}</td>
                    <td >{{ $donation['pickupAddress'] ?? '' }}</td>
                    <td>{{ $donation['date'] ?? '' }}</td>
                    <td> {{ $donation['pickupDateTime'] ?? '' }}</td>
                    {{-- <td>{!! date('d-m-Y' , strtotime($donation['date'])) ?? '' !!}</td> --}}

                    <td><span class="btn btn-sm btn-success">{{ $donation['status'] ?? '' }}</span></td>
                    <td><img src="{{ $donation['imageUrl'] ??'' }}" height="100" alt="image donation"></td>
                    <td>
    {{-- <button class="btn" type="button" data-toggle="modal" data-target="#video" data-toggle="tooltip" data-placement="top" title="Delete"> الفيديو </button>
 --}}
 <video controls width="250">

    <source src="{{ $donation['videoUrl']  ?? 'NAN A VIDEO '}}"
            type="video/webm">

    <source src="{{ $donation['videoUrl']  ?? 'NAN A VIDEO '}}"
            type="video/mp4">

</video>


                    </td>


                <td>

                <button class="btn btn-sm rounded-0 ml-2 btn-warning" type="button" data-toggle="modal" data-target="#update{{ $donation->id() }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-edit"></i></button>

                <button class="btn btn-sm rounded-0 ml-2 btn-danger" style="margin-top: 5px" type="button" data-toggle="modal" data-target="#delete{{ $donation->id() }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>


            </td>
                </tr>





<!-- Update -->

<div class="modal fade bd-example-modal-lg" id="update{{ $donation->id() }}"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">تعديل على التبرع</h5>
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
{!! Form::submit('تحديث', ['class'=>'btn btn-success']) !!}
{!! Form::close() !!}
<button type="button" class="btn btn-danger" data-dismiss="modal">تراجع</button>
</div>
</div>
</div>
</div>

{{-- end update  --}}

<!-- Delete Modal -->
<div class="modal fade" id="delete{{ $donation->id() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">حذف التبرع</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
هل أنت متأكد من عملية الحذف ؟
</div>
<div class="modal-footer">

<form id="my-form" action="{{ url('admin/donations/' .$donation->id() )  }}" method="POST">
@csrf
@method('DELETE')
<button  type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"> حذف </i></button>
</form>

<button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>

</div>
</div>
</div>
</div>
{{-- end delete --}}


<!-- Delete Modal -->
<div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">حذف التبرع</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
test

{{--
    <iframe width="200" height="200" src="{{ $donation['videoUrl']  ?? 'NAN A VIDEO '}}" allowfullscreen="" controls="0" autoplay="0" frameborder="0" scrolling="no"></iframe> --}}



<video controls width="250">

    <source src="{{ $donation['videoUrl']  ?? 'NAN A VIDEO '}}"
            type="video/webm">

    <source src="{{ $donation['videoUrl']  ?? 'NAN A VIDEO '}}"
            type="video/mp4">

</video>





</div>
<div class="modal-footer">


<button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>

</div>
</div>
</div>
</div>
{{-- end delete --}}

                @endforeach

              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


@endsection
