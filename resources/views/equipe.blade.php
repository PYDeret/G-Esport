@include('layouts.header')

<div class="youplay-banner banner-top youplay-banner-parallax small">
    <div class="image" style="background-image: url('/images/halo.jpg')">
    </div>

    <div class="info">
        <div>
            <div class="container">
                <h1>{{ $equipe->libelle }}</h1>
            </div>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h3>Description </h3>

                <p>{!! $equipe->description !!}</p>

                <h3> Membres : </h3>

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
    </div>



@include('layouts.footer')