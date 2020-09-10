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
                            Message get from user {{$contact->name}}
                        </div>
                        <div class="card-body">
                            <h3>the content of message</h3>
                            <p>{{$contact->message}}</p>
                            <a href="{{route('admin.contact')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
@push('script')
    @endpush

