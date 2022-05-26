<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasCover;

class Local  extends AbstractModel
{
  use HasFactory;
  use HasCover;

  protected $guarded = ["id"];

  protected $with = ['address','description'];
  
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable')->orderByDesc('created_at');
    }
}
