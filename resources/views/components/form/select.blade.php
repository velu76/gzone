<div class="form-group">
	{{ Form::label($label,null,['class'=>'control-label']) }}
	{{ Form::select($name, $value, $selected, ['class' => 'form-control'])  }}	
</div>