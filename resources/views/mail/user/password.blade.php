<x-mail::message>
    # Introduction

    Пароль:
    {{ $password }}

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>