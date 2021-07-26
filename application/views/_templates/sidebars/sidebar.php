<!-- BEGIN: Header-->
<div id="page-container" class="sidebar-o sidebar-inverse side-scroll">

    <nav id="sidebar">
        <!-- Sidebar Scroll Container -->
        <div id="sidebar-scroll">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="content-header content-header-fullrow px-15">
                    <!-- Mini Mode -->
                    <div class="content-header-section sidebar-mini-visible-b">
                        <!-- Logo -->
                        <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                            <span class="text-dual-primary-dark">c</span><span class="text-danger">b</span>
                        </span>
                        <!-- END Logo -->
                    </div>
                    <!-- END Mini Mode -->

                    <!-- Normal Mode -->
                    <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                            <i class="fa fa-times text-danger"></i>
                        </button>
                        <!-- END Close Sidebar -->

                        <!-- Logo -->
                        <div class="content-header-item">
                            <a class="link-effect font-w700" href="<?= base_url() ?>">
                                <i class="si si-fire text-danger"></i>
                                <span class="font-size-xl text-dual-primary-dark">civilarch </span><span class="font-size-xl text-danger">id </span>
                            </a>
                        </div>
                        <!-- END Logo -->
                    </div>
                    <!-- END Normal Mode -->
                </div>
                <!-- END Side Header -->

                <!-- Side User -->
                <div class="content-side content-side-full content-side-user px-10 align-parent">
                    <!-- Visible only in mini mode -->
                    <div class="sidebar-mini-visible-b align-v animated fadeIn">
                        <img class="img-avatar" src="https://ui-avatars.com/api/?name='<?= $this->session->userdata('username'); ?>'&rounded=true" alt="">
                    </div>
                    <!-- END Visible only in mini mode -->

                    <!-- Visible only in normal mode -->
                    <div class="sidebar-mini-hidden-b text-center">
                        <a class="img-link" href="be_pages_generic_profile.html">
                            <img class="img-avatar" src="https://ui-avatars.com/api/?name='<?= $this->session->userdata('username'); ?>'&rounded=true&background=ccc&color=fff" alt="">
                        </a>
                        <ul class="list-inline mt-10">
                            <li class="list-inline-item">
                                <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="be_pages_generic_profile.html"><?= $this->session->userdata('username') ?></a>
                            </li>
                            <!-- <li class="list-inline-item">
                                <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                                    <i class="si si-drop"></i>
                                </a>
                            </li> -->
                            <li class="list-inline-item">
                                <a class="link-effect text-dual-primary-dark" href="<?= base_url('login/logout') ?>">
                                    <i class="si si-logout"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END Visible only in normal mode -->
                </div>
                <!-- END Side User -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li>
                            <a href="<?= base_url('backend/admin/dashboard/index') ?>" class="<?php @$li_active == "dashboard" ? 'nav-item hover active' : '' ?> nav-item"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                            <a href="<?= base_url('backend/admin/user/index') ?>" class="<?php @$li_active == "user" ? 'nav-item hover active' : '' ?> nav-item"><i class="si si-map"></i><span class="sidebar-mini-hide">User</span></a>  
                   

                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- Sidebar Content -->
        </div>
        <!-- END Sidebar Scroll Container -->
    </nav>
    <!-- END Sidebar -->