{{ Form::open(array('method' => 'PUT')) }}
<div class="form-group">
{{ Form::label('Username') }}
{{ Form::input('text', 'name' , array('class' => 'form-control')) }}
</div>
<div class="form-group">
{{ Form::label('Password') }}
{{ Form::password('secret', array('class' => 'form-control')) }}
</div>
<div class="form-group">
{{ Form::label('Confirm Password', array('class' => 'form-control')) }}
{{ Form::password('secret') }}
</div>

{{ Form::close() }}