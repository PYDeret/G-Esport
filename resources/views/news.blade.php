@include('layouts.header')
<section class="content-wrap">

	<div class="youplay-banner banner-top youplay-banner-parallax small">
		<div class="image" style="background-image: url('/images/banner-news.jpg')">
		</div>

		<div class="info">
			<div>
				<div class="container">
					<h1>Toutes nos Actualités</h1>
				</div>
			</div>
		</div>
	</div>


	<section class="youplay-news container">
		<div class="news-one">
			<div class="row vertical-gutter">
				<div class="col-md-4">
					<a href="/news/battle" class="angled-img">
						<div class="img">
							<img src="/images/battle.jpg" alt="">
						</div>
					</a>
				</div>
				<div class="col-md-8">
					<div class="clearfix">
						<h3 class="h2 pull-left m-0"><a href="/news/battle">La bataille des Devs</a></h3>
						<span class="date pull-right"><i class="fa fa-calendar"></i> 17/07</span>
					</div>
					<div class="description">
						<p>
							Pour fêter la réussite de G-esports les développeurs qui ont participés à la création de celle-ci l'inaugurons avec le premier tournois.
						</p>
					</div>
					<a href="/news/battle" class="btn read-more pull-left">Voir plus</a>
				</div>
			</div>
		</div>

		<div class="news-one">
			<div class="row vertical-gutter">
				<div class="col-md-4">
					<a href="/news/celebration" class="angled-img">
						<div class="img">
							<img src="/images/celebration.jpg" alt="">
						</div>
					</a>
				</div>
				<div class="col-md-8">
					<div class="clearfix">
						<h3 class="h2 pull-left m-0"><a href="/news/celebration">Création de la platforme</a></h3>
						<span class="date pull-right"><i class="fa fa-calendar"></i> 16/07</span>
					</div>
					<div class="description">
						<p>
							Après avoir travaillé pendant de nombreux jours, elle est enfin la, la seule et unique, G-esport !
						</p>
					</div>
					<a href="/news/celebration" class="btn read-more pull-left">Voir plus</a>
				</div>
			</div>
		</div>
	</section>
</section>

@include('layouts.footer')  
