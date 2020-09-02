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
                            <h4 class="card-title ">Edit Item</h4>
                        </div>
                        <div class="card-body">
                                {{--admin/slider/{slider   ||  route('slider.update',$editslider->id)}--}}
                            <form action="{{route('item.update',$item->id)}}" method="post" enctype="multipart/form-data" >
                                @csrf
                                @method('put')
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Item Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$item->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Item Description</label>
                                            <input type="text" name="description" class="form-control" value="{{$item->description}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Item Price</label>
                                            <input type="text" name="price" class="form-control" value="{{$item->price}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        @foreach($it as $its)
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating">{{$its->name}}</label>
                                                <input type="radio"  value="{{$its->name}}" name="cat_id" class="form-control">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row mt-4">
                                            <label class="bmd-label-floating">Item Image</label>
                                            <input type="file" name="image">
                                </div>
                                <a href="{{route('item.index')}}" class="btn btn-danger">Back</a>
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

