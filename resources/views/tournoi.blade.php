@include('layouts.header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/tournois.css')}}" />

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

                    <h4>Présentation :</h4>
                    <p>
                    {!! $tournoi->description !!}
                    <p>


                    <h4 class="col-md-12">Equipes inscrites : </h4>

                    <?php $arr = array(); ?>


                    <table class="table table-striped">

                        @foreach($tournoi_equipe as $tournoi_equip)

                            @foreach($equipes as $equipe)
                                <?php

                                if ($tournoi_equip->TournoiId == $tournoi->id && $tournoi_equip->EquipeId == $equipe->id){
                                ?>

                                    <tr>
                                        <td> {!!$equipe->libelle!!} - {!!$equipe->description!!} </td>
                                    <tr>


                                    <?php array_push($arr, $equipe->libelle); ?>

                                <?php } ?>

                            @endforeach

                            <?php if(empty($equipes)){ ?>
                            
                                <p>Aucune équipe inscrite pour le moment</p>
                            <?php } ?>

                        @endforeach

                    </table>

                </div>
            </article>
        </div>
    </div>

    <div class="container youplay-store store-grid">

            <!-- Games List -->
            <div class="col-md-12 isotope">
    
                <?php if(! Auth::guest() && $checker != "false"){ ?>
    
                    <button
                            type="button"
                            class="btn btn-primary btn-lg"
                            data-toggle="modal"
                            data-target="#favoritesModal">
                        S'inscrire a un tournoi
                    </button>
    
                <?php } ?>


                    <form id="manche_res" method="POST" action="{{ route('tournoi.avance') }}">

                        <input type="hidden" name="myteam" value="" />

                        <input type="hidden" name="otherteam" value="" />

                        <input type="hidden" name="slug" value="<?= $slug ?>">

                        <input type="hidden" name="numTournoi" value="<?= $tournoi->id; ?>" />

                        {{ csrf_field() }}
                        
                    </form>

                    <?php if(empty($tournoi->EquipeWin_id)): ?>
                        <button
                                type="button"
                                class="btn btn-primary btn-lg"
                                id="btn_certif">
                            Je certifie avoir gagné la manche
                        </button>
                    <?php endif; ?>
    
                    <?php $arrayTeams = array(); ?>

                    @foreach($mesTeam as $uneTeam)
                        <?php array_push($arrayTeams, $uneTeam->equipe_id); ?>
                    @endforeach  
                    
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
                                    id="favoritesModalLabel">Inscription a un tournoi :</h4>
                            </div>
                            <div class="modal-body">
                                <form method="POST" id="createEq" action="{{ route('tournoi.join') }}">
                                    <div class="container" style="width: 100%;">
                                        <span class="col-md-12 col-xs-12 title">Choisissez votre équipe</span>
                                        <span class="col-md-12 col-xs-12 title" style="font-size: 11px;font-style: italic;">Si votre équipe n'est pas présente, cela indique qu'un joueur de l'équipe est déjà inscrit dans le tournoi avec une autre équipe</span>
                                        <span class='col-md-12 col-xs-12 answer'>


                                            @foreach($equipes as $equipe)

                                                @if($equipe->userId == Auth::id())
                                                    <input id="{{ $equipe->id }}" type="checkbox" name="equipe[]" value="{{ $equipe->id }}">
                                                    <label for="{{ $equipe->id }}" class='col-md-6 col-md-offset-3 col-xs-offset-2 col-xs-8 check-item'>{{ $equipe->libelle }}</label>                       
                                                @endif

                                            @endforeach
    
    
                                        </span>
                                    </div>
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id_tournoi" value="<?= $tournoi->id ?>">
                                    <input type="hidden" name="slug" value="<?= $slug ?>">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                        class="btn btn-default"
                                        data-dismiss="modal">Quitter</button>
                                <span class="pull-right">
                                    <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                        document.getElementById('createEq').submit();">
                                        M'inscrire
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <section id="bracket">
            <div class="container_tournoi">
                <div class="split split-one">

                        <div class="round round-one current">
                                @foreach($pos1 as $key => $equipe)
                                        @if(($key+1) % 2 != 0)
                                            <ul class="matchup">
                                                <li class="team team-top" <?php if(in_array($equipe->id, $arrayTeams)): echo "style='background-color:cornflowerblue'"; endif; ?>>
                                                    <?= $equipe->libelle ?>
                                                    <input type="hidden" value="<?= $equipe->id ?>" />
                                                </li>
                                        @endif

                                        @if(($key+1) % 2 == 0)

                                                <li class="team team-bottom" <?php if(in_array($equipe->id, $arrayTeams)): echo "style='background-color:cornflowerblue'"; endif; ?>>
                                                    <?= $equipe->libelle ?>
                                                    <input type="hidden" value="<?= $equipe->id ?>" />
                                                </li>
                                            </ul>   
                                        @endif
                                @endforeach  									
                        </div>


                        <div class="round round-two">

                                @foreach($pos2 as $key => $equipe)
                                        @if(($key+1) % 2 != 0)
                                            <ul class="matchup">
                                                <li class="team team-top" <?php if(in_array($equipe->id, $arrayTeams)): echo "style='background-color:cornflowerblue'"; endif; ?>>
                                                    <?= $equipe->libelle ?>
                                                    <input type="hidden" value="<?= $equipe->id ?>" />
                                                </li>
                                        @endif

                                        @if(($key+1) % 2 == 0)

                                                <li class="team team-bottom" <?php if(in_array($equipe->id, $arrayTeams)): echo "style='background-color:cornflowerblue'"; endif; ?>>
                                                    <?= $equipe->libelle ?>
                                                    <input type="hidden" value="<?= $equipe->id ?>" />
                                                </li>
                                            </ul>   
                                        @endif
                                @endforeach 

                        </div>

                    
                        <div class="round round-three">		
                            @foreach($pos3 as $key => $equipe)
                                    @if(($key+1) % 2 != 0)
                                        <ul class="matchup">
                                            <li class="team team-top" <?php if(in_array($equipe->id, $arrayTeams)): echo "style='background-color:cornflowerblue'"; endif; ?>>
                                                <?= $equipe->libelle ?>
                                                <input type="hidden" value="<?= $equipe->id ?>" />
                                            </li>
                                    @endif

                                    @if(($key+1) % 2 == 0)

                                            <li class="team team-bottom" <?php if(in_array($equipe->id, $arrayTeams)): echo "style='background-color:cornflowerblue'"; endif; ?>>
                                                <?= $equipe->libelle ?>
                                                <input type="hidden" value="<?= $equipe->id ?>" />
                                            </li>
                                        </ul>   
                                    @endif
                            @endforeach 	
                        </div>	
                    </div> 
            
                    <div class="champion">
                            <div class="final">
                                <i class="fa fa-trophy"></i>
                                <ul class="matchup championship">
     
                                    @foreach($pos4 as $key => $equipe)

                                            @if(($key+1) % 2 != 0)
                                                <ul class="matchup">
                                                    <li class="team team-top" <?php if(in_array($equipe->id, $arrayTeams)): echo "style='background-color:cornflowerblue'"; endif; ?>>
                                                        <?= $equipe->libelle ?>
                                                        <input type="hidden" value="<?= $equipe->id ?>" />
                                                    </li>
                                            @endif

                                            @if(($key+1) % 2 == 0)

                                                    <li class="team team-bottom" <?php if(in_array($equipe->id, $arrayTeams)): echo "style='background-color:cornflowerblue'"; endif; ?>>
                                                        <?= $equipe->libelle ?>
                                                        <input type="hidden" value="<?= $equipe->id ?>" />
                                                    </li>
                                                </ul>   
                                            @endif         
                                    @endforeach 

                                </ul>
                            </div>	
                        </div>
                    </div>


            </div>
        </section>
    </section>
<style>

#arrow{

    margin-left: 5%;
}

</style>

@include('layouts.footer')