<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models\Transparencias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AbstractModel;
//use App\Models\Traits\HasCover;

class Detalhe  extends AbstractModel
{
  use HasFactory;
  //use HasCover;
  protected $table = "transparencias_detalhes";

  protected $guarded = ["id"];

}
