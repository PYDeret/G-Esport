@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h1>{{ $equipe->Libelle }}</h1>
                <img src="{{ Voyager::image( $equipe->image ) }}" style="width:100%">
                <p>{!! $equipe->description !!}</p>



            </div>
        </div>
    </div>

@endsection