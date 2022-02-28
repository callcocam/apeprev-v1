<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models\Transparencias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AbstractModel;
use App\Models\File;
use App\Models\Traits\HasFile;

class Transparencia  extends AbstractModel
{
  use HasFactory, HasFile;
  //use HasCover;

  protected $guarded = ["id"];
/**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
      'reference_date' => 'datetime',
  ];

  public function file(){
    return $this->morphOne(File::class, 'fileable')->orderByDesc('created_at');
  } 

  public function url(){
    return $this->morphOne(File::class, 'fileable')->orderByDesc('created_at');
  } 
}
