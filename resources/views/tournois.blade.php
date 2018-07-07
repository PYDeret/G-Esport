@include('layouts.header')

<section class="content-wrap">

    <div class="youplay-banner banner-top youplay-banner-parallax small">
        <div class="image" style="background-image: url('/images/banner-news.jpg')">
        </div>

        <div class="info">
            <div>
                <div class="container">
                    <h1>Tout nos tournois</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="youplay-banner youplay-banner-parallax small">
        <div class="image" style="background-image: url('/images/banner-broken-age.jpg');">
        </div>

        <div class="info container align-center">
            <div>
                <h2>Prochain tournois</h2>

                <div class="countdown h2" data-end="2018/10/10"></div>

                <br>
                <br>
                <a class="btn btn-lg" href="#!">S'inscrire</a>
            </div>
        </div>
    </section>


    <div class="container youplay-store store-grid">

        <!-- Games List -->
        <div class="col-md-9 isotope">
            <!-- Sort Categories -->
            <ul class="pagination isotope-options">
                <li data-filter="all" class="active"><span>All</span>
                </li>
                <li data-filter="lol"><span>League of Legends</span>
                </li>
                <li data-filter="fortnite"><span>Fortnite</span>
                </li>
            </ul>
            <!-- /Sort Categories -->

            <div class="isotope-list row vertical-gutter">

                @foreach($tournois as $tournoi)

                <div class="item col-lg-4 col-md-6 col-xs-12" data-filters="lol">
                    <a href="{{ $tournoi->slug }}" class="angled-img">
                        <div class="img img-offset">
                            <img src="{{ Voyager::image( $tournoi->image ) }}" alt="">
                            <div class="badge show bg-default">1/3</div>
                        </div>
                        <div class="bottom-info">
                            <h4>{{ $tournoi->libelle }}</h4>
                            <div class="row">
                                {{ substr($tournoi->description, 3, -4) }}
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>

        </div>

    </div>


</section>






@include('layouts.footer')