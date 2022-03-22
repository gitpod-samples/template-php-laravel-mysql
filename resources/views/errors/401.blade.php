@extends('app')

@section('title', '401 - Brak autoryzacji dostępu')

@section('content')
 <div class="row error-page">
     <div class="col-md-6 d-flex justify-content-center align-items-center">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>   
        <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_dfvrnyjk.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
     </div>
     <div class="col-md-6 text-center text-light">
         <h1 class="error">401</h1>
         <h3>Ooooops...Brak autoryzacji dostępu</h3>
        <a class="btn btn-warning m-4" href="/">STRONA GŁÓWNA</a>
     </div>
 </div>
@endsection