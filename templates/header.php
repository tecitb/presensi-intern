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

    <title>TEC</title>

    <script type="text/javascript">
        const BASE_URL = "<?=BASE_URL?>";
        const SERVER_URL = "<?=SERVER_URL?>";
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="<?=BASE_URL?>/js/user.js"></script>

</head>
<body>
<!--  NAVBAR -->


<nav class="navbar navbar-expand-md navbar-dark bg-tec">
    <div class="container">
    <a class="navbar-brand" href="<?=BASE_URL?>">
        <img src="<?=BASE_URL?>/img/logo-white.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Attendance Subsystem
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".mobile-open" aria-controls="navContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse w-100 mobile-open" id="navContent">

        <ul class="navbar-nav mr-auto">

        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item logged-in">
                <a class="nav-link" href="<?=BASE_URL?>/meetings">Meetings</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="loginMenuNav" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle"></i>
                    <span id="loginMenuTxt">Login</span>
                </a>
                <div class="dropdown-menu mobile-open" id="loginMenuDrop">
                    <form onsubmit="login(); return false;" class="px-4 py-3">
                        <div class="form-group">
                            <label>Email</label>
                            <input id="emailLogin" type="email" class="form-control" placeholder="email@example.com">
                            <div class="invalid-feedback">
                                Tolong cek kembali
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="passwordLogin" type="password" class="form-control" placeholder="Password">
                            <div class="invalid-feedback">
                                Tolong cek kembali
                            </div>
                        </div>
                        <button type="submit" id="signinButton" class="btn btn-primary">Sign in</button>
                    </form>
                    <div class="dropdown-divider"></div>
                </div>

                <div class="dropdown-menu mobile-open" id="userMenuDrop">

                    <div style="padding: 16px;">
                        <div><b id="pname"></b></div>
                        <div id="ptecregno"></div>
                    </div>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" id="logoutButton">Logout</a>
                </div>
            </li>
        </ul>
    </div>
    </div>
</nav>
<!--END NAVBAR -->
