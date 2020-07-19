<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="{{ route('dashboard.index') }}" {!! set_full_request_class(['dashboard'], 'class="mm-active"') !!}>
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">Showcase</li>
                <li {!! set_full_request_class(['dashboard/showcase*'], 'class="mm-active"') !!}> <!-- class="mm-active" -->
                    <a href="#">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Showcase
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('showcase.index') }}" {!! set_full_request_class(['dashboard/showcase', 'dashboard/showcase/edit*'], 'class="mm-active"') !!}> <!-- class="mm-active" -->
                                <i class="metismenu-icon"></i>
                                List of showcases
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('showcase.create') }}" {!! set_full_request_class(['dashboard/showcase/create'], 'class="mm-active"') !!}>
                                <i class="metismenu-icon"></i>
                                Create showcase
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="app-sidebar__heading">Blog</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Blog
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="elements-buttons-standard.html">
                                <i class="metismenu-icon"></i>
                                List of blogs
                            </a>
                        </li>
                        <li>
                            <a href="elements-dropdowns.html">
                                <i class="metismenu-icon"></i>
                                Create blog
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="app-sidebar__heading">Forms</li>
                <li>
                    <a href="forms-controls.html">
                        <i class="metismenu-icon pe-7s-mouse">
                        </i>Forms Controls
                    </a>
                </li>
                <li>
                    <a href="forms-layouts.html">
                        <i class="metismenu-icon pe-7s-eyedropper">
                        </i>Forms Layouts
                    </a>
                </li>
                <li>
                    <a href="forms-validation.html">
                        <i class="metismenu-icon pe-7s-pendrive">
                        </i>Forms Validation
                    </a>
                </li>
                <li class="app-sidebar__heading">Charts</li>
                <li>
                    <a href="charts-chartjs.html">
                        <i class="metismenu-icon pe-7s-graph2">
                        </i>ChartJS
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>