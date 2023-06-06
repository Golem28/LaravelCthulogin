{{-- Component for creating or editing a theme --}}

<script src="{{ asset('js/compare_topics.js') }}" defer>
</script>

<form method="GET" action="{{$action}}">
    <div class="form-group">
        <label for="kuerzel">Kürzel:</label>
        <input type="text" class="form-control @error('forum_abbreviation') is-invalid @enderror" id="kuerzel" name="forum_abbreviation" placeholder="Kürzel eingeben">
        @error('forum_abbreviation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <ul id = "resultsList"></ul>

        <label for="topic">Thema:</label>
        <input type="text" class="form-control @error('forum_name') is-invalid @enderror" id="topic" name="forum_name" placeholder="Thema eingeben">
        @error('forum_name')
            <span class="invalid-feedback @error('name') is-invalid @enderror" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-3">{{$submit}}</button>
</form>