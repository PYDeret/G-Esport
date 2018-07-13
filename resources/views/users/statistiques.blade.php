@include('layouts.header')
<section class="content-wrap">

    @include('layouts.header_profile')

    <div class="container youplay-content">

        <div class="row">

            <div class="col-md-9">

                <h4><?php echo count($stats->tournoisplay);?> Tournois participés :</h4>

                @foreach ($stats->tournoisplay as $key => $value)

                 <p> {{ $value->libelle }} - {{ $value->description }}</p>
                    <span  class="date pull-left"><i class="fa fa-calendar"></i>{{ $value->DateDebut  }} - {{ $value->HeureDebut  }}</span>
                    <span id="arrow" class="date pull-center"><i class="fa fa-arrow-right"></i></span>
                    <span class="date pull-right"><i class="fa fa-calendar"></i>{{ $value->DateFin }} à  {{ $value->HeureFin  }}</span>

                @endforeach

                <h4><span id="counter"></span> Tournois remportés :</h4>

                <?php $i=0;?>

                @foreach ($stats->tournoisplay as $key => $value)

                     @foreach ($stats->inteam as $keys => $values)


                         @if( $value->EquipeWin_id == $values->id )

                            <p> {{ $value->libelle }} - {{ $value->description }} </p>
                            <span  class="date pull-left"><i class="fa fa-calendar"></i>{{ $value->DateDebut  }} à {{ $value->HeureDebut  }}</span>
                            <span id="arrow" class="date pull-center"><i class="fa fa-arrow-right"></i></span>
                            <span class="date pull-right"><i class="fa fa-calendar"></i>{{ $value->DateFin }} à  {{ $value->HeureFin  }}</span>
                            <?php $i++; ?>
                        @endif


                     @endforeach
                @endforeach

                <input type="hidden" id="count" value="<?= $i; ?>"/>

                <h4>Mes equipes (<?php echo count($stats->inteam);?>):</h4>

                @foreach ($stats->inteam as $key => $value)

                    <p> {{ $value->libelle }} - {{ $value->description }}

                        @if($value->userId == $user->id)

                            <span class="badge badge-pill" style="background-color:#d91d1f; ">Chef d'équipe</span>

                        @endif
                    </p>
                    <span  class="date pull-left"><i class="fa fa-calendar"></i>{{ $value->created_at  }} </span>
                    <span id="arrow" class="date pull-center"><i class="fa fa-arrow-right"></i></span>
                    <span class="date pull-right"><i class="fa fa-calendar"></i>{{ $value->created_at }} </span>

                @endforeach
                



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