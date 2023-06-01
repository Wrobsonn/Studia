<?php
//var_dump(getcwd());
include_once("funkcje.php");
include_once("Baza.php");
?>

<!DOCTYPE html>


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Best Kebab</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon1.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <link href="/css/styles.css" rel="stylesheet" />
    <link href="/css/kebab.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/lightbox.css" />
    
<div class="container-fluid">
    <div class="toast-container position-fixed top-50 start-50 translate-middle-x p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Edytuj zamówienie</strong>
            </div>
            <div class="toast-body">
                <div class="wrapper">
                    <label for="ciastoSelect1" class="form-label">Ciasto:</label>
                    <select id="ciastoSelect1" name="ciastoSelect" class="form-control">
                        <option value="cienkie">Cienkie</option>
                        <option value="grube">Grube</option>
                    </select>


                </div>
                <div class="wrapper">
                    <label for="miesoSelect1" class="form-label">Mięso:</label>
                    <select id="miesoSelect1" name="miesoSelect" class="form-control">
                        <option value="kurczak">Kurczak</option>
                        <option value="baranina">Baranina</option>
                        <option value="mieszane">Mieszane</option>
                    </select>
                </div>
                <div class="wrapper">
                    Sosy
                    <div class="col-md-4">
                        <div class="checkbox">
                            <label for="sauceCheckbox-3">
                                <input type="checkbox" class="sauceCheckbox" name="sauceCheckbox" id="sauceCheckbox-3" value="czosnek">
                                Czosnkowy
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="sauceCheckbox-4">
                                <input type="checkbox" class="sauceCheckbox" name="sauceCheckbox" id="sauceCheckbox-4" value="ostry">
                                Ostry
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="sauceCheckbox-5">
                                <input type="checkbox" class="sauceCheckbox" name="sauceCheckbox" id="sauceCheckbox-5" value="ketchup">
                                Ketchup
                            </label>
                        </div>
                    </div>
                </div>
                <div class="wrapper">
                    Płatności:
                    <div class="col-md-4">
                        <label class="radio-inline" for="paymentRadio-3">
                            <input type="radio" class="paymentRadio" name="paymentRadio" id="paymentRadio-3" value="blik" checked="checked">
                            Blik
                        </label>
                        <label class="radio-inline" for="paymentRadio-4">
                            <input type="radio" class="paymentRadio" name="paymentRadio" id="paymentRadio-4" value="karta">
                            Karta
                        </label>
                        <label class="radio-inline" for="paymentRadio-5">
                            <input type="radio" class="paymentRadio" name="paymentRadio" id="paymentRadio-5" value="gotowka">
                            Gotówka
                        </label>
                    </div>
                </div>
                <br>
                <button type="button" class="btn btn-primary btn-sm" id="przycisk" onclick="">Save</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#page-top">KEBAB</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link" href="#Kebaby">Kebaby</a></li>
                <li class="nav-item"><a class="nav-link" href="#Opinia">Opinia</a></li>
                <li class="nav-item"><a class="nav-link" href="#Cennik">Cennik</a></li>
                <li class="nav-item"><a class="nav-link" href="#Zamowienie">Zamowienie</a></li>
                <li class="nav-item"><a class="nav-link" href="#Zamowienia">Zamowienia</a></li>
                <li class="nav-item"><a class="nav-link" href="#Komentarze">Komentarze</a></li>
                <li class="nav-item"><a class="nav-link" href="#mapa">Kontakt</a></li>

                <body class="antialiased">
                    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                        @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                            @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                            @endauth
                        </div>
                        @endif

            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img width="560" height="315" src="assets/img/kebs1.jpg" alt="1 slide">
                        </div>
                        <div class="carousel-item">
                            <img width="560" height="315" src="assets/img/kebs2.jpg" alt="2 slide">
                        </div>
                        <div class="carousel-item">
                            <img width="560" height="315" src="assets/img/kebs3.jpg" alt="3 slide">
                        </div>
                    </div>
                </div>
                <h1 class="text-white font-weight-bold">Coś o nas</h1>
                <hr class="divider" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <div id="carouselExampleControls" class="carousel slide carousel-dark " data-bs-ride="carousel" data-bs-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-block text-center col-8 m-auto">
                                <h3>O nas</h3><br>
                                <h5>Jesteśmy kebabem od prawidzwego studenta.
                                    Możemy pochwalić się bardzo dobrymi opiniami na nasz temat.
                                    Lanie wody. Lanie wody.Lanie wody. Lanie wody. Lanie wody.
                                    Lanie wody. Lanie wody.Lanie wody. Lanie wody. Lanie wody.
                                    Lanie wody. Lanie wody.Lanie wody. Lanie wody. Lanie wody.
                                    Lanie wody. Lanie wody.Lanie wody. Lanie wody. Lanie wody.
                                    Lanie wody. Lanie wody.Lanie wody. Lanie wody. Lanie wody.
                                    Zapraszmy do odwiedzin</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-block text-center col-8 m-auto">
                                <h3>Nie o nas</h3><br>
                                <h5>Tu nic nie ma Tu nic nie ma Tu nic nie ma Tu nic nie ma
                                    Tu nic nie ma Tu nic nie ma Tu nic nie ma Tu nic nie ma
                                    Tu nic nie ma Tu nic nie ma Tu nic nie ma Tu nic nie ma
                                    Tu nic nie ma Tu nic nie ma Tu nic nie ma Tu nic nie ma
                                    Tu nic nie ma Tu nic nie ma Tu nic nie ma Tu nic nie ma
                                    Tu nic nie ma Tu nic nie ma Tu nic nie ma Tu nic nie ma
                                    Tu nic nie ma Tu nic nie ma Tu nic nie ma Tu nic nie ma
                                </h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-block text-center col-8 m-auto">
                                <h3>moze o</h3><br>
                                <h5>Tu cos jest Tu cos jest Tu cos jest Tu cos jest Tu cos jest
                                    Tu cos jest Tu cos jest Tu cos jest Tu cos jest Tu cos jest
                                    Tu cos jest Tu cos jest Tu cos jest Tu cos jest Tu cos jest
                                    Tu cos jest Tu cos jest Tu cos jest Tu cos jest Tu cos jest
                                    Tu cos jest Tu cos jest Tu cos jest Tu cos jest Tu cos jest
                                    Tu cos jest Tu cos jest Tu cos jest Tu cos jest Tu cos jest
                                    Tu cos jest Tu cos jest Tu cos jest Tu cos jest Tu cos jest
                                    Tu cos jest Tu cos jest Tu cos jest Tu cos jest Tu cos jest
                                    Tu cos jest Tu cos jest Tu cos jest Tu cos jest Tu cos jest
                                </h5>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="page-section" id="Kebaby">
    <div class="container px-4 px-lg-5 h-100">
        <h2 class="text-center mt-0">Nasze kebaby</h2>
        <hr class="divider" />
        <div class="row gx-4 gx-lg-5">
            <div class="row justify-content-around d-flex" id="galeria">


            </div>
        </div>
    </div>
</section>

<!-- About-->
<section class="page-section" id="Cennik">
    <div class="container px-4 px-lg-5 h-100">
        <h2 class="text-center mt-0">Cennik</h2>
        <hr class="divider" />
        <div class="row gx-4 gx-lg-5">
            <div class="d-block text-center col-8 m-auto">

                <table class=" m-auto">
                    <caption></caption>
                    <thead>
                        <tr>
                            <th>Lp</th>
                            <th>Nazwa</th>
                            <th>Cena</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                            <th colspan="3"> Pita </th>

                        </tr>
                        <tr>
                            <th>1</th>
                            <th>Maly</th>
                            <th>10 zl</th>
                        </tr>
                        <tr>
                            <th>2</th>
                            <th>Sredni</th>
                            <th>12 zl</th>
                        </tr>
                        <tr>
                            <th>3</th>
                            <th>Duzy</th>
                            <th>15 zl</th>
                        </tr>

                        <tr>
                            <th colspan="3"> Bułka </th>

                        </tr>
                        <tr>
                            <th>4</th>
                            <th>Maly</th>
                            <th>11 zl</th>
                        </tr>
                        <tr>
                            <th>5</th>
                            <th>Sredni</th>
                            <th>13 zl</th>
                        </tr>
                        <tr>
                            <th>6</th>
                            <th>Duzy</th>
                            <th>16 zl</th>
                        </tr>
                        <tr>
                            <th colspan="3"> Napoje </th>
                        </tr>

                        <tr>
                            <th>7</th>
                            <th>Coca cola</th>
                            <th>5 zl</th>
                        </tr>
                        <tr>
                            <th>8</th>
                            <th>Sok mango</th>
                            <th>4 zl</th>
                        </tr>
                        <tr>
                            <th>9</th>
                            <th>Woda</th>
                            <th>2 zl</th>
                        </tr>
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Services-->


<section class="page-section" id="Zamowienie">
    <div class="container px-4 px-lg-5 h-100 justify-content-center">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Zamówienie</h2>
                <hr class="divider" />
                <p class="text-muted mb-5"> Co byś dobrego zjadł</p>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
<?php Form();
 $bd = new Baza("localhost", "root", "", "lab12");


if(!isset($_GET)){
 walidacja($bd);}

if(isset($_GET["orderButton"])){
    walidacja($bd);
}

?>
            </div>
        </div>
    </div>
</section>

<section class="page-section" id="zamowienia">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Zamówienia</h2>
                <hr class="divider" />
                <?php 
echo $bd->select("select * from orders",["id","Ciasto","Mieso","Sosy","Paymant","Uwagi"]);


?>
            </div>
        </div>

        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div id="orders" class="orders">
            </div>
        </div>
    </div>
</section>
<section class="page-section" id="Komentarze">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h3>Komentarze</h3>
                <a href="{{ url('/comments') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"> <button id="orderButton" name="orderButton" class="btn btn-primary">Komentarze  </button></a>

            </div>
        </div>
    </div>
</section>




<section class="page-section" id="mapa">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h2 class="mt-0">Tu nas znajdziesz</h2>
                <hr class="divider" />
            </div>
            <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2498.0549546469542!2d22.55015697172477!3d51.236482786308535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1871e9f654148f67!2sInstytut%20Informatyki%20pentagon!5e0!3m2!1spl!2spl!4v1655156087962!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-lg-4 text-center mb-5 mb-lg-0">
            <i class="bi-phone fs-2 mb-3 text-muted"></i>
            <div> 123 123 123</div>
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="bg-light py-5">
    <div class="container px-4 px-lg-5">
        <div class="small text-center text-muted">Copyright &copy; 2023 - Jakub Wróbel</div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- SimpleLightbox plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
<!-- Core theme JS-->
<!-- <script src="js/scripts.js"></script>
<script src="js/gala.js"></script>
<script src="js/lightbox.js"></script>
<script src="js/orders.js"></script>
<script src="js/zamowienia.js"></script>
<script src="js/delete.js"></script> -->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>


</div>
</body>

</html>