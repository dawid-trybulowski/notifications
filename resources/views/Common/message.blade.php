@if(session()->has('response'))
    <div class="alert alert-{{session('response')->getIsSuccess() ? 'success' : 'danger'}}" role="alert">
        {{ session('response')->getMessage() }}
    </div>
@endif

@isset($response)
    <div class="alert alert-{{$response->getIsSuccess() ? 'success' : 'danger'}}" role="alert">
        {{ $response->getMessage() }}
    </div>
@endif