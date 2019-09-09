<?php
    include("includes/config.php");
    include("includes/classes/User.php");
    // include("includes/classes/Artist.php");
    // include("includes/classes/Album.php");
    // include("includes/classes/Song.php");
    // include("includes/classes/Playlist.php");

// session_destroy(); LOGOUT

    if(isset($_SESSION['userLoggedIn'])) {
        $userLoggedIn = new User($con, $_SESSION['userLoggedIn']);
        $username = $userLoggedIn->getUsername();
        echo "<script>userLoggedIn = '$username';</script>";
    }
    else {
        header("Location: register.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css?v=<?php echo time(); ?>">
</head>

<body>
    <div id="mainContainer">
        <div id="topContainer">
            <div id="navBarContainer">
                <nav class="navBar">
                    <span role="link" tabindex="0" onclick="openPage('index.php')" class="logo">
                        <img src="assets/images/icons/muzic-logo.png">
                    </span>
                    <div class="group">
                        <div class="navItem">
                            <span role="link" tabindex="0" onclick="openPage('search.php')" class="navItemLink">Search
                                <img src="assets/images/icons/search.png" alt="search" class="icon">
                            </span>
                        </div>
                    </div>
                    <div class="group">
                        <div class="navItem">
                            <span role="link" tabindex="0" onclick="openPage('browse.php')" class="navItemLink">Browse</span>
                        </div>
                        <div class="navItem">
                            <span role="link" tabindex="0" onclick="openPage('yourMusic.php')" class="navItemLink">Your Playlists</span>
                        </div>
                        <div class="navItem">
                            <span role="link" tabindex="0" onclick="openPage('settings.php')" class="navItemLink"><?php echo $userLoggedIn->getFirstAndLastName(); ?></span>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div id="nowPlayingBarContainer">
            <div id="nowPlayingBar">
                <div id="nowPlayingLeft">
                    <div class="content">
                        <span class="albumLink">
                            <img role="link" tabindex="0" src="assets/images/artwork/imd.png" class="albumArtwork"
                                alt="Album Cover">
                        </span>
                        <div class="trackInfo">
                            <span class="trackName">
                                <span role="link" tabindex="0">Whatever it take</span>
                            </span>
                            <span class="artistName">
                                <span role="link" tabindex="0">Imagine Dragon</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="nowPlayingCenter">
                    <div class="content playerControls">
                        <div class="buttons">
                            <button class="controlButton shuffle" title="Shuffle Button" onclick="setShuffle()">
                                <img src="assets/images/icons/shuffle.png" alt="Shuffle">
                            </button>
                            <button class="controlButton previous" title="Previous Button" onclick="prevSong()">
                                <img src="assets/images/icons/previous.png" alt="Previous">
                            </button>
                            <button class="controlButton play" title="Play Button" onclick="playSong()">
                                <img src="assets/images/icons/play.png" alt="Play">
                            </button>
                            <button class="controlButton pause" title="Pause Button" style="display: none;"
                                onclick="pauseSong()">
                                <img src="assets/images/icons/pause.png" alt="Pause">
                            </button>
                            <button class="controlButton next" title="Next Button" onclick="nextSong()">
                                <img src="assets/images/icons/next.png" alt="Next">
                            </button>
                            <button class="controlButton repeat" title="Repeat Button" onclick="setRepeat()">
                                <img src="assets/images/icons/repeat.png" alt="Repeat">
                            </button>
                        </div>
                        <div class="playbackBar">
                            <span class="progressTime current">0.00</span>
                            <div class="progressBar">
                                <div class="progressBarBg">
                                    <div class="progress"></div>
                                </div>
                            </div>
                            <span class="progressTime remaining">0.00</span>
                        </div>
                    </div>
                </div>
                <div id="nowPlayingRight">
                    <div class="volumeBar">
                        <button class="controlButton volume" title="Volume button" onclick=setMute()>
                            <img src="assets/images/icons/volume.png" alt="Volume">
                        </button>
                        <div class="progressBar">
                            <div class="progressBarBg">
                                <div class="progress">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>