<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasCover;
use App\Models\Traits\HasFile;

class Propiedade  extends AbstractModel
{
  use HasFactory;
  use HasCover;
    use HasFile;

    protected $guarded = ["id"];

    protected $with = ['address','detalhes','description','plantas'];

    protected $appends = ['facilidades'];

    public function getRouteKeyName(){
      return 'slug';
    }

   /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable')->orderByDesc('created_at');
    }

    public function detalhes()
    {
      return $this->hasOne(Detalhe::class);
    }

    public function plantas()
    {
      return $this->hasOne(Planta::class);
    }

    public function facilidades()
    {
      return $this->belongsToMany(Facilidade::class);
    }

    public function reviews()
    {
      return $this->hasMany(Comentario::class);
    }

    public function galleries()
    {
      return $this->morphOne(Galeria::class, 'galleryable')->orderByDesc('created_at');
    }

    public function getFacilidadesAttribute()
    {
        return $this->facilidades()->pluck('id','id')->toArray();
    }
}
