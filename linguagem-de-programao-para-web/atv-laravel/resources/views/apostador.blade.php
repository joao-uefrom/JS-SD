<x-layout>
    <x-slot name="titulo">Apostadores</x-slot>
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title"> Apostadores </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <!-- Content here -->
            <div class="row row-cards">
                <div class="col-md-5 col-lg-4">
                    <form method="get" action="{{ route('apostador.create') }}" class="card mb-2">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Adicionar um Apostador</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Nome</label>
                                <input type="text" class="form-control @error('nome') is-invalid @enderror"
                                       name="nome" value="{{ old('nome') }}">
                                @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Email</label>
                                <input type="text"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">CPF</label>
                                <input type="text" class="form-control @error('cpf') is-invalid @enderror"
                                       name="cpf" data-mask="000.000.000-00" data-mask-visible="false"
                                       value="{{ old('cpf') }}">
                                @error('cpf')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary ms-auto"> Adicionar</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-7 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Apostadores</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>E-mail</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($apostadores as $apostador)
                                    <tr>
                                        <td> {{ $apostador->id }}</td>
                                        <td> {{ $apostador->nome }}</td>
                                        <td> {{ $apostador->cpf }}</td>
                                        <td class="text-muted">
                                            <a href="mailto:{{ $apostador->email }}"
                                               class="text-reset"> {{ $apostador->email }}</a>
                                        </td>
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
</x-layout>
