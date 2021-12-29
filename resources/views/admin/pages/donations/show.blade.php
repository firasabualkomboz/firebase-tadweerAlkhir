@extends('admin.layout.app')

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
     
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">See All The Donations</h3>
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
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>

                <tr>
                    <td>183</td>
                    <td>Chairs</td>
                    <td>11-7-2021</td>
                    <td><span class="label label-success">Delivered</span></td>
                    <td>View - Edit - Delete</td>
                </tr>

                <tr>
                    <td>184</td>
                    <td>Cloths</td>
                    <td>02-8-2021</td>
                    <td><span class="label label-success">Delivered</span></td>
                    <td>View - Edit - Delete</td>
                </tr>

                <tr>
                    <td>185</td>
                    <td>Chairs</td>
                    <td>11-7-2021</td>
                    <td><span class="label label-success">Delivered</span></td>
                    <td>View - Edit - Delete</td>
                </tr>

                <tr>
                    <td>186</td>
                    <td>Chairs</td>
                    <td>11-7-2021</td>
                    <td><span class="label label-success">Delivered</span></td>
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