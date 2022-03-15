<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\Traits\HasCover;

class Servidor  extends AbstractModel
{
  use HasFactory;
  //use HasCover;
  protected $table = "servidores";

  protected $guarded = ["id"];

  public function instituicao()
  {
    return $this->belongsTo(Instituicao::class);
  }

  /**
   * @return string
   */
  protected function slugTo()
  {
    return false;
  }

}
