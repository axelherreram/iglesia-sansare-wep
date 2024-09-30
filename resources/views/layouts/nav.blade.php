<div class="primary-menu">
    <nav class="navbar navbar-expand-lg align-items-center">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header border-bottom">
                <a href="dashboard" class="d-flex align-items-center">
                    <div class="">
                        <img src="{{ asset('/assets/icon/iglesia.png') }}" class="logo-icon" alt="logo icon">

                    </div>
                    <div class="">
                        <h4 class="logo-text">Iglesia Sansare</h4>
                    </div>
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav align-items-center flex-grow-1">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                            data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class='bx bx-home-alt'></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Dashboard</div>
                            <div class="ms-auto dropy-icon"><i class='bx bx-chevron-down'></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('index') }}"><i
                                        class='bx bx-pie-chart-alt'></i>Default</a></li>
                            <li><a class="dropdown-item" href="{{ url('dashboard-alternate') }}"><i
                                        class='bx bx-shield-alt-2'></i>Alternate</a></li>
                            <li><a class="dropdown-item" href="{{ url('dashboard-analytics') }}"><i
                                        class='bx bx-line-chart'></i>Graphical</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                            data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class='bx bx-cube'></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Apps & Pages</div>
                            <div class="ms-auto dropy-icon"><i class='bx bx-chevron-down'></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('app-emailbox') }}"><i
                                        class='bx bx-envelope'></i>Email</a></li>
                            <li><a class="dropdown-item" href="{{ url('app-chat-box') }}"><i
                                        class='bx bx-conversation'></i>Chat Box</a></li>
                            <li><a class="dropdown-item" href="{{ url('app-file-manager') }}"><i
                                        class='bx bx-file'></i>File Manager</a></li>
                            <li><a class="dropdown-item" href="{{ url('app-contact-list') }}"><i
                                        class='bx bx-microphone'></i>Contacts</a></li>
                            <li><a class="dropdown-item" href="{{ url('app-to-do') }}"><i
                                        class='bx bx-check-shield'></i>Todo</a></li>
                            <li><a class="dropdown-item" href="{{ url('app-invoice') }}"><i
                                        class='bx bx-printer'></i>Invoice</a></li>
                            <li class="nav-item dropend">
                                <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"><i
                                        class='bx bx-file'></i>Pages</a>
                                <ul class="dropdown-menu submenu">
                                    <li class="nav-item dropend"><a
                                            class="dropdown-item dropdown-toggle dropdown-toggle-nocaret"
                                            href="javascript:;"><i class='bx bx-radio-circle'></i>Error</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ url('errors-404-error') }}"><i
                                                        class='bx bx-radio-circle'></i>404 Error</a></li>
                                            <li><a class="dropdown-item" href="{{ url('errors-500-error') }}"><i
                                                        class='bx bx-radio-circle'></i>500 rror</a></li>
                                            <li><a class="dropdown-item" href="{{ url('errors-coming-soon') }}"><i
                                                        class='bx bx-radio-circle'></i>Coming Soon</a></li>
                                            <li><a class="dropdown-item" href="{{ url('error-blank-page') }}"><i
                                                        class='bx bx-radio-circle'></i>Blank Page</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ url('user-profile') }}"><i
                                                class='bx bx-radio-circle'></i>User Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ url('timeline') }}"><i
                                                class='bx bx-radio-circle'></i>Timeline</a></li>
                                    <li><a class="dropdown-item" href="{{ url('faq') }}"><i
                                                class='bx bx-radio-circle'></i>FAQ</a></li>
                                    <li><a class="dropdown-item" href="{{ url('pricing-table') }}"><i
                                                class='bx bx-radio-circle'></i>Pricing</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                            data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Forms</div>
                            <div class="ms-auto dropy-icon"><i class='bx bx-chevron-down'></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="{{ url('form-elements') }}"><i
                                        class='bx bx-message-square-dots'></i>Form Elements</a>
                            </li>
                            <li> <a class="dropdown-item" href="{{ url('form-input-group') }}"><i
                                        class='bx bx-book-content'></i>Input Groups</a>
                            </li>
                            <li> <a class="dropdown-item" href="{{ url('form-radios-and-checkboxes') }}"><i
                                        class='bx bx-radio-circle-marked'></i>Radios & Checkboxes</a>
                            </li>
                            <li> <a class="dropdown-item" href="{{ url('form-layouts') }}"><i
                                        class='bx bx-layer'></i>Forms Layouts</a>
                            </li>
                            <li> <a class="dropdown-item" href="{{ url('form-validations') }}"><i
                                        class='bx bx-file-blank'></i>Form Validation</a>
                            </li>
                            <li> <a class="dropdown-item" href="{{ url('form-wizard') }}"><i
                                        class='bx bx-glasses'></i>Form Wizard</a>
                            </li>
                            <li> <a class="dropdown-item" href="{{ url('form-text-editor') }}"><i
                                        class='bx bx-edit'></i>Text Editor</a>
                            </li>
                            <li> <a class="dropdown-item" href="{{ url('form-file-upload') }}"><i
                                        class='bx bx-upload'></i>File Upload</a>
                            </li>
                            <li> <a class="dropdown-item" href="{{ url('form-date-time-pickes') }}"><i
                                        class='bx bx-calendar-check'></i>Date Pickers</a>
                            </li>
                            <li> <a class="dropdown-item" href="{{ url('form-select2') }}"><i
                                        class='bx bx-check-double'></i>Select2</a>
                            </li>
                            <li> <a class="dropdown-item" href="{{ url('form-repeater') }}"><i
                                        class='bx bx-directions'></i>Form Repeater</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                            data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class='bx bx-lock'></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Authentication</div>
                            <div class="ms-auto dropy-icon"><i class='bx bx-chevron-down'></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item dropend">
                                <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret"
                                    href="javascript:;"><i class='bx bx-receipt'></i>Basic</a>
                                <ul class="dropdown-menu submenu">
                                    <li><a class="dropdown-item" href="{{ url('auth-basic-signin') }}"><i
                                                class='bx bx-radio-circle'></i>Sign In</a></li>
                                    <li><a class="dropdown-item" href="{{ url('auth-basic-signup') }}"><i
                                                class='bx bx-radio-circle'></i>Sign Up</a></li>
                                    <li><a class="dropdown-item" href="{{ url('auth-basic-forgot-password') }}"><i
                                                class='bx bx-radio-circle'></i>Forgot Password</a></li>
                                    <li><a class="dropdown-item" href="{{ url('auth-basic-reset-password') }}"><i
                                                class='bx bx-radio-circle'></i>Reset Password</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropend">
                                <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret"
                                    href="javascript:;"><i class='bx bx-cylinder'></i>Cover</a>
                                <ul class="dropdown-menu submenu">
                                    <li><a class="dropdown-item" href="{{ url('auth-cover-signin') }}"><i
                                                class='bx bx-radio-circle'></i>Sign In</a></li>
                                    <li><a class="dropdown-item" href="{{ url('auth-cover-signup') }}"><i
                                                class='bx bx-radio-circle'></i>Sign Up</a></li>
                                    <li><a class="dropdown-item" href="{{ url('auth-cover-forgot-password') }}"><i
                                                class='bx bx-radio-circle'></i>Forgot Password</a></li>
                                    <li><a class="dropdown-item" href="{{ url('auth-cover-reset-password') }}"><i
                                                class='bx bx-radio-circle'></i>Reset Password</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropend">
                                <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret"
                                    href="javascript:;"><i class='bx bx-aperture'></i>Header & Footer</a>
                                <ul class="dropdown-menu submenu">
                                    <li><a class="dropdown-item" href="{{ url('auth-header-footer-signin') }}"><i
                                                class='bx bx-radio-circle'></i>Sign In</a></li>
                                    <li><a class="dropdown-item" href="{{ url('auth-header-footer-signup') }}"><i
                                                class='bx bx-radio-circle'></i>Sign Up</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ url('auth-header-footer-forgot-password') }}"><i
                                                class='bx bx-radio-circle'></i>Forgot Password</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ url('auth-header-footer-reset-password') }}"><i
                                                class='bx bx-radio-circle'></i>Reset Password</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                            data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class='bx bx-briefcase-alt'></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">UI Elements</div>
                            <div class="ms-auto dropy-icon"><i class='bx bx-chevron-down'></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="{{ url('widgets') }}"><i
                                        class='bx bx-wine'></i>Widgets</a></li>
                            <li class="nav-item dropend">
                                <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret"
                                    href="javascript:;"><i class='bx bx-cart'></i>eCommerce</a>
                                <ul class="dropdown-menu submenu">
                                    <li><a class="dropdown-item" href="{{ url('ecommerce-products') }}"><i
                                                class='bx bx-radio-circle'></i>Products</a></li>
                                    <li><a class="dropdown-item" href="{{ url('ecommerce-products-details') }}"><i
                                                class='bx bx-radio-circle'></i>Product Details</a></li>
                                    <li><a class="dropdown-item" href="{{ url('ecommerce-add-new-products') }}"><i
                                                class='bx bx-radio-circle'></i>Add New Products</a></li>
                                    <li><a class="dropdown-item" href="{{ url('ecommerce-orders') }}"><i
                                                class='bx bx-radio-circle'></i>Orders</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropend">
                                <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret"
                                    href="javascript:;"><i class='bx bx-ghost'></i>Components</a>
                                <ul class="dropdown-menu scroll-menu">
                                    <li><a class="dropdown-item" href="{{ url('component-alerts') }}"><i
                                                class='bx bx-radio-circle'></i>Alerts</a></li>
                                    <li><a class="dropdown-item" href="{{ url('component-accordions') }}"><i
                                                class='bx bx-radio-circle'></i>Accordions</a></li>
                                    <li><a class="dropdown-item" href="{{ url('component-badges') }}"><i
                                                class='bx bx-radio-circle'></i>Badges</a></li>
                                    <li><a class="dropdown-item" href="{{ url('component-buttons') }}"><i
                                                class='bx bx-radio-circle'></i>Buttons</a></li>
                                    <li><a class="dropdown-item" href="{{ url('component-cards') }}"><i
                                                class='bx bx-radio-circle'></i>Cards</a></li>
                                    <li><a class="dropdown-item" href="{{ url('component-carousels') }}"><i
                                                class='bx bx-radio-circle'></i>Carousels</a></li>
                                    <li><a class="dropdown-item" href="{{ url('component-list-groups') }}"><i
                                                class='bx bx-radio-circle'></i>List Groups</a></li>
                                    <li><a class="dropdown-item" href="{{ url('component-media-object') }}"><i
                                                class='bx bx-radio-circle'></i>Media Objects</a></li>
                                    <li><a class="dropdown-item" href="{{ url('component-modals') }}"><i
                                                class='bx bx-radio-circle'></i>Modals</a></li>
                                    <li><a class="dropdown-item" href="{{ url('component-navs-tabs') }}"><i
                                                class='bx bx-radio-circle'></i>Navs & Tabs</a></li>
                                    <li><a class="dropdown-item" href="{{ url('component-navbar') }}"><i
                                                class='bx bx-radio-circle'></i>Navbar</a></li>
                                    <li><a class="dropdown-item" href="{{ url('component-paginations') }}"><i
                                                class='bx bx-radio-circle'></i>Pagination</a></li>
                                    <li><a class="dropdown-item" href="{{ url('component-popovers-tooltips') }}"><i
                                                class='bx bx-radio-circle'></i>Popovers & Tooltips</a></li>
                                    <li><a class="dropdown-item" href="{{ url('component-progress-bars') }}"><i
                                                class='bx bx-radio-circle'></i>Progress</a></li>
                                    <li><a class="dropdown-item" href="{{ url('component-spinners') }}"><i
                                                class='bx bx-radio-circle'></i>Spinners</a></li>
                                    <li><a class="dropdown-item" href="{{ url('component-notifications') }}"><i
                                                class='bx bx-radio-circle'></i>Notifications</a></li>
                                    <li><a class="dropdown-item" href="{{ url('component-avtars-chips') }}"><i
                                                class='bx bx-radio-circle'></i>Avatrs & Chips</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropend">
                                <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret"
                                    href="javascript:;"><i class='bx bx-card'></i>Content</a>
                                <ul class="dropdown-menu submenu">
                                    <li><a class="dropdown-item" href="{{ url('content-grid-system') }}"><i
                                                class='bx bx-radio-circle'></i>Grid System</a></li>
                                    <li><a class="dropdown-item" href="{{ url('content-typography') }}"><i
                                                class='bx bx-radio-circle'></i>Typography</a></li>
                                    <li><a class="dropdown-item" href="{{ url('content-text-utilities') }}"><i
                                                class='bx bx-radio-circle'></i>Text Utilities</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropend">
                                <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret"
                                    href="javascript:;"><i class='bx bx-droplet'></i>Icons</a>
                                <ul class="dropdown-menu submenu">
                                    <li><a class="dropdown-item" href="{{ url('icons-line-icons') }}"><i
                                                class='bx bx-radio-circle'></i>Line Icons</a></li>
                                    <li><a class="dropdown-item" href="{{ url('icons-boxicons') }}"><i
                                                class='bx bx-radio-circle'></i>Boxicons</a></li>
                                    <li><a class="dropdown-item" href="{{ url('icons-feather-icons') }}"><i
                                                class='bx bx-radio-circle'></i>Feather Icons</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                            data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class='bx bx-line-chart'></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Charts</div>
                            <div class="ms-auto dropy-icon"><i class='bx bx-chevron-down'></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('charts-apex-chart') }}"><i
                                        class='bx bx-bar-chart-alt-2'></i>Apex</a></li>
                            <li><a class="dropdown-item" href="{{ url('charts-chartjs') }}"><i
                                        class='bx bx-line-chart'></i>Chartjs</a></li>
                            <li><a class="dropdown-item" href="{{ url('charts-highcharts') }}"><i
                                        class='bx bx-pie-chart-alt'></i>HighCharts</a></li>
                            <li class="nav-item dropend">
                                <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret"
                                    href="javascript:;"><i class='bx bx-map-pin'></i>Maps</a>
                                <ul class="dropdown-menu submenu">
                                    <li><a class="dropdown-item" href="{{ url('map-google-maps') }}"><i
                                                class='bx bx-radio-circle'></i>Google Maps</a></li>
                                    <li><a class="dropdown-item" href="{{ url('map-vector-maps') }}"><i
                                                class='bx bx-radio-circle'></i>Vector Maps</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                            data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class="bx bx-grid-alt"></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Tables</div>
                            <div class="ms-auto dropy-icon"><i class='bx bx-chevron-down'></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('table-basic-table') }}"><i
                                        class='bx bx-table'></i>Basic Table</a></li>
                            <li><a class="dropdown-item" href="{{ url('table-datatable') }}"><i
                                        class='bx bx-data'></i>Data Table</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
