@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Archive Lists</h3>
                    <div class="nk-block-des text-soft">
                        <p>You have total <code>{{ $userCount }}</code> archive users.</p>
                    </div>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>

                    </div><!-- .toggle-wrap -->
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div>
        <div class="card card-bordered card-preview">
            <div class="card-inner">
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
                <table id="userTable" class="datatable-init-export nowrap table" data-export-title="Export" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col"><span class="sub-text">User</span></th>
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Email</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Role</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Archived Date</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Deletion Date</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($softDeletedUsers as $user)
                            <tr class="nk-tb-item">

                                <td class="nk-tb-col">

                                    <div class="user-card">
                                        <div class="user-avatar {{ 'bg-' . collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info'])->random() }} d-none d-sm-flex">
                                            <span>{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                        </div>
                                        <div class="user-info">
                                            <span class="tb-lead">{{ $user->name }}<span class="dot dot-success d-md-none ms-1"></span></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="nk-tb-col tb-col-mb">
                                    <span>{{ $user->email }}</span>
                                </td>
                                <td class="nk-tb-col tb-col-lg">
                                    <span class="badge
                                        @foreach ($user->roles as $role)
                                            @if ($role->name == 'admin')
                                                badge-dot text-info
                                            @else
                                                badge-dot text-primary
                                            @endif
                                        @endforeach
                                    ">
                                        @foreach ($user->roles as $role)
                                            {{ $role->name }}
                                            @unless ($loop->last)
                                                ,
                                            @endunless
                                        @endforeach
                                    </span>
                                </td>

                                <td class="nk-tb-col tb-col-lg">
                                    <span>{{ $user->deleted_at->format('M d, Y') }}</span>
                                </td>
                                <td class="nk-tb-col tb-col-lg">
                                    @if ($user->expires_at)
                                        <span>{{ $user->expires_at->format('M d, Y') }}</span>
                                    @else
                                        <span>{{ $user->deleted_at->addYear()->format('M d, Y') }}</span>
                                    @endif
                                </td>
                                <td class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="{{ route('users.restore', $user->id) }}"><span>Restore User</span></a></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                            </tr><!-- .nk-tb-item  -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- .card-preview -->
    </div>
</div>
<!-- @@ Profile Add Modal @e -->


@endsection
