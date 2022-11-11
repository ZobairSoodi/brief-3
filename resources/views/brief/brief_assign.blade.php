@extends('base')

@section('content')
    <div class="right-side">
        <div>
            <h3>Apprenants:</h3>
            <div style="display: flex; justify-content: center">
                <a href="{{ route('assign-brief-all', ['id_brief' => $id_brief]) }}" class="btn edit-btn">Assign To All</a>
            </div>
        </div>
        <div id="appr_content" class="flex-container w-per-10 mt-3">
            @if ($data[0]->id != null)
                @foreach ($data as $row)
                    <div class="flex-item w-6">
                        @if ($row->has_brief)
                            <a id="delete_appr" class="btn delete-btn delete-icon"
                                href="{{ route('unassign-brief', ['id_brief' => $id_brief, 'id_appr' => $row->id]) }}">
                                <i class="fa-solid fa-minus"></i>
                            </a>
                        @else
                            <a id="delete_appr" class="btn delete-btn add-icon"
                                href="{{ route('assign-brief', ['id_brief' => $id_brief, 'id_appr' => $row->id]) }}">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        @endif



                        <div class="picture w-per-4">
                            <img class="w-per-10" src="{{ URL::asset('images/default-profile-picture.png') }}">
                        </div>
                        <div class="flex-content w-per-6">
                            <span class="title">{{ $row->nom }} {{ $row->prenom }}</span>
                            <span class="sub-title">{{ $row->telephone }}</span>
                            <span class="sub-title">{{ $row->CIN }}</span>
                        </div>
                        <div class="flex-actions">
                            <a class="btn edit-btn mr-1 ml-1" id-value="{{ $row->id }}">Details</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    </div>

    <div id="edit_popup" class="popup hide-slide">
        <div class="flex-container w-per-6 mt-3">
            <div class="flex-item ais wrap w-per-10 ">
                <div class="picture">
                    <img class="w-max-8" src="{{ URL::asset('images/default-profile-picture.png') }}">
                    <div class="popup-actions">
                    </div>
                </div>
                <div class="flex-content w-per-7">
                    <form class="flex-form p-3" id="edit_form">
                        <h2 class="form-title mb-3" id="edit_name">Test</h2>
                        {{ csrf_field() }}
                        <label><span>Nom: </span><input readonly type="text" name="nom_e"></label>
                        <label><span>Prenom: </span><input readonly type="text" name="prenom_e"></label>
                        <label><span>Email: </span><input readonly type="text" name="email_e"></label>
                        <label><span>telephone: </span><input readonly type="text" name="telephone_e"></label>
                        <label><span>CIN: </span><input readonly type="text" name="CIN_e"></label>
                        <label><span>Promotion: </span>
                            <select disabled name="id_promo_e" id="">
                                @foreach ($prom as $row)
                                    <option value="{{ $row->id }}">
                                        {{ $row->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                        <label><span>date naissance: </span><input readonly type="date" name="date_naissance_e"></label>
                        <label><span>parent telephone: </span><input readonly type="text"
                                name="parent_telephone_e"></label>
                        <label><span>address: </span><input readonly type="text" name="address_e"></label>
                        <label><span>filiere: </span><input readonly type="text" name="filiere_e"></label>
                    </form>
                </div>
                <i id="edit_close" class="fa-solid fa-circle-xmark close-popup"></i>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('js/brief_assign.js') }}"></script>
    <script src="{{ URL::asset('js/popup.js') }}"></script>
@endsection
