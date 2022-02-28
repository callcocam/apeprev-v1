<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasCover;

class Event extends AbstractModel
{
    use HasFactory, HasCover;
    
    protected $guarded = ['id'];

    protected $with = ['description'];

    public function getRouteKeyName(){
        return 'slug';
    }
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function palestras()
    {
        return $this->hasMany(Palestra::class);

    }
    public function toSitemapTag()
    {
        return route('eventos.show', $this);
    }
}
