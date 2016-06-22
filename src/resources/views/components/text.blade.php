<div class="form-group{{ ($errors->has(camel_case($name))) ? ' has-error' : '' }}"><div class="sub-title">{{ $name . ((isset($attributes['required'])) ? '*' : '') }}</div>{{ Form::text(camel_case($name), old(camel_case($name)), array_merge(['class' => 'form-control'], $attributes)) }}
@if($errors->has(camel_case($name)))
{!! '<span class="control-label">'.$errors->first(camel_case($name)).'</span>' !!}
@endif</div>