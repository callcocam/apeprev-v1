<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Imports;

use App\Models\Event;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\Importable;

class InstituicoesImport implements ToArray
{
    use Importable;
    
    // public function headingRow(): int
    // {
    //     return 2;
    // }

    public function array(array $rows)
    {
        return $rows;
    }
}
