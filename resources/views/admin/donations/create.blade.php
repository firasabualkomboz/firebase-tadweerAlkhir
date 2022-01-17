

@extends('layout.admin')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <h1>All Donations</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">يonations</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Add New Donation </h3>
            </div>

          </div>


            <form class="" action="{{ route('donations.store') }}" method="post">
            @csrf
            @include('admin.donations._form')
            </form>


        </div>
      </div>
    </section>
  </div>

@endsection
