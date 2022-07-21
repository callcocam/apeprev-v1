<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasFile;

class Palestra  extends AbstractModel
{
  use HasFile;
  //use HasCover;

  protected $guarded = ["id"];

  protected $with = ['description','ordering'];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\MorphOne
   */
    public function ordering()
    {
        return $this->morphOne(Ordering::class, 'orderingable')->orderByDesc('created_at');
    }

    public function file(){
      return $this->morphOne(File::class, 'fileable')->orderByDesc('created_at');
    } 
  
    public function url(){
      return $this->morphOne(File::class, 'fileable')->orderByDesc('created_at');
    } 
}
