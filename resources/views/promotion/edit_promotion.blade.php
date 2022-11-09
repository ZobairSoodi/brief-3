@extends('base')

@section('style-link')
    <script src="https://kit.fontawesome.com/955adab269.js" crossorigin="anonymous"></script>
@endsection

@section('content')

    <div class="flex-body">
        <div class="left-side px-3">
            <h1>Promotion:</h1>
            <div>

                {{-- <form action="{{ route('update-promotion', ['id' => $data[0]->id_prom]) }}" method="POST">
                     --}}
                    {{ csrf_field() }}
                    <label>Nom: <input type="text" name="nom" value="{{ $data[0]->nom_prom }}"></label>
                    <label><span>Promotion: </span>
                        <select name="select_promo" id="select_promo">
                            @foreach ($prom as $row)
                                <option value="{{ $row->id }}" @if ($row->id == $data[0]->id_prom) selected @endif>
                                    {{ $row->nom }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                    <input type="hidden" name="id" value="{{ $data[0]->id_prom }}">
                    <input type="submit" name="edit_promotion">
                {{-- </form> --}}
            </div>
        </div>

        <div class="right-side">
            <div>
                <h3>Apprenants:</h3>
                <div style="display: flex; justify-content: center">
                    <a href="#" id="add_appr">Ajouter Apprenant</a>
                    <input style="margin-left: 5px" type="text" id="search_inp">
                </div>
            </div>
            <div id="appr_content" class="flex-container w-per-10 mt-3">
                @if ($data[0]->id_appr != null)
                    @foreach ($data as $row)
                        <div class="flex-item w-6">
                            <div class="picture w-per-4">
                                <img class="w-per-10" src="{{ URL::asset('images/default-profile-picture.png') }}">
                            </div>
                            <div class="flex-content w-per-6">
                                <span class="title">{{ $row->nom_appr }} {{ $row->prenom }}</span>
                                <span class="sub-title">{{ $row->telephone }}</span>
                                <span class="sub-title">{{ $row->CIN }}</span>
                            </div>
                            <div class="flex-actions">
                                <a class="btn edit-btn mr-1 ml-1" id-value="{{ $row->id_appr }}">Edit</a>
                                <a class="btn delete-btn"
                                    href="{{ route('delete_appr', ['id_appr' => $row->id_appr]) }}">Delete</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>


    <div id="add_promo" class="popup hide-slide">
        <div class="flex-container w-per-5">
            <div class="flex-item ais wrap">
                <div class="flex-content">
                    <form class="flex-form" action="{{ route('add_appr', ['id_prom' => $data[0]->id_prom]) }}"
                        method="POST">
                        <h2 class="form-title mb-3">Ajouter Apprenant</h2>
                        {{ csrf_field() }}
                        <label><span>Nom: </span><input type="text" name="nom"></label>
                        <label><span>Prenom: </span><input type="text" name="prenom"></label>
                        <label><span>Email: </span><input type="text" name="email"></label>
                        <label><span>telephone: </span><input type="text" name="telephone"></label>
                        <label><span>CIN: </span><input type="text" name="CIN"></label>
                        <label><span>date_naissance: </span><input type="date" name="date_naissance"></label>
                        <label><span>parent_telephone: </span><input type="text" name="parent_telephone"></label>
                        <label><span>address: </span><input type="text" name="address"></label>
                        <label><span>filiere: </span><input type="text" name="filiere"></label>
                        <label></label>
                        <input type="submit" name="submit" style="display: none;">
                        <i id="close_btn" class="fa-solid fa-circle-xmark"></i>
                    </form>
                </div>
                <div class="popup-actions mt-3">
                    <label class="btn edit-btn" for="edit_appr">Submit</label>
                </div>
            </div>
        </div>
    </div>


    <div id="edit_popup" class="popup hide-slide">
        <div class="flex-container w-per-6 mt-3">
            <div class="flex-item ais wrap w-per-10 ">
                <div class="picture">
                    <img class="w-max-8" src="{{ URL::asset('images/default-profile-picture.png') }}">
                    <div class="popup-actions">
                        <label class="btn edit-btn" for="edit_appr">Save</label>
                        <a id="delete_appr" class="btn delete-btn" href="#">
                            Delete
                        </a>
                    </div>
                </div>
                <div class="flex-content w-per-7">
                    <form class="flex-form p-3" id="edit_form" action="" method="POST">
                        <h2 class="form-title mb-3" id="edit_name">Test</h2>
                        {{ csrf_field() }}
                        <label><span>Nom: </span><input type="text" name="nom_e"></label>
                        <label><span>Prenom: </span><input type="text" name="prenom_e"></label>
                        <label><span>Email: </span><input type="text" name="email_e"></label>
                        <label><span>telephone: </span><input type="text" name="telephone_e"></label>
                        <label><span>CIN: </span><input type="text" name="CIN_e"></label>
                        <label><span>Promotion: </span>
                            <select name="id_promo_e" id="">
                                @foreach ($prom as $row)
                                    <option value="{{ $row->id }}">
                                        {{ $row->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                        <label><span>date naissance: </span><input type="date" name="date_naissance_e"></label>
                        <label><span>parent telephone: </span><input type="text" name="parent_telephone_e"></label>
                        <label><span>address: </span><input type="text" name="address_e"></label>
                        <label><span>filiere: </span><input type="text" name="filiere_e"></label>
                        <input type="submit" id="edit_appr" name="edit_appr" style="display: none">
                    </form>
                </div>
                <i id="edit_close" class="fa-solid fa-circle-xmark close-popup"></i>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script>
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
    </script> --}}
    <script src="{{ URL::asset('js/edit_appr.js') }}"></script>
    <script src="{{ URL::asset('js/popup.js') }}"></script>
@endsection