<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\Traits\HasCover;

class InstituicaoTipo  extends AbstractModel
{
  use HasFactory;
  //use HasCover;

  protected $guarded = ["id"];

  public function instituicoes()
  {
    return $this->hasMany(Instituicao::class);
  }

  public function evento_planos()
  {
    return $this->belongsToMany(EventoPlano::class);
  }
}
