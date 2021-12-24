<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function scopeFilter($query, array $filters)
    {

            $query->when($filters['search'] ?? false, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('website', 'like', '%' . $search . '%');
            });

    }
}
