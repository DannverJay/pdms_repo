@php
$uploadedDocumentsCount = count($documents);
@endphp

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
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Upload" @if($uploadedDocumentsCount >= 10) disabled onclick="alert('Already uploaded all required documents.');" @endif>
                                        Upload
                                    </button>

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
                                                                <input type="file" class="form-control" id="file" name="file" accept=".pdf, .jpeg, .jpg, .png" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label" for="privacy_check">{{ __('Privacy Policy Notice') }}</label>
                                                            </div>
                                                            <div class="form-control-wrap">
                                                                <label for="privacy_check" class="form-checkbox">
                                                                    <input type="checkbox" class="custom-checkbox" id="privacy_check" name="privacy_check" required>
                                                                    <span class="check-indicator"></span>
                                                                    <span class="checkbox-text">{{ __('I agree') }}</span>
                                                                    <br>
                                                                    <span>By clicking "I Agree," I voluntarily give my consent to <a href="#Privacy" data-bs-toggle="modal">Prviacy Policy</a> of PDMS</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <button type="submit" class="btn btn-primary" onclick="return validateFileType()">Add Document</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Data Privacy Modal --}}
                                     <div class="modal fade" tabindex="-1" id="Privacy">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <em class="icon ni ni-cross"></em>
                                                </a>
                                                <div class="modal-header">
                                                    <h5 class="modal-title">PDMS Privacy Policy</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <span>At PDMS, we are committed to protecting the privacy and security of your personal information. This Data Privacy Policy explains how we collect, use, and safeguard the data you provide when uploading documents to our Personnel Document Management System (PDMS) in accordance with the Philippine Data Privacy Act of 2012 (Republic Act No. 10173).
                                                        Please read this policy carefully to understand our practices regarding your personal data.</span>
                                                    <br>
                                                    <br>
                                                    <p><strong>1. Information We Collect:</strong>
                                                        <br>
                                                        When you use the PDMS and upload documents, we may collect the following types of information:
                                                        <ul>
                                                            <li>Personal identification information (e.g., name, address, contact details)</li>
                                                            <li>Document details (e.g., file name, date, document type)</li>
                                                        </ul>
                                                    </p>


                                                    <br>
                                                    <p><strong>2. Use of Collected Information:</strong>
                                                        <br>
                                                        We may use the information we collect from you for the following purposes:
                                                        <ul>
                                                            <li>To facilitate the uploading, storage, and retrieval of documents within the PDMS, ensuring compliance with lawful and legitimate processing purposes.</li>
                                                            <li>To provide you with customer support and respond to your inquiries.</li>
                                                            <li>To comply with legal obligations and regulatory requirements imposed by the Philippine Data Privacy Act of 2012.</li>
                                                        </ul>
                                                    </p>


                                                    <br>
                                                    <p><strong>3. Data Security:</strong>
                                                        <br>
                                                        We prioritize the security of your data and have implemented appropriate technical and organizational measures to protect it against unauthorized access, disclosure, alteration, or destruction, as required by the Philippine Data Privacy Act of 2012. However, please note that no method of transmission over the internet or electronic storage is completely secure, and we cannot guarantee absolute security.
                                                    </p>


                                                    <br>
                                                    <p><strong>4. Data Sharing and Disclosure:</strong>
                                                        <br>
                                                        We may share your personal information in the following circumstances:
                                                        <ul>
                                                            <li>When required by law, regulation, or legal process to disclose the information, in compliance with the provisions of the Philippine Data Privacy Act of 2012.</li>
                                                            <li>With trusted third-party service providers who assist us in operating the PDMS and providing services to you (subject to appropriate data protection agreements and compliance with the Philippine Data Privacy Act of 2012).</li>
                                                        </ul>
                                                    </p>

                                                    <br>
                                                    <p><strong>5. Data Retention:</strong>
                                                        <br>
                                                        We will retain your personal information for as long as necessary to fulfill the purposes outlined in this policy unless a longer retention period is required or permitted by law. Afterward, we will securely dispose of or anonymize your personal information in compliance with the provisions of the Philippine Data Privacy Act of 2012.
                                                    </p>

                                                    <br>
                                                    <p><strong>6. Your Rights:</strong>
                                                        <br>
                                                        You have certain rights regarding your personal data, including:
                                                        <ul>
                                                            <li>The right to access, correct, or update your personal information in accordance with the provisions of the Philippine Data Privacy Act of 2012.</li>
                                                            <li>The right to request the deletion of your personal information (subject to legal obligations) in accordance with the provisions of the Philippine Data Privacy Act of 2012.</li>
                                                            <li>The right to restrict or object to the processing of your personal information in accordance with the provisions of the Philippine Data Privacy Act of 2012.</li>
                                                            <li>The right to data portability (where applicable) in accordance with the provisions of the Philippine Data Privacy Act of 2012.</li>
                                                        </ul>
                                                    </p>


                                                    <br>
                                                    <p><strong>7. Updates to this Policy:</strong>
                                                        <br>
                                                        We reserve the right to update or modify this Data Privacy Policy from time to time to reflect changes in our practices or legal obligations. The revised policy will be effective when posted, and we encourage you to review it periodically.
                                                    </p>

                                                    <br>
                                                    <p>
                                                        By using the PDMS and uploading documents, you acknowledge that you have read and understood this Data Privacy Policy and consent to the collection, use, and processing of your personal information in accordance with this policy and the provisions of the Philippine Data Privacy Act of 2012.
                                                    </p>
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
                                                                @can('read')
                                                                    <li>
                                                                        <a href="{{ route('my-documents.preview', ['id' => $document->id]) }}" target="_blank">
                                                                            <em class="icon ni ni-focus"></em><span>Preview</span></a></li>
                                                                        </a>
                                                                    </li>
                                                                @endcan

                                                                <li>
                                                                    <a href="{{ route('my-documents.download', ['id' => $document->id]) }}"><em class="icon ni ni-download"></em><span>Download</span></a>
                                                                </li>
                                                                @can('delete')
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
                                            @if(Auth::user()->personnel->status === 'Active')
                                            <span class="text-success">{{ Auth::user()->personnel->status }}</span>
                                            @elseif($personnel->status === 'Inactive')
                                            <span class="text-danger">{{ Auth::user()->personnel->status }}</span>
                                            @endif
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var privacyCheck = document.getElementById('privacy_check');
        var uploadButton = document.getElementById('uploadButton');

        // Function to enable or disable the upload button based on the checkbox state
        function toggleUploadButton() {
            uploadButton.disabled = !privacyCheck.checked;
        }

        // Add event listener to the checkbox
        privacyCheck.addEventListener('change', toggleUploadButton);

        // Call the function initially to set the initial state of the upload button
        toggleUploadButton();
    });
</script>
<script>
    function validateFileType() {
        var fileInput = document.getElementById('file');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.pdf|\.jpeg|\.jpg|\.png)$/i;

        if (!allowedExtensions.exec(filePath)) {
            alert('Invalid file type. Only PDF, JPEG, JPG, and PNG files are allowed.');
            fileInput.value = '';
            return false;
        }
        return true;
    }
</script>
@endsection
