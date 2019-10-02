<?php
$n = null;
$dataArrivo = filter_input(INPUT_GET, 'dataArrivo', FILTER_SANITIZE_SPECIAL_CHARS);
$dataRitorno = filter_input(INPUT_GET, 'dataRitorno', FILTER_SANITIZE_SPECIAL_CHARS);
$numAdulti = filter_input(INPUT_GET, 'numAdulti', FILTER_SANITIZE_SPECIAL_CHARS);
$numCamere = filter_input(INPUT_GET, 'numCamere', FILTER_SANITIZE_SPECIAL_CHARS);;
$n = filter_input(INPUT_GET, 'numBambini', FILTER_SANITIZE_SPECIAL_CHARS);
$numBambini = (int) $n;
$bambino = array(
    $bambino1 = filter_input(INPUT_GET, 'bambino1', FILTER_SANITIZE_SPECIAL_CHARS),
    $bambino2 = filter_input(INPUT_GET, 'bambino2', FILTER_SANITIZE_SPECIAL_CHARS),
    $bambino3 = filter_input(INPUT_GET, 'bambino3', FILTER_SANITIZE_SPECIAL_CHARS),
    $bambino4 = filter_input(INPUT_GET, 'bambino4', FILTER_SANITIZE_SPECIAL_CHARS),
    $bambino5 = filter_input(INPUT_GET, 'bambino5', FILTER_SANITIZE_SPECIAL_CHARS),
    $bambino6 = filter_input(INPUT_GET, 'bambino6', FILTER_SANITIZE_SPECIAL_CHARS),
    $bambino7 = filter_input(INPUT_GET, 'bambino7', FILTER_SANITIZE_SPECIAL_CHARS),
    $bambino8 = filter_input(INPUT_GET, 'bambino8', FILTER_SANITIZE_SPECIAL_CHARS),
    $bambino9 = filter_input(INPUT_GET, 'bambino9', FILTER_SANITIZE_SPECIAL_CHARS)
);
$datePrenotazione = $dataArrivo . " - " . $dataRitorno;
if ($dataArrivo != null && $dataRitorno != null) {
    $dateA = DateTime::createFromFormat('d/m/Y', $dataArrivo);
    $dateR = DateTime::createFromFormat('d/m/Y', $dataRitorno);
    $diff = $dateA->diff($dateR);
    $notti = $diff->d;
}



?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Archivo&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./Css/style.css">
    <link rel="stylesheet" type="text/css" href="./Css/animate.css">
    <title>WBESmart</title>
</head>

<body>
    <div class="top">
        <div class="layer">
            <div id="content" class="animated">
                <h2 class="animated fadeInDown bigText">Prenota la tua prossima vacanza</h2>
                <div class="ct-style">
                    <div class="card card-style animated fadeInDown" style="max-width: 400px;">
                        <article class="card-body mx-auto">
                            <div class="card-body text-center">
                                <form action="?" method="get">
                                    <div class="col-auto">
                                        <div class="input-group inputIcon">
                                            <div data-toggle="tooltip-dataArrivo" data-placement="top" title="" data-original-title="dd-mm-aaaa" class="input-group-prepend dp-size" id="divArrivo">
                                                <input class="form-control form-style" id="dataArrivo" name="dataArrivo" placeholder="Data Arrivo" type="text" autocomplete="off" data-date-start-date="0d">
                                                <i class="form-control-feedback fa fa-calendar-alt dp-i" id="arrivoIcon"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="input-group inputIcon">
                                            <div data-toggle="tooltip-dataRitorno" data-placement="top" title="" data-original-title="" class="input-group-prepend input-spacing dp-size" id="divRitorno">
                                                <input class="red-tooltip form-control form-style" id="dataRitorno" name="dataRitorno" placeholder="Data Partenza" type="text" autocomplete="off" data-date-start-date="0d" readonly disabled>
                                                <i class="fa fa-calendar dp-i" id="ritornoIcon"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto d-flex flex-row input-spacing">
                                        <button type="button" class="meno btn"><i class="counter-btn fa fa-minus"></i></button>
                                        <div data-toggle="tooltip" data-placement="top" title="Dai 13 anni in poi" class="number inputIcon counter-spacing">
                                            <input class="form-control form-counter" id="numAdulti" name="numAdulti" type="text" value="1" readonly />
                                            <i class="fa fa-male"></i>
                                        </div>
                                        <button type="button counter-btn" class="piu btn"><i class="counter-btn fa fa-plus"></i></button>
                                    </div>
                                    <div class="col-auto d-flex flex-row input-spacing">
                                        <button type="button" class="minusBambini btn"><i class="counter-btn fa fa-minus"></i></button>
                                        <div data-toggle="tooltip" data-placement="top" title="Dai 3 fino ai 12 anni" class="number inputIcon counter-spacing">
                                            <input class="form-control form-counter" id="numBambini" name="numBambini" type="text" value="0" readonly />
                                            <i class="fas fa-child"></i>
                                        </div>
                                        <button type="button counter-btn" class="plusBamibini btn"><i class="counter-btn fa fa-plus"></i></button>
                                    </div>
                                    <div id="EmptyDiv" class="">
                                    </div>
                                    <div class="col-auto d-flex flex-row input-spacing">
                                        <button type="button" class="meno btn"><i class="counter-btn fa fa-minus"></i></button>
                                        <div class="number inputIcon counter-spacing">
                                            <input class="form-control form-counter" id="numCamere" name="numCamere" type="text" value="1" readonly />
                                            <i class="fas fa-bed"></i>
                                        </div>
                                        <button type="button counter-btn" class="piu btn"><i class="counter-btn fa fa-plus"></i></button>
                                    </div>
                                    <span id="span-salmon" class="d-inline-block span-btn" tabindex="0" data-toggle="tooltip-span" title="Inserisci le date di arrivo e partenza">
                                        <button id="salmonBtn" class="btn btn-primary salmon-btn input-spacing" name="submit" type="submit" disabled>Cerca camere</button>
                                    </span>
                                </form>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="rooms-view" class="down">
        <div class="navigation-bar">
            <div>
                <form method="get">
                    <div class="form-row align-items-center row" style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px">
                        <div class="col-md-auto col-5">
                            <div class="input-group inputIcon">
                                <div class="input-group-prepend">
                                    <input class="form-control form-style" id="dataArrivo2" name="dataArrivo" value="<?php echo $dataArrivo; ?>" type="text" autocomplete="off" data-date-start-date="0d">
                                    <i class="form-control-feedback fa fa-calendar-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-auto col-5">
                            <div class="input-group inputIcon">
                                <div class="input-group-prepend">
                                    <input class="form-control form-style" id="dataRitorno2" name="dataRitorno" value="<?php echo $dataRitorno; ?>" type="text" autocomplete="off" data-date-start-date="0d">
                                    <i class="form-control-feedback fa fa-calendar-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-group inputIcon">
                                <i class="fa fa-male"></i>
                                <select class="form-control form-style" id="numAdulti" name="numAdulti">
                                    <?php
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i == $numAdulti) {
                                            echo '<option selected="selected">' . $i . '</option>';
                                        } else {
                                            echo '<option>' . $i . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1 col-3">
                            <div class="form-group inputIcon">
                                <i class="fas fa-child iBambino"></i>
                                <button id="bBambino" type="button" style="background: transparent; border: none !important;">
                                    <input id="nBambini" class="form-control form-style" name="numBambini" type="text" value="<?php echo $numBambini; ?>" readonly />
                                </button>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-group inputIcon">
                                <i class="fas fa-bed"></i>
                                <select class="form-control form-style" id="numCamere" name="numCamere">
                                    <?php
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i == $numCamere) {
                                            echo '<option selected="selected">' . $i . '</option>';
                                        } else {
                                            echo '<option>' . $i . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <span class="example-spacer"></span>
                        <div class="col-auto">
                            <div class="form-group">
                                <button style="height: 38px" class="btn btn-primary nav-btn input-spacing" name="submit" type="submit">Cerca</button>
                            </div>
                        </div>
                    </div>
                    <div id="BambiniDiv" class="animated">
                        <div id="close-childdiv">
                            <span><i id="close-child-icon" class="fas fa-times"></i></span>
                        </div>
                        <div id="child-container">
                            <div class="col-12 col-md-3 d-flex flex-row input-spacing" style="margin-top: 0px">
                                <button type="button" class="minusB2 btn"><i class="counter-btn fa fa-minus"></i></button>
                                <div data-toggle="tooltip" data-placement="top" title="Dai 3 fino ai 12 anni" class="col-5 col-md-auto number inputIcon counter-spacing">
                                    <input class="form-control form-style" id="numBambini" name="numBambini" type="text" value="<?php echo $numBambini; ?>" readonly />
                                    <i class="fas fa-child child-spacing"></i>
                                </div>
                                <button type="button counter-btn" class="plusB2 btn"><i class="counter-btn fa fa-plus"></i></button>
                            </div>
                            <div id="eDiv" class="form-row align-items-center row" style="padding-top: 10px; padding-bottom: 10px; padding-left: 15px; margin-top: 10px">
                                <?php
                                for ($i = 1; $i <= $numBambini; $i++) {
                                    echo '<div class="col-6 col-md-2" style="color:white;">';
                                    echo 'Età Bambino ' . $i;
                                    echo '<div class="form-group">';
                                    echo '<select class="form-control form-style bAge" style="padding-left: 40%" id="bambino' . $i . '" name="bambino' . $i . '">';
                                    for ($k = 0; $k <= 15; $k++) {
                                        if ($k == $bambino[$i - 1]) {
                                            echo '<option selected="selected">' . $k . '</option>';
                                        } else {
                                            echo '<option>' . $k . '</option>';
                                        }
                                    }
                                    echo '</select>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="divPrenota" class="animated">
            <div class="row main-content">
                <div id="dpmAppend" class="dpAppend col-9"></div>
                <span class="delete-selection">Rimuovi la tua scelta</span>
                <div id="divOffertaScroll" class="col-auto">
                    <button style="margin-right: 0">
                        <a class="scroll btn-scroll" href="#offerta_scroll">PRENOTA</a>
                    </button>
                </div>
            </div>
            <div id="divPrenotaDetails" class="animated">
                <div id="dpdAppend" class=""></div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div style="align-text: right;">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <div id="modal-append" class="carousel-inner" style="width: 100%; border-radius:15px">
                                <div class="carousel-item active">
                                    <img src="./Img/camera1.jpeg" alt="First slide" style="width: 100%; border-radius:15px">
                                </div>
                                <div class="carousel-item">
                                    <img src="./Img/camera2.jpeg" alt="Second slide" style="width: 100%; border-radius:15px">
                                </div>
                                <div class="carousel-item">
                                    <img src="./Img/camera3.jpeg" alt="Third slide" style="width: 100%; border-radius:15px">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="modalText">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center camere">
            <div class="row">
                <div id="room1" class="card col-12 room-padding room-card img-resize" style="text-align: left;">
                    <div class="card-body">
                        <div class="box">
                            <h4 class="card-title room-title" style="text-align: left;">Camera Doppia</h4>
                            <h2 class="card-title"><span class="badge badge-primary badge-prezzo">877,50€</span></h2>
                        </div>
                        <h6 class="card-subtitle mb-2 text-muted" style="text-align: left;">Colazione inclusa - Parcheggio privato - Vista mare</h6>
                        <div class="box row">
                            <div id="carousel1" class="carousel slide col-8 col-sm-6" data-ride="carousel">
                                <div class="carousel-inner modal-toggle" data-toggle="modal" data-target="#myModal">
                                    <a class="carousel-control-prev carousel-zoom">
                                        <span aria-hidden="true"><i class="fas fa-search-plus"></i></span>
                                    </a>
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="./Img/camera1.jpeg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="./Img/camera2.jpeg" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="./Img/camera3.jpeg" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!-- <img src="./Img/camera1.jpeg" class="card-img img-resize"> -->
                            <div class="col-4 col-sm-6">
                                <p class="card-text text-prova">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                            <div class="click-room col-12 col-sm-12">
                                <span class="btn-roomInfo badge badge-primary badge-prezzo">
                                    <div style="">
                                        <h6 class="btn-roomInfo-Text" style="vertical-align: middle;">Visualizza offerte</h6><i style="vertical-align: middle;" class="fas fa-chevron-down btn-arrow"></i>
                                    </div>
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="cardSelection1" class="card col-12 card-selection animation-selection" style="text-align: left;">
                    <div class="card-body card-selezione-body">
                        <h5 class="card-title"><span class="badge badge-success">IN OFFERTA</span></h5>
                        <div class="box">
                            <h6 class="card-subtitle offer-subtitle">Offerta Prenotazione Diretta Camera e Colazione</h6>
                            <h6 class="card-subtitle">
                                <i class="fa fa-male"></i>
                                <i class="fa fa-male"></i>
                                <i class="fa fa-male"></i>
                                <i class="fa fa-male"></i>
                            </h6>
                        </div>
                        <div class="row box" style="margin-top: 4vh;">
                            <div class="col-4 col-md-auto">
                                <div class="form-group inputIcon">
                                    <i class="fa fa-male"></i>
                                    <select class="form-control form-style select-offer room-offer1" id="nRoom1Offer1" name="nRoom1Offer1">
                                        <?php
                                        for ($i = 0; $i <= 5; $i++) {
                                            echo '<option>' . $i . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <h6>Totale <span span class="roomOfferPrice" style="font-size: 30px;">877,50€</span></h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><span class="badge badge-success">IN OFFERTA</span></h5>
                        <div class="box">
                            <h6 class="card-subtitle offer-subtitle">Prenotazione Diretta Camera e Colazione</h6>
                            <h6 class="card-subtitle">
                                <i class="fa fa-male"></i>
                                <i class="fa fa-male"></i>
                                <i class="fa fa-male"></i>
                                <i class="fa fa-male"></i>
                            </h6>
                        </div>
                        <div class="row box" style="margin-top: 4vh;">
                            <div class="col-4 col-md-auto">
                                <div class="form-group inputIcon">
                                    <i class="fa fa-male"></i>
                                    <select class="form-control form-style select-offer room-offer2" id="nRoom1Offer2" name="nRoom1Offer2">
                                        <?php
                                        for ($i = 0; $i <= 5; $i++) {
                                            echo '<option>' . $i . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <h6>Totale <span span class="roomOfferPrice" style="font-size: 30px;">920,00€</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="room2" class="card col-12 room-padding room-card img-resize" style="text-align: left;">
                    <div class="card-body">
                        <div class="box click-room">
                            <h4 class="card-title room-title" style="text-align: left;">Junior Suite</h4>
                            <h2 class="card-title"><span class="badge badge-primary badge-prezzo">877,50€</span></h2>
                        </div>
                        <h6 class="card-subtitle mb-2 text-muted click-room" style="text-align: left;">Colazione inclusa - Parcheggio privato - Vista mare</h6>
                        <div class="box row">
                            <div id="carousel2" class="carousel slide col-12 col-sm-6" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel2" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel2" data-slide-to="1"></li>
                                    <li data-target="#carousel2" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner modal-toggle" data-toggle="modal" data-target="#myModal">
                                    <a class="carousel-control-prev carousel-zoom">
                                        <span aria-hidden="true"><i class="fas fa-search-plus"></i></span>
                                    </a>
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="./Img/camera21.jpeg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="./Img/camera22.jpeg" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="./Img/camera23.jpeg" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carousel2" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel2" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!-- <img src="./Img/camera1.jpeg" class="card-img img-resize"> -->
                            <div class="col-12 col-sm-6 click-room">
                                <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                            <div class="click-room col-12 col-sm-12">
                                <span class="btn-roomInfo badge badge-primary badge-prezzo">
                                    <div style="">
                                        <h6 class="btn-roomInfo-Text" style="vertical-align: middle;">Visualizza offerte</h6><i style="vertical-align: middle;" class="fas fa-chevron-down btn-arrow"></i>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cardSelection2" class="card col-12 card-selection animation-selection" style="text-align: left;">
                    <div class="card-body card-selezione-body">
                        <h5 class="card-title"><span class="badge badge-success">IN OFFERTA</span></h5>
                        <div class="box">
                            <h6 class="card-subtitle offer-subtitle">Offerta Prenotazione Diretta Camera e Colazione</h6>
                            <h6 class="card-subtitle">
                                <i class="fa fa-male"></i>
                                <i class="fa fa-male"></i>
                                <i class="fa fa-male"></i>
                                <i class="fa fa-male"></i>
                            </h6>
                        </div>
                        <div class="row box" style="margin-top: 4vh;">
                            <div class="col-4 col-md-auto">
                                <div class="form-group inputIcon">
                                    <i class="fa fa-male"></i>
                                    <select class="form-control form-style select-offer room-offer1" id="nRoom2Offer1" name="nRoom2Offer1">
                                        <?php
                                        for ($i = 0; $i <= 5; $i++) {
                                            echo '<option>' . $i . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <h6>Totale <span span class="roomOfferPrice" style="font-size: 30px;">877,50€</span></h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><span class="badge badge-success">IN OFFERTA</span></h5>
                        <div class="box">
                            <h6 class="card-subtitle offer-subtitle">Prenotazione Diretta Camera e Colazione</h6>
                            <h6 class="card-subtitle">
                                <i class="fa fa-male"></i>
                                <i class="fa fa-male"></i>
                                <i class="fa fa-male"></i>
                                <i class="fa fa-male"></i>
                            </h6>
                        </div>
                        <div class="row box" style="margin-top: 4vh;">
                            <div class="col-4 col-md-auto">
                                <div class="form-group inputIcon">
                                    <i class="fa fa-male"></i>
                                    <select class="form-control form-style select-offer room-offer2" id="nRoom1Offer2" name="nRoom1Offer2">
                                        <?php
                                        for ($i = 0; $i <= 5; $i++) {
                                            echo '<option>' . $i . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <h6>Totale <span class="roomOfferPrice" style="font-size: 30px;">920,00€</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div id="mobile-bar-details">
                <div class="row mb-details-container">
                    <div class="col-auto mb-details">
                        <h4 style="margin-bottom: 0px;">Doppia Classica</h4>
                        <span>Offerta Prenotazione Diretta Camera e Colazione &emsp; &emsp; &emsp; 877,50€</span>
                    </div>
                    <div class="col-12 mb-details mb-total">
                        <h4 style="margin-bottom: 0px;">Totale 877,50€</h4>
                    </div>
                </div>
            </div>
            <div id="mobile-bar">
                <div class="row" style="margin-left: 0;">
                    <div class="col-2 mobile-bar-section delete-icon delete-selection">
                        <span><i class="fas fa-times"></i></span>
                    </div>
                    <div class="col-7 mobile-bar-section">
                        <p style="margin-bottom: 0px;"><a class="scroll btn-scroll" href="#offerta_scroll">PRENOTA</a></p>
                    </div>
                    <div class="col-2 mobile-bar-section show-mobile-details">
                        <span><i class="fas fa-chevron-up"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="offerta_scroll">
        <div class="row offer-container">
            <div class="col-12 col-md-4 offer-div animated">
                <h2 class="offer-title">La tua prenotazione</h2>
                <img src="./Img/camera1.jpeg" style="width:90%;">
                <div class="offer-room-info">
                    <h4>Doppia Classica</h4>
                    <p>Offerta Prenotazione Diretta Camera e Colazione</p>
                    <p><?php echo $datePrenotazione ?></p>
                </div>
                <div class="offer-details">
                    <p>Notti</p>
                    <p><?php echo $notti ?></p>
                </div>
                <div class="offer-details">
                    <p>Adulti</p>
                    <p><?php echo $numAdulti ?></p>
                </div>
                <div class="offer-details">
                    <p>Bambini</p>
                    <p><?php echo $numBambini ?></p>
                </div>
                <div class="offer-details">
                    <p>Camere</p>
                    <p><?php echo $numCamere ?></p>
                </div>
                <div class="offer-details">
                    <p>TOTALE</p>
                    <p>877,50€</p>
                </div>
                <p style="text-align:right;"><a class="scroll a-scroll" href="#rooms-view">Cambia Prenotazione</a></p>
            </div>
            <div class="col-12 col-md-4 offer-div animated">
                <h2 class="offer-title">I tuoi dati</h2>
                <div class="row">
                    <div class="col-12 offer-input-div">
                        <div class="input-group">
                            <input class="form-control form-style" id="name" name="name" placeholder="Nome">
                        </div>
                    </div>
                    <div class="col-12 offer-input-div">
                        <div class="input-group">
                            <input class="form-control form-style" id="lastName" name="lastName" placeholder="Cognome">
                        </div>
                    </div>
                    <div class="col-12 offer-input-div">
                        <div class="input-group">
                            <input class="form-control form-style" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-12 offer-input-div">
                        <div class="input-group">
                            <input class="form-control form-style" id="phone" name="phone" placeholder="Telefono">
                        </div>
                    </div>
                    <div class="col-12 offer-input-div">
                        <div class="input-group">
                            <input class="form-control form-style" id="adress" name="adress" placeholder="Indirizzo">
                        </div>
                    </div>
                    <div class="col-12 offer-input-div">
                        <div class="input-group">
                            <input class="form-control form-style" id="city" name="city" placeholder="Città">
                        </div>
                    </div>
                    <div class="col-12 offer-input-div">
                        <div class="input-group">
                            <input class="form-control form-style" id="country" name="country" placeholder="Nazione">
                        </div>
                    </div>
                    <div class="col-12 offer-input-div">
                        <div class="input-group">
                            <input class="form-control form-style" id="region" name="region" placeholder="Provincia">
                        </div>
                    </div>
                    <div class="col-12 offer-input-div">
                        <div class="input-group">
                            <input class="form-control form-style" id="cap" name="cap" placeholder="CAP">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 offer-div animated">
                <h2 class="offer-title">Metodo di pagamento</h2>
                <div class="row">
                    <div class="col-6">
                        <div class="checkbox payment-input-div">
                            <input type="checkbox" id="checkbox_1">
                            <label for="checkbox_1">Carta di credito</label>
                        </div>
                    </div>
                    <div class="col-6 payment-input-div">
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox_2">
                            <label for="checkbox_2">PayPal</label>
                        </div>
                    </div>
                    <div class="col-12 payment-input-div">
                        <div class="input-group">
                            <input class="form-control form-style" id="cardNum" name="cardNum" placeholder="Numero della carta">
                        </div>
                    </div>
                    <div class="col-12 payment-input-div">
                        <div class="input-group">
                            <input class="form-control form-style" id="cardName" name="cardName" placeholder="Nome sulla carta">
                        </div>
                    </div>
                    <div class="col-12 payment-input-div">
                        <div class="input-group">
                            <input class="form-control form-style" id="cardDate" name="cardDate" placeholder="Data di scadenza">
                        </div>
                    </div>
                    <div class="col-12 payment-input-div">
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox_3">
                            <label for="checkbox_3">Dichiaro di aver letto e di accettare i termini e le condizioni</label>
                        </div>
                    </div>
                    <div class="col-12 btn-confirm-div">
                        <button class="confirm-btn">CONFERMA PRENOTAZIONE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./Js/datepicker.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js" integrity="sha256-fIkQKQryItPqpaWZbtwG25Jp2p5ujqo/NwJrfqAB+Qk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./Js/animation.js"></script>
    <script type="text/javascript" src="./Js/script.js"></script>

    <script>
        //Inizializzazione elementi
        const dataArrivo = document.getElementById("dataArrivo");
        const dataRitorno = document.getElementById("dataRitorno");
        const btnSalmon = document.getElementById("salmonBtn");
        const divArrivo = document.getElementById("divArrivo");
        const divRitorno = document.getElementById("divRitorno");
        const arrivoIcon = document.getElementById("arrivoIcon");
        const ritornoIcon = document.getElementById("ritornoIcon");
        const input_bambino = document.querySelector('#numBambini');
        var cardSelection = document.getElementsByClassName('card-selection');

        //Animazioni di entrata                             
        function jsfunction() {
            const card = document.getElementById("content");
            card.classList.remove("fadeInDown");
            card.classList.add("fadeOut");
            AnimationSlide();
        }

        //Codice div anni bambini
        $("#BambiniDiv").hide();
        $("#bBambino").click(function() {
            if (!$("#BambiniDiv").is(":visible")) {
                $("#BambiniDiv").toggle();
                $("#BambiniDiv").removeClass("fadeOut");
                $("#BambiniDiv").addClass("fadeIn");
            } else {
                $("#BambiniDiv").removeClass("fadeIn");
                $("#BambiniDiv").addClass("fadeOut");
                setTimeout(function() {
                    $("#BambiniDiv").toggle();
                }, 500);
            }

            //Codice che chiude il div in caso l'utente clicchi al di fuori di esso
            $('body').click(function(evt) {
                if (evt.target.id == "BambiniDiv" || evt.target.id == "nBambini") {
                    $("#BambiniDiv").show();
                } else if (evt.target.id == "close-child-icon") {
                    $("#BambiniDiv").removeClass("fadeIn");
                    $("#BambiniDiv").addClass("fadeOut");
                    setTimeout(function() {
                        $("#BambiniDiv").hide();
                    }, 500);
                } else if ($(evt.target).closest('#BambiniDiv').length) {
                    return;
                } else {
                    $("#BambiniDiv").removeClass("fadeIn");
                    $("#BambiniDiv").addClass("fadeOut");
                    setTimeout(function() {
                        $("#BambiniDiv").hide();
                    }, 500);
                }
            });

            //Codice per Internet Explorer
            if (msieversion) {
                $("#BambiniDiv").addClass("ie-show");
                $("#close-child-icon").click(function() {
                    $("#BambiniDiv").addClass("ie-hide");
                });
                $("#BambiniDiv").removeClass("ie-hide");
            }
        });

        //codice card selezione offerta camera
        $(".card-selection").hide();
        $("#divPrenota").hide();
        $('#mobile-bar').hide();
        $('#mobile-bar-details').hide();
        flag = false;
        var idTest;

        $('.btn-roomInfo').click(function() {
            const roomCard = $(this).parents(".room-card");
            const CardSelection = $(this).parents(".room-card").next('.card-selection');
            const roomOffer1 = $(this).parents(".room-card").next('.card-selection').find('.room-offer1')[0].value;
            const roomOffer2 = $(this).parents(".room-card").next('.card-selection').find('.room-offer2')[0].value;

            if (flag) {
                if (this.id == idTest) {
                    CardSelection.addClass("selection-hide");
                    flag = false;
                    setTimeout(function() {
                        CardSelection.toggle();
                        roomCard.addClass("room-padding");
                        if (roomOffer1 > 0 || roomOffer2 > 0) {
                            roomCard.addClass("room-selected");
                        } else {
                            roomCard.removeClass("room-selected");
                        }
                        checkRoomSelection();
                    }, 600);
                } else {

                }
            } else {
                CardSelection.removeClass("selection-hide");
                roomCard.removeClass("room-padding");;
                flag = true;
                CardSelection.toggle();
                idTest = this.id;
            }
        })

        $('.btn-roomInfo').click(function() {
            if ($('.btn-arrow').css("transform") == 'none') {
                $('.btn-arrow').css("transform", "rotate(180deg)");
                $('.btn-roomInfo > div > h6').text("Nascondi offerte");
            } else {
                $('.btn-arrow').css("transform", "");
                $('.btn-roomInfo > div > h6').text("Visualizza offerte");
            }

        })

        var controller = [];
        $('.select-offer').on('change', function() {
            var controllId = (this).id;
            var offerNumber = $(this).val();
            var offerPrice = $(this).parents(".card-body").find(".roomOfferPrice").html();
            var offerName = $(this).parents(".card-body").find(".offer-subtitle").html();
            var roomName = $(this).parents(".card-selection").prev(".room-card").find(".room-title").html();
            var aClassName = "a" + controllId;

            const cardSelection = $(this).parents(".card-selection");
            const roomCard = $(this).parents(".card-selection").prev('.room-card');

            if (this.value > 0) {
                roomCard.addClass("room-selected");
                if (controller.length == 0) {
                    $("#dpmAppend").addClass("dpAppend");
                    $("#dpdAppend").removeClass("dpAppend");
                } else {
                    $("#dpdAppend").addClass("dpAppend");
                    $("#dpmAppend").removeClass("dpAppend");
                    if (controller.length == 1) {
                        if (!controller.includes(controllId) && !$('.dpgAppend').length) {
                            $(".dpAppendDiv").appendTo(".dpAppend");
                            var gDiv = document.createElement("div");
                            $(gDiv).addClass("dpgAppend row");
                            var selectedRoomcount = $(".dpAppend").length + 1;
                            $(gDiv).append("<p>Il totale delle camere selezionate è di 3000€</p>" + "<a><i style='vertical-align: middle;' class='fas fa-chevron-down appendIcon'></i></a>");
                            $("#dpmAppend").append(gDiv);
                        }
                    }
                }
                if (!controller.includes(controllId)) {
                    var aDiv = document.createElement("div");
                    aDiv.classList.add(aClassName, "row", "dpAppendDiv");
                    $(aDiv).append("<p class='offerNumber'>" + offerNumber + "</p>" + "<p>" + roomName + "</p>" + "<p>" + offerName + "</p>" + "<p>Totale " + offerPrice + "</p>");
                    $('.dpAppend').append(aDiv);
                    controller.push(controllId);
                } else {
                    $('.' + aClassName).find(".offerNumber").text(offerNumber);
                }
            } else {
                if ($(this).parents(".card-selection").find(".select-offer").val() == 0 && $(this).parents(".card-selection").find(".select-offer:eq(1)").val() == 0) {
                    roomCard.removeClass("room-selected");
                }

                if (controller.includes(controllId)) {
                    $('.' + aClassName).remove();
                    controller = arrayRemove(controller, controllId);
                }
            }
            roomCard.addClass("room-padding");
            cardSelection.addClass("selection-hide");
            setTimeout(function() {
                $('.btn-roomInfo-Text').each(function(index) {
                    $(this).text("Visualizza offerte");
                    $(this).next('.btn-arrow').css("transform", "");
                })
                checkRoomSelection();
                cardSelection.hide();
                flag = false;
            }, 600);

        });

        //Funziona che attiva i dettagli delle stanze selezionate sulla barra prenota per desktop
        $('#divPrenotaDetails').hide();
        $("#dpmAppend").click(function() {
            console.log(this);
            if ($(this).find(".dpgAppend").length) {
                // $("#divPrenotaDetails").toggle();

                if (!$("#divPrenotaDetails").is(":visible")) {
                    $("#divPrenotaDetails").show();
                    $('.appendIcon').css("transform", "rotate(180deg)");
                    $('#divPrenotaDetails').removeClass("fadeOut");
                    $('#divPrenotaDetails').addClass("fadeInDown");
                } else {
                    $('.appendIcon').css("transform", "");
                    $('#divPrenotaDetails').removeClass("fadeInDown");
                    $('#divPrenotaDetails').addClass("fadeOut");
                    setTimeout(function() {
                        $("#divPrenotaDetails").hide();
                    }, 500);
                }
            }
        })

        //Funziona che controlla se far apparire o no la barra con i dettagli di prenotazione e se mobile o desktop
        function checkRoomSelection() {
            if ($(".room-selected")[0]) {
                if (window.matchMedia("(min-width: 768px)").matches) {
                    $("#divPrenota").show();
                    $("#divPrenota").removeClass("fadeOutUp");
                    $("#divPrenota").addClass("fadeInDown");
                    if (msieversion()) {
                        $("#divOffertaScroll").empty();
                        const aScroll = $(document.createElement('a'));
                        $(aScroll).addClass("scroll btn-scroll scroll-exp").attr("href", "#offerta_scroll").text("PRENOTA");
                        $("#divOffertaScroll").append(aScroll);
                    }

                } else {
                    $('#mobile-bar').show();
                    $("#mobile-bar").css("position", "fixed");
                    $("#mobile-bar-details").css("position", "fixed");
                }
            } else {
                if (window.matchMedia("(min-width: 768px)").matches) {
                    $("#divPrenota").removeClass("fadeInDown");
                    $("#divPrenota").addClass("fadeOutUp");
                    setTimeout(function() {
                        $("#divPrenota").hide();
                        $('#dpmAppend').empty();
                        $('#dpdAppend').empty();
                    }, 500);
                } else {
                    $('#mobile-bar').hide();
                }
            }
        }

        // Funzione che fa' in modo che la barra dettagli ti segua
        $(".down").scroll(function() {
            var height = $(".down").scrollTop();
            if (height > 100) {
                $("#divPrenota").addClass("sticky");
            } else {
                $("#divPrenota").removeClass("sticky");
            }
        })


        //codice mostra dettagli mobile
        $(".show-mobile-details").click(function() {
            //alert($( this ).css( "transform" ));
            if ($(this).css("transform") == 'none') {
                $(this).css("transform", "rotate(180deg)");
                $('#mobile-bar-details').show();
                $('#mobile-bar-details').css("padding-bottom", "8vh");
                $('#mobile-bar-details').css("animation-name", "dettailsShow");

            } else {
                $(this).css("transform", "");
                $('#mobile-bar-details').css("padding-bottom", "0vh");
                $('#mobile-bar-details').css("animation-name", "dettailsHide");
                setTimeout(function() {
                    $('#mobile-bar-details').hide();
                }, 500);

            }
        });

        $('.btn-scroll').click(function() {
            $('#mobile-bar-details').hide();
            $('#mobile-bar').hide();
            $('#divPrenota').hide();
        })

        $('.a-scroll').click(function() {
            if (window.matchMedia("(max-width: 767px)").matches) {
                setTimeout(function() {
                    $('#mobile-bar').show();
                }, 500);
            } else {
                setTimeout(function() {
                    $('#divPrenota').show();
                }, 500);
            }
        })

        $('.delete-selection').click(function() {
            $('#mobile-bar-details').hide();
            $('#mobile-bar').hide();
            $("#divPrenota").removeClass("fadeInDown");
            $("#divPrenota").addClass("fadeOutUp");
            setTimeout(function() {
                $("#divPrenota").hide();
                $('#dpmAppend').empty();
                $('#dpdAppend').empty();
            }, 500);
            controller = [];
            $('.room-offer1').each(function(i, obj) {
                $('.room-offer1')[i].value = 0;
                $('.room-offer2')[i].value = 0;
            });
            $('.room-card').removeClass("room-selected");
        })

        //Codice gestione Carrosello all'interno della modale
        const modal_append = $('#modal-append');

        $(".modal-toggle").click(function() {
            $(modal_append).empty();
            var imgToAppend = $(this).children('.carousel-item');
            $(imgToAppend).clone().appendTo(modal_append);
        });

        $(document).ready(function() {

            //Animazione scroll sezione prenotazione
            var scrollLink = $('.scroll');
            scrollLink.click(function(event) {
                if (/Edge/.test(navigator.userAgent)) {
                    document.getElementById('ckeditor_editor').scrollIntoView();
                }
                var hash = window.location.hash;
                event.preventDefault();
                $('body,html').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            })

            //Datepicker
            //Inizializzazione DatePicker Data Arrivo
            const date_arriv = $('input[name="dataArrivo"]'); //our date input has the name "date"
            const date_arriv2 = $('input[id="dataArrivo2"]');
            const container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            date_arriv.datepicker({
                format: 'dd/mm/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })

            // Inizializzazione DatePicker Data Ritorno
            const date_rit = $('input[name="dataRitorno"]'); //our date input has the name "date"
            const date_rit2 = $('input[id="dataRitorno2"]');
            const cont = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            date_rit.datepicker({
                format: 'dd/mm/yyyy',
                container: cont,
                todayHighlight: false,
                autoclose: true,
            });

            //Controlli datePicker data di Arrivo
            date_arriv.datepicker()
                .on("changeDate", function(e) {
                    date_rit.datepicker('setStartDate', getDataMin());
                    const dataCheck = date_arriv.datepicker('getDate');

                    //Se il valore non è valido
                    if (dataCheck == null) {
                        dataArrivo.classList.remove("is-valid");
                        dataArrivo.classList.add("is-invalid");
                        arrivoIcon.classList.remove("CorrectIcon");
                        arrivoIcon.classList.add("ErrorIcon");
                        toolTipErrore();

                        //Se il valore è valido
                    } else {
                        dataArrivo.classList.remove("is-invalid");
                        dataArrivo.classList.add("is-valid");
                        dataRitorno.removeAttribute("disabled");
                        arrivoIcon.classList.remove("ErrorIcon");
                        arrivoIcon.classList.add("CorrectIcon");
                        rimuoviToolTip();
                    }
                });

            date_arriv.datepicker()
                .on("hide", function(e) {
                    date_rit.datepicker('setStartDate', getDataMin());
                    const dataCheck = date_arriv.datepicker('getDate');

                    //Se la data è vuota
                    if (dataCheck == null) {
                        dataArrivo.classList.remove("is-valid");
                        dataArrivo.classList.add("is-invalid");
                        arrivoIcon.classList.remove("CorrectIcon");
                        arrivoIcon.classList.add("ErrorIcon");
                        dataRitorno.setAttribute('disabled', '');
                        toolTipErrore();

                        //Se è stato inserito una valore corretto
                    } else {
                        dataArrivo.classList.remove("is-invalid");
                        dataArrivo.classList.add("is-valid");
                        dataRitorno.removeAttribute("disabled");
                        arrivoIcon.classList.remove("ErrorIcon");
                        arrivoIcon.classList.add("CorrectIcon");

                    }
                });

            date_arriv.datepicker()
                .on("changeDate", function(e) {
                    date_rit.datepicker("update", "");
                    dataRitorno.classList.remove("is-valid");
                    ritornoIcon.classList.remove("CorrectIcon");
                    btnSalmon.setAttribute("disabled", "");
                    rimuoviToolTipRit();
                });

            //Controlli datePicker data di Partenza
            date_rit.datepicker()
                .on("changeDate", function(e) {
                    const dataCheck = date_arriv.datepicker('getDate');
                    const dataCheck2 = date_rit.datepicker('getDate');

                    //Se il valore Data Arrivo non è valido
                    if (dataCheck == null) {
                        dataArrivo.classList.remove("is-valid");
                        dataArrivo.classList.add("is-invalid");
                        arrivoIcon.classList.remove("CorrectIcon");
                        arrivoIcon.classList.add("ErrorIcon");
                        dataRitorno.setAttribute('disabled', '');

                        //Se il valore Data Arrivo è valido
                    } else {
                        //Se il valore Data Partenza non è valido
                        if (dataCheck2 == null) {
                            dataRitorno.classList.remove("is-valid");
                            dataRitorno.classList.add("is-invalid");
                            ritornoIcon.classList.remove("CorrectIcon");
                            ritornoIcon.classList.add("ErrorIcon");
                            toolTipErroreRit();

                        } else {
                            //Se il valore Data Partenza è valido ed è maggiore di Data Arrivo
                            if (dataCheck2 > dataCheck) {
                                dataRitorno.classList.remove("is-invalid");
                                dataRitorno.classList.add("is-valid");
                                btnSalmon.removeAttribute("disabled");
                                $('[data-toggle="tooltip-span"]').tooltip('disable');
                                ritornoIcon.classList.remove("ErrorIcon");
                                ritornoIcon.classList.add("CorrectIcon");
                                rimuoviToolTipRit();
                            }
                        }
                    }
                });

            date_rit.datepicker()
                .on("hide", function(e) {
                    const dataCheck = date_arriv.datepicker('getDate');
                    const dataCheck2 = date_rit.datepicker('getDate');

                    //Se il valore Data Arrivo non è valido
                    if (dataCheck == null) {
                        dataArrivo.classList.remove("is-valid");
                        dataArrivo.classList.add("is-invalid");
                        arrivoIcon.classList.remove("CorrectIcon");
                        arrivoIcon.classList.add("ErrorIcon");
                        dataRitorno.setAttribute('disabled', '');

                        //Se il valore Data Arrivo è valido
                    } else {
                        //Se il valore Data Partenza non è valido
                        if (dataCheck2 == null) {
                            dataRitorno.classList.remove("is-valid");
                            dataRitorno.classList.add("is-invalid");
                            ritornoIcon.classList.remove("CorrectIcon");
                            ritornoIcon.classList.add("ErrorIcon");
                            toolTipErroreRit();

                        } else {
                            //Se il valore Data Partenza è valido ed è maggiore di Data Arrivo
                            if (dataCheck2 > dataCheck) {
                                dataRitorno.classList.remove("is-invalid");
                                dataRitorno.classList.add("is-valid");
                                btnSalmon.removeAttribute("disabled");
                                $('[data-toggle="tooltip-span"]').tooltip('disable');
                                ritornoIcon.classList.remove("ErrorIcon");
                                ritornoIcon.classList.add("CorrectIcon");
                                rimuoviToolTipRit();
                            }
                        }
                    }
                });

            //Funzione che cambia la data minima nel campo Data Partenza
            date_arriv2.datepicker()
                .on("changeDate", function(e) {
                    const data_min = date_arriv2.datepicker('getDate');
                    date_rit2.datepicker('setStartDate', data_min);
                });

            //Funzione che trova la data minima per il campo Data Ritorno
            function getDataMin() {
                const data_min = date_arriv.datepicker('getDate');
                const data_UTC = date_arriv.datepicker('getUTCDate');
                let date1 = new Date(data_UTC);
                date1.setUTCDate(date1.getDate() + 1);
                const dd = date1.getDate();
                const mm = date1.getMonth() + 1;
                const y = date1.getFullYear();
                const dataSuccessiva = dd + '/' + mm + '/' + y;
                return dataSuccessiva;
            }

        })

        function toolTipErrore() {
            divArrivo.setAttribute('data-original-title', 'La data inserita non è corretta.');
            $('[data-toggle="tooltip-dataArrivo"]').on('shown.bs.tooltip', function() {
                $('.tooltip-inner').addClass('tooltip-errore');
            });
        }

        function toolTipErroreRit() {
            divRitorno.setAttribute('data-original-title', 'Inserisci una data');
            $('[data-toggle="tooltip-dataRitorno"]').on('shown.bs.tooltip', function() {
                $('.tooltip-inner').addClass('tooltip-errore');
            });
        }

        function rimuoviToolTip() {
            divArrivo.removeAttribute('data-toggle');
            divArrivo.removeAttribute('data-placement');
            divArrivo.removeAttribute('title');
            divArrivo.removeAttribute('data-original-title');
        }

        function rimuoviToolTipRit() {
            divRitorno.setAttribute('data-original-title', '');
        }

        //Funzione che rimuove un elemento specifico da un array
        function arrayRemove(arr, value) {
            return arr.filter(function(ele) {
                return ele != value;
            });

        }

        function msieversion() {

            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");

            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) // If Internet Explorer, return version number
            {
                return true;
            } else // If another browser, return 0
            {
                return false;
            }

            return false;
        }
    </script>
    <?php
    //Chiamata alla funzione che gestisce le animazioni
    if ($n != null) {
        echo '<script type="text/javascript">',
            'jsfunction();',
            '</script>';
    }
    ?>

    <script>
        //Inizializzazione dei tooltip
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="tooltip-span"]').tooltip();
            $('[data-toggle="tooltip-dataArrivo"]').tooltip();
            $('[data-toggle="tooltip-dataRitorno"]').tooltip();
        });
    </script>
</body>

</html>