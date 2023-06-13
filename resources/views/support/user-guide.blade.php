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
                                <h4 class="title text-primary">Getting Started</h4>
                                <p><strong>Welcome to the System Guide for Admin</strong>, this guide is your resource for navigating and managing the administrative functionalities of the system.
                                    This guide provides step-by-step instructions, and useful tips to help you effectively administer and use the system. </p>
                                <div class="gap gap-md"></div>
                                <div class="nk-cov-feature-group">
                                    <div class="nk-cov-feature">

                                        <div class="content">
                                            <h5 class="fw-bold"><span class="text-primary">#</span>Access the website in your browser.</h5>
                                            <p>To access the site, you should search the website in your browser. After you searched the url, you will be redirected to the site's landing page.</p>
                                            <p>In the landing page, you can see the login and the demo video tutorial. Click the login button.</p>
                                        </div>
                                        <div class="image image-sm">
                                            <img src="{{ asset('assets/auth/images/guides/Landing Page.png') }}" alt="">
                                        </div>

                                        <div class="content mt-5">
                                            <h5 class="fw-bold"><span class="text-primary">#</span>Login using your login credentials.</h5>
                                            <p>Once you are in the login page, enter your login credentials and click login. After that you will be redirected to dashboard</p>
                                        </div>

                                        <div class="image image-sm">
                                            <img src="{{ asset('assets/auth/images/guides/login-page.png') }}" alt="">
                                        </div>

                                    </div>

                                    <a href="{{ route('support.user-guide.intro') }}" class="justify-end mt-2">
                                        <button class="btn btn-outline-primary">Next</button>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-4"> --}}
                    {{-- <div class="ratio ratio-16x9">
                        <iframe class="ratio-item" src="https://www.youtube.com/embed/bPITHEiFWLc?rel=0" allowfullscreen=""></iframe>
                    </div> --}}

                    {{-- <div class="entry mt-5">
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
                    </div> --}}




                    {{-- <div class="entry mt-5">
                        <h5 class="text-primary">Take steps to protect others</h5>
                        <p>There are things you can do to help reduce the risk of you and anyone you live with getting ill with the virus.</p>
                        <ul class="list list-lg list-checked-circle list-success">
                            <li><strong>Stay home if you’re sick</strong> – Stay home if you are sick, except to get medical care.</li>
                            <li><strong>Cover your mouth &amp; nose</strong> – with a tissue when you cough or sneeze.</li>
                            <li><strong>Wear a facemask if you are sick</strong> – You should wear a facemask when you are around other people (e.g., sharing a room or vehicle) and before you enter a healthcare provider’s office.</li>
                            <li><strong>Clean AND disinfect frequently touched surfaces daily</strong> – This includes phones, tables, doorknobs, light switches, handles, desktops, countertops, toilets, etc.</li>
                            <li><strong>Stay informed about the local COVID-19 situation</strong> – Get up-to-date information about local COVID-19 activity from <a href="#">public health officials.</a></li>
                        </ul>
                    </div> --}}

                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection
