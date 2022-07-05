<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasCover;

class Sponsor extends AbstractModel
{
    use HasFactory, HasCover;
    
    protected $guarded = ['id'];

    public function scopeOrder($query)
    {
       return $query->leftJoin('orderings', function ($join) {
                $join->on('sponsors.id', '=', 'orderings.orderingable_id')
                    ->where('orderingable_type', '=', static::class);
            })->select('sponsors.*')->orderBy('orderings.order');
    }
}
