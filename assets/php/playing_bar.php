<div id="playing-bar">
    <footer class="footer mt-auto py-3 fixed-bottom" style="background-color: #f0f2f5; margin-top: 50px;">
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div class="slider_container">
                        <div class="current-time">00:00</div>
                        <input type="range" min="1" max="100" value="0" class="seek_slider" onchange="seekTo()">
                        <div class="total-duration">00:00</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-4 col-4">
                    <div class="now-playing">PLAYING x OF y</div>
                    <div class="track-art" hidden></div>
                    <div class="track-artist">Track Artist</div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-4 col-4">
                    <style>
                        .center {
                            margin: 0;
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            -ms-transform: translate(-50%, -50%);
                            transform: translate(-50%, -50%);
                        }
                    </style>
                    <div class="center">
                        <span class="buttons">
                            <span class="prev-track" onclick="prevTrack()"><i class="fa fa-step-backward fa-1x"></i></span>
                            <span class="playpause-track" onclick="playpauseTrack()"><i class="fa fa-play-circle fa-2x"></i></span>
                            <span class="next-track" onclick="nextTrack()"><i class="fa fa-step-forward fa-1x"></i></span>
                        </span>
                    </div>
                </div>
            </div>


            <marquee scrollamount="5" class="track-name" id="track-name">Track Name</marquee>

        </div>
    </footer>
</div>