<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h1>Contact Us </h1>
      </div>

      <!--<small><i></i>Add alerts if form ok... success, else error.</i></small>
    -->



    </div>

  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-6 pull-left">

      <form role="form" method="get" action="mailer.php">

        <?php
          if (isset($_SESSION['success'])) {
              if ($_SESSION['success'] == false && $_SESSION['bad_recaptcha'] == true) {
                echo '<p class="bg bg-warning">Sorry, the re-captcha was invalid. Please try again.</p>';
              }

              if ($_SESSION['success'] == false && $_SESSION['bad_recaptcha'] == false) {
                echo '<p class="bg bg-danger">Sorry, a server side error has occurred, please try again later.</p>';
              }

              if ($_SESSION['success'] == true) {
                echo '<p class="bg bg-success">Thank you, your message has been successfully sent.</p>';
              }

              session_unset();
          }
        ?>

        <div class="form-group">
          <label for="InputName">Your Name</label>
          <div class="input-group">
            <input type="text" class="form-control" name="name" id="InputName" placeholder="Enter Name" value="<?php echo $_SESSION['name']; ?>">
            <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
          </div>
        </div>

        <div class="form-group">
          <label for="InputEmail">Your Email</label>
          <div class="input-group">
            <input type="email" class="form-control" id="InputEmail" name="email" placeholder="Enter Email" value="<?php echo $_SESSION['email']; ?>">
            <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
          </div>
        </div>

        <div class="form-group">
          <label for="InputMessage">Message</label>
          <div class="input-group">
            <textarea name="message" id="InputMessage" class="form-control" rows="5"><?php echo $_SESSION['message']; ?></textarea>
            <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
          </div>
        </div>

        <button class="btn btn-primary pull-right">SUBMIT</button>

        <?php
          require_once('vendor/captcha/recaptcha/recaptcha/recaptchalib.php');
          $publickey = "6LfE_vQSAAAAAJDd6TLbEyz2wSCsBhTWd0VJCGyT";
          echo recaptcha_get_html($publickey);
        ?>

      </form>

    </div>
    <hr class="featurette-divider hidden-lg">
    <div class="col-lg-5 col-md-push-1 pull-right">

      <h2>Contact Details</h2>
      <p class="lead"><?php echo $business["contactPitch"]; ?></p>
      <p class="lead">
        <strong>Phone: <?php echo $business["phone"]; ?></strong>
        <br>
        <!--Fax: <?php echo $business["fax"]; ?>-->
      </p>

      <h2>Business Hours</h2>
      <div>
      <?php
        foreach ($business["hours"] as $value) {
          echo '<p class="lead">' . $value . '</p>';
        }
      ?>
      </div>
      <p><?php echo $business["hoursFootnote"]; ?></p>

    </div>
  </div>

</div>
