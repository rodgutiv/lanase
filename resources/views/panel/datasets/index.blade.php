@extends('panel.main')
@section('title','Datasets')

@section('nav')
@if(Auth::user()->isAdmin())
	@include('layouts.nav-admin')
@else
	@include('layouts.nav-user')
@endif
@endsection

@section('content')
				
	<div class="row mt-30 mt-60-mobile">
		<div class="col s12 m6">
			<div class="col s12 border-bottom mb-30">
				<h5>
					<b>Datasets</b>
					<a href="{{ route('datasets.create') }}" class="btn waves-effect waves-light green pull-right"><i class="material-icons">add</i></a>					
				</h5>
			</div>
			<div class="col s12 z-depth-1 white mb-30">
				<table class="bordered responsive-table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Project</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody id="table-dataset-body">
						@foreach( $datasets as $dataset )
						<tr>
							<td>{{ $dataset->id }}</td>
							<td>{{ $dataset->project->title_es }}</td>												
							<td>
								<a href="#!" class="dataset-view tooltipped" data-tooltip="Detalles" data-position="top" data-delay="50" data-id="{{ $dataset->id }}"><i class="material-icons brown-text">receipt</i></a>
								<a href="{{ route('datasets.edit', $dataset->id) }}" class="dataset-edit tooltipped" data-tooltip="Editar" data-position="top" data-delay="50" data-id="{{ $dataset->id }}"><i class="material-icons teal-text">edit</i></a>
								{{-- <a href="#!" class="ra-delete tooltipped" data-id="{{ $area->id }}"><i class="material-icons red-text">delete</i></a> --}}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="col s12 m6">
			<p class="card-title panel-heading grey lighten-1"><b>DETALLES</b></p>
			{{-- <div class="col s12 z-depth-1 white p-1">
				<table class="bordered">
					<tr>
						<td width="15%">Image:</td>
						<td class="border-left pl-10" id="det-image"></td>
					</tr>
					<tr>
						<td width="15%">ID:</td>
						<td class="border-left pl-10" id="det-id"></td>
					</tr>
					<tr>
						<td width="15%">Nombre:</td>
						<td class="border-left pl-10" id="det-name"></td>
					</tr>
					<tr>
						<td width="15%">Nombre(en):</td>
						<td class="border-left pl-10" id="det-name-en"></td>
					</tr>
					<tr>
						<td width="15%">Display:</td>
						<td class="border-left pl-10" id="det-display"></td>
					</tr>
					<tr>
						<td width="15%">Projects</td>
						<td class="border-left pl-10" id="det-projects"></td>
					</tr>
				</table>
			</div> --}}			
		</div>
	</div>

@endsection
@section('scripts')
<script type="text/javascript">
	
	$(".dataset-view").click(function(e){
		e.preventDefault();

		$.get('datasets/' + $(this).attr('data-id')).done(function(data){
			$("#det-id").html(data.id);
			$("#det-name").html(data.name);
			
		});
	});

</script>
@endsection