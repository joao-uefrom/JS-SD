<x-layout>
    <x-slot name="titulo">Apostas</x-slot>

    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title"> Apostas </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <!-- Content here -->
            <div class="row row-cards">
                <div class="col-md-5 col-lg-4">
                    <form method="get" action="{{ route('aposta.create') }} " class="card mb-2">
                        @csrf
                        <input name="tipo_de_aposta" type="hidden" value="{{ request()->tipo_de_aposta }}">
                        <div class="card-header">
                            <h4 class="card-title"> Adicionar </h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">CPF</label>
                                <input type="text"
                                       class="form-control @error('cpf') is-invalid @enderror" name="cpf"
                                       data-mask="000.000.000-00" data-mask-visible="false" autocomplete="off"
                                       value="{{ old('cpf') }}">
                                @error('cpf')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            @if(request()->tipo_de_aposta === '1')
                                <div class="mb-2">
                                    <label class="form-label required">Bicho: <span id="valor"></span></label>
                                    <input type="range" class="form-range mb-2" min="1" max="25" step="1"
                                           name="bicho" id="bicho" value="{{ old('bicho') ?? 1 }}">
                                </div>
                            @elseif(request()->tipo_de_aposta === '2')
                                <div class="mb-3">
                                    <label class="form-label required">Número da sorte</label>
                                    <input type="text" class="form-control @error('n1') is-invalid @enderror"
                                           name="n1" value="{{ old('n1') }}">
                                    @error('n1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @else
                                <div class="mb-3">
                                    <label class="form-label required">Números da sorte</label>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control @error('n1') is-invalid @enderror"
                                                   name="n1" value="{{ old('n1') }}">
                                            @error('n1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control @error('n2') is-invalid @enderror"
                                                   name="n2" value="{{ old('n2') }}">
                                            @error('n2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label class="form-label required">Valor</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text"> R$ </span>
                                    <input type="text"
                                           class="form-control @error('valor') is-invalid @enderror"
                                           placeholder="100,00" autocomplete="off" name="valor"
                                           value="{{ old('valor') }}">
                                    @error('valor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @if(request()->t !== '3')
                                <div class="mb-3">
                                    <label class="form-label required">Tipo de Jogo</label>
                                    <div class="form-selectgroup">
                                        <label class="form-selectgroup-item">
                                            <input type="radio" name="tipo_de_jogo" value="1"
                                                   class="form-selectgroup-input">
                                            <span class="form-selectgroup-label">Cabeça</span>
                                        </label>
                                        <label class="form-selectgroup-item">
                                            <input type="radio" name="tipo_de_jogo" value="2"
                                                   class="form-selectgroup-input" checked>
                                            <span class="form-selectgroup-label">Cercar</span>
                                        </label>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary ms-auto"> Adicionar</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-7 col-lg-8">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Grupo Simples</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table text-nowrap">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Bicho</th>
                                    <th>Email</th>
                                    <th>Tipo de Jogo</th>
                                    <th>Valor</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($apostas->filter(fn($a) => (int) $a->tipo_de_aposta === 1) as $aposta)
                                    <tr>
                                        <td> {{ $aposta->id }} </td>
                                        <td class='text-muted'> {{ (string) $bichos[$aposta->bicho - 1] }} </td>
                                        <td class='text-muted'><a
                                                href='mailto:{{ $aposta->apostador->email }}'
                                                class='text-reset'> {{ $aposta->apostador->email }} </a></td>
                                        <td class='text-muted'> {{ (int) $aposta->tipo_de_jogo === 1 ? 'Cabeça' : 'Cercar' }} </td>
                                        <td class='text-muted'> R$ {{ $aposta->valor }} </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Milhar</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table text-nowrap">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Número da Sorte</th>
                                    <th>Email</th>
                                    <th>Tipo de Jogo</th>
                                    <th>Valor</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($apostas->filter(fn($a) => (int) $a->tipo_de_aposta === 2) as $aposta)
                                    <tr>
                                        <td> {{ $aposta->id }} </td>
                                        <td class='text-muted'> {{ $aposta->n1 }} </td>
                                        <td class='text-muted'><a href='mailto:{{ $aposta->apostador->email }}'
                                                                  class='text-reset'> {{ $aposta->apostador->email }} </a>
                                        </td>
                                        <td class='text-muted'> {{ (int) $aposta->tipo_de_jogo === 1 ? 'Cabeça' : 'Cercar' }} </td>
                                        <td class='text-muted'> R$ {{ $aposta->valor }} </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Duque de Dezena</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table text-nowrap">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Número da Sorte 1</th>
                                    <th>Número da Sorte 2</th>
                                    <th>Email</th>
                                    <th>Valor</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($apostas->filter(fn($a) => (int) $a->tipo_de_aposta === 3) as $aposta)
                                    <tr>
                                        <td> {{ $aposta->id }} </td>
                                        <td class='text-muted'> {{ $aposta->n1 }} </td>
                                        <td class='text-muted'> {{ $aposta->n2 }} </td>
                                        <td class='text-muted'><a href='mailto:{{ $aposta->apostador->email }}'
                                                                  class='text-reset'> {{ $aposta->apostador->email }} </a>
                                        </td>
                                        <td class='text-muted'> R$ {{ $aposta->valor }} </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const bichos = [
            ["Avestruz", [1, 2, 3, 4]],
            ["Águia", [5, 6, 7, 8]],
            ["Burro", [9, 10, 11, 12]],
            ["Borboleta", [13, 14, 15, 16]],
            ["Cachorro", [17, 18, 19, 20]],
            ["Cabra", [21, 22, 23, 24]],
            ["Carneiro", [25, 26, 27, 28]],
            ["Camelo", [29, 30, 31, 32]],
            ["Cobra", [33, 34, 35, 36]],
            ["Coelho", [37, 38, 39, 40]],
            ["Cavalo", [41, 42, 43, 44]],
            ["Elefante", [45, 46, 47, 48]],
            ["Galo", [49, 50, 51, 52]],
            ["Gato", [53, 54, 55, 56]],
            ["Jacaré", [57, 58, 59, 60]],
            ["Leão", [61, 62, 63, 64]],
            ["Macaco", [65, 66, 67, 68]],
            ["Porco", [69, 70, 71, 72]],
            ["Pavão", [73, 74, 75, 76]],
            ["Peru", [77, 78, 79, 80]],
            ["Touro", [81, 82, 83, 84]],
            ["Tigre", [85, 86, 87, 88]],
            ["Urso", [89, 90, 91, 92]],
            ["Veado", [93, 94, 95, 96]],
            ["Vaca", [97, 98, 99, 0]]
        ]
        const slider = document.getElementById("bicho");
        const output = document.getElementById("valor");

        output.innerHTML = slider.value + " - " + bichos[slider.value - 1][0] + " - (" + bichos[slider.value - 1][1] + ")";

        slider.oninput = function () {
            output.innerHTML = slider.value + " - " + bichos[this.value - 1][0] + " - (" + bichos[slider.value - 1][1] + ")";
        }
    </script>
</x-layout>
