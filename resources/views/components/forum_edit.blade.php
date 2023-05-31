{{-- Component for creating or editing a theme --}}

<form method="GET" action="{{$action}}">
    <div class="form-group">
        <label for="kuerzel">Kürzel:</label>
        <input type="text" class="form-control" id="kuerzel" name="forum_abbreviation" placeholder="Kürzel eingeben">
        <label for="topic">Thema:</label>
        <input type="text" class="form-control" id="topic" name="forum_name" placeholder="Thema eingeben">
    </div>
    <button type="submit" class="btn btn-primary mt-3">{{$submit}}</button>
</form>