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
        <div class="col-md-12 isotope">


            <?php if(! Auth::guest()){ ?>

                <button
                        type="button"
                        class="btn btn-primary btn-lg"
                        data-toggle="modal"
                        data-target="#favoritesModal">
                    Créer une équipe
                </button>

            <?php } ?>

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
                            <form method="POST" id="createTim" action="{{ route('equipe.create') }}">
                                <div class="container" style="width: 100%;">
                                    <span class="col-md-12 col-xs-12 title">Choisissez jusqu'à 4 joueurs pour créer votre équipe</span>
                                    <span class='col-md-12 col-xs-12 answer'>


                                        @foreach($users as $user)

                                                <input id="{{ $user->id }}" type="checkbox" name="team[]" value="{{ $user->id }}">
                                                <label for="{{ $user->id }}" class='col-md-6 col-md-offset-3 col-xs-offset-2 col-xs-8 check-item'>{{ $user->name }}</label>

                                                
                                        @endforeach

                                    </span>
                                </div>
                                {{ csrf_field() }}

                                <p>
                                    <span class="col-md-12 col-xs-12 title">Choisissez un nom : </span>
                                    <input type="text" name="nom" class="inpout_tim"/>
                                </p>
                                
                                <p>
                                    <span class="col-md-12 col-xs-12 title">Choisissez une description : </span>
                                    <input type="text" name="desc" class="inpout_tim"/>
                                </p>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button"
                                    class="btn btn-default"
                                    data-dismiss="modal">Quitter</button>
                            <span class="pull-right">
                                <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                    document.getElementById('createTim').submit();">
                                    Créer
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="isotope-list row vertical-gutter">

                    <div class="item col-lg-12 col-md-12 col-xs-12">
                        @foreach($equipes as $equipe)

                            <div class="col-lg-4 col-md-4" >

                                <?php 
                                
                                    $usr = App\User::where('id', '=', $equipe->userId)->first();
                                    
                                ?>

                                <a href="/equipe/{{ $equipe->slug }}" class="angled-img">
                                <div class="img img-offset">
                                    <img src="/images/teamq.png" alt="" style="width: 20%;">
                                    <div class="badge show bg-default"><?= $usr->name?></div>
                                </div>
                                <div class="bottom-info">
                                    <h4>{{ $equipe->libelle }}</h4>
                                    <div class="row">
                                        {!! $equipe->description !!}
                                    </div>
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

                                </div>
                                </a>

                            </div>
                        @endforeach

                    </div>
            </div>
        </div>
    </div>

</section>



@include('layouts.footer')


<style>

    .angled-img .badge{

        right:0;
        left:auto;
    }
</style>