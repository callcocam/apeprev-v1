<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

namespace App\Http\Livewire\Traits;

use Illuminate\Support\Facades\Cache;

/**
 * WithPages
 */
trait WithPages
{
    public function getPageProperty($path=null)
    {
        if($page = $this->getCurrentPage($path)){
          return $page;
        }
        return false;
    }

    public function getContentProperty($path=null)
    {
        if($page = $this->getCurrentPage($path)){
            if($description = $page->description){
                return $description->content;
            }
        }
        return false;
    }

    protected function getCurrentPage($path=null){
        return Cache::remember(60, "statuses_", function() use($path){
            if(is_null($path)){
                $path = \Str::after(request()->getRequestUri(), '/');
            }
            return \App\Models\Page::query()->where('url', $path)->first();
        });
    }
}
