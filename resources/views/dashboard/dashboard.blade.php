@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ url('/grupo/listar') }}">Dashboard</a>
  </li>
</ol>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-fw fa-dashboard"></i> Olá {{ Auth::user()->nome }}, seja bem vindo!</div>
  <div class="card-body">

  </div>

  Implementar...
</div>

@endsection
