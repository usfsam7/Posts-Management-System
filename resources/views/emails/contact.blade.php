




<x-mail::message>
    #

    Email from {{$data['name']}}

    Message :
    {{ $data['message'] }}

    Thanks, 
    {{ config('app.name') }}
</x-mail::message>

