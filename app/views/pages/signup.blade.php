{{ Form::open(array('url' => 'checkval','method' => 'PUT')) }}

{{ Form::label('username') }}
{{ Form::input('text', 'name') }}
<br>
<br>
{{ Form::label('password') }}
{{ Form::password('secret') }}
<br>
<br>
{{ Form::label('password_confirm') }}
{{ Form::password('secret') }}
<br>
<br>
{{ Form::submit('Submit', '', array('class'=>'btn btn-primary')) }}

{{ Form::close() }}