@extends('auth.app')

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
        <a class="tool-show"><img id="tool-btn"src="https://img.icons8.com/cotton/18/000000/information--v1.png"/><a>

        <div class="tool-box">
            <h3 class="text-dark text-left" id="tool-header">Lorem ipsum</h3>
            <p id="tool-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum sit amet est at porta. Etiam consequat laoreet ipsum. Vestibulum purus risus, faucibus scelerisque luctus nec, ullamcorper sed libero. Fusce egestas tellus id purus placerat, nec porta lorem tincidunt.</p>
            <span id="tool-close">&#10006</span>
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