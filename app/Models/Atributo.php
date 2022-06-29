<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\Traits\HasCover;

class Atributo  extends AbstractModel
{
  use HasFactory;
  //use HasCover;
  //protected $with = ['description'];
  protected $guarded = ["id"];
  
    /**
     * Get the parent atributoable model (user or tenant).
     */

    public function atributoable()
    {
        return $this->morphTo();
    }

    /**
     * @return string
     */
    protected function slugTo()
    {
    return false;
    }
    
    public function isUser(){
        return false;
    }

}
