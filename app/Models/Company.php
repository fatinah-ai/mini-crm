<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'logo', 'website'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    // Appended attribute for API
    protected $appends = ['employee_count'];

    public function getEmployeeCountAttribute(): int
    {
        return $this->employees()->count();
    }
}