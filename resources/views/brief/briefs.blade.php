@extends('base')

@section('content')
    <div id="briefs" class="flex-container w-per-10 mt-3">
        @if (count($data) > 0)
            @foreach ($data as $row)
                <div class="flex-item w-6">
                    <div class="flex-content w-per-6" div-id="{{ $row->id_brief }}">
                        <span class="title title_brief">{{ $row->title_brief }}</span>
                        <span class="sub-title descrip_brief">{{ $row->descrip_brief }}</span>
                        <span class="sub-title date_from">{{ $row->date_from }}</span>
                        <span class="sub-title date_to">{{ $row->date_to }}</span>
                    </div>
                    <div class="flex-actions">
                        <a class="btn details-btn mr-1 ml-1" id-value="{{ $row->id_brief }}">Details</a>
                        <a class="btn tasks-btn mr-1 ml-1"
                            href="{{ route('show-tasks', ['id_brief' => $row->id_brief]) }}">Tasks</a>
                        <a class="btn btn mr-1 ml-1" href="{{ route('show-assign-brief', ['id_brief' => $row->id_brief]) }}"
                            id-value="{{ $row->id_brief }}">Assign</a>
                    </div>
                    <a class="btn delete-btn delete-icon p-1" href="{{ route('delete-brief', ['id_brief' => $row->id_brief]) }}"><i class="fa-solid fa-circle-xmark"></i></a>
                </div>
            @endforeach
        @endif
    </div>

    <div id="add_promo" class="popup hide-slide">
        <div class="flex-container w-per-5">
            <div class="flex-item aifs wrap">
                <div class="flex-content">
                    <form class="flex-form" action="" method="POST">
                        <h2 class="form-title mb-3">Ajouter Apprenant</h2>
                        {{ csrf_field() }}

                        <label><span>address: </span><input type="text" name="address"></label>
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
            <div class="flex-item aifs wrap w-per-10 ">
                {{-- <div class="picture">
                    <img class="w-max-8" src="{{ URL::asset('images/default-profile-picture.png') }}">
                    <div class="popup-actions">

                    </div>
                </div> --}}
                <div class="flex-content w-per-8">
                    <form class="flex-form p-3" id="edit_form">
                        {{-- <img class="w-max-8" src="{{ URL::asset('images/default-profile-picture.png') }}"> --}}

                        <h2 class="form-title mb-3" id="edit_name">Test</h2>
                        {{ csrf_field() }}
                        <label class="w-per-9"><span>Title: </span><input type="text" name="title_brief"
                                readonly></label>
                        <label class="w-per-5"><span>Descrip: </span>
                            <textarea class="h-min-3" name="descrip_brief" readonly></textarea>
                        </label>
                        <div class="w-per-4">
                            <label class="w-per-9"><span>start date: </span><input type="date" name="date_from"
                                    readonly></label>
                            <label class="w-per-9"><span>end date: </span><input type="date" name="date_to"
                                    readonly></label>
                            <div class="flex jcfs w-per-8 mt-2">
                                <input type="submit" mode="edit" value="Edit" class="btn details-btn mr-2"
                                    id="edit_brief">
                                <input type="button" class="btn" id="brief_cancel" value="Cancel"
                                    style="display: none;">
                                {{-- <label class="btn edit-btn" for="edit_appr">Save</label> --}}
                                <a id="brief_delete" class="btn delete-btn" href="#">
                                    Delete
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <i id="edit_close" class="fa-solid fa-circle-xmark close-popup"></i>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('js/briefs.js') }}"></script>
@endsection
