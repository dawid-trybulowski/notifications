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
@include('Common/message')
@yield('Common/message')
<div class="container">
    <div class="row mt-2">
        <h3>
            Wyślij wiadomość
        </h3>
        <form method="post" action="{{route('email-send')}}">
            {{ csrf_field() }}
            <div class="row mt-2">
                <div class="form-group col-sm-12">
                    <label class="col-sm-2" for="from">Nadawca: *</label><input type="text"
                                                                                class="col-sm-12 form-control {{ (isset($errors) && $errors->has('from')) ? 'is-invalid' : '' }}"
                                                                                id="from" name="from"
                                                                                value="{{ $email->getFrom()->value()}}" required>
                    @if (isset($errors) && $errors->has('from'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('from') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2">Do: *</label>
                    <input type="text" class="col-sm-12 form-control {{ (isset($errors) && $errors->has('to')) ? 'is-invalid' : '' }}"
                           id="to" name="to" value="{{ $email->getTo()->value()}}" required>
                    @if (isset($errors) && $errors->has('to'))
                        <span class="help-block">
                            <strong>{{ $errors->first('to') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-sm-12" {{ isset($errors) && $errors->has('cc') ? ' has-error' : '' }}>
                    <label class="col-sm-2">Kopia: </label><input type="text"
                                                                  class="col-sm-12 form-control {{ (isset($errors) && $errors->has('cc')) ? 'is-invalid' : '' }}"
                                                                  id="cc" name="cc"
                                                                  value="{{ $email->getCc()->value()}}">
                    @if (isset($errors) && $errors->has('cc'))
                        <span class="help-block">
                            <strong>{{$errors->first('cc') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-sm-12" {{ (isset($errors) && $errors->has('bcc')) ? ' has-error' : '' }}>
                    <label class="col-sm-2">Ukryta kopia: </label><input type="text"
                                                                         class="col-sm-12 form-control {{ (isset($errors) && $errors->has('bcc')) ? 'is-invalid' : '' }}"
                                                                         id="bcc"
                                                                         name="bcc" value="{{$email->getBcc()->value()}}">
                    @if (isset($errors) && $errors->has('bcc'))
                        <span class="help-block">
                            <strong>{{ $errors->first('bcc') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-sm-12" {{ (isset($errors) && $errors->has('theme')) ? ' has-error' : '' }}>
                    <label class="col-sm-2">Temat wiadomości: *</label><input type="text"
                                                                              class="col-sm-12 form-control {{ (isset($errors) && $errors->has('theme')) ? 'is-invalid' : '' }}"
                                                                              id="theme"
                                                                              name="theme"
                                                                              value="{{ $email->getTheme()->value() ?: ''}}" required>
                    @if (isset($errors) && $errors->has('theme'))
                        <span class="help-block">
                            <strong>{{ $errors->first('theme') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-sm-12" {{ (isset($errors) && $errors->has('content')) ? ' has-error' : '' }}>
                    <label class="col-sm-12" for="content">Tekst wiadomości: </label>
                    <textarea class="col-sm-12 form-control {{ (isset($errors) && $errors->has('content')) ? 'is-invalid' : '' }}" rows="3"
                              id="content" name="content">{{$email->getContent()->value()}}
                    </textarea>
                    @if (isset($errors) && $errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-sm-12" {{ isset($errors) && $errors->has('signature') ? ' has-error' : '' }}>
                    <label class="col-sm-2">Podpis: *</label><input type="text"
                                                                    class="col-sm-12 form-control {{ isset($errors) && $errors->has('signature') ? 'is-invalid' : '' }}"
                                                                    id="signature"
                                                                    name="signature"
                                                                    value="{{ $email->getSignature()->value() ?: ''}}" required>
                    @if (isset($errors) && $errors->has('signature'))
                        <span class="help-block">
                            <strong>{{ $errors->first('signature') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-sm-12 text-center">
                    <input class="btn btn-success" type="submit" value="Wyślij">
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>