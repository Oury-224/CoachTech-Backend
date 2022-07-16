@component('mail::message')
    # Introduction

On vous envoi ce message pour une confirmation de l'inscription sur
notre plateforme. Veuillez cliquer sur le bouton ci-dessous:

@component('mail::button', ['url' => $url, 'color' => 'primary'])
    Cliquez ici
@endcomponent

    Merci,

{{ config('app.name') }}
@endcomponent
