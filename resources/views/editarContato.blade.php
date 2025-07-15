@extends('welcome')

@section('title', 'Editar Contato')

@section('tela')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="display-5">Editar "{{ $contato->nome }} "</h1>
        <a class="btn btn-secondary" href="{{ route('contatos.index') }}">
            <i class="bi bi-arrow-clockwise"></i> Cancelar
        </a>
    </div>
    <div class="tabela-estilizada p-4 bg-white rounded shadow">
        <form action="{{ route('contatos.update', $contato->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $contato->nome }}" placeholder="Digite o nome">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $contato->email }}" placeholder="exemplo@email.com">
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" 
                value="{{ formatarTelefone($contato->telefone) }}" placeholder="(00) 00000-0000">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-success btn-lg"><i class="bi bi-floppy"></i> Salvar</button>
            </div>
        </form>
    </div>
@endsection
