<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Includes\Posts;

use App\Http\Livewire\AbstractPaginaComponent;

use App\Models\Post;

class LastsComponent extends AbstractPaginaComponent
{

    public function query(){
        return Post::query()->orderByDesc('created_at')->limit(5);
    }

    public function view()
    {
        return 'livewire.includes.posts.lasts-component';
    }
}
