<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class InstituicaoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
      
        $addresses = \App\Models\Address::query()->where('addressable_type',\App\Models\Instituicao::class)->whereNotNull('city')->orderBy('city')->get();
        // BLZ AGORA EU QUERO IMPRIMIR UMA LISTA DE TODOS RPPS POR CIDADE COM NOME DO PRESIDENTE TELEFONE E EMAIL
        $data = [];
        foreach ($addresses as $key => $value) {
            $instituto = \App\Models\Instituicao::query()->find(data_get($value,'addressable_id'));
            $representante = $instituto->representante;
            $data[] = [
                data_get($instituto, "name"),
                data_get($representante, "name"),
                data_get($representante, "email"),
                data_get($instituto, "email"),
                data_get($representante, "phone"),
                data_get($value, "city"),
                data_get($value, "state"),
            ];
        }
       return collect($data);
    }
}
