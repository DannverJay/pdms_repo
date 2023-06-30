@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Users Lists</h3>
                    <div class="nk-block-des text-soft">
                        <p>You have total <code>{{ $userCount }}</code> users.</p>
                    </div>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                {{-- <li><a href="#" class="btn btn-primary btn-outline-light"><em class="icon ni ni-plus"></em></a></li> --}}
                                {{-- <li>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profile-add">
                                        <em class="icon ni ni-plus"></em>
                                        <span>Add User</span>
                                      </button>
                                </li> --}}
                            </ul>
                        </div>
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
                <table id="userTable" class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col"><span class="sub-text">User</span></th>
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Email</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Role</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Deleted At</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Days Left</span></th>
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
                                    <span>{{ $user->deleted_at }}</span>
                                </td>
                                <td class="nk-tb-col tb-col-lg">
                                    <span>{{ $user->deleted_at->diffInDays(now()->addYear()) }}</span>
                                </td>
                                <td class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="{{ route('users.restore', $user->id) }}"><span>Restore User</span></a></li>
                                                        {{-- <li>
                                                            <a  onclick="event.preventDefault(); if(confirm('Are you sure you want to archive this user?')) { document.getElementById('delete-form-{{ $user->id }}').submit(); }">
                                                                <span>Archive User</span>
                                                            </a>
                                                            <form id="delete-form-{{ $user->id }}" action="{{ route('users.delete', ['id' => $user->id]) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </li> --}}
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
{{-- <div class="modal fade" role="dialog" id="profile-add">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
        <div class="modal-body modal-body-lg">
          <h5 class="title">Create New User</h5>
          <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control" required>
              <small class="form-text text-muted">Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter.</small>
            </div>

            <div class="form-group">
              <label for="role">Role</label>
              <select name="role" id="role" class="form-control" required>
                <option value="">Select a role</option>
                @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Create User</button>
          </form>
        </div><!-- .modal-body -->
      </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal --> --}}

  <script>
    // Add password validation
    document.getElementById("password").addEventListener("input", function() {
      var password = this.value;
      var hasUpperCase = /[A-Z]/.test(password);
      var hasLowerCase = /[a-z]/.test(password);

      if (!hasUpperCase || !hasLowerCase) {
        this.setCustomValidity("Password must contain at least one uppercase letter and one lowercase letter.");
      } else {
        this.setCustomValidity("");
      }
    });
  </script>

<script>
    $(document).ready(function() {
      $('#userTable').DataTable({
        "order": [[ 3, "desc" ]] // Sort by the 4th column (created_at) in descending order
      });
    });
  </script>

@endsection
