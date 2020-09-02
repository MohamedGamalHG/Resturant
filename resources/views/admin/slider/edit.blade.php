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
                            <h4 class="card-title ">Edit Slider</h4>
                        </div>
                        <div class="card-body">
                                {{--admin/slider/{slider   ||  route('slider.update',$editslider->id)}--}}
                            <form action="{{url('admin/slider/'.$editslider->id)}}" method="post" enctype="multipart/form-data" >
                                @csrf
                                @method('put')
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Title</label>
                                            <input type="text" name="title" class="form-control" value="{{$editslider->title}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Sub Title</label>
                                            <input type="text" name="sub_title" class="form-control" value="{{$editslider->sub_title}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                            <label class="control-label">Image</label>
                                            <input type="file" name="photo">
                                    </div>
                                </div>
                                <a href="{{route('slider.index')}}" class="btn btn-danger">Back</a>
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

