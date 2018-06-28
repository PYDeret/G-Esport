@extends('layouts.app')

@section('content')
    <div class="container">
        <br><br>
        <div class="row">
            @foreach($equipes as $equipe)
                <div class="col-md-3">
                    <a href="/equipe/{{ $equipe->slug }}">
                        <img src="{{ Voyager::image( $equipe->image ) }}" style="width:100%">
                        <span>{{ $equipe->libelle }}</span>


                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection