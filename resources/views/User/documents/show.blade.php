@extends('adminlayouts.app')

@section('content')
    <style>
        .card-content2 {
            padding: 10px 7px;
        }
    </style>

    <div class="container">
        <div class="row">
            <h3 class="flow-text">{{ $folder->name }}</h3>
            <div class="divider"></div>
        </div>
        <div class="card z-depth-2">
            <div class="card-content">
                <button data-target="modal2" class="btn waves-effect waves-light modal-trigger right">Create
                    Subfolder</button>
                <button data-target="modal1" class="btn waves-effect waves-light modal-trigger right">Upload File</button>

                <div class="row">
                    <h4>Subfolders</h4>
                    @if (count($folder->children) > 0)
                        @foreach ($folder->children as $child)
                            <div class="col m2 s6">
                                <div class="card hoverable indigo lighten-5 task">
                                    <a href="{{ route('user.documents.show', $child->id) }}">
                                        <div class="card-content2 center">
                                            <img src="{{ asset('folders/folder.svg') }}" alt="folder" />
                                            <h6>{{ $child->name }}</h6>
                                        </div>
                                    </a>
                                </div>
                                <form action="{{ route('folders.destroy', $child->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this folder and all its contents?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn red">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    @else
                        <h5 class="teal-text">No Subfolders</h5>
                    @endif
                </div>

                <div class="row">
                    <h4>Files</h4>
                    @if (count($folder->documents) > 0)
                        @foreach ($folder->documents as $document)
                            <div class="col m2 s6">
                                <div class="card hoverable indigo lighten-5 task">
                                    <a href="{{ route('documents.show', $document->id) }}">
                                        <div class="card-content2 center">
                                            <div class="col-3">
                                                <div>
                                                    <div>
                                                        <a href="{{ url('/download', $document->name_doc) }}"
                                                            class="context-menu_link" data-action="Download">
                                                            <i class="material-icons">file_download</i>
                                                            <p>Download</p>
                                                        </a>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="{{ url('/view', $document->name_doc) }}" target="_blank"
                                                            class="context-menu_link" data-action="View">
                                                            <i class="material-icons"
                                                                style="font-size:36px">remove_red_eye</i>
                                                            <p>View</p>
                                                        </a>
                                                    </div>
                                                </div>

                                                <img src="{{ asset('folders/pdf.png') }}" alt="PDF" />
                                                <h6>{{ $document->name_doc }}</h6>

                                            </div>
                                        </div>
                                    </a>


                                </div>
                            </div>
                        @endforeach
                    @else
                        <h5 class="teal-text">No Documents</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="modal1" class="modal">
        <div class="modal-content">
            <h5>Upload File</h5>
            <div class="row">
                <form class="col s12" method="POST" action="{{ route('user.documents.storeFile', $folder->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="file-field input-field col s12">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" name="file" required>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn waves-effect waves-light" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <h5>Create Subfolder</h5>
            <div class="row">
                <form class="col s12" method="POST" action="{{ route('user.documents.storeFolder', $folder->id) }}">
                    @csrf
                    <div class="input-field col s12">
                        <input id="name" type="text" name="name" required>
                        <label for="name">Subfolder Name</label>
                    </div>
                    <div class="modal-footer">
                        <button class="btn waves-effect waves-light" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
