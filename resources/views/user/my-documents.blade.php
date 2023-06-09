@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="nk-fmg-body-content">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between position-relative">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Documents</h3>
{{--
                    <button class="btn btn-primary btn-sm d-block d-md-inline-block" data-bs-toggle="modal" data-bs-target="#Upload">
                        <span class="d-none d-md-inline-block">Upload</span>
                        <span class="d-md-none"><em class="icon ni ni-plus"></em></span>
                    </button> --}}

                    {{-- modal --}}
                    <div class="modal fade" tabindex="-1" id="Upload">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Document</h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('my-documents.upload') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label class="form-label">File Upload</label>
                                                <input type="file" class="form-control" id="file" name="file" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label class="form-label">Document Type</label>
                                                <select class="form-select js-select2" name="document_type">
                                                    <option value="placeholder">--Select Document Type--</option>
                                                    <option>Personal Data Sheet</option>
                                                    <option>Diploma/TOR</option>
                                                    <option>Physical Fitness Test</option>
                                                    <option>Trainings</option>
                                                    <option>Specialized Trainings</option>
                                                    <option>SALN</option>
                                                    <option>KSS</option>
                                                    <option>PER</option>
                                                    <option>Reassignments</option>
                                                    <option>Eligibility</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label class="form-label">Issued Date</label>
                                                <input type="date" class="form-control" id="issued_date" name="issued_date" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="personnel_id" value="{{ Auth::user()->personnel->id }}">
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary">Add Document</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        <div class="nk-fmg-listing nk-block">
            <div class="nk-files nk-files-view-group">

                <div class="nk-files-group">
                    <h6 class="title">Total Documents. ({{ $totalDocuments }})</h6>

                    <div class="nk-files-list">
                        @foreach ($documents as $document)
                        <div class="nk-file-item nk-file">
                            <div class="nk-file-info">
                                <div class="nk-file-title">
                                    <div class="nk-file-icon">
                                        <span class="nk-file-icon-type">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                <path d="M50,61H22a6,6,0,0,1-6-6V22l9-11H50a6,6,0,0,1,6,6V55A6,6,0,0,1,50,61Z" style="fill:#755de0" />
                                                <path d="M27.2223,43H44.7086s2.325-.2815.7357-1.897l-5.6034-5.4985s-1.5115-1.7913-3.3357.7933L33.56,40.4707a.6887.6887,0,0,1-1.0186.0486l-1.9-1.6393s-1.3291-1.5866-2.4758,0c-.6561.9079-2.0261,2.8489-2.0261,2.8489S25.4268,43,27.2223,43Z" style="fill:#fff" />
                                                <path d="M25,20.556A1.444,1.444,0,0,1,23.556,22H16l9-11h0Z" style="fill:#b5b3ff" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="nk-file-name">
                                        <div class="nk-file-name-text">
                                            <a href="{{ route('documents.download', ['id' => $document->id]) }}" class="title">{{ $document->file_name }}</a>

                                        </div>
                                    </div>
                                </div>
                                <ul class="nk-file-desc">
                                    <li class="date">{{ $document->document_type }}</li>
                                    <li class="size">{{ $document->issued_date->format('Y') }}</li>

                                </ul>
                            </div>
                            <div class="nk-file-actions">
                                <div class="dropdown">
                                    <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-plain no-bdr">
                                            <li>
                                                <a href="{{ route('my-documents.preview', ['id' => $document->id]) }}" target="_blank">
                                                    <em class="icon ni ni-focus"></em><span>Preview</span></a></li>
                                                </a>
                                            </li>
                                            @can('download document')
                                            <li>
                                                <a href="{{ route('my-documents.download', ['id' => $document->id]) }}"><em class="icon ni ni-download"></em><span>Download</span></a>
                                            </li>
                                            @endcan
                                            @can('delete document')
                                            <li>
                                                <a href="#" class="btn" style="border: none; padding-left: 11px; background-color: transparent;"
                                                onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this document?')) { document.getElementById('delete-form-{{ $document->id }}').submit(); }">
                                                    <em class="icon ni ni-trash"></em>
                                                    <span>Delete</span>
                                                </a>

                                                <form id="delete-form-{{ $document->id }}" method="POST" action="{{ route('my-documents.delete', ['id' => $document->id]) }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                                </form>
                                            </li>
                                            @endcan

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-file -->
                        @endforeach
                    </div>
                </div>
            </div><!-- .nk-files -->
        </div><!-- .nk-block -->
    </div><!-- .nk-fmg-body-content -->
</div>
@endsection

