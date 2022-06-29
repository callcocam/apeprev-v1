<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\Traits\HasCover;

class Coluna  extends AbstractModel
{
  use HasFactory;
  //use HasCover;
  protected $guarded = ["id"];
  
  protected $with = ['description','cabecalho','celula'];

 // protected $appends = ['relacionamento'];
  
  public function relatorio()
  {
      return $this->hasOne(Relatorio::class);
  }

  public function filtros()
  {
      return $this->hasMany(Filtro::class);
  }
  
  public function relacionamentos()
  {
      return $this->hasMany(Relacionamento::class)->orderBy('ordering');
  }

  public function cabecalho()
  {
      return $this->morphOne(Cabecalho::class, 'cabecalhoable');
  }

  public function celula()
  {
      return $this->morphOne(Celula::class,'celulaable');
  }

  public function getRelacionamentoAttribute()
  {
      return $this->belongsTo(Relacionamento::class)->orderBy('ordering')->pluck('name','name')->toArray();
  }
}
