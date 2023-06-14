@extends('layouts.template')

@section('title')
    Navigator
@stop

@section('content')
    <table class="table table-striped">
        <tr><th>Name</th><th>Typ</th></tr>
            @if ( isset($above_folder))
                @component('components.folder', ['dir_name' => '..', 'path' => $above_folder])
                @endcomponent
            @endif

            @foreach ($dirs as $dir)
                @if (isset($base_dir))
                    {{-- Else add a slash before the dir name --}}
                    @component('components.folder', ['dir_name' => $dir, 'path' => $base_dir . '^' . $dir])
                    @endcomponent
                @else
                    {{-- If the base_dir is / dont add any slash --}}
                    @component('components.folder', ['dir_name' => $dir, 'path' => $dir])
                    @endcomponent
                @endif
            @endforeach

            @foreach ($files as $file)
                @component('components.file', ['file_name' => $file])
                @endcomponent
            @endforeach
    </table>
@stop