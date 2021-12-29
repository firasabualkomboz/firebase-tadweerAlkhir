@extends('layout.admin')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <h1>All Donations</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Donations</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <a class="btn btn-primary btn-sm" href="{{ route('donations.create') }}">Add New Donation</a>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> All Caregories </h3>
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
                  <th>Donation Name</th>
                  <th>Description</th>
                  <th>Address</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>

                @foreach ($donations as $key => $donation)
                <tr>
                    <td>{{ $loop->index }}</td>
                    <td>{{ $donation['name'] }}</td>
                    <td>{{ $donation['description'] ??'' }}</td>
                    <td>{{ $donation['address'] ?? '' }}</td>
                    <td>{{ $donation['data'] ?? '' }}</td>
                    <td>{{ $donation['status'] ?? '' }}</td>
                    <td><img src="" alt="image donation"></td>

                <td>
                {{-- <a class="btn btn-sm btn-warning" href=""><i class="fa fa-edit"> Edit </i></a> - --}}
                <form action="{{ url('delete-donation/'.$key ) }}" method="POST">
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
