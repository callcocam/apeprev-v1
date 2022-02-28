<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasCover;

class Post extends AbstractModel
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
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function toSitemapTag()
    {
        return route('noticias.show', $this);
    }

}
