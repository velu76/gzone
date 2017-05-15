<div class="form-group">		
	{{ Form::label($name, null, ['class' => 'control-label']) }}
	{{ Form::checkbox($name, $value , array_merge(['class' => 'form-control']), $attributes ) }}	
</div>