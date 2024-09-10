<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read string $id
 * @property string $user_id
 * @property string $title
 * @property string $description
 * @property string $category_id
 * @property int $status
 * 
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */

class Task extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'tasks';
    protected $guarded = false;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category_id',
        'status',
        'created_at',
        'updated_at',
    ];
    protected $dates = ['created_at', 'updated_at'];
    protected function casts(): array
    {
        return [
            'user_id' => 'string',
            'title' => 'string',
            'description' => 'string',
            'category_id' => 'string',
            'status' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
