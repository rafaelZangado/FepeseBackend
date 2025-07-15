<?php 

namespace App\Service;
use App\Repository\ContatoRepositoryInterface;

class ContatoService
{
    private ContatoRepositoryInterface $contatoRepository;

    public function __construct(ContatoRepositoryInterface $contatoRepository)
    {
        $this->contatoRepository = $contatoRepository;
    }

    /**
     * Create a new contact.
     *
     * @param array $data
     * @return \App\Models\Contato
     */
    public function create(array $data)
    {
        return $this->contatoRepository->create($data);
    }

    /**
     * Create a new contact.
     *
     * @return \App\Models\Contato
     */
    public function index()
    {
        return $this->contatoRepository->index();
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
        return $this->contatoRepository->update($id, $data);
    }

    /**
     * Update an existing contact.
     *
     * @param int $id
     * @return \App\Models\Contato
     */
    public function show(int $id)
    {
        return $this->contatoRepository->show($id);
    }

    /**
     * Delete a contact.
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        return $this->contatoRepository->delete($id);
    }
}