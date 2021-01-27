(function () {
    let url = "https://dash.akamaized.net/envivio/EnvivioDash3/manifest.mpd";
    let player = dashjs.MediaPlayer().create();
    player.initialize(document.querySelector("#videoPlayer"), url, true);
})();
