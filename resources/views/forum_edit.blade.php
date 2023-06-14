@extends('layouts.template')

@section('title')
    Forum bearbeiten
@stop

@section('content')
    {{-- Editierformular für das Kürzel und den Namen --}}
    @component('components.forum_edit')
        @slot('action')
            {{ route('forum_edit_post', ['forum_id' => $forum->id]) }}
        @endslot
        @slot('submit')
            Forum bearbeiten
        @endslot
    @endcomponent
@stop