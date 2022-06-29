<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\Traits\HasCover;

class Relacionamento  extends AbstractModel
{
  use HasFactory;
  //use HasCover;
  protected $with = ['cabecalho','celula'];
  
  protected $guarded = ["id"];

  
  public function cabecalho()
  {
      return $this->morphOne(Cabecalho::class, 'cabecalhoable');
  }

  public function celula()
  {
      return $this->morphOne(Celula::class,'celulaable');
  }
  
}
