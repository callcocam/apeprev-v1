<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\Traits\HasCover;

class Instituicao  extends AbstractModel
{
  use HasFactory;
  //use HasCover;
  protected $table = "instituicoes";

  protected $guarded = ["id"];

  protected $with = ['address', 'representante', 'servidor'];
  
  public function servidor()
  {
    return $this->hasOne(Servidor::class);
  }

  
  public function representante()
  {
    return $this->hasOne(Representante::class);
  }
  
  /**
   * @return \Illuminate\Database\Eloquent\Relations\MorphOne
   */
  public function address()
  {
      return $this->morphOne(Address::class, 'addressable')->orderByDesc('created_at');
  }

}
