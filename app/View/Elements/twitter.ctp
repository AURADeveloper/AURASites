<?php $twitter_id = $business['social_twitter']; ?>
<a class="twitter-timeline" data-dnt="true"
   href="https://twitter.com/<?php echo $twitter_id; ?>"
   data-widget-id="499323824098140160">Tweets by @<?php echo $twitter_id; ?>
</a>
<script>!function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = p + "://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, "script", "twitter-wjs");</script>
