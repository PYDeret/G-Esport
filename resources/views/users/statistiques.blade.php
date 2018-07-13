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
                @foreach ($stats->tournoisplay as $key => $value)
                    <tr>
                        <td id="libstats">
                            <p> {{ $value->libelle }} </p>
                        </td>
                        <td id="descstats">
                            <p> {!! $value->description !!} </p>
                        </td>
                   <td>
                    <span  class="date pull-left"><i class="fa fa-calendar"></i>{{ $value->DateDebut  }} - {{ $value->HeureDebut  }}</span>
                       <span id="arrow" class="date pull-left"><i class="fa fa-arrow-right"></i></span>
                    <span class="date pull-right"><i class="fa fa-calendar"></i>{{ $value->DateFin }} à  {{ $value->HeureFin  }}</span>
                   </td>
                    </tr>

                @endforeach
                    </tbody>
                </table>


                <h3><span id="counter"></span> Tournois remportés :</h3>
                <table class="table table-bordered">
                    <tbody>

                    <?php $i=0;?>

                    @foreach ($stats->tournoisplay as $key => $value)

                        @foreach ($stats->inteam as $keys => $values)


                            @if( $value->EquipeWin_id == $values->id )

                                <tr>
                        <td id="libstats">
                            <p> {{ $value->libelle }} </p>
                        </td>
                                    <td id="descstats">
                                        <p> {!! $value->description !!} </p>
                                    </td>
                        <td>
                            <p>
                                <span  class="date pull-left"><i class="fa fa-calendar"></i>{{ $value->DateDebut  }} à {{ $value->HeureDebut  }}</span>
                                <span id="arrow" class="date pull-left"><i class="fa fa-arrow-right"></i></span>
                                <span class="date pull-left"><i class="fa fa-calendar"></i>{{ $value->DateFin }} à {{ $value->HeureFin  }}</span>
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
                            <p><span  class="date pull-left"><i class="fa fa-calendar"></i>{{ $value->created_at  }} </span>
                                <span id="arrow" class="date pull-left"><i class="fa fa-arrow-right"></i></span>
                                <span class="date pull-right"><i class="fa fa-calendar"></i>{{ $value->created_at }} </span></p>
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
        width: 21%;
    }
    #descstats{
        width: 38%;

    }


</style>