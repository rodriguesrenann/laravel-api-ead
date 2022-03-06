<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class SupportRepository extends BaseRepository
{
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

    private function getUser(): User
    {
        return User::first();
    }
}
