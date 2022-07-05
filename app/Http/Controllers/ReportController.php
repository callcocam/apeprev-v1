<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    
    public function instituicao()
    {
        return \Excel::download(new \App\Exports\InstituicaoExport, 'instituicoes-cidades.xlsx');
        
    }
}
