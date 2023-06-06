@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Personnel / <strong class="text-primary small">{{ $personnel->first_name }} {{ $personnel->last_name }}</strong></h3>
                            <div class="nk-block-des text-soft">
                                <ul class="list-inline">
                                    <li>Personnel ID: <span class="text-base">{{ $personnel->id }}</span></li>
                                    <li>Last Login: <span class="text-base">{{ $personnel->created_at }}</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="{{ route('personnel-list') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                            <a href="{{ route('personnel-list') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-content">
                                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('view.personnel.profile', ['id' => $personnel->id]) }}"><em class="icon ni ni-user-circle"></em><span>Overview</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('view.personnel.documents', ['id' => $personnel->id]) }}"><em class="icon ni ni-file-text"></em><span>Documents</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('change-password', ['id' => $personnel->id]) }}"><em class="icon ni ni-shield-star"></em><span>Change Password</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('view.personnel.account-setting', ['id' => $personnel->id]) }}"><em class="icon ni ni-setting-fill"></em><span>Account Setting</span></a>
                                    </li>
                                    {{-- <li class="nav-item nav-item-trigger d-xxl-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside"><em class="icon ni ni-user-list-fill"></em></a>
                                    </li> --}}
                                </ul><!-- .nav-tabs -->
                                <div class="card-inner">
                                    <div class="card-head">
                                        <h5 class="card-title">Account Details</h5>
                                    </div>
                                   <form action="{{ route('view.update-email', ['id' => $personnel->id]) }}" class="gy-3" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">User Email</label>
                                                    <span class="form-note">Here you can change or edit the user's email.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-lg" id="site-name" name="email" value="{{ $email }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">User Password</label>
                                                    <span class="form-note">If you want to change the user's password, click change password button</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-control-wrap">
                                                    <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                    </a>
                                                    <input type="password" class="form-control form-control-lg" id="password" value="{{ $password }}" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="row g-3 align-center">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">Allow Registration</label>
                                                    <span class="form-note">Enable or disable registration from site.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" checked name="reg-public" id="reg-enable">
                                                            <label class="custom-control-label" for="reg-enable">Enable</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="reg-public" id="reg-disable">
                                                            <label class="custom-control-label" for="reg-disable">Disable</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="reg-public" id="reg-request">
                                                            <label class="custom-control-label" for="reg-request">On Request</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> --}}

                                        <div class="row g-3">
                                            <div class="col-lg-7 offset-lg-5">
                                                <div class="form-group mt-2">
                                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- .card-content -->
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
@endsection
