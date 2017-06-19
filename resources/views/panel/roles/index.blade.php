@extends('panel.main')
@section('title','Users')

@section('nav')
	@include('layouts.nav-admin')
@endsection

@section('content')

	<div class="row mt-30">
		<div class="col s12 border-bottom">
			<h5><b>Roles</b></h5>
		</div>
	</div>

	<div class="row">
		<div class="col s12 m6 mb-30">
			<div class="col s12 z-depth-1 white">
				<table class="bordered responsive-table ">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Permisos</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody id="table-users-body">
						@foreach( $roles as $rol )
						<tr>
							<td>{{ $rol->name }}</td>
							<td>
							<?php

								$perm = explode(",", $rol->permissions);
								foreach ($perm as $p) {
							?>
							<span class="badge1 fs-80 lh-2 grey darken-1 white-text">{{ $p }}</span>
							<?php
								}						
							?>
							</td>
							
							<td>
								<a href="{{ route('roles.edit', $rol->id) }}" class="user-edit tooltipped" data-tooltip="Editar" data-position="top" data-delay="50"><i class="material-icons teal-text">edit</i></a>
								
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="clearfix"></div>
			<p class="mt-30">Permisos disponibles:</p>
			<p>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">dashboard</span>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">add_users</span>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">list_users</span>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">delete_users</span>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">edit_users</span>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">manage_roles</span>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">manage_fields</span>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">manage_projects</span>
				<span class="badge1 fs-80 lh-2 grey darken-1 white-text">moderate</span>
			</p>
		</div>
		<div class="col s12 m6">
			<p class="p-col mb-30 fs-13">Agregar nuevo Rol</p>
			{!! Form::open(['route' => 'roles.store', 'method' => 'POST', 'class' => '']) !!}
			<div class="row col s12 white z-depth-1">
				<div class="input-field col s12">
					{!! Form::label('name', 'Nombre') !!}
					{!! Form::text('name', null, ['class'=>'validate', 'required']) !!}					
				</div>
				<div class="input-field col s12">
					{!! Form::label('permissions', 'Permisos (Separados por comas)') !!}
					{!! Form::textarea('permissions', null, ['class'=>'materialize-textarea','required']) !!}				
				</div>
			</div>

			<div class="input-field col s6 m4">
		      {!! Form::submit('Guardar',['class'=>'btn btn-block btn-block-large waves-effect waves-light']) !!}
		    </div>
		{!! Form::close() !!}
		</div>
	</div>

	<div class="fixed-action-btn">


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