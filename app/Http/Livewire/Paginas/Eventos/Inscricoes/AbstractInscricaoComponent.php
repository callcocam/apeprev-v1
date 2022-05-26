<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Eventos\Inscricoes;


use App\Http\Livewire\AbstractPaginaComponent;

use App\Models\Event;

abstract class AbstractInscricaoComponent extends AbstractPaginaComponent
{
   
   public function mount(Event $model)
   {
      $this->setFormProperties($model);
   }

   
   public function getPlanoProperty()
   {
       if($instituicoes_tipo = $this->instituicao->instituicoes_tipo){
          if($evento_planos = $instituicoes_tipo->evento_planos){             
              return data_get($evento_planos,0);
          }
       }
       return null;
   }
   
   public function classe_active(){
      return 'p-2 text-sm  text-gray-700 dark:text-gray-100 bg-gray-200 dark:bg-gray-800 rounded';
  }
  
  public function classe_link(){
      return 'mt-3 p-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-800 rounded';
  }
}
