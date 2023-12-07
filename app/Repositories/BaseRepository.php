<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Application
     */
    protected $app;

    /**
     * @throws \Exception
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Configure the Model
     *
     * @return string
     */
    abstract public function model();

    /**
     * Make Model instance
     *
     * @return Model
     *
     * @throws \Exception
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (! $model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     * Retrieve all records with given filter criteria
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    /**
     * Find model record for given id
     *
     * @param  int  $id
     * @param  array  $columns
     * @return Model|null
     */
    public function find($id, $columns = ['*'])
    {
        $query = $this->model->newQuery();

        return $query->find($id, $columns);
    }

    /**
     * Create model record
     *
     * @param  array  $input
     * @return Model
     */
    public function create($attributes = [])
    {
        $model = $this->model->newInstance($attributes);

        return $model->save();
    }

    /**
     * Update model record for given id
     *
     * @param  number  $id
     * @param  array  $attributes
     * @return Model
     */
    public function update($id, $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            return $result->update($attributes);
        }

        return false;
    }

    /**
     * @param  number  $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            return $result->delete();
        }

        return false;
    }
}
