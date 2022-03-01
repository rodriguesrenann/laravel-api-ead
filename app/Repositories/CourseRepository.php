<?php

namespace App\Repositories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CourseRepository
{
    protected Course $model;

    public function __construct(Course $model)
    {
        $this->model = $model;
    }

    public function getAllCourses(): Collection
    {
        return $this->model->get();
    }

    public function getCourse($id): Model
    {
        return $this->model->findOrFail($id);
    }
}