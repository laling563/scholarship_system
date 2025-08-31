<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Scholarship extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'requirements',
        'is_open',
        'start_date',
        'end_date',
        'student_limit',
        'sponsor_id',
    ];

    protected $casts = [
        'is_open' => 'boolean',
    ];

    protected $primaryKey = 'scholarship_id';

    public function applicationForms() {
        return $this->hasMany(ApplicationForm::class, 'scholarship_id', 'scholarship_id');
    }

    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class);
    }
}
