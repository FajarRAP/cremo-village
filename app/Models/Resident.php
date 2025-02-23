<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'birth_date',
        'rt',
        'rw',
        'marriage',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'birth_date' => 'datetime:Y-m-d'
        ];
    }
}
