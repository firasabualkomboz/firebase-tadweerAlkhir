@extends('layout.admin')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <h1>النقاط </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <a class="btn btn-primary btn-sm" href="{{ route('points.create') }}">إضافة نقطة إستلام </a>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> كل النقاط </h3>
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
                  <th>الأسم</th>
                  <th>الموقع</th>
                  <th>أكشن</th>
                </tr>

                @foreach ($points as $key => $point)
                <tr>
                    <td>{{ $loop->index }}</td>
                    <td>{{ $point['name'] }}</td>
                    <td>{{ json_encode($point['location'] , true) ?? '' }}</td>


                <td>
                {{-- <a class="btn btn-sm btn-warning" href=""><i class="fa fa-edit"> Edit </i></a> - --}}
<button class="btn btn-sm rounded-0 ml-2 btn-warning" type="button" data-toggle="modal" data-target="#update{{ $point->id() }}" data-toggle="tooltip" data-placement="top" title="update">تعديل</button>
<button class="btn btn-sm rounded-0 ml-2 btn-danger" type="button" data-toggle="modal" data-target="#delete{{ $point->id() }}" data-toggle="tooltip" data-placement="top" title="Delete">حذف</button>

                            </td>
                </tr>



<!-- Update -->

<div class="modal fade bd-example-modal-lg" id="update{{ $point->id() }}"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">تحديث النقطة</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>

    <div class="modal-body pl-4">

    {!! Form::model($point->data(), ['method'=>'PATCH', 'action'=> ['Admin\PointController@update', $point->id()] ]) !!}

    <div class="form-group">
    {!! Form::label('Name', 'الأسم') !!}
    {!! Form::text('name', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        <label for="">الموقع</label>
        <input type="text" name="location" class="form-control" id="">

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



 <!-- Delete Modal -->
<div class="modal fade" id="delete{{ $point->id() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">حذف نقطة</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    هل أنت متأكد من عملية الحذف ؟
    </div>
    <div class="modal-footer">

    <form  action="{{ url('admin/points/' .$point->id() )  }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"> حذف </i></button>
    </form>

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
