@component('mail::message')
# SOLICITAÇÃO DE FILIAÇÃO DE USUÁRIO(A)

O(a) usuário(a) {{ $solicitante->name }}, solicitou a afilição do seu cadastro com a associação {{ $recebedor->instituicao->name }}.

@component('mail::button', ['url' => route('admin.user.edit', $solicitante)])
Visualizar dados do usuário(a)
@endcomponent

Sistema de informarções APEPREV,<br>
{{ config('app.name') }}
@endcomponent
