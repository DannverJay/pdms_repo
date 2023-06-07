@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-block-between g-3 mb-2">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title page-title">Profile Summary</h4>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('personnel-list') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                    <a href="{{ route('personnel-list') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                </div>
            </div>
            <div class="nk-block">
                <div class="row g-gs">
                    <div class="col-lg-4 col-xl-4 col-xxl-3">
                        <div class="card">
                            <div class="card-inner-group">
                                <div class="card-inner">
                                    <div class="user-card user-card-s2">
                                        <div class="text-center">
                                            <div class="user-avatar lg text-center {{ 'bg-' . collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info'])->random() }} d-none d-sm-flex">
                                                <span>{{ strtoupper(substr($personnel->first_name, 0, 1)) }}{{ strtoupper(substr($personnel->last_name, 0, 1)) }}</span>
                                            </div>
                                        </div>
                                        <div class="user-info">
                                            <div class="badge bg-light rounded-pill ucap">{{ $personnel->ranks }}</div>
                                            <h5>{{ $personnel->first_name }}{{ $personnel->last_name }}</h5>
                                            <span class="sub-text">{{ $personnel->user->email }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner card-inner-sm">
                                    <ul class="btn-toolbar justify-center gx-1">
                                        <li><a href="{{ route('send.sms', ['mobile_no' => $personnel->mobile_no]) }}" class="btn btn-trigger btn-icon"><em class="icon ni ni-mail" data-bs-toggle="tooltip" data-bs-placement="top" title="Send SMS"></em></a></li>

                                        @if($personnel->status === 'Active')
                                        <li>
                                            <a class="btn btn-trigger btn-icon text-danger" href="{{ route('change.personnel.status', ['id' => $personnel->id, 'status' => 'Inactive']) }}">
                                                <em class="icon ni ni-reload" data-bs-toggle="tooltip" data-bs-placement="top" title="Change Status"></em>
                                            </a>
                                        </li>
                                        @elseif($personnel->status === 'Inactive')
                                        <li>
                                            <a class="btn btn-trigger btn-icon text-danger" href="{{ route('change.personnel.status', ['id' => $personnel->id, 'status' => 'Active']) }}">
                                                <em class="icon ni ni-reload" data-bs-toggle="tooltip" data-bs-placement="top" title="Change Status"></em>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="card-inner">
                                    <div class="row text-center">
                                        <div class="col-6">
                                            <div class="profile-stats">
                                                <span class="amount">{{ $totalDocuments }}</span>
                                                <span class="sub-text">Total Documents</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="profile-stats">
                                                <span class="amount">{{ $totalLatestDocuments }}</span>
                                                <span class="sub-text">For Submission</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <h6 class="overline-title-alt mb-2">Police Details</h6>
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <span class="sub-text">Personnel Account ID:</span>
                                            <span>{{ $personnel->id }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Station</span>
                                            <span>{{ $personnel->station }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Sub-Unit</span>
                                            <span>{{ $personnel->sub_unit }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Unit</span>
                                            <span>{{ $personnel->unit }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Designation</span>
                                            <span>{{ $personnel->designation }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Work Status</span>
                                            @if($personnel->status === 'Active')
                                            <span class="text-success">{{ ($personnel->status) }}</span>
                                            @elseif($personnel->status === 'Inactive')
                                            <span class="text-danger">{{ ($personnel->status) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                            </div>
                        </div>
                    </div><!-- .col -->
                    <div class="col-lg-8 col-xl-8 col-xxl-9">
                        <div class="card">
                            <div class="card-inner">
                                <div class="nk-block">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title">Basic Information <strong class="text-primary light"></strong></h5>
                                            <p>Here are the overview information of the user.</p>
                                            <div class="nk-block-des text-soft">
                                                <ul class="list-inline">
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content mb-3">
                                           <a href="{{ route('view.profile', $personnel->id) }}">View Full Info</a>
                                        </div>
                                    </div>

                                    <div class="row g-4">
                                        <div class="profile-ud-list">
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">First Name</span>
                                                    <span class="profile-ud-value">{{ $personnel->first_name }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Last Name</span>
                                                    <span class="profile-ud-value">{{ $personnel->last_name }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Date of Birth</span>
                                                    <span class="profile-ud-value">{{ $personnel->birth_date }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Gender</span>
                                                    <span class="profile-ud-value">{{ $personnel->gender }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Civil Status</span>
                                                    <span class="profile-ud-value">{{ $personnel->civil_status }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Citizenship</span>
                                                    <span class="profile-ud-value">{{ $personnel->citizenship }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Blood Type</span>
                                                    <span class="profile-ud-value">{{ $personnel->blood_type }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Height (cm)</span>
                                                    <span class="profile-ud-value">{{ $personnel->height }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Weight</span>
                                                    <span class="profile-ud-value">{{ $personnel->weight }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Mobile No.</span>
                                                    <span class="profile-ud-value">{{ $personnel->mobile_no }}</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="nk-divider divider md"></div>

                                <div class="nk-block">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title">Documents<strong class="text-primary light"></strong></h5>
                                            <p>Uploaded documents for compliance submission.</p>
                                            <div class="nk-block-des text-soft">
                                                <ul class="list-inline">
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content mb-3">
                                            <a href="{{ route('view.personnel.documents', ['id' => $personnel->id]) }}">View All Documents</a>
                                         </div>
                                    </div>
                                    <div class="row g-3">
                                        <table class="table">
                                          <thead class="table-light">
                                            <tr class="tb-odr-item">
                                              <th>Uploaded Document</th>
                                              <th class="tb-odr-action">&nbsp;</th>
                                            </tr>
                                          </thead>
                                          <tbody class="tb-odr-body">
                                            @if($latestIssuedDocuments->isEmpty())
                                            <tr class="tb-odr-item">
                                              <td colspan="2" class="text-center">No record for documents issued in year {{ $previousYear }}</td>
                                            </tr>
                                            @else
                                            @foreach($latestIssuedDocuments as $document)
                                            <tr class="tb-odr-item">
                                              <td class="tb-odr-amount">
                                                <span class="tb-odr-total">
                                                  <span class="amount">{{ $document->document_type }}</span>
                                                </span>
                                              </td>
                                              <td class="tb-odr-action">
                                                <div class="tb-odr-btns d-md-inline">
                                                  <a href="{{ route('documents.preview', ['id' => $document->id]) }}" target="_blank" class="btn btn-trigger btn-icon">
                                                    <em class="icon ni ni-focus"></em>
                                                  </a>
                                                  <a href="{{ route('documents.download', ['id' => $document->id]) }}" class="btn btn-trigger btn-icon">
                                                    <em class="icon ni ni-download"></em>
                                                  </a>
                                                </div>
                                                {{-- Uncomment the code below if you want to include a delete button --}}
                                                {{-- <form method="POST" action="{{ route('documents.delete', ['id' => $document->id]) }}" onsubmit="return confirm('Are you sure you want to delete this document?');">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-trigger btn-icon">
                                                    <em class="icon ni ni-trash"></em>
                                                  </button>
                                                </form> --}}
                                              </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                          </tbody>
                                        </table>
                                      </div><!-- .row -->

                                </div>

                            </div><!-- .card-inner -->
                        </div><!-- .card -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div>
        </div>
    </div>
</div>
@endsection
