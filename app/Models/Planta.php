<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasFile;
use Tall\Form\Models\Traits\HasGallery;

class Planta  extends AbstractModel
{
  use HasFactory;
  use HasFile;
  use HasGallery;

  protected $guarded = ["id"];

  protected $appends = ["galleries"];
}
