<?php

namespace App\Repositories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class LessonRepository extends BaseRepository
{

    public function __construct(Lesson $model)
    {
        $this->model = $model;
    }
}