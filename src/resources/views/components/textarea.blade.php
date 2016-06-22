<div class="form-group{{ ($errors->has(camel_case($name))) ? ' has-error' : '' }}"><div class="sub-title">{{ $name . ((isset($attributes['required'])) ? '*' : '') }}</div>{{ Form::textarea(camel_case($name), old(camel_case($name)), array_merge(['class' => 'form-control', 'rows' => '3'], $attributes)) }}
@if($errors->has(camel_case($name)))
{!! '<span class="control-label">'.$errors->first(camel_case($name)).'</span>' !!}
@endif</div>