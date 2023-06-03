@extends('admin.master')
@section('title','Manage Projects')
@section('links')
<link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('manage-properties','active')
<!-- Begin Page Content -->
@section('content')

<!-- main Section for table  -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Manage Projects</h1>
        <a href="{{ route('admin.add.csv') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> upload new csv</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Projects</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr valign="center">
                            <th>Id</th>
                            <th>File Name</th>
                            <th>Created</th>
                            <th style="min-width: 100px;">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>File Name</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $i=1
                        @endphp
                        @foreach($csvs as $csv)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$csv->original_name}}</td>
                            <td>{{$csv->created_at}}</td>
                            <td>
                                <div class="row justify-content-around">
                                    <a onclick="$('#delete-csv-form').attr('action','{{ route('admin.delete.csv',$csv->id) }}')" data-toggle="modal" data-target="#deleteModal">
                                        <i class="fa fa-trash text-danger" style="font-size:20px;" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Main Content -->
<!-- End of Main Content -->

<!-- Footer -->
<!-- End of Footer -->

<!-- /.container-fluid -->
@endsection
<!-- Delete Modal-->
@section('model')
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Delete" below if you are sure to delete File</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" id="deletebtn" href=""
                    onclick="event.preventDefault();
                                  document.getElementById('delete-csv-form').submit();">
                     {{ __('Delete') }}
                 </a>
                 <form id="delete-csv-form" action="" method="POST" class="d-none">
                     @csrf
                     @method('delete')
                 </form>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- End of Main Content -->
@section('script')
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
@endsection