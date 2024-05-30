@extends('adminlayouts.app')

@section('content')
    <style>
        .card-content2 {
            padding: 10px 7px;
        }

        .each-card {
            border-radius: 5px;
        }

        .card-container {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
        }

        @media (min-width: 800px) {
            .card-container {
                grid-template-columns: repeat(6, 1fr);
            }
        }

        @media (min-width: 1000px) {
            .card-container {
                grid-template-columns: repeat(7, 1fr);
            }
        }
    </style>

    <div class="row">
        <div class="section">
            <div class="col m1 hide-on-med-and-down">
                @include('User.incUser.sidebar')
            </div>
            <div class="col  m11 s12">
                <div class="row card">
                    <h3 class="flow-text">Documents</h3>
                    <button data-target="modal1" class="btn waves-effect waves-light modal-trigger right">Create
                        Folder</button>
                    <div class="divider">
                    </div>
                </div>
                <div class="card z-depth-2">
                    <div class="card-content">

                        <div class="row card-border card-container">
                            @if (count($folders) > 0)
                                @foreach ($folders as $folder)
                                    {{-- <div class="col  m2 s6 "> --}}

                                    <div class="each-card  hoverable indigo lighten-5 task" data-id="{{ $folder->id }}">

                                        <div>

                                            <button data-target="modal2"
                                                class="btn waves-effect waves-light modal-trigger right">Edit
                                                Folder</button>

                                        </div>

                                        <a href="{{ route('user.documents.show', $folder->id) }}">
                                            <div class="card-content2 center ">
                                                <img src="{{ asset('folders/folder.svg') }}" alt="folder" />
                                                <h6>{{ $folder->name }}</h6>
                                            </div>
                                        </a>

                                        <form action="{{ route('folders.destroy', $folder->id) }}" method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this folder and all its contents?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn red">Delete</button>
                                        </form>
                                    </div>

                                    <div id="modal2" class="modal">
                                        <div class="modal-content">
                                            <h5>Edit Folder</h5>
                                            <div class="row">
                                                <form class="col s12" method="POST" action="{{ route('user.documents.update', $folder->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="input-field col s12">
                                                        <input id="name" type="text" name="name" required>
                                                        <label for="name">Folder Name</label>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn waves-effect waves-light" type="submit">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- </div> --}}
                                @endforeach
                            @else
                                <h5 class="teal-text">No Document has been uploaded</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal1" class="modal">
            <div class="modal-content">
                <h5>Create Folder</h5>
                <div class="row">
                    <form class="col s12" method="POST" action="{{ route('user.documents.store') }}">
                        @csrf
                        <div class="input-field col s12">
                            <input id="name" type="text" name="name" required>
                            <label for="name">Folder Name</label>
                        </div>
                        <div class="modal-footer">
                            <button class="btn waves-effect waves-light" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
