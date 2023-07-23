@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Activity Logs</h3>

                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>

                    </div><!-- .toggle-wrap -->
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div>
        <div class="card card-bordered card-preview">
            <table class="table table-ulogs">
                <thead class="table-light">
                    <tr>

                        <th>User Log</th>
                        <th>Activity</th>
                        <th>Log Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr>

                            <td>{{ $log->log_name }}</td>
                            <td>{{ $log->description }}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $log->created_at)->setTimezone('Asia/Manila')->format('F d, Y h:i A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- .card-preview -->
    </div>
</div>


@endsection
