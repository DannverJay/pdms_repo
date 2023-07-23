@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between g-3">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Personnel / <strong
                            class="text-primary small">{{ $personnel->first_name }}
                            {{ $personnel->last_name }}</strong></h3>
                    <div class="nk-block-des text-soft">
                        <ul class="list-inline">
                            <li>Personnel ID: <span class="text-base">{{ $personnel->id }}</span></li>
                            <li>Created Date <span class="text-base">{{ $personnel->created_at }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('personnel-list') }}"
                        class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                            class="icon ni ni-arrow-left"></em><span>Back</span></a>
                    <a href="{{ route('personnel-list') }}"
                        class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                            class="icon ni ni-arrow-left"></em></a>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card card-bordered">
                <div class="card-aside-wrap">
                    <div class="card-content">
                        <div class="card-inner">
                            <div class="nk-block nk-block-lg">
                                <div class="nk-block-head d-flex">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Document List</h4>
                                        <div class="nk-block-des">
                                            <p>The total documents of <span class="fw-bold">{{ $personnel->first_name }}</span> is <strong class="text-danger">{{ $totalDocuments }}</strong></p>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content ms-auto">
                                        <button class="btn btn-primary btn-sm d-block d-md-inline-block"
                                            data-bs-toggle="modal" data-bs-target="#Upload">
                                            <span class="d-none d-md-inline-block">Upload</span>
                                            <span class="d-md-none"><em class="icon ni ni-plus"></em></span>
                                        </button>
                                        {{-- <a href="{{ route('view.personnel.account-setting', ['id' => $personnel->id]) }}" class="btn btn-sm btn-white btn-dim btn-outline-light" aria-expanded="false">
                                            <em class="d-none d-sm-inline icon ni ni-filter-alt"></em>
                                            <span>Latest</span>
                                        </a> --}}
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
                                                  <form method="POST" action="{{ route('documents.upload', ['personnelId' => $personnel->id]) }}" enctype="multipart/form-data">
                                                    @csrf

                                                    <input type="hidden" name="personnel_id" value="{{ $personnel->id }}">

                                                    <div class="form-group">
                                                      <label class="form-label">File Upload</label>
                                                      <input type="file" class="form-control" name="file" accept=".pdf, .jpeg, .jpg, .png" required>
                                                      <code>pdf, jpeg, jpg, png (Max file size: 2048KB)</code>
                                                    </div>

                                                    <div class="form-group">
                                                      <label class="form-label">Document Type</label>
                                                      <select class="form-select" name="document_type" required>
                                                        <option>-- Select Document Type --</option>
                                                        <option value="Personal Data Sheet">Personal Data Sheet</option>
                                                        <option value="Diploma/TOR">Diploma/TOR</option>
                                                        <option value="Physical Fitness Test">Physical Fitness Test</option>
                                                        <option value="Trainings">Trainings</option>
                                                        <option value="Specialized Trainings">Specialized Trainings</option>
                                                        <option value="SALN">SALN</option>
                                                        <option value="KSS">KSS</option>
                                                        <option value="PER">PER</option>
                                                        <option value="Reassignments">Reassignments</option>
                                                        <option value="Eligibility">Eligibility</option>
                                                        <!-- Add more options as needed -->
                                                      </select>
                                                    </div>

                                                    <div class="form-group">
                                                      <label class="form-label">Issued Date</label>
                                                      <input type="date" class="form-control" name="issued_date" required>
                                                    </div>

                                                    <div class="form-group">
                                                      <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Add Document</button>
                                                    </div>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card card-bordered card-preview">
                                    <div class="card-inner">
                                      @if(session('success'))
                                      <div class="alert alert-success">
                                        {{ session('success') }}
                                      </div>
                                      @endif
                                      <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                        <thead>
                                          <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">File Name</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Document Type</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Issued Year</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Upload Date</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($documents as $document)
                                          <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                              <span>
                                                <a href="{{ route('documents.download', ['id' => $document->id]) }}">
                                                  <div class="user-card">
                                                    <div class="user-avatar sq {{ 'bg-' . collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info'])->random() }} d-none d-sm-flex">
                                                      <em class="icon ni ni-file-img"></em>
                                                    </div>
                                                    <div class="user-info">
                                                      <span class="tb-lead">
                                                        <span class="ms-1">
                                                          {{ $document->file_name }}
                                                        </span>
                                                      </span>
                                                    </div>
                                                  </div>
                                                </a>
                                              </span>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb">
                                              <span>{{ $document->document_type }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                              <span>{{ $document->issued_date->format('Y') }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                              <span>{{ $document->updated_at->format('M d, Y') }}</span>
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                              <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
                                                  <em class="icon ni ni-more-h"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                  <ul class="link-list-opt no-bdr">
                                                    <li>
                                                    
                                                            <a href="#edit" data-bs-toggle="modal">
                                                                <em class="icon ni ni-edit"></em><span>Edit</span>
                                                            </a>

                                                    </li>
                                                    <li>
                                                      <a href="{{ route('documents.preview', ['id' => $document->id]) }}" target="_blank">
                                                        <em class="icon ni ni-focus"></em><span>Preview</span>
                                                      </a>
                                                    </li>
                                                    <li>
                                                      <a href="{{ route('documents.download', ['id' => $document->id]) }}">
                                                        <em class="icon ni ni-download"></em><span>Download</span>
                                                      </a>
                                                    </li>
                                                    <li>
                                                      <a href="#" class="btn" style="border: none; padding-left: 11px; background-color: transparent;"
                                                        onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this document?')) { document.getElementById('delete-form-{{ $document->id }}').submit(); }">
                                                        <em class="icon ni ni-trash"></em><span>Delete</span>
                                                      </a>
                                                      <form id="delete-form-{{ $document->id }}" method="POST" action="{{ route('documents.delete', ['id' => $document->id]) }}" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                      </form>
                                                    </li>
                                                  </ul>
                                                </div>
                                              </div>
                                            </td>
                                          </tr><!-- .nk-tb-item -->
                                          @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                </div><!-- .card-preview -->
                                @if ($showModal)
                                    <div class="modal fade" tabindex="-1" id="edit">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <em class="icon ni ni-cross"></em>
                                            </a>
                                            <div class="modal-header">
                                            <h5 class="modal-title">Edit Document</h5>
                                            </div>
                                            <div class="modal-body">
                                            <form method="POST" action="{{ route('documents.edit', ['id' => $document->id]) }}">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group">
                                                <label class="form-label">File Name</label>
                                                <input type="text" class="form-control" name="file_name" value="{{ $document->file_name }}" required>
                                                </div>

                                                <div class="form-group">
                                                <label class="form-label">Document Type</label>
                                                <select class="form-select" name="document_type" required>
                                                    <option value="">-- Select Document Type --</option>
                                                    <option value="Personal Data Sheet"{{ $document->document_type === 'Personal Data Sheet' ? ' selected' : '' }}>Personal Data Sheet</option>
                                                    <option value="Diploma/TOR"{{ $document->document_type === 'Diploma/TOR' ? ' selected' : '' }}>Diploma/TOR</option>
                                                    <option value="Physical Fitness Test"{{ $document->document_type === 'Physical Fitness Test' ? ' selected' : '' }}>Physical Fitness Test</option>
                                                    <option value="Trainings"{{ $document->document_type === 'Trainings' ? ' selected' : '' }}>Trainings</option>
                                                    <option value="Specialized Trainings"{{ $document->document_type === 'Specialized Trainings' ? ' selected' : '' }}>Specialized Trainings</option>
                                                    <option value="SALN"{{ $document->document_type === 'SALN' ? ' selected' : '' }}>SALN</option>
                                                    <option value="KSS"{{ $document->document_type === 'KSS' ? ' selected' : '' }}>KSS</option>
                                                    <option value="PER"{{ $document->document_type === 'PER' ? ' selected' : '' }}>PER</option>
                                                    <option value="Reassignments"{{ $document->document_type === 'Reassignments' ? ' selected' : '' }}>Reassignments</option>
                                                    <option value="Eligibility"{{ $document->document_type === 'Eligibility' ? ' selected' : '' }}>Eligibility</option>
                                                    <!-- Add more options as needed -->
                                                </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Issued Date</label>
                                                    <input type="date" class="form-control" name="issued_date" value="{{ $document->issued_date->format('Y-m-d') }}" required>
                                                </div>

                                                <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Update Document</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div><!-- .card-inner -->
            </div><!-- .card-content -->
        </div><!-- .card-aside-wrap -->
    </div>
</div>
<script>
    // Listen for changes in the file input
    const fileInput = document.querySelector('input[name="file"]');
    fileInput.addEventListener('change', function() {
      const allowedExtensions = ['.pdf', '.jpeg', '.jpg', '.png'];
      const fileName = fileInput.value;
      const fileExtension = fileName.substring(fileName.lastIndexOf('.')).toLowerCase();
      const submitBtn = document.getElementById('submitBtn');

      if (allowedExtensions.includes(fileExtension)) {
        submitBtn.disabled = false; // Enable the submit button
      } else {
        submitBtn.disabled = true; // Disable the submit button
        alert('Invalid file type. Please choose a file with one of the following extensions: pdf, jpeg, jpg, png');
      }
    });
  </script>

@endsection
