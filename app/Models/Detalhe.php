<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasFile;

class Detalhe  extends AbstractModel
{
  use HasFactory;
  use HasFile;

  protected $guarded = ["id"];

  public function propiedade()
  {
    return $this->belongsTo(Propiedade::class);
  }
    
  public function slugTo(){
   return false;
  }
}
