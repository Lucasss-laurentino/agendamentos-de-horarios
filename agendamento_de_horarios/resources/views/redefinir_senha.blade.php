@component('mail::message')
# Email de redefinição de senha

Foi solicitada a redefinição de senha para este email, se não foi você ignore esta mensagem

@component('mail::button', ['url' => $url])
Redefinir senha
@endcomponent

Obrigado,<br>
Agendamento Barbearia
@endcomponent