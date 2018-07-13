@include('layouts.header')

<section class="content-wrap">


    <div class="youplay-banner banner-top youplay-banner-parallax small">
        <div class="image" style="background-image: url('/images/halo.jpg')">
        </div>

        <div class="info">
            <div>
                <div class="container">
                    <h1>Equipes</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container youplay-store store-grid">

        <!-- Games List -->
        <div class="col-md-9 isotope">

            <button
                    type="button"
                    class="btn btn-primary btn-lg"
                    data-toggle="modal"
                    data-target="#favoritesModal">
                Créer une équipe
            </button>

            <br><br>


            <div class="modal fade" id="favoritesModal"
                 tabindex="-1" role="dialog"
                 aria-labelledby="favoritesModalLabel">

                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close"
                                    data-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"
                                id="favoritesModalLabel">Création d'une equipe :</h4>
                        </div>
                        <div class="modal-body">

                                @foreach($users as $user)
                                    <p>

                                {{$user->name}}
                                <!--$user->where('id','=', $participant->user_id)->get(['name']) foreach participant ou non ?-->
                                    </p>
                                  @endforeach



                        </div>
                        <div class="modal-footer">
                            <button type="button"
                                    class="btn btn-default"
                                    data-dismiss="modal">Quitter</button>
                            <span class="pull-right">
          <button type="button" class="btn btn-primary">
            Créer
          </button>
        </span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="isotope-list row vertical-gutter">

                    <div class="item col-lg-4 col-md-6 col-xs-12">
                        @foreach($equipes as $equipe)

                            <a href="/equipe/{{ $equipe->slug }}" class="angled-img">
                            <div class="img img-offset">
                                <img src="/images/teamq.png" alt="" style="width: 20%;">

                            </div>
                            <div class="bottom-info">
                                <h4>{{ $equipe->libelle }}</h4>
                                <div class="row">
                                    <p> Membres :</p>
                                    @foreach($equipes_users as $equipes_user)
                                    @foreach($users as $user)
                                            <?php

                                            if ($equipes_user->equipe_id == $equipe->id && $equipes_user->user_id == $user->id)
                                            {
                                                ?>
                                            <li>
                                                {{ $user->name }}
                                            </li>

                                                <?php
                                            }
                                                ?>

                                    @endforeach
                                    @endforeach
                                </div>
                                <div class="row">
                                    {!! $equipe->description !!}
                                </div>
                            </div>
                            </a>
                        @endforeach

                    </div>
            </div>
        </div>
    </div>

</section>



@include('layouts.footer')