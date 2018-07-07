@include('layouts.header')


<!--
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
    </div>-->

<section class="content-wrap">

    <div class="youplay-banner banner-top youplay-banner-parallax small">
        <div class="image" style="background-image: url('/images/banner-battle.jpg')">
        </div>

        <div class="info">
            <div>
                <div class="container">
                    <h1>{{ $tournoi->Libelle }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container youplay-news youplay-post">

        <div class="col-md-9">
            <article class="news-one">

                <div class="description">
                    <div class="angled-img pull-left video-popup">
                        <div class="img">
                            <img src="{{ Voyager::image( $tournoi->image ) }}" style="width:100%" alt="">
                        </div>
                    </div>
                    <p>
                    {!! $tournoi->description !!}
                    <p>
                        {{ $tournoi->DateDebut  }}  qui commence à {{ $tournoi->HeureDebut  }}
                    </p>

                    <p>
                        {{ $tournoi->DateFin }}   qui fini à {{ $tournoi->HeureFin  }}
                    </p>
                </div>

            </article>
        </div>
    </div>

</section>





@include('layouts.footer')