@include('layouts.header')
<section class="content-wrap">

	<div class="youplay-banner banner-top youplay-banner-parallax small">
		<div class="image" style="background-image: url('/images/stream-banner.jpg')">
		</div>

		<div class="info">
			<div>
				<div class="container">
					<h1>Nos vidéos</h1>
				</div>
			</div>
		</div>
	</div>

	<h2 class="container h1">Dernier Stream</h2>
	<section class="youplay-news container">
		<div class="row vertical-gutter">
			<div class="col-md-8">
				<iframe 
				src="http://player.twitch.tv/?channel={{ $streamName }}"
				frameborder="0"
				scrolling="no"
				allowfullscreen="true"
				width="100%"
				height="500px">
			</iframe>
		</div>
		<div class="col-md-4">
			<iframe 
			src="http://www.twitch.tv/embed/{{ $streamName }}/chat"
			frameborder="0"
			scrolling="no"
			id="chat_embed"
			width="100%"
			height="500px">
		</iframe>
	</div>
</div>
</section>

<h2 class="container h1">Anciennes Vidéos</h2>
<section class="youplay-news container">
	<div class="row vertical-gutter">
		<div class="col-md-4">
			<iframe 
			src="http://player.twitch.tv/?video=64695090&autoplay=false"
			frameborder="0"
			scrolling="no"
			allowfullscreen="true"
			width="100%"
			height="250px">
		</iframe>
	</div>
	<div class="col-md-4">
		<iframe 
		src="http://player.twitch.tv/?video=16741709&autoplay=false"
		frameborder="0"
		scrolling="no"
		allowfullscreen="true"
		width="100%"
		height="250px">
	</iframe>
</div>
<div class="col-md-4">
	<iframe 
	src="http://player.twitch.tv/?video=43142653&autoplay=false"
	frameborder="0"
	scrolling="no"
	allowfullscreen="true"
	width="100%"
	height="250px">
</iframe>
</div>
</div>
</section>

</section>

@include('layouts.footer')  
