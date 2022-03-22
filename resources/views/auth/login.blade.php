@extends('auth.app')

@section('title', 'Logowanie')

@section('content')
 <div class="row">
    <div class="col-12 d-flex justify-content-center text-center">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets1.lottiefiles.com/private_files/lf30_ulp9xiqw.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>
    <div class="col-12 text-light d-flex justify-content-center text-center">
        <h1>Logowanie</h1>
    </div>
    <div class="col-12 d-flex justify-content-center text-center">
    <form class="m-4">
  <div class="form-group text-light m-4">
    <input type="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Wpisz numer telefonu">
    <small id="emailHelp" class="form-text text-muted">Nie udostępnimy nikomu Twojego numeru telefonu.</small>
  </div>
  <button type="submit" class="btn btn-warning m-2">ZALOGUJ</button>
  <a class="text-warning" href="confirm">AUTORYZACJA</a>
</form>
    </div>
 </div>
@endsection