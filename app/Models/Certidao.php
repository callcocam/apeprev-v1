<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasFile;

class Certidao  extends AbstractModel
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
      'data_emissao' => 'date',
      'data_validade' => 'date',
  ];

  public function file(){
    return $this->morphOne(File::class, 'fileable')->orderByDesc('created_at');
  } 

  public function url(){
    return $this->morphOne(File::class, 'fileable')->orderByDesc('created_at');
  } 

}
