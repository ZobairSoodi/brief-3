@extends('base')

@section('style-link')
@endsection

@section('content')
    <h1>Promotions:</h1>
    <div>
        <a href="{{ route('insert-promotion') }}" id="add_prom">Ajouter Promotion</a>
        <input id="search_prom" type="text" placeholder="rechercher">
    </div>
    <div class="table_cont" style="justify-content: center">
        <table>
            <thead>
                <th>Action</th>
                <th>Nom</th>
            </thead>
            <tbody id="search_table">
                @foreach ($data as $row)
                    <tr>
                        <td class="actions">
                            <a href="{{ route('edit-promotion', ['id' => $row->id]) }}">Edit</a>
                            <a href="{{ route('delete-promotion') }}?id={{ $row->id }}">Delete</a>
                        </td>
                        <td>{{ $row->nom }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection


@section('scripts')
    <script src="{{ URL::asset('js/index.js') }}"></script>
@endsection
