@extends('base')

@section('style-link')
    <script src="https://kit.fontawesome.com/955adab269.js" crossorigin="anonymous"></script>
@endsection

@section('content')

    <h1>Modifier Promotion</h1>
    <div>

        <form action="{{ route('update-promotion', ['id' => $data[0]->id_prom]) }}" method="POST">
            {{ csrf_field() }}
            <label>Nom: <input type="text" name="nom" value="{{ $data[0]->nom_prom }}"></label>
            <input type="hidden" name="id" value="{{ $data[0]->id_prom }}">
            <input type="submit" name="edit_promotion">
        </form>
    </div>
    <h3>Apprenants:</h3>
    <div>

        <div style="display: flex; justify-content: center">
            <a href="#" id="add_appr">Ajouter Apprenant</a>
            <input style="margin-left: 5px" type="text" id="search_inp">
        </div>
        <div class="table_cont">
            <table>
                <thead>
                    <th>Actions</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>telephone</th>
                    <th>CIN</th>
                    <th>date_naissance</th>
                    <th>parent_telephone</th>
                    <th>address</th>
                    <th>filiere</th>
                </thead>
                <tbody id="search_table">
                    @if ($data[0]->id_appr != null)
                        @foreach ($data as $row)
                            <tr>
                                <td class="actions">
                                    <a href="{{ route('edit_appr', ['id_appr' => $row->id_appr]) }}">Edit</a>
                                    <a href="{{ route('delete_appr', ['id_appr' => $row->id_appr]) }}">Delete</a>
                                </td>
                                <td>{{ $row->nom_appr }}</td>
                                <td>{{ $row->prenom }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->telephone }}</td>
                                <td>{{ $row->CIN }}</td>
                                <td>{{ $row->date_naissance }}</td>
                                <td>{{ $row->parent_telephone }}</td>
                                <td>{{ $row->address }}</td>
                                <td>{{ $row->filiere }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <form id="appr_form" action="{{ route('add_appr', ['id_prom' => $data[0]->id_prom]) }}" method="POST">
        {{ csrf_field() }}
        <div>
            <label><span>Nom: </span><input type="text" name="nom"></label>
            <label><span>Prenom: </span><input type="text" name="prenom"></label>
            <label><span>Email: </span><input type="text" name="email"></label>
            <label><span>telephone: </span><input type="text" name="telephone"></label>
            <label><span>CIN: </span><input type="text" name="CIN"></label>
            <label><span>date_naissance: </span><input type="date" name="date_naissance"></label>
            <label><span>parent_telephone: </span><input type="text" name="parent_telephone"></label>
            <label><span>address: </span><input type="text" name="address"></label>
            <label><span>filiere: </span><input type="text" name="filiere"></label>
            <input type="submit" name="submit">
            <i id="close_btn" class="fa-solid fa-circle-xmark"></i>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        let show_add = document.querySelector("#add_appr");
        let close_add = document.querySelector("#close_btn");
        let add_modal = document.querySelector("#appr_form");

        show_add.addEventListener("click", () => {
            add_modal.style.display = "flex";
            add_modal.style.zIndex = 10;
            add_modal.style.opacity = 1;
        })

        close_add.addEventListener("click", () => {
            add_modal.style.display = "none";
            add_modal.style.zIndex = -10;
            add_modal.style.opacity = 0;
        })
    </script>
    <script src="{{ URL::asset('js/edit_appr.js') }}"></script>
@endsection
