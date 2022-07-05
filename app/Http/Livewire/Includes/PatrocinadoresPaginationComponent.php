<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Includes;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Sponsor;

class PatrocinadoresPaginationComponent extends AbstractPaginaComponent
{
    protected $listeners = ['increment','setLimit'];
    
    protected $perPage = 3;
    protected $conut_register = 0;

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
        $query = $this->query()->where(published())->order();   
        $this->conut_register = $query->count();   
        return $query->paginate(1);
     }
     
     public function setLimit($limit)
     {
         $this->perPage = $limit;
     }
     
     public function navigation($page, $pageOn)
     {
     
        if(!$this->conut_register){
        $this->conut_register = $this->query()->where(published())->count();
        }
        if ($this->conut_register > $this->page) {
            $this->setPage($this->page+=1,$page);
        } else {
            $this->setPage(1,$page);
        }
     }
     public function queryStringWithPagination()
    {
        foreach ($this->paginators as $key => $value) {
            $this->$key = $value;
        }

        return [];
    }

    //  public function previousPage($page)
    //  {
    //      $this->page = $page;
    //  }

    //  public function nextPage($limit)
    //  {
    //      $this->page = $page;
    //  }
     
    public function view()
    {
        return 'livewire.includes.patrocinadores-pagination-component';
    }
}
