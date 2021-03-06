<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\SupportRequest;
use App\Http\Resources\SupportCollection;
use App\Http\Resources\SupportResource;
use App\Repositories\SupportRepository;
use Illuminate\Http\Request;

class SupportController extends BaseController
{
    
    public function __construct(SupportRepository $repository)
    {
        $this->modelRepository = $repository;
        $this->modelResource = SupportResource::class;
        $this->modelCollection = SupportCollection::class;
    }

    public function mySupports(Request $request)
    {
        return new SupportCollection($this->modelRepository->getMySupports($request->all()));
    }

    public function store(SupportRequest $request)
    {
        return new SupportResource($this->modelRepository->store($request->validated()));
    }
}
