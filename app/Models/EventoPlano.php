<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\Traits\HasCover;

class EventoPlano  extends AbstractModel
{
  use HasFactory;
  //use HasCover;

  protected $with = ['description'];

  protected $appends = ['instituicao_tipo'];

  protected $guarded = ["id"];

  public function getInstituicaoTipoAttribute()
  {
    return $this->instituicao_tipo()->pluck('id','id')->toArray();;
  }

  public function instituicao_tipo()
  {
    return $this->belongsToMany(InstituicaoTipo::class);
  }

}
