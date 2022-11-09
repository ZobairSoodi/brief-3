@extends('base')

@section('style-link')
@endsection

@section('content')
    <h1>Promotions:</h1>
    <div>
        <a href="{{ route('insert-promotion') }}" id="add_prom">Ajouter Promotion</a>
        <input id="search_prom" type="text" placeholder="rechercher">
    </div>
    <div class="flex-container w-per-9 mt-3">
        @foreach ($data as $row)
            <div class="flex-item w-6 h-3 w-min-1">
                <span class="title">
                    {{ $row->nom }}
                </span>
                <div class="flex-actions mt-4">
                    <a class="btn edit-btn" href="{{ route('edit-promotion', ['id' => $row->id]) }}">Edit</a>
                    <a class="btn delete-btn ml-1" href="{{ route('delete-promotion') }}?id={{ $row->id }}">Delete</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection


@section('scripts')
    <script src="{{ URL::asset('js/index.js') }}"></script>
@endsection
