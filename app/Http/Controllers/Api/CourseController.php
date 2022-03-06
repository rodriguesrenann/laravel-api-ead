<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseCollection;
use App\Http\Resources\CourseResource;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;

class CourseController extends BaseController
{
    public function __construct(CourseRepository $repository)
    {
        $this->modelRepository = $repository;
        $this->modelCollection = CourseCollection::class;
        $this->modelResource = CourseResource::class;
    }
}
