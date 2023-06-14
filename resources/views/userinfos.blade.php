@extends('layouts.template')

@section('title')
    Forum
@stop

@section('content')
    <h1>Client Infos</h1>
	<p>Browser: <?php echo $_SERVER['HTTP_USER_AGENT']; ?></p>
	<p>Betriebssystem: <?php echo php_uname('s'); ?> <?php echo php_uname('r'); ?></p>
@stop