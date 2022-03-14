<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\Traits\HasCover;

class PoliticaDeInscricao  extends AbstractModel
{
  use HasFactory;
  //use HasCover;

  protected $guarded = ["id"];
 /**
   * Get the parent politica_de_inscricaoable 
   */
  public function politica_de_inscricaoable()
  {
      return $this->morphTo();
  }
  
  public function isUser(){
      return false;
  }
}
