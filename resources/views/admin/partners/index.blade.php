@extends('layout.admin')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <h1>All Partners</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Partners</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <a style="margin-bottom: 5px;" class="btn btn-primary btn-sm" href="{{ route('partners.create') }}">Add New Partner</a>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> All Partners </h3>
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
                  <th>Name</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>

@foreach ($partners as $key => $partner)
<tr>

    <td>{{ $loop->index }}</td>
    <td>{{ $partner['name'] ?? $partner['description'] }}</td>
    <td><img height="60" src="{{ $partner['image']  ?? ''}}" alt="image partner"></td>

    <td>
<button class="btn btn-sm btn-warning rounded-0" type="button" data-toggle="modal" data-target="#update{{ $partner->id() }}" data-toggle="tooltip" data-placement="left" title="Edit">&#9998;</button>

<form style="margin-top: 10px" action="{{ Url('admin/partners/' .$partner->id() )  }}" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"> </i></button>
</form>
            </td>
                </tr>



<!-- Update -->

<div class="modal fade bd-example-modal-lg" id="update{{ $partner->id() }}"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Update Partner</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>

    <div class="modal-body pl-4">

    {!! Form::model($partner->data(), ['method'=>'PATCH', 'action'=> ['Admin\PartnerController@update', $partner->id()] ]) !!}
    <div class="form-group">
    {!! Form::label('Name', 'Description') !!}
    {!! Form::text('description', null, ['class'=>'form-control'])!!}
    </div>

    </div>

    <div class="modal-footer">
    {!! Form::submit('Save changes', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
    </div>



                @endforeach

              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
