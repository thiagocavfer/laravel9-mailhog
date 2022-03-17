@component('mail::message')
# Novo E-mail
  
{{ $info['mensagem'] }} 
   
   
Obrigado,<br>
{{ config('app.name') }}
@endcomponent