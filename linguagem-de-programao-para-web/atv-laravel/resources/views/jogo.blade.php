<x-layout>
    <x-slot name="titulo">Jogos</x-slot>
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title"> Jogos </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <a href="{{ route('jogo.create') }}" class="btn btn-primary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Sortear jogo
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <!-- Content here -->
            @foreach($jogos as $jogo)
                <div class="col-12 mb-3">
                    <div class="text-muted mb-2">Data: {{ $jogo->data() }}</div>
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                <tr>
                                    <th>Posição</th>
                                    <th>Número da Sorte</th>
                                    <th>Bicho</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jogo->sorteios() as $sorteio)
                                    <tr>
                                        <td> {{ $sorteio[0] }}º </td>
                                        <td class='text-muted'> {{ $sorteio[1] }} </td>
                                        <td class='text-muted'> {{ $sorteio[2] }} </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
