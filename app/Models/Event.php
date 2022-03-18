<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasCover;

class Event extends AbstractModel
{
    use HasFactory, HasCover;
    
    protected $guarded = ['id'];

    protected $with = ['description','policie','politica_desistencia','politica_inscricao'];

    protected $appends = ['contatos', 'planos'];



    public function getContatosAttribute()
    {
        return $this->contatos()->pluck('id','id')->toArray();
    }

    public function getPlanosAttribute()
    {
        return $this->planos()->pluck('id','id')->toArray();
    }

    public function getRouteKeyName(){
        return 'slug';
    }
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function inscricoes()
    {
        return $this->hasMany(EventoInscricao::class);

    }

    public function instituicao()
    {
        return $this->hasOne(Instituicao::class);

    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);

    }

    public function local()
    {
        return $this->belongsTo(Local::class);

    }

    public function planos()
    {
        return $this->belongsToMany(EventoPlano::class);

    }

    public function evento_planos()
    {
        return $this->belongsToMany(EventoPlano::class)->orderBy('created_at');

    }

    public function contatos()
    {
        return $this->belongsToMany(EventosContato::class);

    }

    public function policie(){
        return $this->morphOne(Policy::class, 'policieable')->orderByDesc('created_at');
    }

    public function politica_inscricao(){
        return $this->morphOne(PoliticaDeInscricao::class, 'politica_de_inscricaoable')->orderByDesc('created_at');
    }
    
    public function politica_desistencia(){
        return $this->morphOne(PoliticaDeDesistencia::class, 'politica_de_desistenciaable')->orderByDesc('created_at');
    }

    public function contato()
    {
        return $this->belongsToMany(EventosContato::class);

    }
    public function palestras()
    {
        return $this->hasMany(Palestra::class);

    }
    public function toSitemapTag()
    {
        return route('eventos.show', $this);
    }

    public function getUrlAttribute($value)
    {
        if($value){
            return $value;
        }

        return route('eventos.show', $this);
    }
}
