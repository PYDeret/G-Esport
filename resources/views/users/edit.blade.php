@include('layouts.header')
  <section class="content-wrap">

    @include('layouts.header_profile')

    <div class="container youplay-content">

      <div class="row">

        <div class="col-md-9">
          <h2 class="mt-0">Dernières Activités</h2>

          <table style="padding:10px;text-align:center;">
            <tr>
                <th style="width:33%">Champion utilisé</th>
                <th style="width:33%">Informations de la partie</th>
                <th style="width:33%">Items achetés</th>
            </tr>

          <?php foreach($leagueData->matches as $oneGame): ?>
          <?php //die(print_r($oneGame));?>
            <tr style="margin-top:10px;padding:10px;border-bottom: 1px solid;background-color:<?php if($oneGame->data->win != false): echo '#DEEEFD'; else: echo '#eed8d8'; endif;?>">
                <td style="width:33%">
                    <img src="<?= $oneGame->image; ?>" style="width:150px; height:150px;"/>
                </td>
                <td style="width:33%">
                    <?php if($oneGame->lane == "NONE"): ?>
                        <?php $oneGame->lane = "JUNGLE"; ?>
                    <?php endif; ?>
                    <?= $oneGame->lane; ?>
                    <br />
                    <?= $oneGame->data->kills." / ".$oneGame->data->deaths." / ".$oneGame->data->assists." KDA"; ?>
                    <br />
                    <?php echo date('d/m/Y H:i:s', substr($oneGame->timestamp, 0, -3)); ?>
                    <div style="padding:10px">
                        <img src="<?= $oneGame->data->spellOne ?>" />
                        <img src="<?= $oneGame->data->spellTwo ?>" />
                    </div>
                </td>
                <td style="width:33%">
                    <div>
                      <div style="padding:10px">
                        <img src="<?= $oneGame->data->item0 ?>" />
                        <img src="<?= $oneGame->data->item1 ?>" />
                        <img src="<?= $oneGame->data->item2 ?>" />
                      </div>
                      <div style="padding:10px">
                        <img src="<?= $oneGame->data->item3 ?>" />
                        <img src="<?= $oneGame->data->item4 ?>" />
                        <img src="<?= $oneGame->data->item5 ?>" />
                      </div>
                    </div>
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

@include('layouts.footer') 