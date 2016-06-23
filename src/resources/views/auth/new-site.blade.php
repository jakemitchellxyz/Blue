@extends('Blue::auth.layouts.html')
@section('body')<div class="container"><div class="login-box"><div><div class="login-form row"><div class="col-sm-12 text-center login-header"><img src="{{ asset('blue/img/Laravel_Blue.svg') }}" alt="Laravel Blue Logo" style="height:9em;width:auto" class="login-logo"/><h3 class="login-title">Let's Get Started.</h3></div><div class="col-sm-12"><div class="card login-body"><div style="padding:0 10px" class="card-body">{{ Form::open(['url' => route('create.site'), 'id' => 'form-basic-info']) }}
{{ Form::blueText('Site Name', ['placeholder' => 'My Awesome Site', 'required' => true]) }}
{{ Form::blueText('Slogan', ['placeholder' => 'Rockin\' your world!']) }}
{{ Form::blueTextarea('Description', ['placeholder' => 'Describe your site in all its glory!', 'style' => 'resize:none', 'required' => true]) }}
{{ Form::blueText('Keywords', ['placeholder' => 'Website, About, Awesome, Stuff', 'required' => true]) }}{{ Form::blueText('Copyright', ['placeholder' => '2016 Your Company LLC']) }}
{{ Form::blueToggle('Hide From Search Engines', '1', false, ['class' => 'toggle-checkbox']) }}<div class="login-button text-center">{{ Form::button('Create Site <i class="fa fa-angle-double-right"></i>', ['class' => 'btn btn-primary', 'type' => 'submit']) }}</div>{{ Form::close() }}</div></div></div></div></div></div></div>@endsection
@section('styles')<link rel="stylesheet" href="{{ asset('blue/css/bootstrap-switch.min.css') }}"/>@endsection
@section('scripts')<script src="{{ asset('blue/js/bootstrap-switch.min.js') }}"></script><script>$(function () {
    return $('.toggle-checkbox').bootstrapSwitch({
        size: "small"
    });
});</script>@endsection