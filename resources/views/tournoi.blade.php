@include('layouts.header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/tournois.css')}}" />


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

                    <h4>Présentation :</h4>
                    <p>
                    {!! $tournoi->description !!}
                    <p>



                    <h4>Equipes inscrites : </h4>

                    @foreach($tournoi_equipe as $tournoi_equip)

                        @foreach($equipes as $equipe)
                            <?php



                            if ($tournoi_equip->TournoiId == $tournoi->id && $tournoi_equip->EquipeId == $equipe->id){
                            ?>

                                <ul>
                                    <li> {{$equipe->libelle}} - {!!$equipe->description!!} </li>
                                </ul>

                            <?php } ?>

                        @endforeach

                        <?php if(empty($equipes)){ ?>
                        
                            <p>Aucune équipe inscrite pour le moment</p>
                        <?php } ?>

                    @endforeach

                </div>
            </article>
        </div>
    </div>
    
        <section id="bracket">
        <div class="container">
        <div class="split split-one">
            <div class="round round-one current">
                <div class="round-details">Round 1<br/><span class="date">March 16</span></div>
                <ul class="matchup">
                    <li class="team team-top">Duke<span class="score">76</span></li>
                    <li class="team team-bottom">Virginia<span class="score">82</span></li>
                </ul>
                <ul class="matchup">
                    <li class="team team-top">Wake Forest<span class="score">64</span></li>
                    <li class="team team-bottom">Clemson<span class="score">56</span></li>
                </ul>
                <ul class="matchup">
                    <li class="team team-top">North Carolina<span class="score">68</span></li>
                    <li class="team team-bottom">Florida State<span class="score">54</span></li>
                </ul>
                <ul class="matchup">
                    <li class="team team-top">NC State<span class="score">74</span></li>
                    <li class="team team-bottom">Maryland<span class="score">92</span></li>
                </ul>			
                <ul class="matchup">
                    <li class="team team-top">Georgia Tech<span class="score">78</span></li>
                    <li class="team team-bottom">Georgia<span class="score">80</span></li>
                </ul>	
                <ul class="matchup">
                    <li class="team team-top">Auburn<span class="score">64</span></li>
                    <li class="team team-bottom">Florida<span class="score">63</span></li>
                </ul>	
                <ul class="matchup">
                    <li class="team team-top">Kentucky<span class="score">70</span></li>
                    <li class="team team-bottom">Alabama<span class="score">59</span></li>
                </ul>
                <ul class="matchup">
                    <li class="team team-top">Vanderbilt<span class="score">64</span></li>
                    <li class="team team-bottom">Gonzaga<span class="score">68</span></li>
                </ul>										
            </div>	<!-- END ROUND ONE -->
    
            <div class="round round-two">
                <div class="round-details">Round 2<br/><span class="date">March 18</span></div>			
                <ul class="matchup">
                    <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                    <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                </ul>	
                <ul class="matchup">
                    <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                    <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                </ul>	
                <ul class="matchup">
                    <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                    <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                </ul>
                <ul class="matchup">
                    <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                    <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                </ul>										
            </div>	<!-- END ROUND TWO -->
            
            <div class="round round-three">
                <div class="round-details">Round 3<br/><span class="date">March 22</span></div>			
                <ul class="matchup">
                    <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                    <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                </ul>	
                <ul class="matchup">
                    <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                    <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                </ul>										
            </div>	<!-- END ROUND THREE -->		
        </div> 
    
    <div class="champion">
            <div class="semis-l">
                <div class="round-details">west semifinals <br/><span class="date">March 26-28</span></div>		
                <ul class ="matchup championship">
                    <li class="team team-top">&nbsp;<span class="vote-count">&nbsp;</span></li>
                    <li class="team team-bottom">&nbsp;<span class="vote-count">&nbsp;</span></li>
                </ul>
            </div>
            <div class="final">
                <i class="fa fa-trophy"></i>
                <div class="round-details">championship <br/><span class="date">March 30 - Apr. 1</span></div>		
                <ul class ="matchup championship">
                    <li class="team team-top">&nbsp;<span class="vote-count">&nbsp;</span></li>
                    <li class="team team-bottom">&nbsp;<span class="vote-count">&nbsp;</span></li>
                </ul>
            </div>
            <div class="semis-r">		
                <div class="round-details">east semifinals <br/><span class="date">March 26-28</span></div>		
                <ul class ="matchup championship">
                    <li class="team team-top">&nbsp;<span class="vote-count">&nbsp;</span></li>
                    <li class="team team-bottom">&nbsp;<span class="vote-count">&nbsp;</span></li>
                </ul>
            </div>	
        </div>
    
    
        <div class="split split-two">
    
    
            <div class="round round-three">
                <div class="round-details">Round 3<br/><span class="date">March 22</span></div>						
                <ul class="matchup">
                    <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                    <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                </ul>	
                <ul class="matchup">
                    <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                    <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                </ul>										
            </div>	<!-- END ROUND THREE -->	
    
            <div class="round round-two">
                <div class="round-details">Round 2<br/><span class="date">March 18</span></div>						
                <ul class="matchup">
                    <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                    <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                </ul>	
                <ul class="matchup">
                    <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                    <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                </ul>	
                <ul class="matchup">
                    <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                    <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                </ul>
                <ul class="matchup">
                    <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                    <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                </ul>										
            </div>	<!-- END ROUND TWO -->
             <div class="round round-one current">
                <div class="round-details">Round 1<br/><span class="date">March 16</span></div>
                <ul class="matchup">
                    <li class="team team-top">Minnesota<span class="score">62</span></li>
                    <li class="team team-bottom">Northwestern<span class="score">54</span></li>
                </ul>
                <ul class="matchup">
                    <li class="team team-top">Michigan<span class="score">68</span></li>
                    <li class="team team-bottom">Iowa<span class="score">66</span></li>
                </ul>
                <ul class="matchup">
                    <li class="team team-top">Illinois<span class="score">64</span></li>
                    <li class="team team-bottom">Wisconsin<span class="score">56</span></li>
                </ul>
                <ul class="matchup">
                    <li class="team team-top">Purdue<span class="score">36</span></li>
                    <li class="team team-bottom">Boise State<span class="score">40</span></li>
                </ul>			
                <ul class="matchup">
                    <li class="team team-top">Penn State<span class="score">38</span></li>
                    <li class="team team-bottom">Indiana<span class="score">44</span></li>
                </ul>	
                <ul class="matchup">
                    <li class="team team-top">Ohio State<span class="score">52</span></li>
                    <li class="team team-bottom">VCU<span class="score">80</span></li>
                </ul>	
                <ul class="matchup">
                    <li class="team team-top">USC<span class="score">58</span></li>
                    <li class="team team-bottom">Cal<span class="score">59</span></li>
                </ul>
                <ul class="matchup">
                    <li class="team team-top">Virginia Tech<span class="score">74</span></li>
                    <li class="team team-bottom">Dartmouth<span class="score">111</span></li>
                </ul>										
            </div>	<!-- END ROUND ONE -->          				
        </div>
        </div>
        </section>
        <section class="share">
                <div class="share-wrap">
                    <a class="share-icon" href="https://twitter.com/basement47"><i class="fa fa-twitter"></i></a>
                    <a class="share-icon" href="#"><i class="fa fa-facebook"></i></a>
                    <a class="share-icon" href="#"><i class="fa fa-envelope"></i></a>
                </div>
        </section>

</section>



<style>

#arrow{

    margin-left: 5%;
}

</style>

@include('layouts.footer')