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