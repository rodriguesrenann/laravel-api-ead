<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Repositories\LessonRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LessonController extends Controller
{
    protected LessonRepository $repository;

    public function __construct(LessonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($id): AnonymousResourceCollection
    {
        return LessonResource::collection($this->repository->getAllLessons($id));
    }

    public function show($id): LessonResource
    {
        return new LessonResource($this->repository->getLesson($id));
    }
}
