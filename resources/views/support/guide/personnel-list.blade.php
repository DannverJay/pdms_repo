@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between flex-wrap g-1 align-start">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title">Admin Guide</h5>

                </div>

            </div>
        </div>
        <div class="nk-block">
            <div class="row g-5">
                <div class="col-xl-12">
                    <div class="card card-bordered">
                        <div class="card-inner card-inner-lg">

                            <div class="entry">
                                <div class="nk-cov-feature-group">
                                    <h4 class="title text-primary">Personnel List</h4>
                                    <p>In this guide, you will be able to know how to navigate personnel list.</p>
                                    <div class="nk-cov-feature">

                                        <div class="content">
                                            <h5 class="title"></h5>
                                            <p>In the personnel list, you can see the total personnel and a filter by which includes filter by all, inactive and active personnel.</p>
                                            <p>In the table you can also search for any personnel you want and also on the right side have show filter which you can choose to show 10 list or more.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/personnel-filter.png') }}" alt="personnel-list-filter.png">
                                        </div>

                                        <div class="content mt-5">
                                            <h5 class="title"><span class="text-primary">#</span>View Actions</h5>
                                            <p>In the list there is a triple dot which is an action column. When you click the action, there will be a dropdown that shows actions you can do to the specific personnel.</p>
                                            <h5 class="title"><span class="text-primary">#</span>Change Status</h5>
                                            <p>In the dropdown you can see the change to status action where if the personnel has active status but you want to change to inactive you can click the action.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/personnel-list-dropdown.png') }}" alt="personnel-list-filter.png">
                                        </div>

                                    </div>
                                    <div class="nk-cov-feature">

                                        <div class="content mt-5">
                                            <h5 class="title"><span class="text-primary">#</span>View Overview / Profile Summary</h5>
                                           <p>In the dropdown below the change status button you can access the profile summary of a personnel by clicking the overview.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/profile-summary.png') }}" alt="personnel-list-filter.png">
                                        </div>

                                        <div class="content mt-5">
                                            <p>In the profile summary you can check the basic information and the total documents collected as well as the police details of a specific personnel.</p>

                                            <p></p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/overview-profile.png') }}" alt="personnel-list-filter.png">
                                        </div>

                                    </div>

                                    <div class="nk-cov-feature">
                                        <div class="content mt-5">
                                            <h5 class="title"><span class="text-primary">#</span>View Profile</h5>
                                            <p>Below the overview action, you can access the view profile which will redirect you to the full profile details of a personnel.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/view-profile.png') }}" alt="personnel-list-filter.png">
                                        </div>

                                    </div>

                                    <div class="nk-cov-feature">
                                        <div class="content mt-5">
                                           <p>Upon click of the view profile, you will be redirected to the personnel's profile. Here you can add new information by updating the personnel's profile information.</p>
                                           <p>In the tabs, you can also see other personnel information such as family, education, eligibility and others related information.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/personnel-profile.png') }}" alt="personnel-list-filter.png">
                                        </div>

                                    </div>

                                    <div class="nk-cov-feature">
                                        <div class="content mt-5">
                                            <h5 class="title"><span class="text-primary">#</span>Update Details</h5>
                                            <p>After the view profile action, you can also click the update details which will redirect you to a page where you can edit a personnel's information.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/click-update.png') }}" alt="personnel-list-filter.png">
                                        </div>

                                        <div class="content mt-5">

                                            <p>In the edit page, you can edit the personnel's information and when you save it you will be redirected to the personnel profile where it will say updated successfully.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/update-profile.png') }}" alt="personnel-list-filter.png">
                                        </div>

                                    </div>

                                    <div class="nk-cov-feature">
                                        <div class="content mt-5">
                                            <h5 class="title"><span class="text-primary">#</span>Documents</h5>
                                            <p>In the action dropdown, there is also a view documents action where you will be redirected to the documents page of the personnel</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/documents.png') }}" alt="personnel-list-filter.png">
                                        </div>

                                        <div class="content mt-5">

                                            <p>Here you can preview, download and delete a personnel's documents</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/documents-action.png') }}" alt="personnel-list-filter.png">
                                        </div>


                                        <div class="content mt-5">

                                            <p>You can also upload documents for that specific personnel by clicking the upload button in the upper right side of the table.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/upload.png') }}" alt="personnel-list-filter.png">
                                        </div>


                                    </div>

                                    <div class="nk-cov-feature">
                                        <div class="content mt-5">
                                            <h5 class="title"><span class="text-primary">#</span>Send SMS</h5>
                                            <p>Lastly, in the action dropdown there is a send sms action where you will be able to send an SMS to the personnel and remind them to submit their documents.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/send-sms.png') }}" alt="personnel-list-filter.png">
                                        </div>

                                        <div class="content mt-5">

                                            <p>When you click the send sms action, you will be redirected to a form that will display the mobile number of the personnel and the message you want to send.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/send-sms-form.png') }}" alt="personnel-list-filter.png">
                                        </div>

                                    </div>

                                    <div class="row mt-4">
                                        <div class="col">
                                            <a href="{{ route('support.user-guide.intro') }}" class="justify-start">
                                                <button class="btn btn-outline-primary">Previous</button>
                                            </a>
                                        </div>

                                        <div class="col">
                                            <a href="{{ route('support.user-guide.user-manage') }}" class="justify-end">
                                                <button class="btn btn-outline-primary">Next</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-4">
                    <div class="ratio ratio-16x9">
                        <iframe class="ratio-item" src="https://www.youtube.com/embed/bPITHEiFWLc?rel=0" allowfullscreen=""></iframe>
                    </div>

                    <div class="entry mt-5">
                        <h5 class="text-primary">System Guide Navigation</h5>
                        <ul class="list-unstyled list-hover">
                            <li class="mt-2">
                                <h6 class="collapsible" data-bs-toggle="collapse" data-bs-target="#gettingStarted">
                                    <a href="#gettingStarted" class="text-dark">Getting Started</a>
                                </h6>
                                <ul class="collapse sub-content" id="gettingStarted" >
                                    <li><a data-bs-toggle="tab" href="#access" class="text-dark">Access the website</a></li>
                                    <li><a href="#navigate" class="text-dark">Login</a></li>
                                </ul>
                            </li>
                            <li class="mt-2">
                                <h6 class="collapsible" data-bs-toggle="collapse" data-bs-target="#introduction">
                                    <a href="#introduction" class="text-dark">Introduction</a>
                                </h6>
                                <ul class="collapse sub-content" id="introduction">
                                    <li><a href="#section4" class="text-dark">Section 4</a></li>
                                    <li><a href="#section5" class="text-dark">Section 5</a></li>
                                </ul>
                            </li>
                            <li class="mt-2">
                                <h6 class="collapsible" data-bs-toggle="collapse" data-bs-target="#personnelList">
                                    <a href="#personnelList" class="text-dark">Personnel List</a>
                                </h6>
                                <ul class="collapse sub-content" id="personnelList">
                                    <li><a href="#section6" class="text-dark">Section 6</a></li>
                                    <li><a href="#section7" class="text-dark">Section 7</a></li>
                                    <li><a href="#section8" class="text-dark">Section 8</a></li>
                                </ul>
                            </li>
                            <li class="mt-2">
                                <h6 class="collapsible" data-bs-toggle="collapse" data-bs-target="#userManager">
                                    <a href="#userManager" class="text-dark">User Manager</a>
                                </h6>
                                <ul class="collapse sub-content" id="userManager">
                                    <li><a href="#section9" class="text-dark">Section 9</a></li>
                                    <li><a href="#section10" class="text-dark">Section 10</a></li>
                                </ul>
                            </li>
                            <li class="mt-2">
                                <h6 class="collapsible" data-bs-toggle="collapse" data-bs-target="#rolesPermissions">
                                    <a href="#rolesPermissions" class="text-dark">Roles and Permissions</a>
                                </h6>
                                <ul class="collapse sub-content" id="rolesPermissions">
                                    <li><a href="#section11" class="text-dark">Section 11</a></li>
                                    <li><a href="#section12" class="text-dark">Section 12</a></li>
                                </ul>
                            </li>
                            <li class="mt-2">
                                <h6 class="collapsible" data-bs-toggle="collapse" data-bs-target="#documentation">
                                    <a href="#documentation" class="text-dark">Documentation</a>
                                </h6>
                                <ul class="collapse sub-content" id="documentation">
                                    <li><a href="#section13" class="text-dark">Section 13</a></li>
                                    <li><a href="#section14" class="text-dark">Section 14</a></li>
                                </ul>
                            </li>
                            <li class="mt-2">
                                <h6 class="collapsible" data-bs-toggle="collapse" data-bs-target="#faqsHelp">
                                    <a href="#faqsHelp" class="text-dark">FAQs/Help</a>
                                </h6>
                                <ul class="collapse sub-content" id="faqsHelp">
                                    <li><a href="#section15" class="text-dark">Section 15</a></li>
                                    <li><a href="#section16" class="text-dark">Section 16</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection
