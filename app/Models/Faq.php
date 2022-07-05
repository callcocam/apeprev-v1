<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\Traits\HasCover;

class Faq  extends AbstractModel
{
  use HasFactory;
  //use HasCover;
    protected $with = ['description'];

  protected $guarded = ["id"];

}
