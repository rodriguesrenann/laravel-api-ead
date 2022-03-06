<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\LessonResource;
use App\Http\Resources\UserResource;

class SupportCollection extends ResourceCollection
{
    public $collects = SupportResource::class;
}
