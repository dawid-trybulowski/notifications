<!doctype html>
<html lang="en">
<head>
    @include('Common/header')
    @yield('Common/header')
    <title>Email</title>
</head>
<body>
@include('Common/navbar')
@yield('Common/navbar')
@if(!$response->getIsSuccess())
    @include('Common/message')
    @yield('Common/message')
@endif
<div class="container-fluid">
    <div class="row mt-2 ">
        <h3>
            Historia
        </h3>
        @foreach($response->getData() as $element)
            <div class="card mt-3" style="width: 100%">
                <div class="card-header bg-secondary text-white">
                    E-mail ID: {{$element->getId()->value()}}
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p
                                class="font-weight-bold">{{\App\src\Constant\EmailConstant::EMAIL_FROM}} </p>
                        <p>{{$element->getFrom()->value()}}</p>
                    </li>
                    <li class="list-group-item"><p
                                class="font-weight-bold">{{\App\src\Constant\EmailConstant::EMAIL_TO}} </p>
                        <p>{{$element->getTo()->value()}}</p>
                    </li>
                    <li class="list-group-item"><p
                                class="font-weight-bold">{{\App\src\Constant\EmailConstant::EMAIL_CC}} </p>
                        <p>{{$element->getCc()->value()}}</p>
                    </li>
                    <li class="list-group-item"><p
                                class="font-weight-bold">{{\App\src\Constant\EmailConstant::EMAIL_BCC}} </p>
                        <p>{{$element->getBcc()->value()}}</p>
                    </li>
                    <li class="list-group-item"><p
                                class="font-weight-bold">{{\App\src\Constant\EmailConstant::EMAIL_THEME}} </p>
                        <p>{{$element->getTheme()->value()}}</p>
                    </li>
                    <li class="list-group-item"><p
                                class="font-weight-bold">{{\App\src\Constant\EmailConstant::EMAIL_CONTENT}} </p>
                        <p>{{$element->getContent()->value()}}</p>
                    </li>
                    <li class="list-group-item"><p
                                class="font-weight-bold">{{\App\src\Constant\EmailConstant::EMAIL_SIGNATURE}} </p>
                        <p>{{$element->getSignature()->value()}}</p>
                    </li>
                    <li class="list-group-item"><p
                                class="font-weight-bold">{{\App\src\Constant\EmailConstant::EMAIL_TEMPLATE}} </p>
                        <p>{{$element->getTemplate()->value()}}</p>
                    </li>
                    <li class="list-group-item"><a href="{{route('email-send-from-history',[\App\src\Constant\EmailConstant::EMAIL_ID => $element->getId()->value()])}}"><button class="btn btn-primary">Wyślij ponownie</button></a>
                    </li>
                </ul>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>