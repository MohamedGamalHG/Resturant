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
                    <a class="btn btn-primary" href="{{route('category.create')}}">Add New Category</a>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Category</h4>
                            <p class="card-category"> Here is a subtitle for this table</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table  id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($cat as $key => $value)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->slug}}</td>
                                        <td><a href="{{route('category.edit',$value->id)}}" class="btn btn-info">Edit</a>
                                            <form id="form-delete-{{$value->id}}" method="post"
                                             action="{{route('category.destroy',$value->id)}}" style="display: none">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <button class="btn btn-danger"
                                             onclick="if(confirm('You Will Delete it ')){
                                                 event.preventDefault();
                                                 document.getElementById('form-delete-{{$value->id}}').submit();}
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
