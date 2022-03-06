<?php

namespace App\Repositories;

use App\Models\Module;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ModuleRepository extends BaseRepository
{
    public function __construct(Module $model)
    {
        $this->model = $model;
    }

    public function findById($id): Collection
    {
        return $this->model->where('course_id', $id)->get();
    }
}
