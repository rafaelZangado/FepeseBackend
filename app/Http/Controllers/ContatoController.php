<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatosRequest;
use App\Service\ContatoService;

class ContatoController extends Controller
{
    protected $contatoService;
    public function __construct(ContatoService $contatoService)
    {
        $this->contatoService = $contatoService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contatos = $this->contatoService->index();
        if (request()->wantsJson()) {
            return response()->json($contatos);
        }
        return view('listarContatos', compact('contatos'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ContatosRequest $request)
    {
        try {
            $this->contatoService->create($request->validated());
            return to_route('contatos.index')->with('success', 'Contato criado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        try {
            $contato = $this->contatoService->show($id);            
            return view('editarContato', compact('contato'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContatosRequest $request, string $id)
    {
        try {
            $this->contatoService->update($id, $request->validated());
            return to_route('contatos.index')->with('success', 'Contato atualizado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->contatoService->delete($id);
            return to_route('contatos.index')->with('success', 'Contato deletado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
