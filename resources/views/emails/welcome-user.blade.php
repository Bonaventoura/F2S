@component('mail::message')
# Bienvenue

La création de votre compte est finalisée avec succès. Veuillez-vous connecter pour activer votre compte

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
