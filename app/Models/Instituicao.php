<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\Traits\HasCover;

class Instituicao  extends AbstractModel
{
  use HasFactory;
  //use HasCover;
  protected $table = "instituicoes";

  protected $guarded = ["id"];

  protected $with = ['address', 'representante', 'servidor', 'instituicoes_tipo'];
  
  protected $appends = ['tipo_inscricoes'];
  
  public function getRouteKeyName(){
    return 'slug';
  }

  //Tipo de iscrições - como ele pode se insrever - pega do model de EventoPlano
  //ABRE Tipo de iscrições
  public function getTipoInscricoesAttribute()
  {
      return $this->tipo_inscricoes()->pluck('id','id')->toArray();
  }
  
  public function tipo_inscricoes()
  {
    return $this->belongsToMany(TipoInscricao::class);
  }
  //FECHA Tipo de iscrições

  public function servidor()
  {
    return $this->hasOne(Servidor::class);
  }

  
  public function representante()
  {
    return $this->hasOne(Representante::class);
  }
  
  
  
  public function participantes()
  {
    return $this->hasMany(User::class);
  }
  
  
  public function sponsor()
  {
    return $this->belongsToMany(Sponsor::class);
  }

  public function instituicoes_plano()
  {
    return $this->belongsToMany(InstituicoesPlano::class);
  }


  public function tipo_inscricao()
  {
    return $this->belongsToMany(TipoInscricao::class);
  }
  
  public function instituicoes_tipo()
  {
    return $this->belongsTo(InstituicaoTipo::class,'instituicao_tipo_id');
  }

  
  public function evento_inscricaos()
  {
    return $this->hasMany(EventoInscricao::class);
  }
  
  /**
   * @return \Illuminate\Database\Eloquent\Relations\MorphOne
   */
  public function address()
  {
      return $this->morphOne(Address::class, 'addressable')->orderByDesc('created_at');
  }

}
