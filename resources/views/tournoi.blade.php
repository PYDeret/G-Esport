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

        <?php

        if ($tournoi->JeuId == 1 ){
            $wall = "lolwall";
        }
        elseif($tournoi->JeuId == 2 ){
            $wall = "fortnitewall";
        }
        ?>

            <div class="image" style="background-image: url('/images/<?= $wall ?>.jpg')">

            </div>
        <div class="info">
            <div>
                <div class="container">
                    <h1>{{ $tournoi->libelle }}</h1>
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

                        <span  class="date pull-left"><i class="fa fa-calendar"></i>{{ $tournoi->DateDebut  }}  à {{ $tournoi->HeureDebut  }}</span>
                        <span id="arrow" class="date pull-left"><i class="fa fa-arrow-right"></i></span>
                        <span class="date pull-right"><i class="fa fa-calendar"></i>{{ $tournoi->DateFin }} à  {{ $tournoi->HeureFin  }}</span>
                    <br><br>
                    <p>
                    {!! $tournoi->description !!}
                    <p>


                    <h5>Equipes inscrites : </h5>

                    @foreach($tournoi_equipe as $tournoi_equip)


                        @foreach($equipes as $equipe)


                            <p>{{ $equipe->where('id','=' ,substr($tournoi_equip->where('TournoiId', '=', $tournoi->id)->get(["EquipeId"]), 13,1 ))->get(["libelle"])}}</p>



                        @endforeach


                    @endforeach


                </div>

            </article>
        </div>
    </div>

</section>



<style>

#arrow{

    margin-left: 5%;
}

</style>

@include('layouts.footer')