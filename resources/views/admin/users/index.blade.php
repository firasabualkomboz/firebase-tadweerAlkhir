@extends('layout.admin')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <h1>All users</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <a class="btn btn-primary btn-sm" href="{{ route('users.create') }}">add new User</a>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> All users </h3>
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
                  <th>Image</th>
                  <th>user Name</th>
                  <th>phone</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>User Type</th>
                  <th>Items Donated</th>
                  <th>Completed Tasks</th>
                  <th>joinDate</th>

                  <th>Action</th>
                </tr>

                @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $loop->index }}</td>
                <td><img src="{{ $user['image_url'] ??'' }}" height="60" alt="image user"></td>

                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['phoneNumber'] ?? '' }}</td>
                    <td>{{ $user['address'] ?? '' }}</td>
                    <td>{{ $user['email'] ?? '' }}</td>
                    <td>{{ $user['type']  ?? ''}}</td>
                    <td><span class="badge">{{ $user['itemsDonated'] ?? ''}}</span></td>
                    <td><span class="">{{ $user['completedTasks'] ?? ''}}</span></td>
                    <td><span class="">{{ $user['joinDate'] ?? ''}}</span></td>

                <td>
                {{-- <a class="btn btn-sm btn-warning" href=""><i class="fa fa-edit"> Edit </i></a> - --}}
                <button class="btn btn-sm btn-warning rounded-0" type="button" data-toggle="modal" data-target="#update{{ $user->id() }}" data-toggle="tooltip" data-placement="left" title="Edit">&#9998;</button>

                <form action="{{ url('delete-user/'.$key ) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"> Delete </i></button>
                </form>
                            </td>
</tr>


<!-- Update -->

<div class="modal fade bd-example-modal-lg" id="update{{ $user->id() }}"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">تحديث مستخدم</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body pl-4">

{!! Form::model($user->data(), ['method'=>'PATCH', 'action'=> ['Admin\UserController@update', $user->id()] ]) !!}
<div class="form-group">
{!! Form::label('Name', 'اسم المستخدم') !!}
{!! Form::text('name', null, ['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!! Form::label('Name', 'رقم الجوال') !!}
{!! Form::text('phoneNumber', null, ['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!! Form::label('Name', 'البريد الألكتروني') !!}
{!! Form::text('email', null, ['class'=>'form-control'])!!}
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


                @endforeach

              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
