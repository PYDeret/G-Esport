@include('layouts.header')

<section class="content-wrap">

    <div class="youplay-banner banner-top youplay-banner-parallax small">
        <div class="image" style="background-image: url('/images/banner-battle.jpg')">
        </div>

        <div class="info">
            <div>
                <div class="container">
                    <h1>Tournament</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container youplay-news youplay-post">

        <div class="col-md-9">
            <article class="news-one">

                <div class="description">
                    <div class="angled-img pull-left video-popup">
                        <div class="container">
                            <br><br>
                            <div class="row">
                                @foreach($tournois as $tournoi)
                                    <div class="col-md-3">
                                        <a href="/tournoi/{{ $tournoi->slug }}">
                                            <div class="img">
                                            <img src="{{ Voyager::image( $tournoi->image ) }}" style="width:100%">
                                            </div>
                                            <span>{{ $tournoi->libelle }}</span>


                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                    <p> {{ substr($tournoi->description, 3, -4) }}
                    </p>
                    <p>
                        infos tournois complémentaires
                    </p>

                </div>

            </article>
        </div>
    </div>

</section>






@include('layouts.footer')