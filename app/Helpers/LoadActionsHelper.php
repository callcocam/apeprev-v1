<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Helpers;

use App\Models\Auth\Acl\Permission;
use Illuminate\Support\Facades\Artisan;


class LoadActionsHelper
{

    public static function hasSelectInstituitionFeature()
    {
      return true;
    }
}