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
                                    <h4 class="title text-primary">User Manage</h4>
                                    <p>In the previous guide where we introduced the user manager page, it was explained that in here you can add new users. </p>
                                    <div class="nk-cov-feature">

                                        <div class="content">
                                            <h5 class="title"><span class="text-primary">#</span>User Lists</h5>
                                            <p>In the user manager page, you can see all the list of users. This users have name, email, password and their specific role.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/user-manager-nav.png') }}" alt="personnel-list-filter.png">
                                        </div>

                                        <div class="content mt-5">
                                            <h5 class="title"><span class="text-primary">#</span>Add User</h5>
                                            <p>In the upper right side, there is a add user button. Click the button if you want to add new user.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/add-user.png') }}" alt="personnel-list-filter.png">
                                        </div>

                                        <div class="content mt-5">
                                            <h5 class="title"><span class="text-primary">#</span>Create new user</h5>
                                            <p>Once you click the add user button, a form will appear where you can enter the user's name, email, password and role.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/add-user-modal.png') }}" alt="personnel-list-filter.png">
                                        </div>

                                        <div class="content mt-5">
                                            <h5 class="title"><span class="text-primary">#</span>Action Dropdown</h5>
                                            <p>In the user list, there is also an action column, in the right side you can see triple dot.
                                                If you click the triple dot, a dropdown will appear that has an action to view profile, account details and delete user.
                                            </p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/user-dropdown.png') }}" alt="personnel-list-filter.png">
                                        </div>

                                        <div class="content mt-5">
                                            <h5 class="title"><span class="text-primary">#</span>Account details</h5>
                                            <p>When you click the view profile it will redirect you to the user's profile similar.</p>
                                            <p>On the other hand, when you click the  account details it will redirect you to a page where you can edit the user's name, email, password and role.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/account-details.png') }}" alt="personnel-list-filter.png">
                                        </div>

                                        <div class="content mt-5">
                                            <p>If you have change anything in the account details and click update, you will be redirected again to the user list where you can see an alert that says "User updated successfully"</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/user-update.png') }}" alt="personnel-list-filter.png">
                                        </div>

                                    </div>

                                    <div class="row mt-4">
                                        <div class="col">
                                            <a href="{{ route('support.user-guide.personnel') }}" class="justify-start">
                                                <button class="btn btn-outline-primary">Previous</button>
                                            </a>
                                        </div>

                                        <div class="col">
                                            <a href="{{ route('support.user-guide.documentation') }}" class="justify-end">
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
