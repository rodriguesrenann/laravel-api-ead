<?php

namespace App\Repositories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class LessonRepository
{
    private Lesson $model;

    public function __construct(Lesson $model)
    {
        $this->model = $model;
    }

    public function getAllLessons($moduleId): Collection
    {
        return $this->model->where('module_id', $moduleId)->get();
    }

    public function getLesson($id): Model
    {
        return $this->model->findOrFail($id);
    }
}