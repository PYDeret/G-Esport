@include('layouts.header')
<section class="content-wrap">

	<section class="youplay-banner banner-top youplay-banner-parallax">
		<div class="image" style="background-image: url('/images/home_img2.jpg')">
		</div>

		<div class="info">
			<div>
				<div class="container">
					<h1>G-Esport</h1>
					<em>G-Esport est une platforme compétitive qui propose des tournois en ligne.<br>Créer ton équipe et participe au prochain tournoi !</em>
					<br>
					<br>
					<br>
					<a class="btn btn-lg" href="/news">En savoir plus</a>
				</div>
			</div>
		</div>
	</section>

	<h2 class="container h1">Dernières Actualités</h2>
	<section class="youplay-news container">
			@foreach($news as $uneNews)

			<div class="news-one">
				<div class="row vertical-gutter">
					<div class="col-md-4">
						<a href="/news_in/{{ $uneNews->slug }}" class="angled-img">
							<div class="img">
								<img src="{{ Voyager::image( $uneNews->img ) }}" alt="">
							</div>
						</a>
					</div>
					<div class="col-md-8">
						<div class="clearfix">
							<h3 class="h2 pull-left m-0"><a href="/news_in/{{ $uneNews->slug }}">{!! $uneNews->titre !!}</a></h3>
							<span class="date pull-right"><i class="fa fa-calendar"></i>{!! $uneNews->created_at !!}</span>
						</div>
						<div class="description">
							<p>
								<?php $small = substr(strip_tags ($uneNews->description) , 0, 100); ?>
								{!! 
									$small.'...';
								!!}
							</p>
						</div>
						<a href="/news_in/{{ $uneNews->slug }}" class="btn read-more pull-left">Voir plus</a>
					</div>
				</div>
			</div>

		@endforeach
	</section>

	<?php if(!empty($nextTournament)): ?>


		<section class="youplay-banner youplay-banner-parallax small">
			<div class="image" style="background-image: url('uploads/<?= $nextTournament->image ?>');">
			</div>

			<div class="info container align-center">
				<div>
					<h2>Prochain tournoi</h2>

					<div class="countdown h2" data-end="<?= $nextTournament->DateDebut ?>"></div>

					<br>
					<br>
					<a class="btn btn-lg" href="/tournoi/<?= $nextTournament->slug ?>">S'inscrire</a>
				</div>
			</div>
		</section>

	<?php endif; ?>


	<h2 class="container h1">Jeux du moment</h2>
	<section class="youplay-news container">
			@foreach($jeux as $unJeu)

			<div class="news-one">
				<div class="row vertical-gutter">
					<div class="col-md-4">
						<a href="/jeux_in/{{ $unJeu->slug }}" class="angled-img">
							<div class="img">
								<img src="{{ Voyager::image( $unJeu->img ) }}" alt="">
							</div>
						</a>
					</div>
					<div class="col-md-8">
						<div class="clearfix">
							<h3 class="h2 pull-left m-0"><a href="/jeux_in/{{ $unJeu->slug }}">{!! $unJeu->libelle !!}</a></h3>
							<span class="date pull-right"><i class="fa fa-calendar"></i>{!! $unJeu->created_at !!}</span>
						</div>
						<div class="description">
							<p>
								{!! $unJeu->description !!}
							</p>
						</div>
						<a href="/jeux_in/{{ $unJeu->slug }}" class="btn read-more pull-left">Voir plus</a>
					</div>
				</div>
			</div>

		@endforeach
	</section>

	<section class="youplay-banner youplay-banner-parallax small mt-80">
		<div class="image" style="background-image: url('/images/partners.jpg');">
		</div>

		<div class="info align-center">
			<div>
				<h2 class="mb-40">Partenaires</h2>

				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="owl-carousel" data-autoplay="6000">
							<div class="item">
								<a href="https://www.reseau-ges.fr/school/ppa">
									<img src="/images/PPA_logo.png" alt="">
								</a>
							</div>
							<div class="item">
								<a href="https://www.reseau-ges.fr/school/mbappa">
									<img src="/images/MBA_PPA_logo.png" alt="">
								</a>
							</div>
							<div class="item">
								<a href="https://www.reseau-ges.fr/school/eiml">
									<img src="/images/EIML_logo.png" alt="">
								</a>
							</div>
							<div class="item">
								<a href="https://www.reseau-ges.fr/school/ipe">
									<img src="/images/IPE_logo.png" alt="">
								</a>
							</div>
							<div class="item">
								<a href="https://www.reseau-ges.fr/school/esgi">
									<img src="/images/ESGI_logo.png" alt="">
								</a>
							</div>
							<div class="item">
								<a href="https://www.reseau-ges.fr/school/ican">
									<img src="/images/ICAN_logo.png" alt="">
								</a>
							</div>
							<div class="item">
								<a href="https://www.reseau-ges.fr/school/ecitv">
									<img src="/images/ECITV_logo.png" alt="">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</section>

@include('layouts.footer')


<style>

	.item{

		width: 75%;
	}

	em{
		color : #0a0a0a;
	}

</style>