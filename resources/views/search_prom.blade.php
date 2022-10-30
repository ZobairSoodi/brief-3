<tbody id="search_table">
    @foreach ($data as $row)
        <tr>
            <td>{{ $row->nom }}</td>
            <td>
                <a href="{{ route('edit-promotion', ['id' => $row->id]) }}">Edit</a>
                <a href="{{ route('delete-promotion') }}?id={{ $row->id }}">Delete</a>
            </td>
        </tr>
    @endforeach
</tbody>