@extends('app')

@section('title', 'Strona główna')

@section('content')
<!-- Hero section -->
    <div class="row d-flex align-items-center reverse-md-column" id="hero">
        <div class="col-md-6">
            <h1 class="text-light text-center">Rozlicz swój podatek</h1>
            <h2 class="text-light text-center">Fenixtax</h2>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_htdr8jgg.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
        </div>
    </div>
<!--/ End hero section -->

<!-- CTA -->
    <div class="row" id="cta">
        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <h1 class="text-light text-center">Rozlicz swój holenderski podatek teraz</h1>
        </div>
        <div class="col-md-6 text-end d-flex justify-content-start align-items-center">
            <a class="btn-lg btn-primary m-2" href="/login">ROZLICZ SIĘ</a><br>
            <a class="btn-lg btn-secondary m-2" href="/calculator">KALKULATOR PODATKU</a>
        </div>
    </div>
<!--/ End CTA -->

<!-- About -->
<div class="container mt-4 mb-4">
    <div class="row text-center p-3 text-light">
        <div class="col">
            <h1>O FENIXTAX</h1>
            <p>Oferujemy rozliczenie i zwrot podatku z zagranicy: zwrot podatku z Niemiec (Freistellungsbescheinigung,
                a także Sokabau), zwrot podatku z Holandii (Belastingdienst) i innych krajów jak: Wielka Brytania, Austria i Irlandia,
                a także zgłoszenie i rejestracja do Sokabau.<br>
                Dziś FENIX TAX należy do najbardziej uznanych i doświadczonych firm zajmujących się zwrotem nadpłaconego podatku w Polsce. 
                Nasi klienci cenią nas za profesjonalizm oraz zrozumienie dla potrzeb i oczekiwań, z którymi się do nas zwracają. 
                Tworząc nasze usługi postawiliśmy na proste rozwiązania, które dla naszych klientów oznaczają jak najmniej formalności. 
                Inwestując w szkolenia i nowoczesne rozwiązania informatyczne, stworzyliśmy niezawodny system, który skraca czas oczekiwania na pieniądze oraz 
                pozwala odzyskać maksymalną, możliwą kwotę zwrotu podatku.<br>
                O sile i wartości firmy stanowią pracujący tu ludzie. Grupy specjalistów od prawa podatkowego na bieżąco monitorują i reprezentują 
                sprawy naszych klientów przed Urzędami Skarbowymi poszczególnych krajów. To właśnie ich profesjonalizm oraz indywidualne podejście do każdego 
                podania sprawia, że zawsze możesz liczyć na pełny dostęp do informacji oraz czasu naszych konsultantów. <br>
                Nieustannie analizujemy potrzeby naszych klientów, a także możliwości, jakie stwarza prawo podatkowe w poszczególnych krajach. 
                Z satysfakcją myślimy o zaufaniu, jakim cieszymy się wśród klientów, dla których zwrot podatku jest często ważną częścią szczęśliwego powrotu do kraju 
                z niełatwej emigracji zarobkowej.</p>
        </div>
    </div>
</div>
<!--/ End about -->
@endsection