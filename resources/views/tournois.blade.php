@extends('layouts.app')

@section('content')
    <div class="container">
        <br><br>
        <div class="row">
            @foreach($tournois as $tournoi)
                <div class="col-md-3">
                    <a href="/tournoi/{{ $tournoi->slug }}">
                        <img src="{{ Voyager::image( $tournoi->image ) }}" style="width:100%">
                        <span>{{ $tournoi->Libelle }}</span>


                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection