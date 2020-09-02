@extends('layouts.app')

@push('css')

@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.slider.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Add New Item</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Item Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Item Description</label>
                                            <input type="text" name="description" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Item Price</label>
                                            <input type="text" name="price" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        @foreach($item as $items)
                                        <div class="form-group bmd-form-group">
                                             <label class="bmd-label-floating">{{$items->name}}</label>
                                             <input type="radio"  value="{{$items->name}}" name="cat_id" class="form-control">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                            <label class="bmd-label-floating">Image</label>
                                            <input type="file" name="image">
                                    </div>
                                </div>
                                <a href="{{route('category.index')}}" class="btn btn-danger">Back</a>
                                <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
@push('script')
    @endpush

