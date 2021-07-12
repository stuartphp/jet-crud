<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}?{{ time() }}">
    <link rel="stylesheet" href="/assets/css/style.css" />

    @livewireStyles

</head>

<body>
    <header class="top-bar">

        <!-- Menu Toggler -->
        <button type="button" class="menu-toggler la la-bars" data-toggle="menu"></button>

        <!-- Brand -->
        <span class="brand">Yeti</span>

        <!-- Search -->
        <form class="hidden md:block ml-10" action="#">
            <label class="form-control-addon-within rounded-full">
                <input type="text" class="form-control border-none" placeholder="Search">
                <button type="button"
                    class="btn btn-link text-gray-300 dark:text-gray-700 hover:text-primary dark:hover:text-primary text-xl leading-none la la-search mr-4"></button>
            </label>
        </form>

        <!-- Right -->
        <div class="flex items-center ml-auto">

            <!-- Dark Mode -->
            <label class="switch switch_outlined" data-toggle="tooltip" data-tippy-content="Toggle Dark Mode">
                <input id="darkModeToggler" type="checkbox">
                <span></span>
            </label>

            <!-- Fullscreen -->
            <button id="fullScreenToggler" type="button"
                class="hidden lg:inline-block btn-link ml-3 px-2 text-2xl leading-none la la-expand-arrows-alt"
                data-toggle="tooltip" data-tippy-content="Fullscreen"></button>

            <!-- Apps -->
            <div class="dropdown self-stretch">
                <button type="button"
                    class="flex items-center h-full btn-link ml-4 lg:ml-1 px-2 text-2xl leading-none la la-box"
                    data-toggle="custom-dropdown-menu" data-tippy-arrow="true" data-tippy-placement="bottom">
                </button>
                <div class="custom-dropdown-menu p-5 text-center">
                    <div class="flex justify-around">
                        <a href="#" class="p-5 text-gray-700 dark:text-gray-500 hover:text-primary dark:hover:text-primary">
                            <span class="block la la-cog text-5xl leading-none"></span>
                            <span>Settings</span>
                        </a>
                        <a href="#" class="p-5 text-gray-700 dark:text-gray-500 hover:text-primary dark:hover:text-primary">
                            <span class="block la la-users text-5xl leading-none"></span>
                            <span>Users</span>
                        </a>
                    </div>
                    <div class="flex justify-around">
                        <a href="#" class="p-5 text-gray-700 dark:text-gray-500 hover:text-primary dark:hover:text-primary">
                            <span class="block la la-book text-5xl leading-none"></span>
                            <span>Docs</span>
                        </a>
                        <a href="#" class="p-5 text-gray-700 dark:text-gray-500 hover:text-primary dark:hover:text-primary">
                            <span class="block la la-dollar text-5xl leading-none"></span>
                            <span>Shop</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Notifications -->
            <div class="dropdown self-stretch">
                <button type="button"
                    class="relative flex items-center h-full btn-link ml-1 px-2 text-2xl leading-none la la-bell"
                    data-toggle="custom-dropdown-menu" data-tippy-arrow="true" data-tippy-placement="bottom-end">
                    <span
                        class="absolute top-0 right-0 rounded-full border border-primary -mt-1 -mr-1 px-2 leading-tight text-xs font-body text-primary">3</span>
                </button>
                <div class="custom-dropdown-menu">
                    <div class="flex items-center px-5 py-2">
                        <h5 class="mb-0 uppercase">Notifications</h5>
                        <button class="btn btn_outlined btn_warning uppercase ml-auto">Clear All</button>
                    </div>
                    <hr>
                    <div class="p-5 hover:bg-primary-100 dark:hover:bg-primary-900">
                        <a href="#">
                            <h6 class="uppercase">Heading One</h6>
                        </a>
                        <p>Lorem ipsum dolor, sit amet consectetur.</p>
                        <small>Today</small>
                    </div>
                    <hr>
                    <div class="p-5 hover:bg-primary-100 dark:hover:bg-primary-900">
                        <a href="#">
                            <h6 class="uppercase">Heading Two</h6>
                        </a>
                        <p>Mollitia sequi dolor architecto aut deserunt.</p>
                        <small>Yesterday</small>
                    </div>
                    <hr>
                    <div class="p-5 hover:bg-primary-100 dark:hover:bg-primary-900">
                        <a href="#">
                            <h6 class="uppercase">Heading Three</h6>
                        </a>
                        <p>Nobis reprehenderit sed quos deserunt</p>
                        <small>Last Week</small>
                    </div>
                </div>
            </div>

            <!-- User Menu -->
            <div class="dropdown">
                <button class="flex items-center ml-4 text-gray-700" data-toggle="custom-dropdown-menu"
                    data-tippy-arrow="true" data-tippy-placement="bottom-end">
                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}"
                                        alt="{{ Auth::user()->name }}" />
                </button>
                <div class="custom-dropdown-menu w-64">
                    <div class="p-5">
                        <h5 class="uppercase">{{ Auth::user()->name }}</h5>
                    </div>
                    <hr>
                    <div class="p-5">
                        <a href="{{ route('profile.show') }}"
                            class="flex items-center text-gray-700 dark:text-gray-500 hover:text-primary dark:hover:text-primary">
                            <span class="la la-user-circle text-2xl leading-none mr-2"></span>
                            Profile
                        </a>
                    </div>
                    <hr>
                    <div class="p-5">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit();"
                            class="flex items-center text-gray-700 dark:text-gray-500 hover:text-primary dark:hover:text-primary">
                            <span class="la la-power-off text-2xl leading-none mr-2"></span>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
<!-- Menu Bar -->
<aside class="menu-bar menu-sticky">
    <div class="menu-items">
        <div class="menu-header hidden">
            <a href="#" class="flex items-center mx-8 mt-8">
                <span class="avatar w-16 h-16">JD</span>
                <div class="ml-4 text-left text-gray-700 dark:text-gray-500">
                    <h5>John Doe</h5>
                    <p class="mt-2">Editor</p>
                </div>
            </a>
            <hr class="mx-8 my-4">
        </div>
        <a href="{{ route('dashboard') }}" class="link {{ request()->is('dashboard') ? 'active' : '' }}" data-toggle="tooltip-menu" data-tippy-content="Dashboard">
            <span class="icon la la-laptop"></span>
            <span class="title">Dashboard</span>
        </a>
        <a href="#no-link" class="link" data-target="[data-menu=pages]" data-toggle="tooltip-menu"
            data-tippy-content="Pages">
            <span class="icon la la-file-alt"></span>
            <span class="title">Pages</span>
        </a>
        <a href="#no-link" class="link" data-target="[data-menu=applications]" data-toggle="tooltip-menu"
            data-tippy-content="Applications">
            <span class="icon la la-store"></span>
            <span class="title">Applications</span>
        </a>
        <a href="#no-link" class="link" data-target="[data-menu=ui]" data-toggle="tooltip-menu" data-tippy-content="UI">
            <span class="icon la la-cube"></span>
            <span class="title">UI</span>
        </a>
        <a href="#no-link" class="link" data-target="[data-menu=menu]" data-toggle="tooltip-menu"
            data-tippy-content="Menu">
            <span class="icon la la-sitemap"></span>
            <span class="title">Menu</span>
        </a>
        <a href="blank.html" class="link" data-toggle="tooltip-menu" data-tippy-content="Blank Page">
            <span class="icon la la-file"></span>
            <span class="title">Blank Page</span>
        </a>
        <a href="#no-link" class="link {{ request()->is('users-management/*') ? 'active' : '' }}" data-target="[data-menu=users-management]" data-toggle="tooltip-menu"
        data-tippy-content="User Management">
            <span class="icon la la-users"></span>
            <span class="title">User Management</span>
        </a>
    </div>

    <!-- Pages -->
    <div class="menu-detail" data-menu="pages">
        <div class="menu-detail-wrapper">
            <h6 class="uppercase">Authentication</h6>
            <a href="auth-login.html">
                <span class="la la-user"></span>
                Login
            </a>
            <a href="auth-forgot-password.html">
                <span class="la la-user-lock"></span>
                Forgot Password
            </a>
            <a href="auth-register.html">
                <span class="la la-user-plus"></span>
                Register
            </a>
            <hr>
            <h6 class="uppercase">Blog</h6>
            <a href="blog-list.html">
                <span class="la la-list"></span>
                List
            </a>
            <a href="blog-list-card-rows.html">
                <span class="la la-list"></span>
                List - Card Rows
            </a>
            <a href="blog-list-card-columns.html">
                <span class="la la-list"></span>
                List - Card Columns
            </a>
            <a href="blog-add.html">
                <span class="la la-layer-group"></span>
                Add Post
            </a>
            <hr>
            <h6 class="uppercase">Errors</h6>
            <a href="errors-403.html" target="_blank">
                <span class="la la-exclamation-circle"></span>
                403 Error
            </a>
            <a href="errors-404.html" target="_blank">
                <span class="la la-exclamation-circle"></span>
                404 Error
            </a>
            <a href="errors-500.html" target="_blank">
                <span class="la la-exclamation-circle"></span>
                500 Error
            </a>
            <a href="errors-under-maintenance.html" target="_blank">
                <span class="la la-exclamation-circle"></span>
                Under Maintenance
            </a>
            <hr>
            <a href="pages-pricing.html">
                <span class="la la-dollar"></span>
                Pricing
            </a>
            <a href="pages-faqs-layout-1.html">
                <span class="la la-question-circle"></span>
                FAQs - Layout 1
            </a>
            <a href="pages-faqs-layout-2.html">
                <span class="la la-question-circle"></span>
                FAQs - Layout 2
            </a>
            <a href="pages-invoice.html">
                <span class="la la-file-invoice-dollar"></span>
                Invoice
            </a>
        </div>
    </div>

    <!-- Applications -->
    <div class="menu-detail" data-menu="applications">
        <div class="menu-detail-wrapper">
            <a href="applications-media-library.html">
                <span class="la la-image"></span>
                Media Library
            </a>
            <a href="applications-point-of-sale.html">
                <span class="la la-shopping-bag"></span>
                Point Of Sale
            </a>
            <a href="applications-to-do.html">
                <span class="la la-check-circle"></span>
                To Do
            </a>
            <a href="applications-chat.html">
                <span class="la la-comment"></span>
                Chat
            </a>
        </div>
    </div>

    <!-- UI -->
    <div class="menu-detail" data-menu="ui">
        <div class="menu-detail-wrapper">
            <h6 class="uppercase">Form</h6>
            <a href="form-components.html">
                <span class="la la-cubes"></span>
                Components
            </a>
            <a href="form-input-groups.html">
                <span class="la la-stop"></span>
                Input Groups
            </a>
            <a href="form-layout.html">
                <span class="la la-th-large"></span>
                Layout
            </a>
            <a href="form-validations.html">
                <span class="la la-check-circle"></span>
                Validations
            </a>
            <a href="form-wizards.html">
                <span class="la la-hand-pointer"></span>
                Wizards
            </a>
            <hr>
            <h6 class="uppercase">Components</h6>
            <a href="components-alerts.html">
                <span class="la la-bell"></span>
                Alerts
            </a>
            <a href="components-avatars.html">
                <span class="la la-user-circle"></span>
                Avatars
            </a>
            <a href="components-badges.html">
                <span class="la la-certificate"></span>
                Badges
            </a>
            <a href="components-buttons.html">
                <span class="la la-play"></span>
                Buttons
            </a>
            <a href="components-cards.html">
                <span class="la la-layer-group"></span>
                Cards
            </a>
            <a href="components-collapse.html">
                <span class="la la-arrow-circle-right"></span>
                Collapse
            </a>
            <a href="components-dropdowns.html">
                <span class="la la-arrow-circle-down"></span>
                Dropdowns
            </a>
            <a href="components-modal.html">
                <span class="la la-times-circle"></span>
                Modal
            </a>
            <a href="components-popovers-tooltips.html">
                <span class="la la-thumbtack"></span>
                Popovers & Tooltips
            </a>
            <a href="components-tabs.html">
                <span class="la la-columns"></span>
                Tabs
            </a>
            <a href="components-tables.html">
                <span class="la la-table"></span>
                Tables
            </a>
            <a href="components-toasts.html">
                <span class="la la-bell"></span>
                Toasts
            </a>
            <hr>
            <h6 class="uppercase">Extras</h6>
            <a href="extras-carousel.html">
                <span class="la la-images"></span>
                Carousel
            </a>
            <a href="extras-charts.html">
                <span class="la la-chart-area"></span>
                Charts
            </a>
            <a href="extras-editors.html">
                <span class="la la-keyboard"></span>
                Editors
            </a>
            <a href="extras-sortable.html">
                <span class="la la-sort"></span>
                Sortable
            </a>
        </div>
    </div>

    <!-- Menu -->
    <div class="menu-detail" data-menu="menu">
        <div class="menu-detail-wrapper">
            <a href="#no-link">
                <span class="la la-cube"></span>
                Default
            </a>
            <a href="#no-link">
                <span class="la la-file-alt"></span>
                Content
            </a>
            <a href="#no-link">
                <span class="la la-shopping-bag"></span>
                Ecommerce
            </a>
            <hr>
            <a href="#no-link">
                <span class="la la-layer-group"></span>
                Main Level
            </a>
            <a href="#no-link">
                <span class="la la-arrow-circle-right"></span>
                Grand Parent
            </a>
            <a href="#no-link" class="active" data-toggle="collapse" data-target="#menuGrandParentOpen">
                <span class="collapse-indicator la la-arrow-circle-down"></span>
                Grand Parent Open
            </a>
            <div id="menuGrandParentOpen" class="collapse open">
                <a href="#no-link">
                    <span class="la la-layer-group"></span>
                    Sub Level
                </a>
                <a href="#no-link">
                    <span class="la la-arrow-circle-right"></span>
                    Parent
                </a>
                <a href="#no-link" class="active" data-toggle="collapse" data-target="#menuParentOpen">
                    <span class="collapse-indicator la la-arrow-circle-down"></span>
                    Parent Open
                </a>
                <div id="menuParentOpen" class="collapse open">
                    <a href="#no-link">
                        <span class="la la-layer-group"></span>
                        Sub Level
                    </a>
                </div>
            </div>
            <hr>
            <h6 class="uppercase">Menu Types</h6>
            <a href="#no-link" data-toggle="menu-type" data-value="default">
                <span class="la la-hand-point-right"></span>
                Default
            </a>
            <a href="#no-link" data-toggle="menu-type" data-value="hidden">
                <span class="la la-hand-point-left"></span>
                Hidden
            </a>
            <a href="#no-link" data-toggle="menu-type" data-value="icon-only">
                <span class="la la-th-large"></span>
                Icons Only
            </a>
            <a href="#no-link" data-toggle="menu-type" data-value="wide">
                <span class="la la-arrows-alt-h"></span>
                Wide
            </a>
        </div>
    </div>
    <!-- Applications -->
    <div class="menu-detail" data-menu="users-management">
        <div class="menu-detail-wrapper">
            <a href="{{ route('users-management.users') }}">
                <span class="la la-image"></span>
                Users
            </a>
            <a href="{{ route('roles.index') }}">
                <span class="la la-shopping-bag"></span>
                Roles
            </a>
            <a href="{{ route('users-management.permissions') }}">
                <span class="la la-check-circle"></span>
                Permissions
            </a>
        </div>
    </div>
</aside>

<!-- Workspace -->
<main class="workspace overflow-hidden">

    {{ $slot }}
    <!-- Footer -->
    <footer class="mt-auto">
        <div class="footer">
            <span class='uppercase'>&copy; 2021 Yeti Themes</span>
            <nav class="ml-auto">
                <a href="mailto:Yeti Themes<info@yetithemes.net>?subject=Support">Support</a>
                <span class="divider">|</span>
                <a href="http://yetiadmin.yetithemes.net/docs" target="_blank">Docs</a>
            </nav>
        </div>
    </footer>
</main>


    {{-- <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div> --}}


    @stack('modals')
    <script src="http://code.jquery.com/jquery-1.9.0rc1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="/assets/js/vendor.js"></script>
    <script src="/assets/js/chart.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1"></script> -->
    <script src="/assets/js/script.js"></script>
    @livewireScripts

    @stack('scripts')
    <script>
        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message, event.detail.title ?? '')
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
        });
    </script>
</body>

</html>
