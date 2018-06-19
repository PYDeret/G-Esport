@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h1>{{ $page->title }}</h1>
                <img src="{{ Voyager::image( $page->image ) }}" style="width:100%">
                <p>{!! $page->body !!}</p>

            </div>
        </div>
    </div>

@endsection