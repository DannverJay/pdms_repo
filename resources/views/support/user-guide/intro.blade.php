@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between flex-wrap g-1 align-start">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title">User Guide</h5>

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
                                    <h4 class="title text-primary">Introduction</h4>
                                    <p>Upon succesful login you can now navigate the system. </p>
                                    <div class="nk-cov-feature">

                                        <div class="content">
                                            <h5 class="title"><span class="text-primary">#</span>Navigate dashboard page</h5>
                                            <p>In the dashboard page you can see a welcome card with a view profile button. While on the right side is the documents.</p>
                                            <p>You can click the view profile then you will be redirected to your profile. Whereas when you click the documents you will be redirected to documents page where you can see your uploaded documents.</p>
                                        </div>
                                    </div>
                                    <div class="nk-cov-feature">
                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/user/dashboard.png') }}" alt="">
                                        </div>
                                        <div class="content mt-5">
                                            <h5 class="title"><span class="text-primary">#</span>Navigate your profile.</h5>
                                            <p>In the sidebar you can click your own profile by clicking the My Profile.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/user/My Profile.png') }}" alt="personnel-list.png">
                                        </div>

                                    </div>

                                    <div class="nk-cov-feature">

                                        <div class="content mt-5">
                                            <h5 class="title"><span class="text-primary">#</span>Navigate documents</h5>
                                            <p>You can also check your uploaded documents by navigating the documents page in the sidebar.</p>

                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/user/Documents.png') }}" alt="">
                                        </div>

                                    </div>


                                    <div class="nk-cov-feature">

                                        <div class="content mt-5">
                                            <h5 class="title"><span class="text-primary">#</span>Update Account Details</h5>
                                            <p>In the My Profile and Documents page, you can see a side navigation </p>

                                           </p>
                                           <p>As you can see in the picture, the arrow points to the update account details. When you click it, you will be redirected to an update account details page. </p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/user/account-details-arrow.png') }}" alt="">
                                        </div>

                                        <div class="content mt-5">
                                            <p>In the update account details, you can change your name, email and password.</p>

                                            <p><em>Note: Do not create the delete button or your account will be permanently deleted</em></p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/user/change-account-details.png') }}" alt="">
                                        </div>
                                    </div>


                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <a href="{{ route('support.reg-guide.intro') }}" class="justify-start">
                                                <button class="btn btn-outline-primary">Previous</button>
                                            </a>
                                        </div>

                                        <div class="col">
                                            <a href="{{ route('support.reg-guide.profile') }}" class="justify-end">
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
