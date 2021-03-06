@extends('admin.layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <h1>Edit Order</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Order</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Order Number 12</h3>
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
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection