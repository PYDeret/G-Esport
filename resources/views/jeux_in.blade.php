@include('layouts.header')
<section class="content-wrap">

	<div class="youplay-banner banner-top youplay-banner-parallax small">
		<div class="image" style="background-image: url('/images/banner-battle.jpg')">
		</div>

		<div class="info">
			<div>
				<div class="container">
					<h1>{!! $jeux->libelle !!}</h1>
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
							<img src="{{ Voyager::image( $jeux->img ) }}" alt="">
						</div>
					</div>
					{!! $jeux->description !!}
				</div>

			</article>
		</div>
		<div class="col-md-2">
			<p>Vous pouvez retrouver plus d'infos en cliquant sur le bouton suivant !</p>
				<a href="{!! $jeux->link !!}" class="btn read-more pull-right" style="margin-top:30px;">Site officiel</a>
		</div>
	</div>
	
</section>

@include('layouts.footer')  
