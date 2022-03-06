<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class SupportRepository
{
    protected $model;

    public function __construct(Support $model)
    {
        $this->model = $model;
    }

    public function getAll(array $filters = []): Collection
    {
        return $this->getUser()
            ->supports()
            ->where(function ($query) use ($filters) {
                if (isset($filters['status'])) {
                    $query->where('status', $filters['status']);
                }

                if (isset($filters['lesson'])) {
                    $query->where('lesson_id', $filters['lesson']);
                }

                if (isset($filters['title'])) {
                    $query->where('title', 'LIKE', "%{$filters['title']}%");
                }
            })
            ->get();
    }

    public function store(array $data): Support
    {
        return $this->getUser()
            ->supports()
            ->create([
                'lesson_id' => $data['lesson_id'],
                'title' => $data['title'],
                'description' => $data['description'],
                'status' => $data['status']
            ]);
    }

    private function getUser(): User
    {
        return User::first();
    }
}
