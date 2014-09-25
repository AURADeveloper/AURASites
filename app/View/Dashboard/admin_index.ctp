<h1 class="page-header">
  Dashboard
</h1>
<div class="row">
  <div class="col-sm-12 col-lg-4 dashboard-overview">
    <div class="pretty-panel">
      <?php echo $this->Html->image($this->data['Style']['img_logo'], array('class' => 'img-responsive')); ?>
    </div>
    <div class="pretty-panel">
      <dl class="dl-horizontal">
        <dt>Trading Name</dt>
        <dd><?php echo $this->data['Business']['trading_name']; ?></dd>
        <dt>ABN</dt>
        <dd><?php echo $this->data['Business']['abn']; ?></dd>
        <dt>Street</dt>
        <dd><?php echo $this->data['Business']['address_street1']; ?></dd>
        <dt>Suburb</dt>
        <dd><?php echo $this->data['Business']['address_suburb']; ?></dd>
        <dt>State</dt>
        <dd><?php echo $this->data['Business']['address_state']; ?></dd>
        <dt>Postcode</dt>
        <dd><?php echo $this->data['Business']['address_postcode']; ?></dd>
        <dt>Phone</dt>
        <dd><?php echo $this->data['Business']['phone']; ?></dd>
        <dt>Fax</dt>
        <dd><?php echo $this->data['Business']['fax']; ?></dd>
      </dl>
    </div>
  </div>

  <div class="col-sm-12 col-lg-8">
    <div class="pretty-panel">
      <h2>
        Google Analytics
      </h2>
      <section id="auth-button"></section>
      <section id="view-selector"></section>
      <section id="timeline"></section>
    </div>

    <script>
      (function(w,d,s,g,js,fjs){
        g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(cb){this.q.push(cb)}};
        js=d.createElement(s);fjs=d.getElementsByTagName(s)[0];
        js.src='https://apis.google.com/js/platform.js';
        fjs.parentNode.insertBefore(js,fjs);js.onload=function(){g.load('analytics')};
      }(window,document,'script'));
    </script>

    <script>
      gapi.analytics.ready(function() {

        // Step 3: Authorize the user.

        var CLIENT_ID = '<?php echo Configure::read('Google.ClientId'); ?>';

        gapi.analytics.auth.authorize({
          container: 'auth-button',
          clientid: CLIENT_ID
        });

        // Step 4: Create the view selector.

        var viewSelector = new gapi.analytics.ViewSelector({
          container: 'view-selector'
        });

        // Step 5: Create the timeline chart.

        var timeline = new gapi.analytics.googleCharts.DataChart({
          reportType: 'ga',
          query: {
            'dimensions': 'ga:date',
            'metrics': 'ga:sessions',
            'start-date': '30daysAgo',
            'end-date': 'yesterday'
          },
          chart: {
            type: 'LINE',
            container: 'timeline'
          }
        });

        // Step 6: Hook up the components to work together.

        gapi.analytics.auth.on('success', function(response) {
          viewSelector.execute();
        });

        viewSelector.on('change', function(ids) {
          var newIds = {
            query: {
              ids: ids
            }
          };
          timeline.set(newIds).execute();
        });
      });
    </script>
  </div>
</div>
