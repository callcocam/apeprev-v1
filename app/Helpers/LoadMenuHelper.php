<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Helpers;

use App\Models\Auth\Acl\Permission;
use Illuminate\Support\Facades\Artisan;


class LoadMenuHelper
{

    public function menus()
    {
        return $this->defaults();
    }

    private function defaults()
    {
        $submenus=[];
        $submenus[] = $this->make('Users','admin.users','chevron-right');
        $submenus[] = $this->make('Roles','admin.roles','chevron-right');
        $submenus[] = $this->make('Permissions','admin.permissions','chevron-right');
        $submenus[] = $this->make('Cargos','admin.offices','chevron-right');
        $menus[] = $this->make('OPERACIONAL',null,'cog',$submenus);
        // $submenus=[];
        // $submenus[] = $this->make('Facilidades','admin.facilidades','chevron-right');
        // $submenus[] = $this->make('Ativo','admin.propiedades','chevron-right');
        // $menus[] = $this->make('M. PROPIEDADES',null,'office-building',$submenus);

        // $menus[] = $this->make('ADD PROPIEDADES',"admin.propiedade.create",'plus-circle',null);
        // $menus[] = $this->make('FAVORITADA',"admin.favoritas",'lightning-bolt',null);
      
        return $menus;
    }

    
    private function make($label, $route, $icon, $submenus=null)
    {

        if(is_array($submenus)){
          foreach($submenus as $submenu){
            $active[] = \Arr::get($submenu, 'route');
          }
        }
        else{
            $active = $route;
        }
        return [
          'label'=>$label,
          'route'=>$route,
          'icon'=>$icon,
          'target'=>"_self",
          'submenus'=>$submenus,
          'active'=>$active,
        ];
    }
}