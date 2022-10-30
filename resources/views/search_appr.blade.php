<tbody id="search_table">
    @foreach ($appr as $row)
        <tr>
            <td>{{ $row->nom }}</td>
            <td>{{ $row->prenom }}</td>
            <td>{{ $row->email }}</td>
            <td>
                <a href="{{ route('edit_appr', ['id_appr' => $row->id]) }}">Edit</a>
                <a href="{{ route('delete_appr', ['id_appr' => $row->id]) }}">Delete</a>
            </td>
        </tr>
    @endforeach
</tbody>