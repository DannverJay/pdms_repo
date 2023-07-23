<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{ url('dashboard') }}" class="logo-link nk-sidebar-logo">
                {{-- <img class="logo-dark logo-img" src="{{ asset('assets/auth/images/DMS-logo-dark2x.png') }}"
                    srcset="{{ asset('assets/auth/images/logo2x.png') }}" alt="logo">
                <img class="logo-dark logo-img" src="{{ asset('assets/auth/images/logo-dark.png') }}" srcset="{{ asset('assets/auth/images/logo-dark2x.png') }}"
                    alt="logo-dark">
                <img class="logo-small logo-img logo-img-small" src="{{ asset('assets/auth/images/logo-small.png') }}"
                    srcset="{{ asset('assets/auth/images/logo-small2x.png') }}" alt="logo-small"> --}}
                    <img src="{{ asset('assets/auth/Logo-light-new.svg') }}" width="130px" height="40px" class="logo-dark logo-img" alt="logo-dark">
                    <img src="{{ asset('assets/auth/Logo-dark-new.svg') }}" class="logo-light logo-img" alt="">
                    <img class="logo-small logo-img logo-img-small" src="{{ asset('assets/auth/logo-pnp.png') }}" alt="logo-small">

            </a>
        </div>
        <div class="nk-menu-trigger me-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                    class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em
                    class="icon ni ni-menu"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Home</h6>
                    </li><!-- .nk-menu-item -->
                @hasrole('admin')
                    <li class="nk-menu-item{{ Request::route()->getName() == 'admin.dashboard' ? ' active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li>
                @else
                    <li class="nk-menu-item{{ Request::route()->getName() == 'dashboard' ? ' active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li>
                @endrole
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Menu</h6>
                    </li><!-- .nk-menu-heading -->
                    @hasrole('admin')

                        <li class="nk-menu-item">
                            <a href="{{ route('personnel-list') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-list-fill"></em></span>
                                <span class="nk-menu-text">Personnel List</span>
                            </a>
                        </li><!-- .nk-menu-item -->


                        <li class="nk-menu-item">
                            <a href="{{ route('user.lists') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-account-setting-fill"></em></span>
                                <span class="nk-menu-text">User Manager</span>
                            </a>
                        </li><!-- .nk-menu-item -->

                        <li class="nk-menu-item">
                            <a href="{{ route('roles.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-policy-fill"></em></span>
                                <span class="nk-menu-text">Roles & Permissions</span>
                            </a>
                        </li><!-- .nk-menu-item -->

                        <li class="nk-menu-item">
                            <a href="{{ route('users.archive') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-archived-fill"></em></span>
                                <span class="nk-menu-text">Archived Users</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                    @else

                        <li class="nk-menu-item">
                            <a href="{{ route('view.my-info') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-fill-c"></em></span>
                                <span class="nk-menu-text">My Profile</span>
                            </a>
                        </li><!-- .nk-menu-item -->

                        <li class="nk-menu-item">
                            <a href="{{ route('view.user-documents') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-files-fill"></em></span>
                                <span class="nk-menu-text">Documents</span>
                            </a>
                        </li><!-- .nk-menu-item -->

                    @endhasrole


                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Support</h6>
                    </li><!-- .nk-menu-heading -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                            <span class="nk-menu-text">Documentation</span>
                        </a>
                        <ul class="nk-menu-sub">
                        @role('admin')
                            <li class="nk-menu-item">
                                <a href="{{ route('support.user-guide') }}" class="nk-menu-link"><span
                                        class="nk-menu-text">Admin Guide</span></a>
                            </li>
                        @else
                            <li class="nk-menu-item">
                                <a href="{{ route('support.regular-user.guide') }}" class="nk-menu-link"><span
                                        class="nk-menu-text">User Guide</span></a>
                            </li>
                        @endrole
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('support.faqs') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-help-fill"></em></span>
                            <span class="nk-menu-text">FAQs / Help </span>
                        </a>
                    </li><!-- .nk-menu-item -->
                @hasrole('admin')
                    <li class="nk-menu-item">
                        <a href="{{ route('support.activty-log') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-task"></em></span>
                            <span class="nk-menu-text">Activity Logs </span>
                        </a>
                    </li>
                @else
                    <li class="nk-menu-item">
                        <a href="{{ route('support.activty-log') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-task"></em></span>
                            <span class="nk-menu-text">Activity Logs </span>
                        </a>
                    </li>
                @endrole
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
