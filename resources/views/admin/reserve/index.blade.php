@extends('layouts.app')

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Reservation</h4>
                            <p class="card-category"> Here is a subtitle for this table</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table  id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Date And Time</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($reserve as $key => $value)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->phone}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->date_and_time}}</td>
                                        <td>{{$value->message}}</td>
                                        <td>
                                            @if($value->status == true)
                                                <span class="btn btn-info">Confirmed</span>
                                            @else
                                                <span class="btn btn-danger">Not Confirmed</span>
                                                @endif
                                        </td>
                                        <td>
                                            @if($value->status == false)
                                                <form id="status-form-{{$value->id}}" method="post"
                                                 action="{{route('reserve.status',$value->id)}}" style="display: none">
                                                    @csrf
                                                </form>
                                                <button class="btn btn-info"
                                                 onclick="if(confirm('you verify this request by phone ?')){
                                                     event.preventDefault();
                                                     document.getElementById('status-form-{{$value->id}}').submit();}
                                                     else {event.preventDefault();}">Done</button>
                                            @endif

                                                <form id="delete-form-{{$value->id}}" method="post"
                                                      action="{{route('reserve.destroy',$value->id)}}" style="display: none">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                <button class="btn btn-danger"
                                                        onclick="if(confirm('You Will Delete it ')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{$value->id}}').submit();}
                                                            else {event.preventDefault();}">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @endsection


@push('script')
            <script src="https://code.jquery.com/jquery-3.5.1.js "></script>
            <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
            $(document).ready(function() {
            $('#example').DataTable();
            } );
    </script>
@endpush
