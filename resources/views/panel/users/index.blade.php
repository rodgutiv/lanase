@extends('panel.main')
@section('title','Users')

@section('nav')
	@include('layouts.nav-admin')
@endsection

@section('content')

	<div class="row mt-30">
		<div class="col s12 border-bottom">
			<h5><b>Usuarios</b></h5>
		</div>
	</div>

	<div class="row">
		<div class="col s12 m6 mb-30">
			<div class="col s12 mb-30" id="buttons">
				<div class="col s4 plr-1">
					<button class="btn-block teal waves-effect waves-light btn" id="btn-admin-users-all">Todos</button>
				</div>
				<div class="col s4 plr-1">
					<button class="btn-block phantom waves-effect waves-light btn" id="btn-admin-users-admin">Admin</button>
				</div>
				<div class="col s4 plr-1">
					<button class="btn-block phantom waves-effect waves-light btn" id="btn-admin-users-users">User</button>
				</div>
			</div>
			<div class="col s12 z-depth-1 white">
				<table class="bordered responsive-table ">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Email</th>
							<th>Status</th>
							<th>Role</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody id="table-users-body">
						@foreach( $users as $user )
						<tr>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>
								@if( $user->status == 1)
								<span class='badge1 green white-text'>Activo</span>
								@else
								<span class='badge1 grey white-text'>Inactivo</span>
								@endif
							</td>
							<td>
								@if( $user->role == 1 )
								<span class='badge1 teal white-text'>Admin</span>
								@else
								<span class='badge1 blue white-text'>User</span>
								@endif
							</td>
							<td>
								<a href="#!" class="user-view tooltipped" data-tooltip="Detalles" data-position="top" data-delay="50" data-id="{{ $user->id }}"><i class="material-icons brown-text">receipt</i></a>
								<a href="{{ route('users.edit', $user->id) }}" class="user-edit tooltipped" data-tooltip="Editar" data-position="top" data-delay="50"><i class="material-icons teal-text">edit</i></a>
								@if($user->id != Auth::user()->id)
									@if($user->status == 1)
										<a href="#!" class="user-delete tooltipped" data-id="{{ $user->id }}" data-tooltip="Deshabilitar" data-position="top" data-delay="50">
											<i class="material-icons red-text">close</i>
										</a>
									@else
										<a href="#!" class="user-delete tooltipped" data-id="{{ $user->id }}" data-tooltip="Habilitar" data-position="top" data-delay="50">
											<i class="material-icons green-text">check</i>
										</a>
									@endif
																
								@endif
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
						<td width="15%">ID:</td>
						<td class="border-left pl-10" id="det-id"></td>
					</tr>
					<tr>
						<td width="15%">Nombre:</td>
						<td class="border-left pl-10" id="det-name"></td>
					</tr>
					<tr>
						<td width="15%">Email:</td>
						<td class="border-left pl-10" id="det-email"></td>
					</tr>
					<tr>
						<td width="15%">Display:</td>
						<td class="border-left pl-10" id="det-display"></td>
					</tr>
					<tr>
						<td width="15%">Status:</td>
						<td class="border-left pl-10" id="det-status"></td>
					</tr>
					<tr>
						<td width="15%">Role:</td>
						<td class="border-left pl-10" id="det-role"></td>
					</tr>
					<tr>
						<td width="15%">Project Owner:</td>
						<td class="border-left pl-10" id="det-projects"></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="fixed-action-btn">
	<a href="{{ route('users.create') }}" class="btn-floating btn-large waves-effect waves-light blue pull-right"><i class="material-icons">add</i></a>
	</div>

	{!! Form::open(['route' => 'users.getUsers', 'method' => 'POST', 'id' => 'form' ]) !!}
	{!! Form::hidden('type', 'all', ['id' => 'type']) !!}
	{!! Form::close() !!}

	{!! Form::open(['route' => ['users.destroy', 'ID'], 'method' => 'DELETE', 'id' => 'destroy' ]) !!}
	{!! Form::close() !!}


@endsection
@section('scripts')
	<script type="text/javascript">


	$('#table-users-body').on('click', '.user-delete', function(e){
		e.preventDefault();

		var id = $(this).attr('data-id');

		var pos = $("#destroy").attr('action').lastIndexOf('/');

		var url = $("#destroy").attr('action').slice(0, pos+1) + id;
		$("#destroy").attr('action', url);
		// alert($("#destroy").attr('action'));
		$("#destroy").submit();
	})

	$('#table-users-body').on('click', '.user-view', function(e){
		e.preventDefault();

		$.get('users/' + $(this).attr('data-id')).done(function(data){
			$("#det-id").html(data.id);
			$("#det-name").html(data.name);
			$("#det-email").html(data.email);
			$("#det-projects").html(data.projects);
			if(data.display){
				$("#det-display").html("Si");
			}else{
				$("#det-display").html("No");
			}
			if(data.status){
				$("#det-status").html("Activo");
			}else{
				$("#det-status").html("Inactivo");
			}
			if(data.role == 1){
				$("#det-role").html("Administrador");
			}else if(data.role == 2){
				$("#det-role").html("Usuario");
			}
			
		});
		
	})

	$("button[id^='btn-admin-users-']").click(function(){

		var active = $("#buttons").find('button.teal');
		active.removeClass('teal');
		active.addClass('phantom');

		$(this).removeClass('phantom');
		$(this).addClass('teal');

		var btn;
		if($(this).attr('id') == "btn-admin-users-all"){
			btn = "all";
		}else if($(this).attr('id') == "btn-admin-users-admin"){
			btn = "admin";
		}else{
			btn = "user";
		}

		$('#type').val(btn);
		var form = $('#form').serialize();

		$.ajax({

			url: 'users/getUsers',
			type: 'POST',
			data: form,
			success:function(response){
				$("#table-users-body").html(response);
				 $('.tooltipped').tooltip('update');
				{{-- alert(response); --}}
			},
			error:function(response){
				alert(response);
			}

		});
	});
	</script>
@endsection