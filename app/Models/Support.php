<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;

    protected $fillable = [
        'lesson_id', 'title', 'description',
        'status'
    ];

    protected $keyType = 'uuid';

    public $supportOptions = [
        'P' => 'Pendente, aguardando professor',
        'A' => 'Aguardando aluno',
        'F' => 'Finalizado'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function replies()
    {
        return $this->hasMany(SupportReply::class);
    }
}
