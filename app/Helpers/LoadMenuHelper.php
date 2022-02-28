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
        $submenus[] = $this->make('Status','admin.statuses','chevron-right');
        $menus[] = $this->make('OPERACIONAL',null,'cog',$submenus);

        $menus[] = $this->make('INSTITUIÇÕES','admin.instituicaos','office-building');
        // $menus[] = $this->make('CADASTROS',null,'office-building',$submenus);
        $submenus=[];
        $submenus[] = $this->make('Posts','admin.posts','chevron-right');
        $submenus[] = $this->make('Sliders','admin.sliders','chevron-right');
        $submenus[] = $this->make('Patrocinadores','admin.sponsors','chevron-right');
        $menus[] = $this->make('CADASTROS',null,'plus-circle',$submenus);
        $submenus=[];
        $submenus[] = $this->make('Tipo','admin.transparencias.tipos','chevron-right');
        $submenus[] = $this->make('Detalhes','admin.transparencias.detalhes','chevron-right');
        $submenus[] = $this->make('Transparência','admin.transparencias','chevron-right');
        $menus[] = $this->make('TRANSPARÊNCIAS',null,'plus-circle',$submenus);
        
        $submenus=[];
        $submenus[] = $this->make('Listar','admin.events','chevron-right');
        $submenus[] = $this->make('Palestras','admin.palestras','chevron-right');
        $submenus[] = $this->make('Importar','admin.events.import','chevron-right');
        $menus[] = $this->make('EVENTOS',null,'plus-circle',$submenus);

        $submenus=[];
        $submenus[] = $this->make('Certidões','admin.certidaos','chevron-right');
        $menus[] = $this->make('ASSOCIAÇÃO',null,'plus-circle',$submenus);
        // $menus[] = $this->make('ADD PROPIEDADES',"admin.propiedade.create",'plus-circle',null);
        // $menus[] = $this->make('FAVORITADA',"admin.favoritas",'lightning-bolt',null);
      
        return $menus;
    }

    
    private function make($label, $route, $icon, $submenus=null)
    {

        if(is_array($submenus)){
          foreach($submenus as $submenu){
            $active[] = \Arr::get($submenu, 'route');
            $singular = \Str::singular(\Arr::get($submenu, 'route'));
            $active[] = sprintf("%s.create", $singular);
            $active[] = sprintf("%s.edit", $singular);
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