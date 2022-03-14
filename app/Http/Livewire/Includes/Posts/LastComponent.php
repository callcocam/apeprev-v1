<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Includes\Posts;

use App\Http\Livewire\AbstractPaginaComponent;

use App\Models\Post;

class LastComponent extends AbstractPaginaComponent
{
    public function mount(Post $model)
    {
       $this->setFormProperties($model);
    }
    public function view()
    {
        return 'livewire.includes.posts.last-component';
    }
}
