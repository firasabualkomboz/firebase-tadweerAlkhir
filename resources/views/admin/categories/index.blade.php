@extends('layout.admin')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <h1>الفئات</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Donations</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <a class="btn btn-primary btn-sm" href="{{ route('categories.create') }}">اضافة فئة جديدة</a>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> جميع الفئات </h3>
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
                  <th>Category Name</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>

                @foreach ($categories as $key => $category)

<tr>
<td>{{ $loop->index }}</td>
<td>{{ $category['name'] }}</td>
<td><img src="{{ $category['imageUrl'] ??'' }}" height="60" alt="image category"></td>
<td>


<button class="btn btn-sm btn-warning rounded-0" type="button" data-toggle="modal" data-target="#update{{ $category->id() }}" data-toggle="tooltip" data-placement="left" title="Edit">&#9998;</button>
<button class="btn btn-sm btn-danger rounded-0" type="button" data-toggle="modal" data-target="#delete{{ $category->id() }}" data-toggle="tooltip" data-placement="left" title="Edit"> <i class="fa fa-trash"></i></button>

{{-- <form style="margin-top: 10px" action="{{ Url('admin/categories/' .$category->id() )  }}" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"> </i></button>
</form> --}}

                </td>
                </tr>



<!-- Update -->

<div class="modal fade bd-example-modal-lg" id="update{{ $category->id() }}"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Update Categories</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body pl-4">

{!! Form::model($category->data(), ['method'=>'PATCH', 'action'=> ['Admin\CategoryController@update', $category->id()] ]) !!}
<div class="form-group">
{!! Form::label('Name', 'Name') !!}
{!! Form::text('name', null, ['class'=>'form-control'])!!}
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



<!-- Delete Modal -->
<div class="modal fade" id="delete{{ $category->id() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
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
<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"> Delete </i></button>
</form>

<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>

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
