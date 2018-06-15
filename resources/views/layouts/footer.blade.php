<footer class="youplay-footer-parallax">
      <div class="wrapper" style="background-image: url('/images/footer-bg.jpg')">

        <div class="social">
          <div class="container">
            <h3>Suivez les actualités de <strong>G-Esport</strong></h3>

            <div class="social-icons">
              <div class="social-icon">
                <a href="#!">
                  <i class="fa fa-facebook-square"></i>
                  <span>Facebook</span>
                </a>
              </div>
              <div class="social-icon">
                <a href="#!">
                  <i class="fa fa-twitter-square"></i>
                  <span>Twitter</span>
                </a>
              </div>
              <div class="social-icon">
                <a href="#!">
                  <i class="fa fa-twitch"></i>
                  <span>Twitch</span>
                </a>
              </div>
              <div class="social-icon">
                <a href="#!">
                  <i class="fa fa-youtube-square"></i>
                  <span>Youtube</span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="copyright">
          <div class="container">
            <strong>G-Esport</strong> &copy; 2018. Tout droits réservés
          </div>
        </div>

      </div>
    </footer>

  <div class="search-block">
    <a href="#!" class="search-toggle glyphicon glyphicon-remove"></a>
    <form action="">
      <div class="youplay-input">
        <input type="text" name="search" placeholder="Rechercher un terme...">
      </div>
    </form>
  </div>

  <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('bower_components/HexagonProgress/jquery.hexagonprogress.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('bower_components/jarallax/dist/jarallax.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('bower_components/smoothscroll-for-websites/SmoothScroll.js') }}"></script>
  <script type="text/javascript" src="{{ asset('bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('bower_components/jquery.countdown/dist/jquery.countdown.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('youplay/js/youplay.min.js') }}"></script>
  <script>
    if(typeof youplay !== 'undefined') {
        youplay.init({
            parallax:         true,
            navbarSmall:      false,
            fadeBetweenPages: true,
            php: {
                twitter: './php/twitter/tweet.php',
                instagram: './php/instagram/instagram.php'
            }
        });
    }
  </script>

  <script type="text/javascript">
    $(".countdown").each(function() {
        $(this).countdown($(this).attr('data-end'), function(event) {
          $(this).text(
            event.strftime('%D jours %H:%M:%S')
          );
        });
    })
  </script>

</body>
</html>
