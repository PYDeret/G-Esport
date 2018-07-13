@include('layouts.header')
<section class="content-wrap">

	<div class="youplay-banner banner-top youplay-banner-parallax small">
		<div class="image" style="background-image: url('/images/banner-news.jpg')">
		</div>

		<div class="info">
			<div>
				<div class="container">
					<h1>Jeux du moment</h1>
				</div>
			</div>
		</div>
	</div>


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
</section>

@include('layouts.footer')  
