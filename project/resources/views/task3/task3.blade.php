@extends('base')

@section('section')
    <section class="masthead text-white text-center" id="services">
        <div class="container">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading">
                    <h2 class="text-black">Series de TV</h2>
                    <h3 class="text-black mb-5">Listagem de todas as séries.</h3>
                </div>
            </div>
            <div class="container gx-0">
                <form action="{{ route('task3') }}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Digite o nome de uma série." >
                        <div class="input-group-prepend">
                            <button class="btn btn-primary">Buscar</button>
                            <a href="{{route('task3')}}" class="btn btn-secondary text-white">Limpar filtros</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row gx-0 d-flex justify-content-center align-items-center">
                @forelse($series as $serie)

                    <div class="col-lg-3 col-md-3 mb-5 d-flex justify-content-center">
                        <a class="portfolio-item" style="width: 18rem;" href="#">
                            <div class="caption">
                                <div class="caption-content caption-content-serie">
                                    <div class="h2 title-serie" >{{ $serie->title }}</div>
                                    <p class="fw-bold mb-0" style="font-size: 1rem;">Proximo episodio: {{ $serie->getNextEp()->datetime }}</p>
                                    <p class="fw-bold mb-0">
                                        Faltam:
                                        {{ $serie->getNextEp()->days == 0 ? '' : $serie->getNextEp()->days." dias" }}
                                        {{ $serie->getNextEp()->hours == 0 ? '' : $serie->getNextEp()->hours." horas e "  }}
                                        {{ $serie->getNextEp()->minutes == 0 && $serie->getNextEp()->hours == 0 ? '' : $serie->getNextEp()->minutes." minutos" }}
                                    </p>
                                </div>
                            </div>
                            <img class="img-serie" src="{{ $serie->image_url }}" alt="..." />
                        </a>
                    </div>
                @empty
                    <div class="col-lg-12 col-md-12 text-center text-black mt-5"> Não encontramos nenhum resultado. <a href="{{route('task3')}}" class="">Recarregar</a> </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection
