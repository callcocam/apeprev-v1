<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Eventos\Inscricoes;

use App\Http\Livewire\AbstractPaginaComponent;

class OfficeComponent extends AbstractPaginaComponent
{

   public $officeModal = false;
   public $name;

   

   protected function getListeners()
   {
       return ['openOfficeModal'];
   }


    public function view()
    {
        return 'livewire.paginas.eventos.inscricoes.office-component';
    }

    public function save()
    {
       $this->validate([
          'name'=>'required'
       ]);
       if($office= \App\Models\Office::firstOrCreate(array_merge(['name'=>$this->name],published()))){
         $this->officeModal = false;
         $this->name = "";
         $this->emit('cloaseModal', $office->id);
       }
    }

    public function close()
    {
       $this->officeModal = false;
       $this->name = "";
       $this->emit('cloaseModal', null);
    }

    public function openOfficeModal($officeModal)
    {
      $this->officeModal = $officeModal;
    }
}
