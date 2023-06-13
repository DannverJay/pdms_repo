@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block">
                <div class="card card-bordered">
                    <div class="card-aside-wrap">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head nk-block-head-lg">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">My Documents</h4>
                                        <div class="nk-block-des">
                                            <p>The documents listed here are the latest documents that need to be
                                                submitted for compliance.</p>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                            data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                    </div>
                                    <div class="nk-block-head-content align-self-start">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Upload">Upload</button>
                                    </div>
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
                                                                <label class="form-label">Document Type</label>
                                                                <select class="form-select js-select2" name="document_type" required>
                                                                    <option value="placeholder">--Select Document Type--</option>
                                                                    @foreach($documentTypes as $documentType)
                                                                        @if(!in_array($documentType, $uploadedDocumentTypes))
                                                                            <option value="{{ $documentType }}">{{ $documentType }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <label class="form-label">File Upload</label>
                                                                <input type="file" class="form-control" id="file" name="file" required>
                                                            </div>
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
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="card card-bordered card-preview">
                                    @if($documents->isEmpty())
                                    <p>No documents found.</p>
                                    @else
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <table class="table table-tranx">
                                        <thead>
                                            <tr class="tb-tnx-head">
                                                <th>File Name</th>
                                                <th>Document Type</th>
                                                <th>Issued Date</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($documents as $document)
                                            <tr class="tb-tnx-item">
                                                <td>{{ $document->file_name }}</td>
                                                <td>{{ $document->document_type }}</td>
                                                <td>{{ $document->issued_date->format('Y') }}</td>
                                                <td class="tb-tnx-action">
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li>
                                                                    <a href="{{ route('my-documents.preview', ['id' => $document->id]) }}" target="_blank">
                                                                        <em class="icon ni ni-focus"></em><span>Preview</span></a></li>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ route('my-documents.download', ['id' => $document->id]) }}"><em class="icon ni ni-download"></em><span>Download</span></a>
                                                                </li>
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
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    @endif
                                </div>
                            </div><!-- .nk-block -->
                        </div>
                        <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
                            data-toggle-body="true" data-content="userAside" data-toggle-screen="lg"
                            data-toggle-overlay="true">
                            <div class="card-inner-group" data-simplebar>
                                <div class="card-inner">
                                    <div class="user-card">
                                        <div
                                            class="user-avatar md{{ 'bg-' . collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info'])->random() }} d-none d-sm-flex">
                                            <span>{{ strtoupper(substr(Auth::user()->personnel->first_name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->personnel->last_name, 0, 1)) }}</span>
                                        </div>
                                        <div class="user-info">
                                            <h5>{{ Auth::user()->name }}</h5>
                                            <h6 class="fw-normal text-gray">{{ Auth::user()->email }}</h6>
                                        </div>
                                    </div><!-- .user-card -->
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <h5 class="overline-title-alt mb-2"><strong>Police Details</strong></h5>
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <span class="sub-text">Account ID:</span>
                                            <span>{{ Auth::user()->personnel->id }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Station</span>
                                            <span>{{ Auth::user()->personnel->station }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Sub-Unit</span>
                                            <span>{{ Auth::user()->personnel->sub_unit }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Unit</span>
                                            <span>{{ Auth::user()->personnel->unit }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Designation</span>
                                            <span>{{ Auth::user()->personnel->designation }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Work Status</span>
                                            <span class="lead-text text-success">{{ Auth::user()->personnel->status }} /
                                                On Duty</span>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner p-0">
                                    <ul class="link-list-menu">
                                        <li><a href="{{ route('view.my-info') }}"><em
                                                    class="icon ni ni-user-fill-c"></em><span>Personal
                                                    Infomation</span></a></li>
                                        <li><a href="{{  route('profile.edit')  }}"><em
                                                    class="icon ni ni-account-setting-fill"></em><span>Update Account
                                                    Details</span></a></li>
                                        <li><a class="active" href="{{ route('view.my-info') }}"><em
                                                    class="icon ni ni-file-text-fill"></em></em><span>Documents</span></a>
                                        </li>
                                        {{-- <li><a href="{{ route('view.my-family') }}"><em
                                            class="icon ni ni-home-alt"></em><span>Family Member</span>
                                        <li><a href="{{ route('view.my-education') }}"><em
                                                    class="icon ni ni-reports-alt"></em><span>Education
                                                    Background</span>
                                        <li><a href="{{ route('view.my-eligibility') }}"><em
                                                    class="icon ni ni-note-add"></em><span>Eligibility</span>
                                        <li><a href="{{ route('view.my-experience') }}"><em
                                                    class="icon ni ni-report-profit"></em><span>Work Experience</span>
                                        <li><a href="{{ route('view.my-volunteers') }}"><em
                                                    class="icon ni ni-task"></em><span>Voluntary Works</span>
                                        <li><a href="{{ route('view.my-trainings') }}"><em
                                                    class="icon ni ni-award"></em></em><span>Trainings</span> --}}
                                    </ul>
                                </div><!-- .card-inner -->
                            </div><!-- .card-inner-group -->
                        </div><!-- card-aside -->
                    </div><!-- .card-aside-wrap -->
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
@endsection
