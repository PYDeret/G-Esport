@include('layouts.header')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h1>{{ $tournoi->Libelle }}</h1>
                <img src="{{ Voyager::image( $tournoi->image ) }}" style="width:100%">
                <p>{!! $tournoi->description !!}</p>
                <p>{{ $tournoi->DateDebut  }}  qui commence à {{ $tournoi->HeureDebut  }}</p>
                <p>{{ $tournoi->DateFin }}   qui fini à {{ $tournoi->HeureFin  }}</p>


            </div>
        </div>
    </div>

@endsection

@include('layouts.footer')