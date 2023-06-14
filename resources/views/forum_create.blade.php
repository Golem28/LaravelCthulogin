@extends('layouts.template')

@section('title')
    Create Forum
@stop

@section('content')
    {{-- Erstellungsformular für das Kürzel und den Namen --}}
    @component('components.forum_edit')
        @slot('action')
            {{ route('forum_create') }}
        @endslot
        @slot('submit')
            Thema erstellen
        @endslot
    @endcomponent
@stop