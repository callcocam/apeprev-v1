<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Includes;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Sponsor;

class PatrocinadoresComponent extends AbstractPaginaComponent
{
    protected $listeners = ['increment','setLimit'];
    
    protected $perPage = 3;

    public function mount($limit=0)
    {
    
        $this->limit = $limit;
    }
    public function query(){
        return Sponsor::query();
    }
    public function paginationView()
    {
        return 'livewire.includes.pagination.patrocinadores-tailwind';
    }
    protected function models(){
        $query = $this->query()->where(published());   
        return $query->get();
     }
     public function setLimit($limit)
     {
         $this->perPage = $limit;
     }
     public function increment()
     {
        if(($this->query()->where(published())->count() - 4) < $this->limit){
            $this->limit = 0;
        }else{
            $this->limit += $this->perPage ;
        }
         
     }
     public function decrement()
     {
        if($this->limit){
            $this->limit-=$this->perPage;
            return;
         }
         $this->limit = 0;
     }
    public function view()
    {
        return 'livewire.includes.patrocinadores-component';
    }
}
