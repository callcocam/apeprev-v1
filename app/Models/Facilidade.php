<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\Traits\HasCover;

class Facilidade  extends AbstractModel
{
  use HasFactory;
  //use HasCover;

  protected $guarded = ["id"];

  protected $casts = [
    "created_at"=>"datetime:d/m/Y H:i"
  ];

}
