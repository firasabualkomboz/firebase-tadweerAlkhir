@extends('layouts.admin')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <h1> welcome {{ Auth::user()->name }}</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      </div>
    </section>
  </div>

@endsection
