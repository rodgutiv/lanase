@extends('panel.main')
@section('title','Dashboard')

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
					<b>Areas de investigación</b>
					<a href="{{ route('researcharea.create') }}" class="btn waves-effect waves-light green pull-right"><i class="material-icons">add</i></a>					
				</h5>
			</div>
			<div class="col s12 z-depth-1 white mb-30">
				<table class="bordered responsive-table">
					<thead>
						<tr>
							<th>Id</th>
							<th width="20%" class="th-resized">Image</th>
							<th>Nombre (es)</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody id="table-ra-body">
						@foreach( $areas as $area )
						<tr>
							<td>{{ $area->id }}</td>
							<td><img src="{{ asset('images/researcharea') .'/'. $area->image }}" class="responsive-img"> <div class="clearfix"></div></td>
							<td>{{ $area->title_es }}</td>												
							<td>
								<a href="#!" class="ra-view tooltipped" data-tooltip="Detalles" data-position="top" data-delay="50" data-id="{{ $area->id }}"><i class="material-icons brown-text">receipt</i></a>
								<a href="{{ route('researcharea.edit', $area->id) }}" class="ra-edit tooltipped" data-tooltip="Editar" data-position="top" data-delay="50" data-id="{{ $area->id }}"><i class="material-icons teal-text">edit</i></a>
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
			<div class="col s12 z-depth-1 white p-1">
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
			</div>			
		</div>
	</div>

@endsection
@section('scripts')
<script type="text/javascript">
	
	$(".ra-view").click(function(e){
		e.preventDefault();

		$.get('researcharea/' + $(this).attr('data-id')).done(function(data){
			$("#det-id").html(data.id);
			$("#det-name").html(data.name);
			$("#det-name-en").html(data.nameEn);
			$("#det-projects").html(data.projects);
			$("#det-image").html('<img src="{{ asset('images/researcharea') }}/'+ data.image +' " class="col m4 s12">');
			if(data.display){
				$("#det-display").html("Si");
			}else{
				$("#det-display").html("No");
			}
			
		});
	});

</script>
@endsection