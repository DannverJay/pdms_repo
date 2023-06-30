@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">User / <strong class="text-primary small">{{ $user->name }}</strong></h3>
                            <div class="nk-block-des text-soft">
                                <ul class="list-inline">
                                    <li>User ID: <span class="text-base">{{ $user->id }}</span></li>
                                    <li>Account Created: <span class="text-base">{{ $user->created_at }}</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="{{ route('user.lists') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                            <a href="{{ route('user.lists') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                            <a href="{{ route('users.show', $user) }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><span>View Profile</span></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-content">

                                <div class="card-inner">
                                    <div class="card-head">
                                        <h5 class="card-title">Edit User Account Details</h5>
                                    </div>
                                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row g-3 align-center ">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Name</label>
                                                    <span class="form-note">Here you can change or edit the user's name.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">

                                                        <input type="text" name="name" id="name" class="form-control form-control-lg" value="{{ $user->name }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-3 align-center mt-2">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <span class="form-note">Here you can change or edit the user's email.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="email" name="email" id="email" class="form-control form-control-lg" value="{{ $user->email }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-3 align-center mt-2">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">Password</label>
                                                    <span class="form-note">You can change the user's password.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-control-wrap">
                                                    <input type="password" name="password" id="password" class="form-control form-control-lg">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-3 align-center mt-2">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">Role</label>
                                                    <span class="form-note">If you want to change the user's role</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group-wrap">
                                                    <select name="role" id="role" class="form-control form-control-lg" required>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @php
                                                        $adminCount = $roles->where('name', 'admin')->first()->users->count();
                                                    @endphp
                                                    <div class="alert alert-warning mt-3" role="alert" id="admin-alert" style="display: {{ $user->hasRole('admin') && $adminCount === 1 ? 'block' : 'none' }}">
                                                        You are the only admin user. Changing the role is not allowed.
                                                    </div>

                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            var roleSelect = document.querySelector('#role');
                                                            var adminAlert = document.querySelector('#admin-alert');
                                                            var adminCount = {{ $adminCount }};

                                                            function handleRoleChange() {
                                                                if (roleSelect.value === 'admin' && adminCount === 1) {
                                                                    adminAlert.style.display = 'block';
                                                                    roleSelect.disabled = true;
                                                                } else {
                                                                    adminAlert.style.display = 'none';
                                                                    roleSelect.disabled = false;
                                                                }
                                                            }

                                                            roleSelect.addEventListener('change', handleRoleChange);
                                                            handleRoleChange();
                                                        });
                                                    </script>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="justify-end mt-2">
                                            <button type="submit" class="btn btn-primary">{{ __('Update User') }}</button>
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
