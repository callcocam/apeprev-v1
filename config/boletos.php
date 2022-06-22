<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
return [
    'recadastramento'=>[
        'consulta'=>env('APP_BOLETO_URL_CONSULTA','https://evento.apeprev.com.br/api/boleto/consultar/'),
        'gerar'=>env('APP_BOLETO_URL_GERAR','https://evento.apeprev.com.br/api/boleto/gerar/'),
        ]
    ];