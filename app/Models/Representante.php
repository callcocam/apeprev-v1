<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\Traits\HasCover;

class Representante  extends AbstractModel
{
  use HasFactory;
  //use HasCover;

  protected $guarded = ["id"];

  protected $table = "representantes";

  //protected $with = ['address', 'instituicao'];

  public function instituicao()
  {
    return $this->belongsTo(Instituicao::class);
  }
  protected $casts = [
    'accept' => 'boolean',
    'authorize' => 'boolean',
  ]; 
}
