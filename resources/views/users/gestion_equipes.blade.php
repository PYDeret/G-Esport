@include('layouts.header')
<section class="content-wrap">

    @include('layouts.header_profile')

    <div class="container youplay-content">

        <div class="row">

            <div class="col-md-9">

                <h3>Mes equipes (<?php echo count($mesEquipes->myteams);?>):</h3>
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>
                            Nom
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Autres membres
                        </th>
                        <th>
                            Tournois joués
                        </th>
                        <th style="text-align: center">
                            Horaires
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    <?php
                    $users = App\User::all();
                    ?>
                    @foreach ($mesEquipes->myteams as $key => $value)

                        <tr>

                            <td id="libstats">
                                <p> {{ $value->libelle }}</p>
                                <?php

                                if($value->userId == Auth::user()->id){
                                ?>
                                <span class="badge badge-pill" style="background-color:#d91d1f; ">Chef d'équipe</span>
                                <?php
                                }
                                ?>
                            </td>

                            <td id="descstats">
                                <p>{!! $value->description !!}</p>

                            </td>

                            <td>
                                <?php
                                $users = App\User::all();
                                $equipes_users =App\EquipesUsers::all();

                                ?>
                                @foreach($equipes_users as $equipes_user)
                                    @foreach($users as $user)
                                        <?php
                                        if ($equipes_user->equipe_id == $value->id && $equipes_user->user_id == $user->id && $equipes_user->user_id != Auth::user()->id)
                                        {
                                        ?>


                                        <p><img src="{{ Voyager::image( $user->avatar ) }}" id="avataruser" alt="avatar"> {{$user->name}}  </p>



                                        <?php } ?>
                                    @endforeach
                                @endforeach
                            </td>
                            <td>
                                <?php
                                $tournois = App\Tournoi::all();
                                $tournois_equipes =App\TournoisEquipe::all();

                                ?>
                                @foreach($tournois_equipes as $tournois_equipe)
                                    @foreach($tournois as $tournoi)
                                        <?php
                                        if ($tournois_equipe->EquipeId == $value->id && $tournois_equipe->TournoiId == $tournoi->id)
                                        {
                                        ?>
                                        <p><img src="{{ Voyager::image( $tournoi->image ) }}" id="avataruser" alt="avatar"> {{$tournoi->libelle}}  </p>

                                        <?php } ?>
                                    @endforeach
                                @endforeach


                            </td>
                            <td id="date">
                                <p><span id="customdate" class="date pull-left"><i class="fa fa-calendar"></i>{{ $value->created_at  }} </span>

                            </td>
                            <td>

                                <form method="POST" id="deleteEquipe" action="{{ route('users.deleteEquipe') }}">


                                    {{ csrf_field() }}

                                    <input type="hidden" name="id" class="form-control" value="{{$value->id}}">

                                </form>
                                <a type=“submit” class="btn btn-sm btn-default" onclick="event.preventDefault();
                                   document.getElementById('deleteEquipe').submit();"> Supprimer </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')


<script>

    $(function () {

        $('#counter').html($('#count').val());

    });
</script>

<style>

    #libstats{
        min-width: 21%;
    }
    #descstats{
        min-width: 38%;

    }

    #date{

        width: 25%;
    }

    #avataruser{

        max-width: 40px;
        padding: 5px;
    }

    #customdate{

        margin-left: 10%;
    }



</style>