<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\Traits\HasCover;

class Celula  extends AbstractModel
{
    use HasFactory;
    //use HasCover;
    //protected $with = ['description'];
    protected $guarded = ["id"];

    protected $with = ['atributo'];
    //protected $appends = ['atributo'];

    /**
     * Get the parent celulaable model (user or tenant).
     */

    public function celulaable()
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
