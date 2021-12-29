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
                  <th>user Name</th>
                  <th>phone</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>User Type</th>
                  <th>Donations Count</th>
                  <th>Action</th>
                </tr>

                @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $loop->index }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['phone'] ?? '' }}</td>
                    <td>{{ $user['address'] ?? '' }}</td>
                    <td>{{ $user['email'] ?? '' }}</td>
                    <td>{{ $user['type']  ?? ''}}</td>
                    <td><span class="badge">{{ $user['count_donations'] ?? ''}}</span></td>

                <td>
                {{-- <a class="btn btn-sm btn-warning" href=""><i class="fa fa-edit"> Edit </i></a> - --}}
                <form action="{{ url('delete-user/'.$key ) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"> Delete </i></button>
                </form>
                            </td>
                </tr>

                @endforeach

              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
