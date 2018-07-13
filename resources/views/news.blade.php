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
								{!! $uneNews->description !!}
							</p>
						</div>
						<a href="/news_in/{{ $uneNews->slug }}" class="btn read-more pull-left">Voir plus</a>
					</div>
				</div>
			</div>

		@endforeach

	</section>
</section>

@include('layouts.footer')  
