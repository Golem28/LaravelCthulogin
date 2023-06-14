@extends('layouts.template')

@section('title')
    Übersicht
@stop

@section('content')
    {{-- Zeigt eine Übersicht an über alle Foren in einer Tabelle die man selber besitzt --}}

    {{-- Bestätigungsskript für das Löschen eines Forums --}}
    <script src="{{ asset('js/route_on_submit.js') }}"></script>

    <div class="container">
        <h1>Übersicht</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Kürzel</th>
                    <th scope="col">Thema</th>
                    <th scope="col">Erstellt am</th>
                    <th scope="col">Letzte Aktivität</th>
                    <th scope="col">Aktionen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($forums as $forum)
                    <tr>
                        <td>{{ $forum->abbreviation }}</td>
                        <td>{{ $forum->name }}</td>
                        <td>{{ $forum->created_at }}</td>
                        <td>{{ $forum->updated_at }}</td>
                        <td>
                            <a href="{{ route('messages', ['forum_id' => $forum->id]) }}" class="btn btn-primary">Anzeigen</a>
                            @if ($forum->user_id == auth()->user()->id)
                                <a href="{{ route('forum_edit', ['forum_id' => $forum->id]) }}" class="btn btn-warning">Bearbeiten</a>
                                <a href="{{ route('forum_delete', ['forum_id' => $forum->id]) }}" onclick="return confirmSubmit(event, 'Möchtest du das Thema {{$forum->name}} wirklich löschen?')" class="btn btn-danger">Löschen</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="d-flex justify-content-end">
            <a href="{{ route('forum_new') }}">
                <button type="button" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                    </svg>
                </button>
            </a>
        </div>
    </div>
@stop