<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\View\Components;

 
use WireUi\View\Components\Inputs\BaseMaskable;

class TallWhatsAppMaskableInput extends BaseMaskable
{
    protected function getInputMask(): string
    {
        return "['#####-####']";
    }
}
