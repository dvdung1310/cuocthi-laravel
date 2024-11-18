<div class="navbar-vertical navbar nav-dashboard">
            <div class="h-100" data-simplebar>
                <!-- Brand logo -->
                <a class="navbar-brand" href="../index.html">
                    <img src="{{ asset('assets/images/brand/logo/logo-2.svg') }}" alt="dash ui - bootstrap 5 admin dashboard template">
                </a>
                <!-- Navbar nav -->
                <ul class="navbar-nav flex-column" id="sideNavbar">

                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link has-arrow  collapsed " href="#!"
                            data-bs-toggle="collapse" data-bs-target="#navDashboard" aria-expanded="false"
                            aria-controls="navDashboard">
                            <i data-feather="home" class="nav-icon me-2 icon-xxs"></i>
                            Thống kê
                        </a>

                        <div id="navDashboard" class="collapse "
                            data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="dashboard-analytics.html">
                                        Analytics </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="../index.html">
                                        Project </a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link has-arrow   "
                                        href="dashboard-ecommerce.html">
                                        Ecommerce
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow   "
                                        href="dashboard-crm.html">
                                        CRM
                                    </a>



                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow   "
                                        href="dashboard-finance.html">
                                        Finance
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow   "
                                        href="dashboard-blog.html">
                                        Blog
                                    </a>

                                </li>



                            </ul>
                        </div>

                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link has-arrow  collapsed " href="#!"
                            data-bs-toggle="collapse" data-bs-target="#navecommerce" aria-expanded="false"
                            aria-controls="navecommerce">
                            <i data-feather="book" class="nav-icon me-2 icon-xxs">
                            </i> Đề thi
                        </a>

                        <div id="navecommerce" class="collapse "
                            data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link has-arrow "
                                        href="{{ route('admin.exams.index') }}">
                                        Danh sách
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link has-arrow  collapsed " href="#!"
                            data-bs-toggle="collapse" data-bs-target="#navEmail" aria-expanded="false"
                            aria-controls="navEmail">
                            <i data-feather="mail" class="nav-icon me-2 icon-xxs">
                            </i> Email
                        </a>

                        <div id="navEmail" class="collapse "
                            data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link has-arrow "
                                        href="mail.html">

                                        Inbox
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow "
                                        href="mail-details.html">

                                        Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow "
                                        href="mail-draft.html">

                                        Draft
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link has-arrow  collapsed " href="#!"
                            data-bs-toggle="collapse" data-bs-target="#navKanban" aria-expanded="false"
                            aria-controls="navKanban">
                            <i data-feather="layout" class="nav-icon me-2 icon-xxs">
                            </i> Kanban
                        </a>

                        <div id="navKanban" class="collapse "
                            data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link has-arrow "
                                        href="task-kanban-grid.html">

                                        Grid
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow "
                                        href="task-kanban-list.html">

                                        List
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Nav item -->
                    <!-- Nav item -->
                    <li class="nav-item ">
                        <a
                            class="nav-link   collapsed  "
                            href="#!"
                            data-bs-toggle="collapse"
                            data-bs-target="#navProject"
                            aria-expanded="false"
                            aria-controls="navProject">
                            <i class="nav-icon me-2 icon-xxs" data-feather="file"></i> Project
                        </a>
                        <div id="navProject" class="collapse  " data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link   " href="project-grid.html">
                                        Grid
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  " href="project-list.html">
                                        List
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link   collapsed  "
                                        href="#!"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#navprojectSingle"
                                        aria-expanded="false"
                                        aria-controls="navprojectSingle">

                                        Single
                                    </a>
                                    <div id="navprojectSingle" class="collapse " data-bs-parent="#navProject">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link " href="project-overview.html">
                                                    Overview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="project-task.html">
                                                    Task
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="project-budget.html">
                                                    Budget
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link " href="project-files.html">
                                                    Files
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="project-team.html">
                                                    Team
                                                </a>
                                            </li>


                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="add-project.html">
                                        Create Project
                                    </a>
                                </li>









                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  "
                            href="apps-file-manager.html">

                            <i data-feather="folder-plus" class="nav-icon me-2 icon-xxs"> </i>File Manager
                        </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link has-arrow  collapsed " href="#!"
                            data-bs-toggle="collapse" data-bs-target="#navCRM" aria-expanded="false"
                            aria-controls="navCRM">
                            <i data-feather="pie-chart" class="nav-icon me-2 icon-xxs">
                            </i>

                            CRM
                        </a>

                        <div id="navCRM" class="collapse "
                            data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">


                                <li class="nav-item">
                                    <a class="nav-link has-arrow "
                                        href="crm-contacts.html">

                                        Contacts
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow "
                                        href="crm-company.html">

                                        Company
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link has-arrow  collapsed " href="#!"
                            data-bs-toggle="collapse" data-bs-target="#navinvoice" aria-expanded="false"
                            aria-controls="navinvoice">
                            <i data-feather="clipboard" class="nav-icon me-2 icon-xxs">
                            </i> Invoice
                        </a>

                        <div id="navinvoice" class="collapse "
                            data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link has-arrow "
                                        href="invoice-list.html">

                                        List
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow "
                                        href="invoice-detail.html">

                                        Detail
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow "
                                        href="invoice-generator.html">

                                        Invoice Generator
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link   collapsed  "
                            href="#!"
                            data-bs-toggle="collapse"
                            data-bs-target="#navprofilePages"
                            aria-expanded="false"
                            aria-controls="navprofilePages">

                            <i data-feather="user" class="nav-icon me-2 icon-xxs">
                            </i> Profile
                        </a>
                        <div id="navprofilePages" class="collapse " data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link " href="profile-overview.html">
                                        Overview
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="profile-project.html">
                                        Project
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="profile-files.html">
                                        Files
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " href="profile-team.html">
                                        Team
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="profile-followers.html">
                                        Followers
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="profile-activity.html">
                                        Activity
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="profile-settings.html">
                                        Settings
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link has-arrow " href="#!"
                            data-bs-toggle="collapse" data-bs-target="#navblog" aria-expanded="false"
                            aria-controls="navblog">
                            <i data-feather="edit" class="nav-icon me-2 icon-xxs">
                            </i> Tin tức
                        </a>

                        <div id="navblog" class="collapse  show "
                            data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link has-arrow  active "
                                        href="{{route('admin.category-news')}}">
                                        Danh mục
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow "
                                        href="{{route('admin.news')}}">
                                        Tin tức
                                    </a>
                                </li>
                               
                            </ul>
                        </div>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <div class="navbar-heading">Layouts & Pages</div>
                    </li>
                    <li class="nav-item ">
                        <a
                            class="nav-link   collapsed  "
                            href="#!"
                            data-bs-toggle="collapse"
                            data-bs-target="#navlayoutPage"
                            aria-expanded="false"
                            aria-controls="navlayoutPage">
                            <i class="nav-icon me-2 icon-xxs" data-feather="file"></i> Pages
                        </a>
                        <div id="navlayoutPage" class="collapse  " data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="starter.html">
                                        Starter </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="pricing.html">
                                        Pricing
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="maintenance.html">
                                        Maintenance
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="404-error.html">
                                        404 Error
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="404-error.html">
                                        Coming Soon
                                    </a>
                                </li>












                            </ul>
                        </div>
                    </li>



                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link has-arrow  collapsed " href="#!"
                            data-bs-toggle="collapse" data-bs-target="#navAuthentication" aria-expanded="false"
                            aria-controls="navAuthentication">
                            <i data-feather="lock" class="nav-icon me-2 icon-xxs">
                            </i> Authentication
                        </a>
                        <div id="navAuthentication" class="collapse "
                            data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="sign-in.html"> Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  "
                                        href="sign-up.html"> Sign Up</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="forget-password.html">
                                        Forget Password
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link has-arrow  collapsed " href="#!"
                            data-bs-toggle="collapse" data-bs-target="#navLayouts" aria-expanded="false"
                            aria-controls="navLayouts">
                            <i data-feather="sidebar" class="nav-icon me-2 icon-xxs">
                            </i> Layouts
                        </a>
                        <div id="navLayouts" class="collapse "
                            data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link  "
                                        href="../index.html"> Default</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="../horizontal/index.html"> Horizontal</a>
                                </li>


                            </ul>
                        </div>
                    </li>


                    <!-- Nav item -->
                    <li class="nav-item">
                        <div class="navbar-heading">UI Components</div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link has-arrow  collapsed " href="#!"
                            data-bs-toggle="collapse" data-bs-target="#navComponents" aria-expanded="false"
                            aria-controls="navComponents">
                            <i data-feather="package" class="nav-icon me-2 icon-xxs">
                            </i> Components
                        </a>
                        <div id="navComponents" class="collapse "
                            data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a href="components/accordions.html" class="nav-link ">
                                        Accordions
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="components/alerts.html"> Alert</a>
                                </li>

                                <li class="nav-item">
                                    <a href="components/badge.html" class="nav-link ">
                                        Badge
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="components/breadcrumb.html" class="nav-link ">
                                        Breadcrumb
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/buttons.html" class="nav-link ">
                                        Buttons
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/button-group.html" class="nav-link ">
                                        Button group
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/card.html" class="nav-link ">
                                        Card
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/carousel.html" class="nav-link ">
                                        Carousel
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/close-button.html" class="nav-link ">
                                        Close Button
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/collapse.html" class="nav-link ">
                                        Collapse
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/dropdowns.html" class="nav-link ">
                                        Dropdowns
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/forms.html" class="nav-link ">
                                        Forms
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="components/list-group.html" class="nav-link ">
                                        List group
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="components/modal.html" class="nav-link ">
                                        Modal
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/navs-tabs.html" class="nav-link ">
                                        Navs and tabs
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/navbar.html" class="nav-link ">
                                        Navbar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/offcanvas.html" class="nav-link ">
                                        Offcanvas
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/pagination.html" class="nav-link ">
                                        Pagination
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/placeholders.html" class="nav-link ">
                                        Placeholders
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/popovers.html" class="nav-link ">
                                        Popovers
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/progress.html" class="nav-link ">
                                        Progress
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/scrollspy.html" class="nav-link ">
                                        Scrollspy
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/spinners.html" class="nav-link ">
                                        Spinners
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/tables.html" class="nav-link ">
                                        Tables
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/toasts.html" class="nav-link ">
                                        Toasts
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="components/tooltips.html" class="nav-link ">
                                        Tooltips
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link has-arrow  collapsed " href="#!"
                            data-bs-toggle="collapse" data-bs-target="#contact" aria-expanded="false"
                            aria-controls="contact">
                            <i data-feather="users" class="nav-icon me-2 icon-xxs">
                            </i> Cảm nhận
                        </a>

                        <div id="contact" class="collapse"
                            data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link has-arrow "
                                        href="{{ route('admin.contacts.index') }}">
                                        Danh sách
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>