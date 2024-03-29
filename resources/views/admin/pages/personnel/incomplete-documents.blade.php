@extends('admin.index')
@section('page')
<div class="container-fluid">
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Personnel w/ Incomplete Documents</h4>
                <div class="nk-block-des">
                    <p>There are total <strong class="text-danger">({{ $incompletePersonnelCount }})</strong> personnel with incomplete documents.</p>
                </div>
            </div>
            <div class="nk-block-head-content mt-2">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu">
                        <em class="icon ni ni-menu-alt-r"></em>
                    </a>
                </div>
            </div>
        </div>
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="datatable-init-export nowrap table" data-export-title="Export">
                    <thead>
                        <tr>
                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Uploaded Document</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Issued Date</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($incompletePersonnel as $personnel)
                        <tr class="nk-tb-item">
                            {{-- <td class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="{{ $personnel->id }}">
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
                                <span>{{ $personnel->documents_count }}</span>
                                <span>out</span>
                                <span>{{ count($requiredDocumentTypes) }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-lg">
                                <span>{{ $previousYear }}</span>
                            </td>

                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <a href="{{ route('send.sms', ['mobile_no' => $personnel->mobile_no]) }}"
                                                            class="dropdown-toggle"><em class="icon ni ni-comments"></em>
                                                            <span>Send SMS</span></a>
                                    </li>
                                </ul>
                            </td>
                        </tr><!-- .nk-tb-item  -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // When any checkbox is clicked
        $('input[type="checkbox"]').on('change', function() {
            // Get the number of checked checkboxes
            var checkedCount = $('input[type="checkbox"]:checked').length;

            // Show or hide the buttons based on the checked count
            if (checkedCount >= 2) {
                $('#tableButtons').show();
            } else {
                $('#tableButtons').hide();
            }

            // Update the mobile numbers in the input field
            updateMobileNumbers();
        });

        // When the table head checkbox is clicked
        $('#uid').on('change', function() {
            // Get the state of the table head checkbox
            var isChecked = $(this).prop('checked');

            // Set the state of all checkboxes in the table body to match
            $('#personnelTable tbody').find('input[type="checkbox"]').prop('checked', isChecked);

            // Show or hide the buttons based on the checkbox state
            if (isChecked) {
                $('#tableButtons').show();
            } else {
                $('#tableButtons').hide();
            }

            // Update the mobile numbers in the input field
            updateMobileNumbers();
        });

        // When the "Message All" button is clicked
        $('#messageAllButton').on('click', function(e) {
            e.preventDefault();

            // Get the selected mobile numbers
            var mobileNumbers = [];

            // Iterate over the checked checkboxes
            $('input[type="checkbox"]:checked').each(function() {
                var mobileNo = $(this).closest('tr').data('mobile-no');

                if (mobileNo) {
                    mobileNumbers.push(mobileNo);
                }
            });

            // Redirect to the send SMS route with mobile numbers as query parameter
            var sendSmsUrl = "{{ route('send.sms') }}?mobile_no=" + encodeURIComponent(mobileNumbers.join(','));
            window.location.href = sendSmsUrl;
        });

        // Function to update the mobile numbers in the input field
        function updateMobileNumbers() {
            var mobileNumbers = [];

            // Iterate over the checked checkboxes
            $('input[type="checkbox"]:checked').each(function() {
                var mobileNo = $(this).closest('tr').data('mobile-no');

                if (mobileNo) {
                    mobileNumbers.push(mobileNo);
                }
            });

            // Update the input field value with the comma-separated mobile numbers
            $('#mobileNoInput').val(mobileNumbers.join(', '));
        }
    });
</script>
@endsection
