<?php

namespace App\Repositories\Interfaces;

interface RepositoryInterface
{
    /**
     * Retrieve all records with given filter criteria
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*']);

    /**
     * Find model record for given id
     *
     * @param  int  $id
     * @param  array  $columns
     * @return Model|null
     */
    public function find($id, $columns = ['*']);

    /**
     * Create model record
     *
     * @param  array  $attributes
     * @return Model
     */
    public function create($attributes = []);

    /**
     * Update model record for given id
     *
     * @param  number  $id
     * @param  array  $attributes
     * @return Model
     */
    public function update($id, $attributes);

    /**
     * @param  number  $id
     * @return bool
     */
    public function delete($id);
}
