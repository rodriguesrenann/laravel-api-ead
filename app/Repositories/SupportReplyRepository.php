<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\SupportReply;
use App\Models\User;

class SupportReplyRepository
{
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

    public function store(string $supportId, array $data)
    {
        $user = $this->getUser();
        
        return $this->getSupport($supportId)
            ->replies()
            ->create([
                'user_id' => $user->id,
                'reply' => $data['reply']
            ]);
    }

    private function getSupport($id)
    {
        return Support::findOrFail($id);
    }

    private function getUser(): User
    {
        return User::first();
    }
}
