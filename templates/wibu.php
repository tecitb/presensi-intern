<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <noscript>
        <meta http-equiv="refresh" content="0; url=<?=BASE_URL?>/nojs" />
    </noscript>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=BASE_URL?>/css/style.css">

    <title>Welcoming Board Unit (WiBU)</title>

    <script type="text/javascript">
        const BASE_URL = "<?=BASE_URL?>";
        const SERVER_URL = "<?=SERVER_URL?>";
        const MEETING_ID = "<?=$mid?>";
        const DEEPSTREAM_URL = "<?=getenv("DEEPSTREAM_URL")?>";
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

    <style type="text/css">
        body {
            height: 100vh;
            background: linear-gradient(311deg, #0083b3, #00baba, #a62bed, #0064b0);
            background-size: 800% 800%;

            -webkit-animation: tecinterns 47s ease infinite;
            -moz-animation: tecinterns 47s ease infinite;
            animation: tecinterns 47s ease infinite;
            color: white;
        }

        @-webkit-keyframes tecinterns {
            0%{background-position:0% 10%}
            50%{background-position:100% 91%}
            100%{background-position:0% 10%}
        }
        @-moz-keyframes tecinterns {
            0%{background-position:0% 10%}
            50%{background-position:100% 91%}
            100%{background-position:0% 10%}
        }
        @keyframes tecinterns {
            0%{background-position:0% 10%}
            50%{background-position:100% 91%}
            100%{background-position:0% 10%}
        }

        .window {
            padding: 32px;
        }

        .logo {
            position: fixed;
            left: 32px;
            bottom: 32px;
        }

        #attn {
            position: fixed;
            right: 32px;
            bottom: 32px;
        }

        .hero {
            height: 110px;
            position: fixed;
            width: 100%;
            top: calc(50% - 55px);
        }

        .hero h1 {
            font-size: 96px;
        }
    </style>

</head>
<body>
<div class="window">
    <div class="row">
        <div class="col-sm-6">
            <h5 id="meeting-name"></h5>
            <h5 id="meeting-location"></h5>
        </div>
        <div class="col-sm-6" align="right">
            <h5 id="date"><?=date("D, d F Y")?></h5>
            <h1 id="time">23:33</h1>
        </div>
    </div>
</div>
<div class="logo">
    <img src="<?=BASE_URL?>/img/logo-white.svg" width="70" />
</div>
<div id="attn">
    <h5 id="attn-txt">Attending: 0</h5>
</div>
<div class="hero" id="hero-1" align="center">
    <h1></h1>
</div>
<div class="hero" id="hero-2" align="center">
    <h1></h1>
</div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/deepstream.io-client-js/2.3.0/deepstream.min.js"></script>
<script type="text/javascript" src="<?=BASE_URL?>/js/wibu.js" defer></script>
</html>