<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Quiz extends Model
{
    use HasFactory;
    use Sluggable;

    // oluşturulan quizi doldurma işlemi
    protected $fillable = ['title', 'description', 'finished_at', 'slug'];

    protected $dates = ['finished_at'];

    public function getFinishedAttributes($date)
    {
        return $date ? Carbon::parse($date) : null;
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'onUpdate' => true,
                'source' => 'title'
            ]
        ];
    }
}
