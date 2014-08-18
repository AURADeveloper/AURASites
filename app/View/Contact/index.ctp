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

        <?php
        echo $this->Session->flash();

        echo $this->Form->create($bootstrap_form_options);
        echo $this->Form->input('name');
        echo $this->Form->input('email');
        echo $this->Form->input('subject');
        echo $this->Form->input('message', array('type' => 'textarea'));

        echo '<div class="form-group">';
        echo '<div class="col-sm-offset-2 col-sm-10">';
        echo $this->Form->button('Send', array('type' => 'submit', 'class' => 'btn btn-default'));
        echo '</div>';
        echo '</div>';

        echo $this->Form->end();
        ?>

    </div>
<!--    <hr class="featurette-divider hidden-lg">-->
    <div class="col-lg-5 col-lg-offset-1 pull-right">
<!---->
<!--      <h2>Contact Details</h2>-->
<!--      <p class="lead">--><?php //echo $business["contactPitch"]; ?><!--</p>-->
<!--      <p class="lead">-->
<!--        <strong>Phone: --><?php //echo $business["phone"]; ?><!--</strong>-->
<!--        <br>-->
<!--        <!--Fax: --><?php //echo $business["fax"]; ?><!---->
<!--      </p>-->
<!---->
<!--      <h2>Business Hours</h2>-->
<!--      <div>-->
<!--      --><?php
//        foreach ($business["hours"] as $value) {
//          echo '<p class="lead">' . $value . '</p>';
//        }
//      ?>
<!--      </div>-->
<!--      <p>--><?php //echo $business["hoursFootnote"]; ?><!--</p>-->

    </div>
  </div>

</div>
