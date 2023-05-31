@extends('layouts.template')

@section('title')
    Create Forum
@stop

@section('content')
    <div class="container">
        <h1>Themen erstellen</h1>
        <form method="GET" action="{{ route('forum_create') }}">
            <div class="form-group">
                <label for="kuerzel">Kürzel:</label>
                <input type="text" class="form-control" id="kuerzel" name="forum_abbreviation" placeholder="Kürzel eingeben">
                <label for="topic">Thema:</label>
                <input type="text" class="form-control" id="topic" name="forum_name" placeholder="Thema eingeben">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Thema erstellen</button>
        </form>
    </div>
@stop