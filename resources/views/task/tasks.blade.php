@extends('base')

@section('content')
    <div id="briefs" class="flex-container w-per-10 mt-3">
        <div class="flex jcc aic w-per-10">
            <h1>Tasks <input type="button" class="btn" id="open_add_task" value="+"></h1>
            
        </div>
        @if (count($data->tasks) > 0)
            @foreach ($data->tasks as $row)
                <div class="flex-item w-6">
                    <div class="flex-content w-per-6" div-id="{{ $row->id_task }}">
                        <span class="title title_brief">{{ $row->title_task }}</span>
                        <span class="sub-title descrip_brief">{{ $row->descrip_task }}</span>
                        <span class="sub-title date_from">{{ $row->date_from_task }}</span>
                        <span class="sub-title date_to">{{ $row->date_to_task }}</span>
                    </div>
                    <div class="flex-actions">
                        <a class="btn details-btn mr-1 ml-1" id-value="{{ $row->id_task }}">Details</a>
                        <a class="btn delete-btn"
                            href="{{ route('delete-task', ['id_task' => $row->id_task]) }}">Delete</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>


    <div id="task_popup" class="popup hide-slide">
        <div class="flex-container w-per-5 mt-3">
            <div class="flex-item wrap w-per-10 ">
                <div class="flex-content w-per-8">
                    <form action="" method="POST" class="flex-form p-3" id="tasks_edit_form">
                        <h2 class="form-title mb-3" id="task_brief_name"></h2>
                        {{ csrf_field() }}
                        <label class="w-per-9"><span>Title: </span><input type="text" name="title_task_e"></label>
                        <label class="w-per-9"><span>Descrip: </span>
                            <textarea class="h-min-3" name="descrip_task_e"></textarea>
                        </label>
                        <label class="w-per-4   "><span>start date: </span><input type="date" name="date_from_task_e"></label>
                    <label class="w-per-4"><span>end date: </span><input type="date" name="date_to_task_e"></label>
                        <div class="w-per-4">
                            
                            <div class="flex jcfs w-per-8 mt-2">
                                <input type="submit" mode="add" value="Save" class="btn details-btn mr-2"
                                    id="save_task">
                                {{-- <input type="button" class="btn" id="task_cancel" value="Cancel"> --}}
                                <a id="task_delete" class="btn delete-btn" href="#">
                                    Delete
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <i id="tasks_close" class="fa-solid fa-circle-xmark close-popup"></i>
            </div>
        </div>
    </div>


    {{-- Add Task Popup --}}
    <div id="add_task_popup" class="popup hide-slide">
        <div class="flex-container w-per-5 mt-3">
            <div class="flex-item wrap w-per-10 ">
                <div class="flex-content w-per-8">
                    <form action="{{ route('add-task',['id_brief'=>$data->id_brief]) }}" method="POST" class="flex-form p-3" id="tasks_form">
                        <h2 class="form-title mb-3" id="task_brief_name"></h2>
                        {{ csrf_field() }}
                        <label class="w-per-9"><span>Title: </span><input type="text" name="title_task"></label>
                        <label class="w-per-9"><span>Descrip: </span>
                            <textarea class="h-min-3" name="descrip_task"></textarea>
                        </label>
                        <label class="w-per-4   "><span>start date: </span><input type="date" name="date_from_task"></label>
                    <label class="w-per-4"><span>end date: </span><input type="date" name="date_to_task"></label>
                        <div class="w-per-4">
                            
                            <div class="flex jcfs w-per-8 mt-2">
                                <input type="submit" value="Add" class="btn details-btn mr-2"
                                    id="add_task">
                                <input type="button" class="btn" id="" value="Reset">
                            </div>
                        </div>
                    </form>
                </div>
                <i id="add_task_close" class="fa-solid fa-circle-xmark close-popup"></i>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('js/tasks.js') }}"></script>
@endsection
