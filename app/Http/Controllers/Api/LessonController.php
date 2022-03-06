<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonCollection;
use App\Http\Resources\LessonResource;
use App\Repositories\LessonRepository;

class LessonController extends Controller
{
    protected LessonRepository $repository;

    public function __construct(LessonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($id): LessonCollection
    {
        return new LessonCollection($this->repository->getAll($id));
    }

    public function show($id): LessonResource
    {
        return new LessonResource($this->repository->findById($id));
    }
}
