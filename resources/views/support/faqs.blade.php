@extends('admin.index')

@section('page')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="content-page wide-sm m-auto">
                <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                    <div class="nk-block-head-content text-center">
                        <h2 class="nk-block-title fw-normal">Frequently Asked Questions</h2>
                        <div class="nk-block-des">
                            <p class="lead">Got a question? Can't find the answer you're looking for? Don't worry, drop
                                us a line on our contact email.</p>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card">
                        <div id="faqs" class="accordion">
                            <div class="accordion-item">
                                <a href="#" class="accordion-head" data-bs-toggle="collapse" data-bs-target="#faq-q1">
                                    <h6 class="title">What is Apalit PDMS?</h6>
                                    <span class="accordion-icon"></span>
                                </a>
                                <div class="accordion-body collapse show" id="faq-q1" data-bs-parent="#faqs">
                                    <div class="accordion-inner">
                                        <p><strong>Apalit PDMS</strong> is a web application that is intended for Apalit Municipal Police Station to use in collecting
                                            and storing their police documents that they submit for compliance. <br>

                                        </p>
                                    </div>
                                </div>
                            </div><!-- .accordion-item -->
                            <div class="accordion-item">
                                <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#faq-q2">
                                    <h6 class="title">How to have an account in Apalit PDMS?</h6>
                                    <span class="accordion-icon"></span>
                                </a>
                                <div class="accordion-body collapse" id="faq-q2" data-bs-parent="#faqs">
                                    <div class="accordion-inner">
                                        <p>
                                            If you are a police personnel of Apalit Municipal Station, the police admin of your station will create your account
                                            and will provide your profile information and login credentials. If you still don't have an account, you can go to your admin office or
                                            you can contact your police admin.
                                        </p>
                                    </div>
                                </div>
                            </div><!-- .accordion-item -->
                            <div class="accordion-item">
                                <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#faq-q3">
                                    <h6 class="title">What are the main functionalities of Apalit PDMS?</h6>
                                    <span class="accordion-icon"></span>
                                </a>
                                <div class="accordion-body collapse" id="faq-q3" data-bs-parent="#faqs">
                                    <div class="accordion-inner">
                                        <p>
                                            The main functionality of Apalit PDMS is to store the police documents of all personnel of Apalit Municipal Station
                                            especially the documents that is needed for compliance. These documents are stored and can be downloaded by the admin and police personnel
                                            if given permission by the admin.
                                        </p>

                                        <h6>What other features is included?</h6>
                                        <ul class="list list-sm ">
                                            <li><strong>Admin Access</strong></li>
                                            <li>In the admin dashboard, admin can check the list of personnel w/ incomplete required documents for compliance.</li>
                                            <li>Admin can also send an sms to specific personnel to remind them to submit documents that are not still uploaded in the system.</li>
                                            <li>Admin can create an account and can also add their personal information.</li>
                                            <li>Admin can upload and download personnel documents.</li>
                                            <li><strong>User Access</strong></li>
                                            <li>User can access their own profile and uploaded documents</li>
                                            <li>User can also upload and download documents if they are permitted by the admin.</li>
                                        </ul>
                                        {{-- <h6>What's not included in item support?</h6>
                                        <ul class="list list-sm list-cross">
                                            <li>Installation of the item</li>
                                            <li>Hosting, server environment, or software</li>
                                            <li>Help from authors of included third-party assets</li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div><!-- .accordion-item -->
                            <div class="accordion-item">
                                <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#faq-q4">
                                    <h6 class="title">Who can access Apalit PDMS?</h6>
                                    <span class="accordion-icon"></span>
                                </a>
                                <div class="accordion-body collapse" id="faq-q4" data-bs-parent="#faqs">
                                    <div class="accordion-inner">
                                        <p>
                                            The system is exclusive for police personnel of Apalit Municipal Station only.
                                        </p>
                                    </div>
                                </div>
                            </div><!-- .accordion-item -->
                            <div class="accordion-item">
                                <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#faq-q5">
                                    <h6 class="title"></h6>
                                    <span class="accordion-icon"></span>
                                </a>
                                <div class="accordion-body collapse" id="faq-q5" data-bs-parent="#faqs">
                                    <div class="accordion-inner">
                                        <p>If you want to ask questions about our product, or need help using our item
                                            you’ve purchased or just want to tell us how much you love our work, that's
                                            great!</p>
                                        <p>Contact us via email <a
                                                href="mailto:info@softnio.com">info(at)softnio.com</a> or Post your
                                            comment (are visible to everyone) on our item page after login into your
                                            account.</p>
                                    </div>
                                </div>
                            </div><!-- .accordion-item -->
                        </div><!-- .accordion -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="align-center flex-wrap flex-md-nowrap g-4">
                                <div class="nk-block-image w-120px flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 118">
                                        <path
                                            d="M8.916,94.745C-.318,79.153-2.164,58.569,2.382,40.578,7.155,21.69,19.045,9.451,35.162,4.32,46.609.676,58.716.331,70.456,1.845,84.683,3.68,99.57,8.694,108.892,21.408c10.03,13.679,12.071,34.71,10.747,52.054-1.173,15.359-7.441,27.489-19.231,34.494-10.689,6.351-22.92,8.733-34.715,10.331-16.181,2.192-34.195-.336-47.6-12.281A47.243,47.243,0,0,1,8.916,94.745Z"
                                            transform="translate(0 -1)" fill="#f6faff" />
                                        <rect x="18" y="32" width="84" height="50" rx="4" ry="4" fill="#fff" />
                                        <rect x="26" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                        <rect x="50" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                        <rect x="74" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                        <rect x="38" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                        <rect x="62" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                        <path
                                            d="M98,32H22a5.006,5.006,0,0,0-5,5V79a5.006,5.006,0,0,0,5,5H52v8H45a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2H73a2,2,0,0,0,2-2V94a2,2,0,0,0-2-2H66V84H98a5.006,5.006,0,0,0,5-5V37A5.006,5.006,0,0,0,98,32ZM73,94v4H45V94Zm-9-2H54V84H64Zm37-13a3,3,0,0,1-3,3H22a3,3,0,0,1-3-3V37a3,3,0,0,1,3-3H98a3,3,0,0,1,3,3Z"
                                            transform="translate(0 -1)" fill="#798bff" />
                                        <path
                                            d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z"
                                            transform="translate(0 -1)" fill="#6576ff" />
                                        <path
                                            d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z"
                                            transform="translate(0 -1)" fill="none" stroke="#6576ff"
                                            stroke-miterlimit="10" stroke-width="2" />
                                        <line x1="40" y1="22" x2="57" y2="22" fill="none" stroke="#fffffe"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <line x1="40" y1="27" x2="57" y2="27" fill="none" stroke="#fffffe"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <line x1="40" y1="32" x2="50" y2="32" fill="none" stroke="#fffffe"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <line x1="30.5" y1="87.5" x2="30.5" y2="91.5" fill="none" stroke="#9cabff"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <line x1="28.5" y1="89.5" x2="32.5" y2="89.5" fill="none" stroke="#9cabff"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <line x1="79.5" y1="22.5" x2="79.5" y2="26.5" fill="none" stroke="#9cabff"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <line x1="77.5" y1="24.5" x2="81.5" y2="24.5" fill="none" stroke="#9cabff"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <circle cx="90.5" cy="97.5" r="3" fill="none" stroke="#9cabff"
                                            stroke-miterlimit="10" />
                                        <circle cx="24" cy="23" r="2.5" fill="none" stroke="#9cabff"
                                            stroke-miterlimit="10" />
                                    </svg>
                                </div>
                                <div class="nk-block-content">
                                    <div class="nk-block-content-head px-lg-4">
                                        <h5>We’re here to help you!</h5>
                                        <p class="text-soft">Ask a question or file a support ticket, manage request,
                                            report an issues. Our team support team will get back to you by email.</p>
                                    </div>
                                </div>
                                <div class="nk-block-content flex-shrink-0">
                                    <a href="#" class="btn btn-lg btn-outline-primary">Get Support Now</a>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div><!-- .content-page -->
        </div>
    </div>
</div>

@endsection
