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

                                        <h4 class="nk-block-title">Personal Information</h4>
                                        <div class="nk-block-des">
                                            <p>Basic info, like your name and address, that can be usefule for your personal data sheet.</p>
                                        </div>
                                    </div>

                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                    </div>
                                    <div class="nk-block-head-content align-self-start">
                                        <a href="{{ route('view.my-edit', $personnel->id) }}" class="mt-n1" data-target="userAside">
                                            <button class="btn btn bg-primary text-white">
                                                <em class="icon ni ni-edit"></em><span>Edit</span>
                                            </button>

                                        </a>
                                    </div>

                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="nk-data data-list">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <div class="data-head">
                                        <h6 class="overline-title">Basics</h6>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Full Name</span>
                                            <span class="data-value">{{ Auth::user()->name }}</span>
                                        </div>
                                    </div><!-- data-item -->

                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Email</span>
                                            <span class="data-value">{{ Auth::user()->email }}</span>
                                        </div>

                                    </div><!-- data-item -->
                                    <div class="data-item" >
                                        <div class="data-col">
                                            <span class="data-label">Phone Number</span>
                                            <span class="data-value text-soft">{{ Auth::user()->personnel->mobile_no }}</span>
                                        </div>

                                    </div><!-- data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">First Name</span>
                                            <span class="data-value">{{ Auth::user()->personnel->first_name }}</span>
                                        </div>
                                    </div><!-- data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Last Name</span>
                                            <span class="data-value">{{ Auth::user()->personnel->last_name }}</span>
                                        </div>
                                    </div><!-- data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Date of Birth</span>
                                            <span class="data-value">{{ Auth::user()->personnel->birth_date }}</span>
                                        </div>
                                    </div><!-- data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Birth Place</span>
                                            <span class="data-value">{{ Auth::user()->personnel->birth_place }}</span>
                                        </div>
                                    </div><!-- data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Gender</span>
                                            <span class="data-value">{{ Auth::user()->personnel->gender }}</span>
                                        </div>

                                    </div><!-- data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Civil Status</span>
                                            <span class="data-value">{{ Auth::user()->personnel->civil_status }}</span>
                                        </div>
                                    </div><!-- data-item -->

                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Citizenship</span>
                                            <span class="data-value">{{ Auth::user()->personnel->citizenship }}</span>
                                        </div>
                                    </div><!-- data-item -->


                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Blood Type</span>
                                            <span class="data-value">{{ Auth::user()->personnel->blood_type }}</span>
                                        </div>
                                    </div><!-- data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Height</span>
                                            <span class="data-value">{{ Auth::user()->personnel->height }}</span>
                                        </div>
                                    </div><!-- data-item -->

                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Weight</span>
                                            <span class="data-value">{{ Auth::user()->personnel->weight }}</span>
                                        </div>
                                    </div><!-- data-item -->

                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Height</span>
                                            <span class="data-value">{{ Auth::user()->personnel->height }}</span>
                                        </div>
                                    </div><!-- data-item -->
                                </div><!-- data-list -->


                                <div class="nk-data data-list">
                                    <div class="data-head">
                                        <h6 class="overline-title">ADDRESS</h6>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Current Address</span>
                                            <span class="data-value">{{ Auth::user()->personnel->current_street }},{{ Auth::user()->personnel->current_city }},{{ Auth::user()->personnel->current_province }} {{ Auth::user()->personnel->current_zip }}</span>
                                        </div>

                                    </div><!-- data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Permanent Address</span>
                                            <span class="data-value">{{ Auth::user()->personnel->home_street }},{{ Auth::user()->personnel->home_city }},{{ Auth::user()->personnel->home_province }} {{ Auth::user()->personnel->home_zip }}</span>
                                        </div>

                                    </div><!-- data-item -->
                                </div><!-- data-list -->
                            </div><!-- .nk-block -->
                        </div>
                        <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-toggle-body="true" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="card-inner-group" data-simplebar>
                                <div class="card-inner">
                                    <div class="user-card">
                                        <div class="user-avatar md{{ 'bg-' . collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info'])->random() }} d-none d-sm-flex">
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
                                            @if($personnel->status === 'Active')
                                            <span class="text-success">{{ ($personnel->status) }}</span>
                                            @elseif($personnel->status === 'Inactive')
                                            <span class="text-danger">{{ ($personnel->status) }}</span>
                                            @endif
                                        </div>

                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner p-0">
                                    <ul class="link-list-menu">
                                        @can('read')
                                            <li><a class="active" href="{{ route('view.my-info') }}"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                        @endcan
                                        @can('update')
                                            <li><a  href="{{  route('profile.edit')  }}"><em class="icon ni ni-account-setting-fill"></em><span>Update Account Details</span></a></li>
                                        @endcan
                                        <li><a  href="{{ route('view.user-documents') }}"><em class="icon ni ni-file-text-fill"></em></em><span>Documents</span></a></li>
                                        {{-- <li><a href="{{ route('view.my-family') }}"><em class="icon ni ni-home-alt"></em><span>Family Member</span>
                                        <li><a href="{{ route('view.my-education') }}"><em class="icon ni ni-reports-alt"></em><span>Education Background</span>
                                        <li><a href="{{ route('view.my-eligibility') }}"><em class="icon ni ni-note-add"></em><span>Eligibility</span>
                                        <li><a href="{{ route('view.my-experience') }}"><em class="icon ni ni-report-profit"></em><span>Work Experience</span>
                                        <li><a href="{{ route('view.my-volunteers') }}"><em class="icon ni ni-task"></em><span>Voluntary Works</span>
                                        <li><a href="{{ route('view.my-trainings') }}"><em class="icon ni ni-award"></em></em><span>Trainings</span> --}}
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

