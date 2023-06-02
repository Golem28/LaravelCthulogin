@extends('layouts.template')

@section('title')
    Forum
@stop

@section('content')
    <div class="container">
        <div class="container mt-5">
            {{-- Bestätigungsskript für das Löschen eines Forums --}}
            <script src="{{ asset('js/route_on_submit.js') }}"></script>

            <!-- Delete Button -->
            <div class="d-flex justify-content-end">
                <form method="GET" action="{{route('forum_delete', ['forum_id' => $forum->id])}}" onclick="return confirmSubmit(event, 'Möchtest du das Thema {{$forum->name}} wirklich löschen?')">
                    <button type="submit" class="btn btn-outline-danger" id='delete_forum_button'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path>
                        </svg>
                        Delete Chat
                    </button>
                </form>
            </div>

            <div class="row">
                <div class="col-12">
                    <h1>Chat {{$forum->abbreviation}}:</h1>

                    <form method="GET" action="{{route('messages_create', ['forum_id' => $forum->id])}}">
                        <div class="form-group mt-3">
                            <label for="message">Nachrichten:</label>
                            <textarea class="form-control" id="message" name='message_content' rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Veröffentlichen</button>
                    </form>

                    <div class="chat border p-3" id="message-container">
                        @foreach ($messages as $message)
                            <div class="message">
                                <div class="message-header">
                                    <div class="message-author">
                                        <span class="message-author-name">{{$message->name}}</span>
                                        <span class="message-time">{{$message->created_at}}</span>
                                    </div>
                                    <form method="GET" action="{{route('messages_delete', ['forum_id' => $forum->id, 'message_id' => $message->id])}}">
                                        <button type="submit" class="btn btn-outline-danger" id='delete_forum_button'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <div class="message-content">
                                    {{$message->content}}
                                </div>
                                
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center mt-3">
                        <button id="load-more-button" class="btn btn-primary btn-lg">
                            Weitere Nachrichten laden
                        </button>
                    </div>
                </div>
            </div>
        </div>
	</div>
@stop
