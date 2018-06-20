@include('layouts.header')
  <section class="content-wrap">

    @include('layouts.header_profile')

    <div class="container youplay-content">

      <div class="row">

        <div class="col-md-9">
          <h2 class="mt-0">Dernières Activités</h2>

          
          <!--<div class="youplay-timeline">
            <div class="youplay-timeline-block">
              <div class="youplay-timeline-icon bg-warning">
                <i class="fa fa-bell"></i>
              </div>
              <div class="youplay-timeline-content">
                <h3 class="mb-0">Notification</h3>
                <span class="youplay-timeline-date pt-0">20 minutes ago</span>
                <p>We invite you to test-drive the new service <a href="#!">Lorem</a>. Confirm the invitation and we will send you notes and hints.</p>
                <a href="#!" class="btn">Confirm</a>
                <a href="#!">Cancel</a>
              </div>
            </div>
            <div class="youplay-timeline-block">
              <div class="youplay-timeline-icon bg-primary">
                <img src="assets/images/avatar-user-2.png" alt="John Doe" title="John Doe">
              </div>
              <div class="youplay-timeline-content">
                <h3 class="mb-0">Message</h3>
                <span class="youplay-timeline-date pt-0">Saturday, March 8, 2015</span>
                Received a <a href="main-inbox.html">message</a> from <strong>Max Brooks</strong>
              </div>
            </div>
            <div class="youplay-timeline-block">
              <div class="youplay-timeline-icon bg-success">
                <i class="fa fa-youtube-play"></i>
              </div>
              <div class="youplay-timeline-content">
                <h3 class="mb-0">New Electro &amp; House</h3>
                2015 Party Music Collab Mix
                <span class="youplay-timeline-date pt-0">Published on Jan 10, 2015</span>
                <div class="responsive-embed responsive-embed-16x9">
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/aJNEbmFeFgg" allowfullscreen></iframe>
                </div>
              </div>
            </div>
            <div class="youplay-timeline-block">
              <div class="youplay-timeline-icon">
                <i class="fa fa-map-marker"></i>
              </div>
              <div class="youplay-timeline-content">
                <h3 class="mb-0">My New Location</h3>
                <span class="youplay-timeline-date pt-0">Jan 24</span>

                <div class="responsive-embed responsive-embed-16x9">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423284.59051352815!2d-118.41173249999999!3d34.0204989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z0JvQvtGBLdCQ0L3QtNC20LXQu9C10YEsINCa0LDQu9C40YTQvtGA0L3QuNGPLCDQodCo0JA!5e0!3m2!1sru!2sru!4v1430158354122"
                  width="600" height="450"></iframe>
                </div>
              </div>
            </div>
          </div>-->
        </div>
        @include('layouts.user_right')
      </div>
    </div>
@include('layouts.footer') 