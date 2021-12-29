@extends('admin.layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <h1>All Drivers</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Drivers</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">See All The Drivers</h3>
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
                  <th>Status</th>
                  <th>Action</th>
                </tr>

                <tr>
                    <td>1</td>
                    <td>Rizq Ali</td>
                    <td><span class="label label-success">Active</span></td>
                    <td>View - Edit - Delete</td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Naif Omer</td>
                    <td><span class="label label-success">Active</span></td>
                    <td>View - Edit - Delete</td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>Mohammed Jaz</td>
                    <td><span class="label label-danger">Inactive</span></td>
                    <td>View - Edit - Delete</td>
                </tr>
              
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection