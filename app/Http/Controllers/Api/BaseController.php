<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;

class BaseController extends Controller
{
    protected $modelRepository;
    protected $modelCollection;
    protected $modelResource;

    public function index()
    {
        $resources = $this->modelRepository->getAll(request()->all());

        return response()->json([
            'resources' => new $this->modelCollection($resources)
        ]);
    }

    public function show($id)
    {
        $resource = $this->modelRepository->findById($id);

        try {
            return response()->json([
                'resource' => new $this->modelResource($resource)
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
}
