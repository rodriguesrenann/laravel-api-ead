<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\SupportReply;
use App\Models\User;
use App\Repositories\Traits\AuthenticatedUserTrait;

class SupportReplyRepository
{
    use AuthenticatedUserTrait;

    protected $model;

    public function __construct(SupportReply $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->getUser()
            ->replies()
            ->get();
    }

    public function store(array $data)
    {
        $user = $this->getUser();
        
        return $this->model->create([
            'support_id' => $data['support_id'],
            'user_id' => $user->id,
            'reply' => $data['reply']
        ]);
    }
}
