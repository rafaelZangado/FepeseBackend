
@extends('welcome')
@section('title', 'Meus Contatos')

@section('tela')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="display-5">Cadastro de Contatos</h1>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalContato">
            <i class="bi bi-person-plus"></i> Novo Contato
        </button>
    </div>

    <div class="tabela-estilizada">
        <table class="table table-bordered mb-0">
            <thead>
                <tr>
                    <th scope="col">Nome <i class="bi bi-person-fill"></i></th>
                    <th scope="col">Email <i class="bi bi-envelope-fill"></i></th>
                    <th scope="col">Telefone <i class="bi bi-telephone-fill"></i></th>
                    <th scope="col"> </i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contatos as $value)
                    <tr>
                        
                        <td>{{ $value->nome }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->telefone }}</td>
                        <td>
                            <a href="{{ route('contatos.edit', $value->id) }}" >
                                <i class="bi bi-pen"></i>
                            </a>
                            
                            <a href="javascript:void(0)" onclick="confirmarExclusao({{ $value->id }})">
                                <i class="bi bi-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-center">
            {{ $contatos->links() }}
        </div>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalContato" tabindex="-1" aria-labelledby="modalContatoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalContatoLabel">Novo Contato</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('contatos.store') }}" method="POST" id="formContato">
                        @csrf
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="Digite o nome">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" placeholder="exemplo@email.com">
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone" placeholder="(00) 00000-0000">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="salvarDados()">Salvar Contato</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function salvarDados() {
            const nome = document.getElementById('nome').value;
            const email = document.getElementById('email').value;
            const telefone = document.getElementById('telefone').value;

            $.ajax({
                url: "{{ route('contatos.store') }}",
                type: 'POST',
                data: {
                    nome: nome,
                    email: email,
                    telefone: telefone,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Contato salvo com sucesso!",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    $('#nome').val('');
                    $('#email').val('');
                    $('#telefone').val('');

                    // Fechar o modal
                    const modal = bootstrap.Modal.getInstance(document.getElementById('modalContato'));
                    modal.hide();

                    const novaLinha = `
                    <tr>
                        <td>${nome}</td>
                        <td>${email}</td>
                        <td>${telefone}</td>
                    </tr>
                `;
                    $('table tbody').append(novaLinha);
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        let mensagem = 'Erro ao salvar:\n';
                        for (let campo in errors) {
                            mensagem += `- ${errors[campo][0]}\n`;
                        }
                        alert(mensagem);
                    } else {
                        alert('Erro ao salvar o contato. Tente novamente.');
                        console.error(xhr.responseText);
                    }
                }
            });
        }

        function confirmarExclusao(id) {
            Swal.fire({
                title: 'Tem certeza?',
                text: "Deseja realmente excluir este contato?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    excluirContato(id);
                }
            });
        }

        function excluirContato(id) {
            $.ajax({
                url: `/contatos/${id}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'DELETE'
                },
                success: function() {
                    Swal.fire('Excluído!', 'O contato foi removido.', 'success');
                    location.reload();
                },
                error: function() {
                    Swal.fire('Erro', 'Não foi possível excluir o contato.', 'error');
                }
            });
        }
    </script>
@endsection