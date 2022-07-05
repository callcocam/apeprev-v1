<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\Traits\HasCover;

class Cabecalho  extends AbstractModel
{
    use HasFactory;
    //use HasCover;
    protected $guarded = ["id"];
    
    protected $with = ['atributo'];
    //protected $appends = ['atributo'];
    
    /**
     * Get the parent cabecalhoable model (user or tenant).
     */

    public function cabecalhoable()
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


    public function atributo(){

      return $this->morphOne(Atributo::class, 'atributoable');

    }

}
