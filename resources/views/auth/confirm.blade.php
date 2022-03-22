@extends('app')

@section('title', 'Potwierdzenie logowania')

@section('content')
 <div class="row">
    <div class="col-12 d-flex justify-content-center text-center">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_qa63kqdv.json"  background="transparent"  speed=".2"  style="width: 300px; height: 300px;"  autoplay></lottie-player>
    </div>
    <div class="col-12 text-light d-flex justify-content-center text-center">
        <h1>Wprowadź kod SMS</h1>

        <!-- Tooltip -->
        <a class="tooltip-show"><img id="tooltip-btn"src="https://img.icons8.com/cotton/32/000000/information--v1.png"/><a>

        <div class="tooltip-box">
            <h2 id="tooltip-header">Lorem ipsum</h2>
            <p id="tooltip-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum sit amet est at porta. Etiam consequat laoreet ipsum. Vestibulum purus risus, faucibus scelerisque luctus nec, ullamcorper sed libero. Fusce egestas tellus id purus placerat, nec porta lorem tincidunt. Donec venenatis diam imperdiet urna hendrerit bibendum vitae in sem.</p>
            <span id="tooltip-close">&#10006</span>
        </div>
        <!--/ End tooltip -->
    </div>
    <div class="col-12 d-flex justify-content-center text-center">
    <form class="m-4">
  <div class="form-group text-light m-4">
        <input type="text" class="form-control" id="exampleInputEmail1" size="1" maxlenght="1">
        <input type="text" class="form-control" id="exampleInputEmail1" size="1" maxlenght="1">
        <input type="text" class="form-control" id="exampleInputEmail1" size="1" maxlenght="1">
        <input type="text" class="form-control" id="exampleInputEmail1" size="1" maxlenght="1">
    <small id="emailHelp" class="form-text text-muted">Test text</small>
  </div>
  <button type="submit" class="btn btn-warning m-2">Potwierdź</button>
</form>
    </div>
 </div>
@endsection