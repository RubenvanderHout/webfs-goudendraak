<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kassa</title>
    <link rel='stylesheet' type='text/css' href='css/header.css'>
    <link rel='stylesheet' type='text/css' href='css/login.css'>
    <link rel='stylesheet' type='text/css' href='css/general.css'>
    <link rel='stylesheet' type='text/css' href='css/cashDesk.css'>
    <link rel='stylesheet' type='text/css' href='css/menu.css'>
    <link rel='stylesheet' type='text/css' href='css/sales.css'>

    <script src="js/cashDesk.js" defer></script>
    <script src="js/header.js" defer></script>
    <script src="js/sales.js" defer></script>
    <script src="js/main.js" defer></script>
</head>

<nav>
    <div id='menuBar'>
        <img id="logo" src="{{asset('img/goodpay.png')}}" alt="goodpay logo">

        <div id='buttonBar'>
            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            ?>

                <button id='cashDeskBtn' class='menuButton'>
                    Kassa
                </button>

                <button id='menuBtn' class='menuButton'>
                    Gerechten
                </button>
                <button id='salesBtn' class='menuButton'>
                    Verkoop Overzicht
                </button>

                <a class='menuLink' href='logout.php'>
                    <div class='menuButton'>
                        Log Uit
                    </div>
                </a>

            <?php
            }
            ?>
        </div>
    </div>
</nav>

<body>
    @yield('content')
</body>

</html>