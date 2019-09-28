<!DOCTYPE html>
<html>
    <head>
        <title>Witamy na stronie!</title>
    </head>

    <body>
        <h2>
            <p>Czesc {{ $user->name }},</p>
            <p>Dziekujemy za rejestracje na naszej
            stronie!</p>
        </h2>
        <br/>
        <p>
            Jesli to nie Ty podales w rejestracji adres {{ $user->email }}
            prosimy o kontakt!
        </p>

    </body>

</html>
