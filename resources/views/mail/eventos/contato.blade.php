@component('mail::message')
# PEDIDO DE INFORMAÇÃO PARA O EVENTO

O sr(a) {{ $form_data['name'] }}, {{ $form_data['email'] }} solicitou uma informação sobre o evento {{ $model->name }}. <br>

Menssagem: {!! $form_data['message'] !!}

@component('mail::button', ['url' => route('eventos.inscricoes.apresentacao', $model)])
Visualizar evento
@endcomponent


Sistema de informarções APEPREV,<br>
{{ config('app.name') }}
@endcomponent
