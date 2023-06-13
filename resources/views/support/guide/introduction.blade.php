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
                                    <h4 class="title text-primary">Introduction</h4>
                                    <p>Upon succesful login you can now navigate the system. </p>
                                    <div class="nk-cov-feature">

                                        <div class="content">
                                            <h5 class="title"><span class="text-primary">#</span>Navigate dashboard page</h5>
                                            <p>After you have successfully logged in, you will be redirected to the dashboard page of the site.</p>
                                            <p>In the dashboard page you can see the demographics for total users, total personnel's, total documents and personnel with incomplete documents.
                                                Below the demographics, there is a table that displays short list of personnel w/ incomplete documents and the chart that displays the total documents collected per documents type.
                                            </p>

                                            <p><em>Note: You can visit each demographics by clicking the view.</em></p>
                                        </div>
                                    </div>
                                    <div class="nk-cov-feature">
                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/Dashboard.png') }}" alt="">
                                        </div>
                                        <div class="content mt-5">
                                            <h5 class="title"><span class="text-primary">#</span>Navigate personnel list.</h5>
                                            <p>In the system, there is a page where you can see the list of all the personnel.
                                                To navigate the <a href="{{ route('support.user-guide.personnel') }}">personnel list</a>, you can click the view in the demographics in dashboard page or you can access it through the sidebar where you can see the <a href="{{ route('support.user-guide.personnel') }}">personnel list</a>.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/personnel-list.png') }}" alt="personnel-list.png">
                                        </div>

                                    </div>

                                    <div class="nk-cov-feature">

                                        <div class="content mt-5">
                                            <h5 class="title"><span class="text-primary">#</span>Navigate user manager.</h5>
                                            <p>Before you can see the personnel profile of a personnel, you must first create an account for that personnel in the <a href="{{ route('support.user-guide.user-manage') }}">user manager</a> page.
                                            </p>

                                            <p><em>You can go to the user manager either by clicking it in the sidebar or clicking the view in the user demographics in the dashboard.</em></p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/user-manager-nav.png') }}" alt="">
                                        </div>

                                    </div>


                                    <div class="nk-cov-feature">

                                        <div class="content mt-5">
                                            <h5 class="title"><span class="text-primary">#</span>Navigate documentation page.</h5>
                                           <p>In the site's sidebar, you can click the <a href="{{ route('support.user-guide.documentation') }}">documentation</a> where you will be redirected to a user guide page on how to use the system.

                                           </p>
                                           <p>Here you can check for guides on how to use the functionalities of the system.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/documentation-nav.png') }}" alt="">
                                        </div>

                                    </div>

                                    <div class="nk-cov-feature">

                                        <div class="content mt-5">
                                            <h5 class="title"><span class="text-primary">#</span>Navigate FaQs page.</h5>
                                            <p>In the sidebar, below the documentation, you can see the FAQs where you will be redirected to an FAQs or frequently asked questions page.</p>
                                            <p>The FAQs content includes questions of users about the system.</p>
                                        </div>

                                        <div class="image image-lg">
                                            <img src="{{ asset('assets/auth/images/guides/faqs-nav.png') }}" alt="">
                                        </div>

                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <a href="{{ route('support.user-guide') }}" class="justify-start">
                                                <button class="btn btn-outline-primary">Previous</button>
                                            </a>
                                        </div>

                                        <div class="col">
                                            <a href="{{ route('support.user-guide.personnel') }}" class="justify-end">
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
