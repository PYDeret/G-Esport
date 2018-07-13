@include('layouts.header')
<section class="content-wrap">

	<div class="youplay-banner banner-top youplay-banner-parallax small">
		<div class="image" style="background-image: url('/images/banner-battle.jpg')">
		</div>

		<div class="info">
			<div>
				<div class="container">
					<h1>{!! $news->titre !!}</h1>
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
							<img src="{{ Voyager::image( $news->img ) }}" alt="">
						</div>
					</div>
					{!! $news->description !!}
				</div>

			</article>
		</div>
	</div>
	
</section>

@include('layouts.footer')  
