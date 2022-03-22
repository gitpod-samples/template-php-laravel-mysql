<!doctype html>
<html lang="pl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Style -->

    <link rel="stylesheet" href="css/style.css">
    <title>Fenixtax - @yield('title')</title>
  </head>
  <body>
    <div class="container-fluid">
      <!-- Header -->
      <div class="row p-4">
        <div class="col-6 text-left">
          <img class="img-fluid" src="img/xFENIXLOGO.webp" alt="Fenixtax" width="150">
        </div>
        <div class="col-6 text-right">
          <a class="btn btn-warning text-dark" href="#">ZALOGUJ</a>
        </div>
      </div>
      <!--/ End header -->

        @yield('content')

    <!-- Footer -->
    <div class="row" id="footer">
      <div class="col-md-4 text-center">
        <img class="img-fluid" src="img/world.png" alt="Fenixtax">
      </div>
      <div class="col-md-4 text-center">
        <img class="img-fluid" src="img/xFENIXLOGO.webp" alt="Fenixtax" width="200">
      </div>
      <div class="col-md-4 text-center">
        <p class="text-light">
          <b>
            Przyjdź do nas<br>
            FENIXTAX
          </b><br>
          <i>
            ul. Żywiecka 155a</br>
            43-300 Bielsko-Biała
          </i><br>
          <b>
        </p>
          <a class="footer-link" href="tel:515096601">
            <img src="https://img.icons8.com/pastel-glyph/22/FBC02D/iphone-x--v1.png" data-pagespeed-url-hash="2392673582" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/> 515-096-601
          </a><br>
          <a class="footer-link" href="mailto:biuro@fenixtax.pl">
            <img src="https://img.icons8.com/pastel-glyph/22/FBC02D/secured-letter--v2.png" data-pagespeed-url-hash="785581329" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/> biuro@fenixtax.pl
          </a>
        </b>
      </div>
    </div>
    <!-- End footer -->
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>