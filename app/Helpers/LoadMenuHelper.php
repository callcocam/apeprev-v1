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
        $submenus[] = $this->make('Faq','admin.faqs','chevron-right');
        $menus[] = $this->make('OPERACIONAL',null,'cog',$submenus);

        $submenus=[];
        $submenus[] = $this->make('Tipo','admin.instituicao-tipos','office-building');
        $submenus[] = $this->make('Planos','admin.instituicoes.planos','office-building');
        $submenus[] = $this->make('Listar','admin.instituicaos','office-building');
        $submenus[] = $this->make('Gerar Associação','admin.instituicaos.associa-se','office-building');
        $menus[] = $this->make('INSTITUIÇÕES',null,'office-building',$submenus);
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
        $submenus[] = $this->make('Planos','admin.evento-planos','chevron-right');
        $submenus[] = $this->make('Tipo De Inscrição','admin.tipo-inscricaos','chevron-right');
        $submenus[] = $this->make('Palestras','admin.palestras','chevron-right');
        $submenus[] = $this->make('Hotel','admin.hotels','chevron-right');
        $submenus[] = $this->make('Local','admin.locals','chevron-right');
        $submenus[] = $this->make('Contato','admin.eventos-contatos','chevron-right');
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

    public static function hasSelectInstituitionFeature()
    {
      return true;
    }
}