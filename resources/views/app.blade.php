<!doctype html>
<html lang="pl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Style -->

    <link rel="stylesheet" href="css/style.css">
    <title>Fenixtax - @yield('title')</title>
  </head>
  <body>
    <div class="container-fluid">
      <!-- Header -->
      <div class="row p-4">
        <div class="col-6 text-left">
          <a href="/"><img class="img-fluid" src="img/xFENIXLOGO.webp" alt="Fenixtax" width="150"></a>
        </div>
        <div class="col-6 text-right">
          <a class="btn btn-warning text-dark" href="/login">ZALOGUJ</a>
        </div>
      </div>

      <!--/ End header -->

      <!-- Cookies -->

      <div id="simplecookienotification_v01" style="display: block; z-index: 10; min-height: 35px; width: 100%; position: fixed; background: #221a49; border-image: initial; border-top: solid 2px #fff; text-align: center; right: 0px; color: #fff; bottom: 0px; left: 0px; border-right-color: rgb(160, 178, 192); border-bottom-color: rgb(160, 178, 192); border-left-color: rgb(160, 178, 192);">
      <div style="padding:10px; margin-left:15px; margin-right:15px; font-size:14px; font-weight:normal;">
        <span id="simplecookienotification_v01_powiadomienie">Używamy cookies w celach funkcjonalnych, aby ułatwić użytkownikom korzystanie z witryny oraz w celu tworzenia anonimowych statystyk serwisu. Jeżeli nie blokujesz plików cookies, to zgadzasz się na ich używanie oraz zapisanie w pamięci urządzenia.</span><span id="br_pc_title_html"><br></span>
        <a id="simplecookienotification_v01_polityka" href="policy" style="color:#FBC02D;">Polityka Prywatności</a><span id="br_pc2_title_html"> &nbsp;&nbsp; </span>
        <a id="simplecookienotification_v01_info" href="http://jakwylaczyccookie.pl/jak-wylaczyc-pliki-cookies/" style="color: #FBC02D;">Jak wyłączyć cookies?</a><span id="br_pc3_title_html"> &nbsp;&nbsp; </span>
        <a id="simplecookienotification_v01_info2" href="https://nety.pl/cyberbezpieczenstwo" style="color: #FBC02D">Cyberbezpieczeństwo</a>
        <div id="jwc_hr1" style="height: 10px; display: none;"></div>
        <a id="okbutton" href="javascript:simplecookienotification_v01_create_cookie('simplecookienotification_v01',1,7);" style="position: absolute; background: #FBC02D; color: #221a49;; padding: 5px 15px; text-decoration: none; font-size: 12px; font-weight: normal; border: 0px solid rgb(43, 54, 67); border-radius: 0px; top: 5px; right: 5px;">AKCEPTUJĘ</a>
        <div id="jwc_hr2" style="height: 10px; display: none;"></div>
      </div>
    </div>
    <script type="text/javascript">
      var galTable = new Array();
      var galx = 0;
    </script>
    <script type="text/javascript">
      function simplecookienotification_v01_create_cookie(name, value, days) {
        if (days) {
          var date = new Date();
          date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
          var expires = "; expires=" + date.toGMTString();
        } else var expires = "";
        document.cookie = name + "=" + value + expires + "; path=/";
        document.getElementById("simplecookienotification_v01").style.display = "none";
      }

      function simplecookienotification_v01_read_cookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(";");
        for (var i = 0; i < ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == " ") c = c.substring(1, c.length);
          if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
      }
      var simplecookienotification_v01_jest = simplecookienotification_v01_read_cookie("simplecookienotification_v01");
      if (simplecookienotification_v01_jest == 1) {
        document.getElementById("simplecookienotification_v01").style.display = "none";
      }
    </script>

      <!--/ End cookies -->
        @yield('content')

      <!-- Social bar -->

      <div id="social">
        <a href="#">
        <img id="social-fb" src="https://img.icons8.com/external-justicon-lineal-justicon/42/000000/external-facebook-social-media-justicon-lineal-justicon.png"/>
        </a>
      </div>

      <!--/ End social bar -->

    <!-- Footer -->
    <div class="row" id="footer">
      <div class="col-md-4 text-center text-light">
        <ul class="list-unstyled">
          <li class="p-2"><a class="sitemap" href="policy">Polityka prywatności</a></li>
          <li class="p-2"><a class="sitemap" href="terms">Regulamin</a></li>
          <li class="p-2"><a class="sitemap" href="security">Bezpieczeństwo</a></li>
        </ul>
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

  </body>
</html>