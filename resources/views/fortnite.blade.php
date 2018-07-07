@include('layouts.header')

<section class="content-wrap">

	<div class="youplay-banner banner-top youplay-banner-parallax small">
		<div class="image" style="background-image: url('/images/fortnite-bg.jpg')">
		</div>

		<div class="info">
			<div>
				<div class="container">
					<h1>{{ $jeu->libelle }}</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="container youplay-news youplay-post">

		<div class="col-md-12">
			<article class="news-one">

				<div class="description">
					<div class="angled-img pull-left video-popup">
						<div class="img">
							<img src="/images/fortnite-description.jpg" alt="">
						</div>
					</div>
					<p>{{ $jeu->description}}</p>
				</div>
				<a href="https://www.epicgames.com/fortnite/fr/home" class="btn read-more pull-right">Site officiel</a>
			</article>
		</div>
	</div>


	<section class="youplay-banner youplay-banner-parallax small">
		<div class="image" style="background-image: url('/images/fortnite-tournament.jpg');">
		</div>

		<div class="info container align-center">
			<div>
				<h2>Tout nos tournois {{ $jeu->libelle }}</h2>
				<br>
				<br>
				<a class="btn btn-lg" href="/tournois">Voir</a>
			</div>
		</div>
	</section>


</section>






@include('layouts.footer')