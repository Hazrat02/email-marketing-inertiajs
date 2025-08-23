<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import ApplicationMark from "@/Components/ApplicationMark.vue";
import Banner from "@/Components/Banner.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";

defineProps({
  title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
  router.put(
    route("current-team.update"),
    {
      team_id: team.id,
    },
    {
      preserveState: false,
    }
  );
};

const logout = () => {
  router.post(route("logout"));
};
</script>

<template>
  <div>
    <Head :title="title" />

    <!-- <Banner /> -->


    <!-- Navbar STart -->
    <header id="topnav" class="defaultscroll sticky mb-5">
      <div class="container">
        <!-- Logo container-->

            <Link class="logo" :href="route('home')">
          <span class="logo-light-mode">
            <img
              src="/assets/img/logo.webp"
              class="l-dark"
              style="width: 130px"
              alt=""
            />
            <img
              src="/assets/img/logo.webp"
              class="l-light"
              style="width: 130px"
              alt=""
            />
          </span>
          <img
            src="/assets/img/logo.webp"
            class="logo-dark-mode"
            style="width: 130px"
            alt=""
          />
        </Link>

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
              <button
                type="button"
                class="btn dropdown-toggle border-0 p-0"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i
                  class="uil uil-search text-white title-dark btn-icon-light fs-5 align-middle fa fa-search"
                ></i>
                <i
                  class="uil uil-search text-dark btn-icon-dark fs-5 align-middle  fa fa-search"
                ></i>
              </button>
              <div
                class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-3 p-0"
                style="width: 300px"
              >
                <div class="search-bar">
                  <div id="itemSearch" class="menu-search mb-0">
                    <form
                      role="search"
                      method="get"
                      id="searchItemform"
                      class="searchform"
                    >
                      <input
                        type="text"
                        class="form-control border rounded"
                        name="s"
                        id="searchItem"
                        placeholder="Search..."
                      />
                      <input
                        type="submit"
                        id="searchItemsubmit"
                        value="Search"
                      />
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="list-inline-item mb-0">
            <div class="dropdown">
              <button
                type="button"
                class="btn btn-icon rounded-circle btn-primary dropdown-toggle"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i  class="icons fa fa-shopping-cart"></i>
              </button>
              <div
                class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-3 p-4"
                style="width: 300px"
              >
                <div class="pb-4">
                  <a
                    href="javascript:void(0)"
                    class="d-flex align-items-center"
                  >
                    <img
                      src="https://shreethemes.in/hostick/layouts/images/shop/com.jpg"
                      class="shadow rounded"
                      style="max-height: 64px"
                      alt=""
                    />
                    <div class="flex-1 text-start ms-3">
                      <h6 class="text-dark mb-0">.com</h6>
                      <p class="text-muted mb-0">$10 X 2</p>
                    </div>
                    <h6 class="text-dark mb-0">$10</h6>
                  </a>
                </div>

                <div
                  class="d-flex align-items-center justify-content-between pt-4 border-top"
                >
                  <h6 class="text-dark mb-0">Total($):</h6>
                  <h6 class="text-dark mb-0">$10</h6>
                </div>

                <div class="mt-3 text-center">
                  <a href="javascript:void(0)" class="btn btn-primary me-2"
                    >View Cart</a
                  >
                  <a href="javascript:void(0)" class="btn btn-primary"
                    >Checkout</a
                  >
                </div>
                <p class="text-muted text-start mt-1 mb-0">*T&C Apply</p>
              </div>
            </div>
          </li>
          <li class="list-inline-item mb-0">
            <a
              href="#"
              class="btn btn-icon rounded-circle btn-primary"
              data-bs-toggle="modal"
              data-bs-target="#wishlist"
              ><i class="icons fa fa-heart"></i
            ></a>
          </li>
          <li class="list-inline-item mb-0">
            <div class="dropdown dropdown-primary">
              <button
                type="button"
                class="btn btn-icon rounded-circle btn-primary dropdown-toggle"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i  class="icons fa fa-user"></i>
              </button>
              <div
                class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-3 py-3"
                style="width: 200px"
                v-if="$page.props.auth.user"
              >
                <Link class="dropdown-item text-dark" :href="route('dashboard')"
                  ><i class="uil uil-user align-middle me-1"></i> Dashboard</Link
                >
                <a class="dropdown-item text-dark" href="#"
                  ><i class="uil uil-clipboard-notes align-middle me-1"></i>
                  Order History</a
                >
                <a class="dropdown-item text-dark" href="#"
                  ><i class="uil uil-arrow-circle-down align-middle me-1"></i>
                  Download</a
                >
                <div class="dropdown-divider my-3 border-top"></div>
                 <form  @submit.prevent="logout">
                  <button type="submit" class="dropdown-item text-dark" >
                <i class="uil uil-sign-out-alt align-middle me-1"></i>
                  Logout
                </button>
                 </form>
               
              </div>
              <div
                v-else
                class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-3 py-3"
                style="width: 200px"
              >
                <Link class="dropdown-item text-dark" :href="route('login')"
                  ><i class="uil uil-user align-middle me-1"></i> Sign In</Link
                >
                <Link class="dropdown-item text-dark" :href="route('register')"
                  ><i class="uil uil-user align-middle me-1"></i> Sign Up</Link
                >
               
              </div>
            </div>
          </li>
        </ul>
        <!--end login button-->

        <div id="navigation">
          <!-- Navigation Menu-->
          <ul class="navigation-menu nav-light">
            <li class="has-submenu parent-parent-menu-item">
              <a href="javascript:void(0)" class="sub-menu-item">Home</a
              ><span class="menu-arrow"></span>
              <ul class="submenu">
                <li><a href="index.html" class="sub-menu-item">Home One</a></li>
                <li>
                  <a href="index-two.html" class="sub-menu-item">Home Two</a>
                </li>
              </ul>
            </li>

            <li class="has-submenu parent-parent-menu-item">
              <a href="javascript:void(0)">Hosting</a
              ><span class="menu-arrow"></span>
              <ul class="submenu megamenu">
                <li>
                  <ul>
                    <li>
                      <a href="hosting-shared.html" class="sub-menu-item"
                        ><img
                          src="https://shreethemes.in/hostick/layouts/images/icons/shared.svg"
                          class="avatar avatar-ex-sm me-2"
                          alt=""
                        />
                        Shared Hosting</a
                      >
                    </li>
                    <li>
                      <a href="hosting-vps.html" class="sub-menu-item"
                        ><img
                          src="https://shreethemes.in/hostick/layouts/images/icons/vps.svg"
                          class="avatar avatar-ex-sm me-2"
                          alt=""
                        />
                        VPS Hosting</a
                      >
                    </li>
                    <li>
                      <a href="hosting-dedicated.html" class="sub-menu-item"
                        ><img
                          src="https://shreethemes.in/hostick/layouts/images/icons/dedicated.svg"
                          class="avatar avatar-ex-sm me-2"
                          alt=""
                        />
                        Dedicated Server</a
                      >
                    </li>
                    <li>
                      <a href="hosting-cloud.html" class="sub-menu-item"
                        ><img
                          src="https://shreethemes.in/hostick/layouts/images/icons/cloud.svg"
                          class="avatar avatar-ex-sm me-2"
                          alt=""
                        />
                        Cloud Hosting</a
                      >
                    </li>
                    <li>
                      <a href="hosting-domain.html" class="sub-menu-item"
                        ><img
                          src="https://shreethemes.in/hostick/layouts/images/icons/domain.svg"
                          class="avatar avatar-ex-sm me-2"
                          alt=""
                        />
                        Domain Name</a
                      >
                    </li>
                  </ul>
                </li>

                <li>
                  <ul>
                    <li>
                      <a href="hosting-web.html" class="sub-menu-item"
                        ><img
                          src="https://shreethemes.in/hostick/layouts/images/icons/web.svg"
                          class="avatar avatar-ex-sm me-2"
                          alt=""
                        />
                        Web Hosting</a
                      >
                    </li>
                    <li>
                      <a href="hosting-reseller.html" class="sub-menu-item"
                        ><img
                          src="https://shreethemes.in/hostick/layouts/images/icons/reseller.svg"
                          class="avatar avatar-ex-sm me-2"
                          alt=""
                        />
                        Reseller Hosting</a
                      >
                    </li>
                    <li>
                      <a href="hosting-wordpress.html" class="sub-menu-item"
                        ><img
                          src="https://shreethemes.in/hostick/layouts/images/icons/wordpress.svg"
                          class="avatar avatar-ex-sm me-2"
                          alt=""
                        />
                        Worpress Server</a
                      >
                    </li>
                    <li>
                      <a href="hosting-email.html" class="sub-menu-item"
                        ><img
                          src="https://shreethemes.in/hostick/layouts/images/icons/email.svg"
                          class="avatar avatar-ex-sm me-2"
                          alt=""
                        />
                        Email Server</a
                      >
                    </li>
                  </ul>
                </li>
              </ul>
            </li>

            
            <li class="has-submenu parent-parent-menu-item">
              <a href="javascript:void(0)" class="sub-menu-item">Domains</a
              ><span class="menu-arrow"></span>
              <ul class="submenu">
                <li>
                  <a href="domain-listing.html" class="sub-menu-item"
                    >Domain Listing</a
                  >
                </li>
                <li>
                  <a href="domian-detail.html" class="sub-menu-item"
                    >Domain Detail</a
                  >
                </li>
                <li><a href="cart.html" class="sub-menu-item">Cart</a></li>
                <li>
                  <a href="checkouts.html" class="sub-menu-item">Checkout</a>
                </li>
                <li>
                  <a href="my-account.html" class="sub-menu-item">Account</a>
                </li>
              </ul>
            </li>

            <li><a href="contact.html" class="sub-menu-item">Contact</a></li>
            <li>
              <a
                href="https://1.envato.market/hostick-template"
                target="_blank"
                class="sub-menu-item"
                >Download</a
              >
            </li>
          </ul>
          <!--end navigation menu-->
        </div>
        <!--end navigation-->
      </div>
      <!--end container-->
    </header>
    <!--end header-->


    <slot />

    <!-- Footer Start -->
    <footer class="footer bg-footer">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="section-title text-md-center">
              <h4 class="text-light title-dark mb-0">Get In Touch !</h4>
            </div>
          </div>
          <!--end col-->
        </div>
        <!--end row-->

        <div class="row mt-3 justify-content-center">
          <div class="col-md-4 mt-4 pt-2">
            <div class="text-md-center">
              <div class="icon">
                <i
               
                  class="fea icon-md text-light title-dark fa fa-mail"
                ></i>
              </div>
              <div class="content mt-2">
                <h5 class="title text-light title-dark">Email</h5>
                <a href="mailto:contact@example.com" class="text-foot"
                  >contact@example.com</a
                >
              </div>
            </div>
          </div>
          <!--end col-->

          <div class="col-md-4 mt-4 pt-2">
            <div class="text-md-center">
              <div class="icon">
                <i
                  
                  class="fea icon-md text-light title-dark fa fa-phone"
                ></i>
              </div>
              <div class="content mt-2">
                <h5 class="title text-light title-dark">Phone</h5>
                <a href="tel:+152534-468-854" class="text-foot"
                  >+152 534-468-854</a
                >
              </div>
            </div>
          </div>
          <!--end col-->

          <div class="col-md-4 mt-4 pt-2">
            <div class="text-md-center">
              <div class="icon">
                <i
                 
                  class="fea icon-md text-light title-dark fa fa-map-pin"
                ></i>
              </div>
              <div class="content mt-2">
                <h5 class="title text-light title-dark">Location</h5>
                <a href="#" class="text-foot">Australia</a>
              </div>
            </div>
          </div>
          <!--end col-->
        </div>
        <!--end row-->
      </div>
      <!--end container-->

      <div class="container mt-5">
        <div class="footer-bar">
          <div class="row mt-5">
            <div class="col-lg-4 col-md-12">
              <a class="logo-footer h4 mouse-down text-light" href="#home">
                <img src="/assets/img/logo.webp" width="120" alt="" />
              </a>
              <p class="mt-4 text-foot">
                There is now an abundance of <br />
                readable dummy texts. These are is required purely to fill a
                space.
              </p>
              <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                <li class="list-inline-item">
                  <a href="javascript:void(0)" class="rounded"
                    ><i
                     
                      class="fea icon-sm fea-social fa fa-facebook" 
                    ></i
                  ></a>
                </li>
                <li class="list-inline-item">
                  <a href="javascript:void(0)" class="rounded"
                    ><i
                   
                      class="fea icon-sm fea-social fa fa-instagram"
                    ></i
                  ></a>
                </li>
                <li class="list-inline-item">
                  <a href="javascript:void(0)" class="rounded"
                    ><i
             
                      class="icon-sm fa fa-twitter"
                    ></i
                  ></a>
                </li>
                <li class="list-inline-item">
                  <a href="javascript:void(0)" class="rounded"
                    ><i
                     
                      class="icon-sm fa fa-linkedin"
                    ></i
                  ></a>
                </li>
              </ul>
              <!--end icon-->
            </div>

            <div class="col-lg-8">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-12 mt-4 pt-2 mt-lg-0 pt-lg-0">
                  <h5 class="text-light title-dark footer-head fw-normal mb-0">
                    Hosting
                  </h5>
                  <ul class="list-unstyled footer-list mt-4">
                    <li>
                      <a href="javascript:void(0)" class="text-foot"
                        ><i class="mdi mdi-chevron-right me-1"></i>Shared
                        Hosting</a
                      >
                    </li>
                    <li>
                      <a href="javascript:void(0)" class="text-foot"
                        ><i class="mdi mdi-chevron-right me-1"></i>VPS
                        Hosting</a
                      >
                    </li>
                    <li>
                      <a href="javascript:void(0)" class="text-foot"
                        ><i class="mdi mdi-chevron-right me-1"></i>Dedicated
                        Hosting</a
                      >
                    </li>
                    <li>
                      <a href="javascript:void(0)" class="text-foot"
                        ><i class="mdi mdi-chevron-right me-1"></i>Cloud
                        Hosting</a
                      >
                    </li>
                    <li>
                      <a href="javascript:void(0)" class="text-foot"
                        ><i class="mdi mdi-chevron-right me-1"></i>Reseller
                        Hosting</a
                      >
                    </li>
                    <li>
                      <a href="javascript:void(0)" class="text-foot"
                        ><i class="mdi mdi-chevron-right me-1"></i>Domain
                        Name</a
                      >
                    </li>
                  </ul>
                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-4 pt-2 mt-lg-0 pt-lg-0">
                  <h5 class="text-light title-dark footer-head fw-normal mb-0">
                    About
                  </h5>
                  <ul class="list-unstyled footer-list mt-4">
                    <li>
                      <a href="javascript:void(0)" class="text-foot"
                        ><i class="mdi mdi-chevron-right me-1"></i>About us</a
                      >
                    </li>
                    <li>
                      <a href="javascript:void(0)" class="text-foot"
                        ><i class="mdi mdi-chevron-right me-1"></i>Contact us</a
                      >
                    </li>
                    <li>
                      <a href="javascript:void(0)" class="text-foot"
                        ><i class="mdi mdi-chevron-right me-1"></i>Terms &
                        Services</a
                      >
                    </li>
                    <li>
                      <a href="javascript:void(0)" class="text-foot"
                        ><i class="mdi mdi-chevron-right me-1"></i>Privacy
                        Policy</a
                      >
                    </li>
                  </ul>
                </div>

                <div class="col-lg-6 col-md-4 col-12 mt-4 pt-2 mt-lg-0 pt-lg-0">
                  <h5 class="text-light title-dark footer-head fw-normal mb-0">
                    Newsletter
                  </h5>
                  <p class="mt-4 text-foot">
                    Sign up and receive the latest tips via email.
                  </p>
                  <form>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="foot-subscribe position-relative mb-3">
                          <label class="text-foot form-label"
                            >Write your email
                            <span class="text-danger">*</span></label
                          >
                          <input
                            type="email"
                            name="email"
                            id="emailsubscribe"
                            class="form-control rounded"
                            placeholder="Your email : "
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <input
                          type="submit"
                          id="submitsubscribe"
                          name="send"
                          class="btn btn-primary w-100"
                          value="Subscribe"
                        />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!--end footer-->
    <footer class="footer footer-line bg-footer">
      <div class="container">
        <div class="row text-center">
          <div class="col-sm-6 col-md-7">
            <div class="text-sm-start">
              <p class="mb-0 text-foot">
                © Createlize. Design with
                <i class="mdi mdi-heart text-danger"></i> by
                <a
                  href="https://shreethemes.in/"
                  target="_blank"
                  class="text-reset"
                  >Shreethemes</a
                >.
              </p>
            </div>
          </div>
          <!--end col-->

          <div class="col-sm-6 col-md-5 mt-4 mt-sm-0 pt-2 pt-sm-0">
            <ul class="list-unstyled terms-service text-sm-end mb-0">
              <li class="list-inline-item mb-0">
                <a href="page-privacy.html" class="text-foot me-2">Privacy</a>
              </li>
              <li class="list-inline-item mb-0">
                <a href="page-terms.html" class="text-foot me-2">Terms</a>
              </li>
              <li class="list-inline-item mb-0">
                <a href="page-faqs.html" class="text-foot me-2">FAQs</a>
              </li>
              <li class="list-inline-item mb-0">
                <a href="contact.html" class="text-foot">Contact</a>
              </li>
            </ul>
          </div>
          <!--end col-->
        </div>
        <!--end row-->
      </div>
      <!--end container-->
    </footer>
    <!--end footer-->
    <!-- Footer End -->

    <!-- Login Modal Content Start -->
    <div
      class="modal fade"
      id="LoginForm"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content rounded shadow border-0">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form class="login-form">
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label"
                      >Your Email <span class="text-danger">*</span></label
                    >
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      required=""
                      placeholder="Your Email :"
                    />
                  </div>
                </div>
                <!--end col-->

                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label"
                      >Password <span class="text-danger">*</span></label
                    >
                    <input
                      type="password"
                      class="form-control"
                      required=""
                      placeholder="Password :"
                    />
                  </div>
                </div>
                <!--end col-->

                <div class="col-12">
                  <div class="d-flex justify-content-between">
                    <div class="mb-3 d-inline-block">
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          value=""
                          id="flexCheckDefault"
                        />
                        <label class="form-check-label" for="flexCheckDefault"
                          >Remember me</label
                        >
                      </div>
                    </div>
                    <p class="forgot-pass mb-0">
                      <a
                        href="page-forgot-password.html"
                        class="text-dark fw-bold"
                        >Forgot password ?</a
                      >
                    </p>
                  </div>
                </div>
                <!--end col-->
                <div class="col-12 mb-0">
                  <button class="btn btn-primary w-100">Sign in</button>
                </div>
                <!--end col-->
                <div class="col-12 mt-4 text-center">
                  <h6 class="mb-0">Or Login With</h6>
                </div>

                <div class="col-12">
                  <div class="row">
                    <div class="col-sm-6 mt-4">
                      <a href="#" class="btn w-100 btn-light bg-facebook"
                        ><i class="mdi mdi-facebook"></i> Facebook</a
                      >
                    </div>
                    <div class="col-sm-6 mt-4">
                      <a href="#" class="btn w-100 btn-light"
                        ><i class="mdi mdi-google"></i> Google</a
                      >
                    </div>
                  </div>
                </div>
                <div class="col-12 text-center">
                  <p class="mb-0 mt-3">
                    <small class="text-dark me-2"
                      >Don't have an account ?</small
                    >
                    <a href="page-signup.html" class="text-dark fw-bold"
                      >Sign Up</a
                    >
                  </p>
                </div>
                <!--end col-->
              </div>
              <!--end row-->
            </form>
            <!--end form-->
          </div>
        </div>
      </div>
    </div>
    <!-- Login Modal Content End -->

    <!-- Wishlist Popup Start -->
    <div
      class="modal fade"
      id="wishlist"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded shadow-lg border-0 overflow-hidden">
          <div class="modal-body py-5">
            <div class="text-center">
              <div
                class="icon d-flex align-items-center justify-content-center bg-soft-danger rounded-circle mx-auto"
                style="height: 95px; width: 95px"
              >
                <h1 class="mb-0">
                  <i class="uil uil-heart-break align-middle"></i>
                </h1>
              </div>
              <div class="mt-4">
                <h4>Your wishlist is empty.</h4>
                <p class="text-muted">Create your first wishlist request...</p>
                <div class="mt-4">
                  <a href="javascript:void(0)" class="btn btn-outline-primary"
                    >+ Create new wishlist</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Wishlist Popup End -->

    <!-- Back to top -->
    <a href="#" class="btn btn-icon btn-soft-primary back-to-top"
      ><i  class="icons fa fa-arrow-up" ></i
    ></a>
    <!-- Back to top -->
  </div>
</template>
