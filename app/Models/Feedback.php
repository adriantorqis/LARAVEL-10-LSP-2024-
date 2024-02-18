<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'laporan_id',
        'feedback_content',
    ];

    // Define the relationship with the Laporan model
    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }
}
