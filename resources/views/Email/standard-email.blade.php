<!doctype html>
<html lang="en">
<head>
    @include('Common/header')
    @yield('Common/header')
    <title>Email</title>
</head>
<body>
{!! $data['email']->getContent()->value() !!}
<div>
    Pozdrawiam,
</div>
<div>
    {!! $data['email']->getSignature()->value() !!}
</div>
</body>
</html>