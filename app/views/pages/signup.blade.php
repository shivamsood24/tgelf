<div class="row">
	<div class="span4 offset4">
		<div class="well">
			<legend> Sign in </legend>
			{{ form::open('login') }}
			{{ form::text('email', '', array('class' => 'span3', 'placeholder' => 'Email')) }}
			{{ form::password('password', array('class' => 'span3', 'placeholder' => 'Password')) }}
			{{ form::submit('Sign in', array('class' => 'btn btn-success')) }}
			{{ form::close() }}
		</div>
	</div>
</div>