@include('layouts.header')

<div class="youplay-banner banner-top youplay-banner-parallax small">
    <div class="image" style="background-image: url('/images/equipes_details.jpg')">
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
                            <a href="/users/check/{{$user->name }}" class="angled-img">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th>
                                        Avatar
                                    </th>
                                    <th>
                                         Nom
                                    </th>
                                    <th>
                                         Inscription
                                    </th>
                                </tr>


                                <tr>
                              <td style="width: 25%">
                            <div class="img">
                                <img src="{{ Voyager::image( $user->avatar ) }}" style="width:100%" alt="">
                            </div>
                            </td>

                        <td style="width: 25%">

                           <p> {{ $user->name }}</p>

                        </td>
                                    <td>
                                        <p><span id="customdate" class="date pull-center"><i class="fa fa-calendar"></i>{{ $user->created_at  }} </span>  </p>
                                    </td>

                                </tr>

                                </tbody>
                            </table>
                            </a>
                        <?php
                        }
                        ?>
                    @endforeach
                @endforeach

            </div>
        </div>
    </div>



@include('layouts.footer')