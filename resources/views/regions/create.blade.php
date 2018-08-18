
@section('title','|Create new Region')

<div class="row">
	<div class="col-sm-8">
		{{ Form::open(array('url' => 'regions.store')) }}
		{!! Form::label('name', 'Name'); !!}
		{!! Form::submit('Create!'); !!}
   
{{ Form::close() }}

	</div>
</div>
