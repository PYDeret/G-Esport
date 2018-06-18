@extends('layouts.header')
  <section class="content-wrap">

    <div class="youplay-banner banner-top youplay-banner-parallax small">
      <div class="image" style="background-image: url('assets/images/game-journey-1400x460.jpg')">
      </div>

      <div class="youplay-user-navigation">
        <div class="container">
          <ul>
            <li class="active"><a href="user-activity.html">Activity</a>
            </li>
            <li><a href="user-profile.html">Profile</a>
            </li>
            <li><a href="user-messages.html">Messages <span class="badge">6</span></a>
            </li>
            <li><a href="user-settings.html">Settings</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="info">
        <div>
          <div class="container youplay-user">
            <a href="assets/images/user-photo.jpg" class="angled-img image-popup">
              <div class="img">
                <img src="assets/images/user-avatar.jpg" alt="">
              </div>
              <i class="fa fa-search-plus icon"></i>
            </a>
            <div class="user-data">
              <h2>John Doe</h2>
              <div class="location"><i class="fa fa-map-marker"></i> Los Angeles</div>
              <div class="activity">
                <div>
                  <div class="num">69</div>
                  <div class="title">Posts</div>
                </div>
                <div>
                  <div class="num">12</div>
                  <div class="title">Games</div>
                </div>
                <div>
                  <div class="num">689</div>
                  <div class="title">Followers</div>
                </div>
              </div>
            </div>
          </div>

          <div class="container mt-20">
            <a href="#!" class="btn btn-sm btn-default ml-0">Add Friend</a>
            <a href="#!" class="btn btn-sm btn-default">Private Message</a>
          </div>
        </div>
      </div>
    </div>

    <div class="container youplay-content">

      <div class="row">

        <div class="col-md-9">
          <h2 class="mt-0">Dernières Activités</h2>

          <table style="padding:10px">
            <tr>
                <th>Dernier champion joué</th>
                <th>Nom du champion</th>
                <th>Lane</th>
                <th>Date</th>
            </tr>

          <?php foreach($leagueData->matches as $oneGame): ?>
          <?php //die(print_r($oneGame));?>
            <tr style="margin-top:10px;">
                <td>
                    <img src="<?= $oneGame->image; ?>" style="width:50px; height:50px;"/>
                </td>
                <td>
                    <?= $oneGame->champion; ?>
                </td>
                <td>
                    <?php if($oneGame->lane == "NONE"): ?>
                        <?php $oneGame->lane = "JUNGLE"; ?>
                    <?php endif; ?>
                    <?= $oneGame->lane; ?>
                </td>
                <td>
                    <?php echo date('d/m/Y H:i:s', substr($oneGame->timestamp, 0, -3)); ?>
                </td>
            </tr>
          <?php endforeach; ?>

          </table>
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

        <!-- Right Side -->
        <div class="col-md-3">
          <div class="side-block">
            <h4 class="block-title">About</h4>
            <div class="block-content">
              Ecce dabo Pinkman Isai OK? Sicut locutus est tibi, et datus est, et hic sine Semper consequat volumus ... et ille in urbe ista licet? Et infernus, ubi tu non Virginiae ornare vel ipsum. Ut enim Albuquerque et ille eum iure hic, et ego ducam te ad iustitiam.
            </div>
          </div>
          <div class="side-block">
            <h4 class="block-title">Location</h4>
            <div class="block-content pt-5">
              <div class="responsive-embed responsive-embed-16x9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423284.59051352815!2d-118.41173249999999!3d34.0204989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z0JvQvtGBLdCQ0L3QtNC20LXQu9C10YEsINCa0LDQu9C40YTQvtGA0L3QuNGPLCDQodCo0JA!5e0!3m2!1sru!2sru!4v1430158354122"
                width="600" height="450"></iframe>
              </div>
            </div>
          </div>
        </div>
        <!-- Right Side -->

      </div>

    </div>

    @extends('layouts.footer') 