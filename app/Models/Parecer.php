<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasFile;
use Illuminate\Support\Facades\Route;

class Parecer  extends AbstractModel
{
  use HasFactory;
  use HasFile;

  protected $with = ['description'];

  protected $table = "pareceres";
  
  protected $guarded = ["id"];

  
  public function getRouteKeyName(){
    return 'slug';
}


  public function file(){
    return $this->morphOne(File::class, 'fileable')->orderByDesc('created_at');
  } 

  public function url(){
    return $this->morphOne(File::class, 'fileable')->orderByDesc('created_at');
  } 
}
