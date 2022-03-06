<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;
use App\Repositories\Traits\AuthenticatedUserTrait;
use Illuminate\Database\Eloquent\Collection;

class SupportRepository
{
    use AuthenticatedUserTrait;

    protected $model;

    public function __construct(Support $model)
    {
        $this->model = $model;
    }

    public function getMySupports(array $filters = []): Collection
    {
        $filters['user'] = true;

        return $this->getAll($filters);
    }

    public function getAll(array $filters = []): Collection
    {
        return $this->model
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

                if (isset($filters['user'])) {
                    $user = $this->getUser();
                    $query->where('user_id', $user->id);
                }
            })
            ->orderBy('updated_at')
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
}
