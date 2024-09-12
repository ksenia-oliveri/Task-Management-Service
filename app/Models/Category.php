<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read string $id
 * @property string $name
 * 
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */

class Category extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'categories';
    protected $guarded = false;

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];
    protected $dates = ['created_at', 'updated_at'];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
