<?php

namespace App\Http\Resources;

use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'label' => $this->supportOptions[$this->status],
            'date' => Carbon::make($this->updated_at)->format('d/m/Y H:i'),
            'lesson' => new LessonResource($this->lesson),
            'user' => new UserResource($this->user),
        ];
    }
}
