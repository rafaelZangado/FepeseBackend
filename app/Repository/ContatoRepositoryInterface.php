<?php 

namespace App\Repository;

interface ContatoRepositoryInterface
{
    /**
     * Create a new contact.
     *
     * @param array $data
     * @return \App\Models\Contato
     */
    public function create(array $data);

    /**
     * Create a new contact.
     *
     * @param int $id
     * @return \App\Models\Contato
     */
    public function show($id);

    /**
     * Show the information.
     *
     * @return \App\Models\Contato
     */
    public function index();

    /**
     * Update an existing contact.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Contato
     */
    public function update(int $id, array $data);

    /**
     * Delete a contact.
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id);
}