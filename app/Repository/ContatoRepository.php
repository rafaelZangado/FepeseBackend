<?php

namespace App\Repository;
use App\Repository\ContatoRepositoryInterface;

class ContatoRepository implements ContatoRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new \App\Models\Contato();
    }

    /**
     * Create a new contact.
     *
     * @param array $data
     * @return \App\Models\Contato
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Create a new contact.
     *
     * @param array $data
     * @return \App\Models\Contato
     */
    public function index()
    {
        return $this->model->paginate(5); 
    }

    /**
     * Create a new contact.
     *
     * @param array $data
     * @return \App\Models\Contato
     */
    public function show($id)
    {
        $contato = $this->model->find($id);
        if (!$contato) {
            throw new \Exception('Contato não encontrado.');
        }
        return $contato;
    }

    /**
     * Update an existing contact.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Contato
     */
    public function update(int $id, array $data)
    {
        $contato = $this->model->findOrFail($id);
        $contato->update($data);
        return $contato;
    }

    /**
     * Delete a contact.
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        $contato = $this->model->findOrFail($id);
        $contato->delete();
    }
}