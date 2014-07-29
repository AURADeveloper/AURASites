<div class="text-center">
    <ul class="list-unstyled">
        <li><h3>Our Location</h3><li>
        <li><?php echo $business["address"]["street"]; ?></li>
        <li><?php echo $business["address"]["suburb"] . ', ' . $business["address"]["state"] . ', ' . $business["address"]["postcode"]; ?></li>
        <li>Find us on <a href="<?php echo $business["mapsUrl"]; ?>">Google Maps</a></li>
    </ul>
</div>
