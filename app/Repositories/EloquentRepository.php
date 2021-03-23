<?php

namespace App\Repositories;

use App\Http\Requests\Request;

abstract class EloquentRepository
{
    public function all()
    {
        return $this->model->all();
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function store($data)
    {
        $model = $this->model->create($data);
        return $model;
    }
    public function update($data, $id)
    {
        $model = $this->model->findOrFail($id);
        return $model->update($data);
    }

    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);
        return $model->delete();
    }
}
