@extends('layouts.partials.admin')

@section('page')
<div class="container-fluid">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Roles and Permissions</h3>
                    <div class="nk-block-des text-soft">
                        <p>You have total <code>roles</code>.</p>
                    </div>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                                class="icon ni ni-menu-alt-r"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                {{-- <li><a href="#" class="btn btn-primary btn-outline-light"><em class="icon ni ni-plus"></em></a></li> --}}
                                {{-- <li>
                                    <button type="button" class="btn btn-dim btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#roles">
                                        <em class="icon ni ni-plus"></em>
                                        <span>Add Role</span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="roles" tabindex="-1" aria-labelledby="addUserModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addUserModalLabel">Add Role</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{ route('roles.store') }}">
                                                        @csrf

                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Role</label>
                                                            <input type="text" class="form-control" id="name"
                                                                placeholder="Enter Role Name" name="name" required>
                                                        </div>

                                                        <button type="submit" class="btn btn-info">Save Role</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}

                            </ul>
                        </div>
                    </div><!-- .toggle-wrap -->
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div>
        <div class="card card-bordered card-preview">
            <table class="table table-tranx">
                <thead>
                    <tr class="tb-tnx-head">
                        <th>Name</th>
                        <th>Permissions</th>
                    @role('Super Admin')
                        <th class="tb-tnx-action">
                            <span>Action</span>
                        </th>
                    @endrole
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr class="tb-tnx-item">
                        <td>{{ $role->name }}</td>
                        <td>
                            @if ($role->permissions)
                                @foreach ($role->permissions as $role_permission)
                                <span class="badge badge-dim bg-outline-primary rounded-pill" >
                                    {{ $role_permission->name }}
                                </span>
                                {{-- <form id="delete-role-form-{{ $role->id }}"
                                    action="{{ route('roles.permissions.revoke', [$role->id, $role_permission->id]) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                        <span class="badge btn btn-dim btn-outline-primary rounded-pill bg-outline-info" onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-role-form-{{ $role->id }}').submit();">
                                            {{ $role_permission->name }}
                                        </span>
                                </form> --}}
                                @endforeach
                            @endif
                        </td>
                        @role('Super Admin')
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <a href="#Assign" class="btn btn-trigger btn-icon" data-bs-toggle="modal">
                                            <em class="icon ni ni-plus-fill-c text-info"></em>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#EditRoles" class="btn btn-trigger btn-icon" data-bs-toggle="modal">
                                            <em class="icon ni ni-edit text-warning"></em>
                                        </a>
                                    </li>
                                    <li>
                                        <form id="delete-role-form-{{ $role->id }}"
                                            action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete"
                                                onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-role-form-{{ $role->id }}').submit();">
                                                <em class="icon ni ni-trash-fill text-danger"></em>
                                            </a>
                                        </form>

                                    </li>
                                </ul>
                                {{-- Asign Modal --}}
                                <div class="modal fade" id="Assign" tabindex="-1" aria-labelledby="addUserModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addUserModalLabel">Assign Permission</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('roles.permissions', $role->id) }}">
                                                    @csrf
                                                    @method('POST')

                                                    <div class="form-group">
                                                        <label class="form-label">Permission</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select js-select2" name="permission" >
                                                                <option>Choose..</option>
                                                                @foreach ($permissions as $permission)
                                                                <option value="{{ $permission->name }}">
                                                                    {{ $permission->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-info">Add Permission</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Edit Modal --}}
                                <div class="modal fade" id="EditRoles" tabindex="-1" aria-labelledby="addUserModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addUserModalLabel">Edit Role</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('roles.update', $role->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Role</label>
                                                        <input type="text" class="form-control mb-2" id="name"
                                                            value="{{ $role->name }}" name="name" required>
                                                    </div>

                                                    <button type="submit" class="btn btn-info">Save Role</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        @endrole
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- .card-preview -->
    </div>
@role('Super Admin')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Permissions</h3>
                <div class="nk-block-des text-soft">
                    <p>You have total <code>permissions</code> users.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            {{-- <li><a href="#" class="btn btn-primary btn-outline-light"><em class="icon ni ni-plus"></em></a></li> --}}
                            <li>
                                <button type="button" class="btn btn-dim btn-primary" data-bs-toggle="modal" data-bs-target="#permissions">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Add Permissions</span>
                                  </button>

                                  <!-- Modal -->
                                  <div class="modal fade" id="permissions" tabindex="-1" aria-labelledby="permissions" aria-hidden="true">
                                    <div class="modal-dialog modal">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addUserModalLabel">Add Permission</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('permissions.store') }}">
                                                @csrf

                                                <div class="mb-3">
                                                <label for="name" class="form-label">Permission</label>
                                                <input type="text" class="form-control mb-2" id="name" placeholder="Enter Role Name" name="name" required>

                                                <button  type="submit" class="btn btn-info">Save</button>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div><!-- .toggle-wrap -->
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div>
    <div class="card card-bordered card-preview">
        <table class="table table-tranx">
            <thead>
                <tr class="tb-tnx-head">
                    <th>Name</th>
                    <th>Role</th>
                    <th class="tb-tnx-action">
                        <span>Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr class="tb-tnx-item">
                        <td><span class="badge rounded-pill bg-outline-info">{{ $permission->name }}</span></td>
                        <td>
                            @if ($permission->roles)
                                @foreach ($permission->roles as $permission_role)

                                <form id="delete-role-form-{{ $permission->id }}"
                                    action="{{ route('permissions.roles.remove', [$permission->id, $permission_role->id]) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                        <span class="badge btn btn-dim btn-outline-primary rounded-pill bg-outline-info" onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-role-form-{{ $permission->id }}').submit();">
                                            {{ $permission_role->name }}
                                        </span>
                                </form>
                                @endforeach
                            @endif
                        </td>
                        <td class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">
                                <li>
                                    <a href="#Assign" class="btn btn-trigger btn-icon" data-bs-toggle="modal">
                                        <em class="icon ni ni-plus-fill-c text-info"></em>
                                    </a>
                                </li>
                                <li>
                                    <a href="#EditPermission" class="btn btn-trigger btn-icon" data-bs-toggle="modal">
                                        <em class="icon ni ni-edit text-info"></em>
                                    </a>
                                </li>
                                <li>
                                    <form id="delete-role-form-{{ $permission->id }}" action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-role-form-{{ $permission->id }}').submit();">
                                          <em class="icon ni ni-trash-fill text-danger"></em>
                                        </a>
                                      </form>

                                </li>
                        </ul>
                        {{-- Asign Modal --}}
                        <div class="modal fade" id="Assign" tabindex="-1" aria-labelledby="addUserModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addUserModalLabel">Assign Role</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('permissions.roles', $permission->id) }}">
                                            @csrf
                                            @method('POST')

                                            <div class="form-group">
                                                <label class="form-label">Role</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" name="permission" >
                                                        <option>Choose..</option>
                                                        @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}">
                                                            {{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-info">Add Role</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                         {{-- Edit Modal --}}
                         <div class="modal fade" id="EditPermission" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addUserModalLabel">Edit Permission</h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                        <label for="name" class="form-label">Permission</label>
                                        <input type="text" class="form-control mb-2" id="name" value="{{ $permission->name }}" name="name" required>

                                        <button  type="submit" class="btn btn-info">Save</button>
                                    </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div><!-- .card-preview -->
</div>
@endrole

</div>
@endsection
