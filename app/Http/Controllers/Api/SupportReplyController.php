<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportReplyRequest;
use App\Http\Resources\SupportReplyCollection;
use App\Http\Resources\SupportReplyResource;
use App\Repositories\SupportReplyRepository;
use Illuminate\Http\Request;

class SupportReplyController extends BaseController
{
    public function __construct(SupportReplyRepository $repository)
    {
        $this->modelCollection = SupportReplyCollection::class;
        $this->modelResource = SupportReplyResource::class;
        $this->modelRepository = $repository;
    }

    public function store(SupportReplyRequest $request)
    {
        return new $this->modelResource($this->modelRepository->store($request->validated()));
    }
}
