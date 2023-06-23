@extends('base')

@section('section')
<section class="masthead d-flex align-items-center">
    <div class="container px-4 px-lg-5">
        <div class="content-section-heading text-center">
{{--            <h3 class="text-secondary mb-0">G4F Desenvolvedor FullStack</h3>--}}
            <h2 class="mb-5">Prova de conceito</h2>
        </div>
        <div class="row gx-0">
            <div class="col-lg-4 p-1">
                <a class="portfolio-item" href="{{ route('task1') }}">
                    <div class="caption">
                        <div class="caption-content">
                            <div class="h2">Questão 1</div>
                            <p class="mb-0">Números primos em JS.</p>
                        </div>
                    </div>
                    <img class="img-fluid" src="assets/img/bg.jpg" alt="..." />
                </a>
            </div>
            <div class="col-lg-4 p-1">
                <a class="portfolio-item" href="{{ route('task2') }}">
                    <div class="caption">
                        <div class="caption-content">
                            <div class="h2">Questão 2</div>
                            <p class="mb-0">Caracteres ASCII em PHP.</p>
                        </div>
                    </div>
                    <img class="img-fluid" src="assets/img/bg.jpg" alt="..." />
                </a>
            </div>
            <div class="col-lg-4 p-1">
                <a class="portfolio-item" href="{{ route('task3') }}">
                    <div class="caption">
                        <div class="caption-content">
                            <div class="h2">Questão 3</div>
                            <p class="mb-0">Series de TV.</p>
                        </div>
                    </div>
                    <img class="img-fluid" src="assets/img/bg.jpg" alt="..." />
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

