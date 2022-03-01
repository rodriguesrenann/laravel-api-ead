<?php

namespace App\Repositories;

use App\Models\Module;
use Illuminate\Database\Eloquent\Model;

class ModuleRepository
{
    private Model $model;

    public function __construct(Module $model)
    {
        $this->model = $model;
    }

    public function getModulesByCourseId($id)
    {
        return $this->model->where('course_id', $id)->get();
    }
}