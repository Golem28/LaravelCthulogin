@extends('layouts.template')

@section('title')
    Forum
@stop

@section('content')
    <div class="container">
        <h1>Themen öffnen</h1>
        <form method="GET" action="forum_comments.php">
            <div class="form-group">
                <label for="delete">Forum öffnen:</label>
                <select class="form-control mb-3" id="forum_kuerzel" name="forum_kuerzel">
                    @foreach($forums as $forum)
                        <option value="{{ $forum->abbreviation }}">{{ $forum->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Forum öffnen</button>
        </form>

        <!-- Erstellungseite öffnen -->
        <div class="d-flex justify-content-end">
            <a href="forum_create.php">
                <button type="button" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                    </svg>
                    Button
                </button>
            </a>
        </div>
    </div>
@stop