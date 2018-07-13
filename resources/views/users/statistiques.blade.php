@include('layouts.header')
<section class="content-wrap">

    @include('layouts.header_profile')

    <div class="container youplay-content">

        <div class="row">

            <div class="col-md-9">

                <h4><?php echo count($stats->tournoisplay);?> Tournois participés :</h4>

                @foreach ($stats->tournoisplay as $key => $value)

                 <p> {{ $value->libelle }} - {{ $value->description }}</p>

                @endforeach

                <h4><span id="counter"></span> Tournois remportés :</h4>

                <?php $i=0;?>

                @foreach ($stats->tournoisplay as $key => $value)

                     @foreach ($stats->inteam as $keys => $values)


                         @if( $value->EquipeWin_id == $values->id )

                            <p> {{ $value->libelle }} - {{ $value->description }}</p>

                            <?php $i++; ?>
                        @endif



                     @endforeach
                @endforeach

                <input type="hidden" id="count" value="<?= $i; ?>"/>

                <h4>Mes equipes (<?php echo count($stats->inteam);?>):</h4>

                @foreach ($stats->inteam as $key => $value)

                    <p> {{ $value->libelle }} - {{ $value->description }}</p>

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