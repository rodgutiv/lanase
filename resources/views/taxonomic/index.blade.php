@extends('main')
@section('title','Distribution')

@section('nav')
@include('admin.nav')
@endsection

@section('content')

<a href="{{ route('taxonomic.create') }}" class="btn waves-light waves-effect">Nuevo</a>

@endsection