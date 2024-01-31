<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cost extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'price_unit', 'ranges', 'confirmed_ranges'];

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        if (request()->method() == 'POST') {
            $ranges = [
                "R" => [
                    "types" => [],
                    "priority" => 0,
                    "colleague" => null,
                    "items" => []
                ]
            ];
            $this->attributes['ranges'] = json_encode($ranges);
            $this->attributes['confirmed_ranges'] = json_encode($ranges);
        }
    }

    public function scopeSearch(Builder $query , array $data ): void{
        $query->when($data['title'] , function($query) use ($data){
            $query->where('title' , 'LIKE' , '%'. $data['title'] .'%');
        });

    }
}
