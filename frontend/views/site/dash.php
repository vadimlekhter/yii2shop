<?php

use frontend\assets\DashAsset;

DashAsset::register($this);
?>

<div class="dash-window">
<!--    <video id="videoPlayer" controls></video>-->
    <video data-dashjs-player autoplay src="https://dash.akamaized.net/envivio/EnvivioDash3/manifest.mpd" controls>
    </video>
</div>

