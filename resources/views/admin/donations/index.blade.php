@extends('layout.admin')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <h1> التبرعات</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Donations</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        {{-- <a class="btn btn-primary btn-sm" href="{{ route('donations.create') }}">Add New Donation</a> --}}

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> كل التبرعات </h3>
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
                  <th> الأسم </th>
                  <th>الوصف</th>
                  <th>عنوان التسليم</th>
                  <th>التاريخ</th>
                  <th>تاريخ التسليم</th>
                  <th>الحالة</th>
                  <th>الصورة</th>
                  <th>الفيديو</th>
                  <th>أكشن</th>
                </tr>

                @foreach ($donations as $key => $donation)
                <tr>
                    <td>{{ $loop->index }}</td>
                    <td>{{ $donation['name'] }}</td>
                    <td>{{ $donation['description'] ??'' }}</td>
                    <td >{{ $donation['pickupAddress'] ?? '' }}</td>
                    <td>{{ $donation['date'] ?? '' }}</td>
                    <td>{{ $donation['pickupDateTime'] ?? '' }}</td>
                    {{-- <td>{!! date('d-m-Y' , strtotime($donation['date'])) ?? '' !!}</td> --}}

                    <td><span class="btn btn-sm btn-warning">{{ $donation['status'] ?? '' }}</span></td>
                    <td><img src="{{ $donation['imageUrl'] ??'' }}" height="60" alt="image donation"></td>
                    <td>    <iframe src="{{ $donation['videoUrl']  ?? 'NAN A VIDEO '}}" width="100" height="100"></iframe>
                    </td>

                <td>
                {{-- <a class="btn btn-sm btn-warning" href=""><i class="fa fa-edit"> Edit </i></a> - --}}
                {{-- <form id="my-form" action="{{ url('admin/donations/' .$donation->id() )  }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button id="btn" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"> Delete </i></button>
                </form> --}}
                <button class="btn btn-sm rounded-0 ml-2 btn-danger" type="button" data-toggle="modal" data-target="#delete{{ $donation->id() }}" data-toggle="tooltip" data-placement="top" title="Delete">Delete</button>


            </td>
                </tr>


                <!-- Delete Modal -->
<div class="modal fade" id="delete{{ $donation->id() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        <form id="my-form" action="{{ url('admin/donations/' .$donation->id() )  }}" method="POST">
            @csrf
            @method('DELETE')
            <button id="btn" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"> Delete </i></button>
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
