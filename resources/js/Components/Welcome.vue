<script setup>
</script>

<template>
        <!-- Navbar -->
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <a class="logo" href="index.html">
                    <span class="logo-light-mode">
                        <img src="{{ asset('assets/img/logo.webp')}}" class="l-dark" style="width: 130px" alt="">
                        <img src="{{ asset('assets/img/logo.webp')}}" class="l-light" style="width: 130px" alt="">
                    </span>
                    <img src="{{ asset('assets/img/logo.webp')}}"  class="logo-dark-mode" style="width: 130px" alt="">
                </a>

                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

                <ul class="buy-button list-inline mb-0">
                    <li class="list-inline-item mb-0 me-1">
                        <div class="dropdown">
                            <button type="button" class="btn dropdown-toggle border-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="uil uil-search text-white title-dark btn-icon-light fs-5 align-middle"></i>
                                <i class="uil uil-search text-dark btn-icon-dark fs-5 align-middle"></i>
                            </button>
                            <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-3 p-0" style="width: 300px;">
                                <div class="search-bar">
                                    <div id="itemSearch" class="menu-search mb-0">
                                        <form role="search" method="get" id="searchItemform" class="searchform">
                                            <input type="text" class="form-control border rounded" name="s" id="searchItem" placeholder="Search...">
                                            <input type="submit" id="searchItemsubmit" value="Search">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item mb-0">
                        <div class="dropdown">
                            <button type="button" class="btn btn-icon rounded-circle btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="shopping-cart" class="icons"></i></button>
                            <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-3 p-4" style="width: 300px;">
                                <div class="pb-4">
                                    <a href="javascript:void(0)" class="d-flex align-items-center">
                                        <img src="https://shreethemes.in/hostick/layouts/images/shop/com.jpg" class="shadow rounded" style="max-height: 64px;" alt="">
                                        <div class="flex-1 text-start ms-3">
                                            <h6 class="text-dark mb-0">.com</h6>
                                            <p class="text-muted mb-0">$10 X 2</p>
                                        </div>
                                        <h6 class="text-dark mb-0">$10</h6>
                                    </a>
                                </div>

                                <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                    <h6 class="text-dark mb-0">Total($):</h6>
                                    <h6 class="text-dark mb-0">$10</h6>
                                </div>

                                <div class="mt-3 text-center">
                                    <a href="javascript:void(0)" class="btn btn-primary me-2">View Cart</a>
                                    <a href="javascript:void(0)" class="btn btn-primary">Checkout</a>
                                </div>
                                <p class="text-muted text-start mt-1 mb-0">*T&C Apply</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item mb-0">
                        <a href="#" class="btn btn-icon rounded-circle btn-primary" data-bs-toggle="modal" data-bs-target="#wishlist"><i data-feather="heart" class="icons"></i></a>
                    </li>
                    <li class="list-inline-item mb-0">
                        <div class="dropdown dropdown-primary">
                            <button type="button" class="btn btn-icon rounded-circle btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="user" class="icons"></i></button>
                            <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-3 py-3" style="width: 200px;">
                                <a class="dropdown-item text-dark" href="my-account.html"><i class="uil uil-user align-middle me-1"></i> Account</a>
                                <a class="dropdown-item text-dark" href="#"><i class="uil uil-clipboard-notes align-middle me-1"></i> Order History</a>
                                <a class="dropdown-item text-dark" href="#"><i class="uil uil-arrow-circle-down align-middle me-1"></i> Download</a>
                                <div class="dropdown-divider my-3 border-top"></div>
                                <a class="dropdown-item text-dark" href="page-login.html"><i class="uil uil-sign-out-alt align-middle me-1"></i> Logout</a>
                            </div>
                        </div>
                    </li>
                </ul><!--end login button-->
        
                <div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu nav-light">
                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)" class="sub-menu-item">Home</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="index.html" class="sub-menu-item">Home One</a></li>
                                <li><a href="index-two.html" class="sub-menu-item">Home Two</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Hosting</a><span class="menu-arrow"></span>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="hosting-shared.html" class="sub-menu-item"><img src="https://shreethemes.in/hostick/layouts/images/icons/shared.svg" class="avatar avatar-ex-sm me-2" alt=""> Shared Hosting</a></li>
                                        <li><a href="hosting-vps.html" class="sub-menu-item"><img src="https://shreethemes.in/hostick/layouts/images/icons/vps.svg" class="avatar avatar-ex-sm me-2" alt=""> VPS Hosting</a></li>     
                                        <li><a href="hosting-dedicated.html" class="sub-menu-item"><img src="https://shreethemes.in/hostick/layouts/images/icons/dedicated.svg" class="avatar avatar-ex-sm me-2" alt=""> Dedicated Server</a></li> 
                                        <li><a href="hosting-cloud.html" class="sub-menu-item"><img src="https://shreethemes.in/hostick/layouts/images/icons/cloud.svg" class="avatar avatar-ex-sm me-2" alt=""> Cloud Hosting</a></li>
                                        <li><a href="hosting-domain.html" class="sub-menu-item"><img src="https://shreethemes.in/hostick/layouts/images/icons/domain.svg" class="avatar avatar-ex-sm me-2" alt=""> Domain Name</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <ul>
                                        <li><a href="hosting-web.html" class="sub-menu-item"><img src="https://shreethemes.in/hostick/layouts/images/icons/web.svg" class="avatar avatar-ex-sm me-2" alt=""> Web Hosting</a></li>
                                        <li><a href="hosting-reseller.html" class="sub-menu-item"><img src="https://shreethemes.in/hostick/layouts/images/icons/reseller.svg" class="avatar avatar-ex-sm me-2" alt=""> Reseller Hosting</a></li>  
                                        <li><a href="hosting-wordpress.html" class="sub-menu-item"><img src="https://shreethemes.in/hostick/layouts/images/icons/wordpress.svg" class="avatar avatar-ex-sm me-2" alt=""> Worpress Server</a></li>  
                                        <li><a href="hosting-email.html" class="sub-menu-item"><img src="https://shreethemes.in/hostick/layouts/images/icons/email.svg" class="avatar avatar-ex-sm me-2" alt=""> Email Server</a></li> 
                                    </ul>
                                </li>
                            </ul>
                        </li>
        
                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Pages</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="page-about.html" class="sub-menu-item">Company</a></li>
                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)"> Blog</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-blog.html" class="sub-menu-item">Blog</a></li>
                                        <li><a href="page-blog-sidebar.html" class="sub-menu-item">Blog Sidebar</a></li>
                                        <li><a href="page-blog-single.html" class="sub-menu-item">Single Blog</a></li>
                                    </ul>  
                                </li>
                                <li><a href="page-faqs.html" class="sub-menu-item">FAQs</a></li>
                                <li><a href="page-support.html" class="sub-menu-item">Support Center</a></li>
                                <li><a href="page-privacy.html" class="sub-menu-item">Privacy Policy</a></li>
                                <li><a href="page-terms.html" class="sub-menu-item">Terms & Conditions</a></li>
                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)"> Auth Pages</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-login.html" class="sub-menu-item">Login</a></li>
                                        <li><a href="page-signup.html" class="sub-menu-item">Signup</a></li>
                                        <li><a href="page-forgot-password.html" class="sub-menu-item">Forgot Password</a></li>
                                    </ul>  
                                </li>
                                <li><a href="page-404.html" class="sub-menu-item">404</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)" class="sub-menu-item">Domains</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="domain-listing.html" class="sub-menu-item">Domain Listing</a></li>
                                <li><a href="domian-detail.html" class="sub-menu-item">Domain Detail</a></li>
                                <li><a href="cart.html" class="sub-menu-item">Cart</a></li>
                                <li><a href="checkouts.html" class="sub-menu-item">Checkout</a></li>
                                <li><a href="my-account.html" class="sub-menu-item">Account</a></li>
                            </ul>
                        </li>

                        <li><a href="contact.html" class="sub-menu-item">Contact</a></li>
                        <li><a href="https://1.envato.market/hostick-template" target="_blank" class="sub-menu-item">Download</a></li>
                    </ul><!--end navigation menu-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->
        
</template>
