<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;

abstract class Repository implements RepositoryInterface
{
    public function __call($method, $arguments)
    {
        return $this->model->{$method}(...$arguments);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $model = $this->model->update($attributes);

        return $model;
    }

    public function delete($id)
    {
        return $this->model->delete();
    }
}