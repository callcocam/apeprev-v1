<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Newsletter  extends AbstractModel
{
  use HasFactory;
  
    /**
     * @return string
     */
    protected function slugFrom()
    {
        return "email";
    }

  protected $guarded = ["id"];

}
