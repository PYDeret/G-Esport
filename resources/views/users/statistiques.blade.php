@include('layouts.header')
<section class="content-wrap">

    @include('layouts.header_profile')

    <div class="container youplay-content">

        <div class="row">

            <div class="col-md-9">

                <h3>Date d'inscription :</h3>
                <table class="table table-bordered">
                <tbody>

                <tr>
                    <td>
                        <p>  {{ $stats->datedinscription->created_at }}</p>
                    </td>
                </tr>
                </tbody>
                </table>

                <h3><?php echo count($stats->tournoisplay);?> Tournois participés :</h3>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th>
                            Nom
                        </th>
                        <th>
                            Avatar
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Horaires
                        </th>
                    </tr>




                 


                @foreach ($stats->tournoisplay as $key => $value)
                    <tr>
                        <td id="libstats">
                            <p> {{ $value->libelle }} </p>
                        </td>
                        <td>
                            <div class="img">
                                <img src="{{ Voyager::image( $value->image ) }}" id="avatar" alt="avatar">
                            </div>
                        </td>
                        <td id="descstats">
                            <p> {!! $value->description !!} </p>
                        </td>
                   <td id="date">
                    <span id="customdate" class="date pull-left"><i class="fa fa-calendar"></i>{{ $value->DateDebut  }} à {{ $value->HeureDebut  }}</span>
                       <p><span id="arrow" class="date pull-center"><i class="fa fa-arrow-down"></i></span></p>
                    <span id="customdate" class="date pull-left"><i class="fa fa-calendar"></i>{{ $value->DateFin }} à {{ $value->HeureFin  }}</span>
                   </td>
                    </tr>

                @endforeach
                    </tbody>
                </table>


                <h3><span id="counter"></span> Tournois remportés :</h3>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th>
                            Nom
                        </th>
                        <th>
                            Avatar
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Horaires
                        </th>
                    </tr>

                    <?php $i=0;?>

                    @foreach ($stats->tournoisplay as $key => $value)

                        @foreach ($stats->inteam as $keys => $values)


                            @if( $value->EquipeWin_id == $values->id )

                                <tr>
                        <td id="libstats">
                            <p> {{ $value->libelle }} </p>
                        </td>
                                    <td id="libstats">

                                        <div class="img">
                                            <img src="{{ Voyager::image( $value->image ) }}" id="avatar" alt="avatar">
                                        </div>

                                    </td>
                                    <td id="descstats">
                                        <p> {!! $value->description !!} </p>
                                    </td>
                        <td id="date">
                            <p>
                                <span id="customdate" class="date pull-left"><i class="fa fa-calendar"></i>{{ $value->DateDebut  }} à {{ $value->HeureDebut  }}</span>
                                <span id="arrow" class="date pull-left"><i class="fa fa-arrow-down"></i></span>
                                <span id="customdate" class="date pull-left"><i class="fa fa-calendar"></i>{{ $value->DateFin }} à {{ $value->HeureFin  }}</span>
                            </p>
                        </td>
                    </tr>

                    </tbody>
                </table>

                            <?php $i++; ?>
                        @endif


                     @endforeach
                @endforeach

                <input type="hidden" id="count" value="<?= $i; ?>"/>

                <h3>Mes equipes (<?php echo count($stats->inteam);?>):</h3>
                <table class="table table-bordered">
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
                            Horaires
                        </th>
                    </tr>
                    @foreach ($stats->inteam as $key => $value)
                    <tr>

                      <td id="libstats">
                          <p> {{ $value->libelle }}</p>
                          @if($value->userId == $user->id)
                              <span class="badge badge-pill" style="background-color:#d91d1f; ">Chef d'équipe</span>
                          @endif
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
                        <td id="date">
                            <p><span id="customdate" class="date pull-left"><i class="fa fa-calendar"></i>{{ $value->created_at  }} </span>

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
    #avatar{

        max-width: 70px;
    }
    #avataruser{

        max-width: 40px;
        padding: 5px;
    }

    #arrow{

        margin-left: 50%;
    }
    #customdate{

        margin-left: 10%;
    }



</style>