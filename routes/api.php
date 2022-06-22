<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/atualizar/status/{id}/boleto', function ($id) {
   $instituicao = \App\Models\Instituicao::find($id);
   if( $instituicao){
    try {
        $response = Http::withHeaders([
            'Authorization' => 'Token e57683d82d2e1e4e58461972090f85bf5abebb02',
        ])->withBody(json_encode(
            [
                "instituicao_id"=> data_get($instituicao,'id',''),
                "razao_social"=> data_get($instituicao,'name',''),
                "cnpj"=>data_get($instituicao,'document',''),
                "cep"=>data_get($instituicao,'address.zip',''),
                "endereco"=> data_get($instituicao,'address.street',''),
                "bairro"=> data_get($instituicao,'address.district',''),
                "cidade"=> data_get($instituicao,'address.city',''),
                "uf"=> data_get($instituicao,'address.state',''),            
                "valor"=> data_get($instituicao,'instituicao_vigente.valor',''),            
                "obs"=> data_get($instituicao,'instituicao_vigente.description',''),            
            ]
        ),'application/json')->post(config('boletos.recadastramento.onsulta','https://evento.apeprev.com.br/api/boleto/consultar/'));
    
        if($response->successful()){    
            if($response->json('status')){
                if($response->json('Data do Pagamento')){
                    $instituicao->instituicao_vigente()->update([
                        'status_id'=>status(\Str::slug($response->json('Situação do pagamento'))),
                        'payment_date'=>date_carbom_format($response->json('Data do Pagamento'))->format('Y-m-d'),
                    ]);
                    return true;
                }
                else{
                    $instituicao->instituicao_vigente()->update([
                        'status_id'=>status(\Str::slug($response->json('Situação do pagamento')))
                    ]);
                }
            }
            else{
                $instituicao->instituicao_vigente()->update([
                    'status_id'=>status(\Str::slug($response->json('Situação do pagamento')))
                ]);
            }
        }           
        return $response->json();
    } catch (\Exception $PDOException) {
        dd($PDOException);
   }
    
});
