@extends('admin.index')
@section('page')
<div class="container-fluid">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Personnel Lists</h4>
                <div class="nk-block-des">
                    <p>You have <strong class="text-danger">({{ $personnelCount }})</strong> in total.</p>
                </div>
            </div>
            <div class="nk-block-head-content mt-2">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu">
                        <em class="icon ni ni-menu-alt-r"></em>
                    </a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-bs-toggle="dropdown" aria-expanded="false">
                                        <em class="d-none d-sm-inline icon ni ni-filter-alt"></em>
                                        <span>Filtered By</span>
                                        <em class="dd-indc icon ni ni-chevron-right"></em>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="{{ route('personnel-list') }}"><span>All</span></a></li>
                                            <li><a href="{{ route('personnel.active') }}"><span>Active</span></a></li>
                                            <li><a href="{{ route('personnel.inactive') }}"><span>Inactive</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <form action="" method="get">
        @csrf
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <!-- Add a container for the buttons above the table -->
                <div id="tableButtons" class="mb-3" style="display: none;">
                    <button type="submit" id="messageAllButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Message">Message All</button>
                </div>
                {{-- modal --}}
                 <!-- Modal Form -->
                <div class="modal fade" id="Message">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Send SMS</h5>
                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <table id="personnelTable" class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            {{-- <th class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="uid">
                                    <label class="custom-control-label" for="uid"></label>
                                </div>
                            </th> --}}
                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Rank</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Station</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-end">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personnels as $personnel)
                        <tr class="nk-tb-item">
                            {{-- <td class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" name="personnel_id[]" class="custom-control-input" id="{{ $personnel->id }}">
                                    <label class="custom-control-label" for="{{ $personnel->id }}"></label>
                                </div>
                            </td> --}}
                            <td class="nk-tb-col">
                                <a href="{{ route('view.personnel.profile',['id' => $personnel->id]) }}">
                                    <div class="user-card">
                                        <div
                                            class="user-avatar {{ 'bg-' . collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info'])->random() }} d-none d-sm-flex">
                                            <span>{{ strtoupper(substr($personnel->first_name, 0, 1)) }}{{ strtoupper(substr($personnel->last_name, 0, 1)) }}</span>
                                        </div>
                                        <div class="user-info">
                                            <span class="tb-lead">{{ $personnel->first_name }}
                                                {{ $personnel->last_name }}<span
                                                    class=" ms-1"></span></span>
                                            {{-- <span>info@softnio.com</span> --}}
                                        </div>
                                    </div>
                                </a>
                            </td>
                            <td class="nk-tb-col tb-col-mb" id="user-rank">
                                <span>{{ $personnel->ranks }}</span></span>
                            </td>
                            <td class="nk-tb-col tb-col-lg">
                                <span>{{ $personnel->station }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                @if($personnel->status === 'Active')
                                <span class="text-success">{{ ($personnel->status) }}</span>
                                @elseif($personnel->status === 'Inactive')
                                <span class="text-danger">{{ ($personnel->status) }}</span>
                                @endif
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li class="nk-tb-action-hidden">
                                        <a href="{{ route('view.personnel.profile', ['id' => $personnel->id]) }}"
                                            class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="View Details">
                                            <em class="icon ni ni-eye-fill"></em>
                                        </a>
                                    </li>
                                    <li class="nk-tb-action-hidden">
                                        <a href="{{ route('send.sms', ['mobile_no' => $personnel->mobile_no]) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Send SMS">
                                            <em class="icon ni ni-comments"></em>
                                        </a>
                                    </li>
                                    <li class="nk-tb-action-hidden">
                                        <a href="{{ route('view.personnel.documents', ['id' => $personnel->id]) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Documents">
                                            <em class="icon ni ni-folder-list"></em>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    @if($personnel->status === 'Active')
                                                        <li>
                                                            <a href="{{ route('change.personnel.status', ['id' => $personnel->id, 'status' => 'Inactive']) }}">
                                                                <em class="icon ni ni-cross-circle-fill"></em>
                                                                <span>Change to Inactive</span>
                                                            </a>
                                                        </li>
                                                    @elseif($personnel->status === 'Inactive')
                                                        <li>
                                                            <a href="{{ route('change.personnel.status', ['id' => $personnel->id, 'status' => 'Active']) }}">
                                                                <em class="icon ni ni-check-circle-fill"></em>
                                                                <span>Change to Active</span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                    <li>
                                                        <a href="{{ route('view.personnel.profile',['id' => $personnel->id]) }}">
                                                            <em class="icon ni ni-eye"></em>
                                                            <span>Overview</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('edit.personnel', $personnel->id) }}">
                                                            <em class="icon ni ni-edit"></em>
                                                            <span>Update Details</span>
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="{{ route('view.personnel.documents', ['id' => $personnel->id]) }}">
                                                            <em class="icon ni ni-folder-list"></em>
                                                            <span>Documents</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('send.sms', ['mobile_no' => $personnel->mobile_no]) }}">
                                                            <em class="icon ni ni-comments"></em>
                                                            <span>Send SMS</span>
                                                        </a>
                                                    </li>
                                                   
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
    </form>

    </div> <!-- nk-block -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    // Function to check if the messageAll button should be shown
    function checkMessageAllButton() {
        var checkedCount = $('input.custom-control-input:checked').not('#checkAll').length;
        if (checkedCount >= 2) {
            $('#tableButtons').show();
        } else {
            $('#tableButtons').hide();
        }
    }

    // Event handler for checkbox clicks
    $('input.custom-control-input').on('click', function() {
        checkMessageAllButton();
    });

    // Event handler for checkAll checkbox
    $('#checkAll').on('click', function() {
        var isChecked = $(this).prop('checked');
        $('input.custom-control-input').prop('checked', isChecked);
        checkMessageAllButton();
    });

    // Trigger checkAll checkbox when any individual checkbox is clicked
    $('input.custom-control-input').not('#checkAll').on('click', function() {
        var isAllChecked = $('input.custom-control-input:checked').not('#checkAll').length === $('input.custom-control-input').not('#checkAll').length;
        $('#checkAll').prop('checked', isAllChecked);
    });
});

</script>
@endsection




