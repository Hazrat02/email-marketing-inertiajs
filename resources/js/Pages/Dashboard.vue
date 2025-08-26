<script setup>
import AppLayout from "../Layouts/AppLayout.vue";
import { usePage, useForm } from "@inertiajs/vue3";

const page = usePage();

// props
const smtps = page.props.smtps;
const orders = page.props.orders;
const templates = page.props.template;

// template form
const form = useForm({
  template_id: page.props.auth.user.template, // only store selected template id
});

// mail form
const mail = useForm({
  smtp_id: "",
  subject: "",
  name: "",
  from: "",
  to: "",
  logo: null, //  must be null, not ''
  message: "",
});

// handle file input
const handleFileUpload = (event) => {
  const file = event.target.files[0];
  if (file) {
    mail.logo = file; // store file in form
  }
};

// submit mail form
const sendMail = () => {
  mail
    .transform((data) => ({
      ...data,
    }))
    .post(route("contact.send"), {
      forceFormData: true, // important for file uploads
    });
};

// select template
const selectTemplate = (tem_id) => {
  form.template_id = tem_id;
  form.post(route("set.template"));
};
</script>


<template>
  <AppLayout title="Dashboard">
    <!-- Home End -->

    <section class="section">
      <div class="container">
        <div class="row align-items-end">
          <div class="col-md-4">
            <div class="d-flex align-items-center">
              <img
                v-if="$page.props.auth.user.img_path"
                src="https://shreethemes.in/hostick/layouts/images/client/05.jpg"
                class="avatar avatar-md-md rounded-circle"
                alt=""
              />
              <img
                v-else
                src="https://cdn-icons-png.flaticon.com/512/9203/9203764.png"
                class="avatar avatar-md-md rounded-circle"
                alt=""
              />
              <div class="ms-3">
                <h6 class="text-muted mb-0">Hello,</h6>
                <h5 class="mb-0">{{ $page.props.auth.user.name }}</h5>
              </div>
            </div>
          </div>
          <!--end col-->

          <div class="col-md-8 mt-4 mt-sm-0 pt-2 pt-sm-0">
            <div class="col-12 mt-4 pt-2 text-center">
              <div
                class="alert alert-light alert-pills mb-0 shadow"
                role="alert"
              >
                <span class="badge rounded-pill bg-primary me-1">Pricing</span>
                <span class="content">
                  <a href="" class="text-primary">See plan details .</a>
                  You are in free Plan.please upgrade for unlimited mail send.
                </span>
              </div>
            </div>
          </div>
          <!--end col-->
        </div>
        <!--end row-->

        <div class="row">
          <div class="col-md-4 mt-4 pt-2">
            <ul
              class="nav nav-pills nav-justified flex-column rounded shadow p-3 mb-0"
              id="pills-tab"
              role="tablist"
            >
              <li class="nav-item">
                <a
                  class="nav-link rounded active"
                  id="dashboard"
                  data-bs-toggle="pill"
                  href="#dash"
                  role="tab"
                  aria-controls="dash"
                  aria-selected="false"
                >
                  <div class="text-start py-1 px-3">
                    <h6 class="mb-0">
                      <i
                        class="uil uil-dashboard h5 align-middle me-2 mb-0"
                      ></i>
                      Dashboard
                    </h6>
                  </div> </a
                ><!--end nav link-->
              </li>
              <!--end nav item-->

              <li class="nav-item mt-2">
                <a
                  class="nav-link rounded"
                  id="order-history"
                  data-bs-toggle="pill"
                  href="#orders"
                  role="tab"
                  aria-controls="orders"
                  aria-selected="false"
                >
                  <div class="text-start py-1 px-3">
                    <h6 class="mb-0">
                      <i class="uil uil-list-ul h5 align-middle me-2 mb-0"></i>
                      Orders
                    </h6>
                  </div> </a
                ><!--end nav link-->
              </li>
              <!--end nav item-->

              <li class="nav-item mt-2">
                <a
                  class="nav-link rounded"
                  id="download"
                  data-bs-toggle="pill"
                  href="#down"
                  role="tab"
                  aria-controls="down"
                  aria-selected="false"
                >
                  <div class="text-start py-1 px-3">
                    <h6 class="mb-0">
                      <i
                        class="uil uil-arrow-circle-down h5 align-middle me-2 mb-0"
                      ></i>
                      Templates
                    </h6>
                  </div> </a
                ><!--end nav link-->
              </li>
              <!--end nav item-->

              <li class="nav-item mt-2">
                <a
                  class="nav-link rounded"
                  id="addresses"
                  data-bs-toggle="pill"
                  href="#address"
                  role="tab"
                  aria-controls="address"
                  aria-selected="false"
                >
                  <div class="text-start py-1 px-3">
                    <h6 class="mb-0">
                      <i
                        class="uil uil-map-marker h5 align-middle me-2 mb-0"
                      ></i>
                      Deposit
                    </h6>
                  </div> </a
                ><!--end nav link-->
              </li>
              <!--end nav item-->

              <li class="nav-item mt-2">
                <a
                  class="nav-link rounded"
                  id="account-details"
                  data-bs-toggle="pill"
                  href="#account"
                  role="tab"
                  aria-controls="account"
                  aria-selected="false"
                >
                  <div class="text-start py-1 px-3">
                    <h6 class="mb-0">
                      <i class="uil uil-user h5 align-middle me-2 mb-0"></i>
                      Send Mail
                    </h6>
                  </div> </a
                ><!--end nav link-->
              </li>
              <!--end nav item-->
              <li class="nav-item mt-2">
                <a
                  class="nav-link rounded"
                  id="domain"
                  data-bs-toggle="pill"
                  href="#domain1"
                  role="tab"
                  aria-controls="domain1"
                  aria-selected="false"
                >
                  <div class="text-start py-1 px-3">
                    <h6 class="mb-0">
                      <i class="uil uil-user h5 align-middle me-2 mb-0"></i>
                      Domain
                    </h6>
                  </div> </a
                ><!--end nav link-->
              </li>
              <!--end nav item-->
            </ul>
            <!--end nav pills-->
          </div>
          <!--end col-->

          <div class="col-md-8 col-12 mt-4 pt-2">
            <div class="tab-content" id="pills-tabContent">
              <div
                class="tab-pane fade show active shadow rounded p-4"
                id="dash"
                role="tabpanel"
                aria-labelledby="dashboard"
              >
                <section class="mt-5">
                  <div class="container-fluid">
                    <div class="row size-column">
                      <div class="col-xxl-9 box-col-12">
                        <div class="row">
                          <div class="col-xl-3 col-sm-6">
                            <div class="card small-widget">
                              <div class="card-body total-project">
                                <span>Total Balance</span>
                                <div class="project-details">
                                  <div class="project-counter">
                                    <h2 style="font-weight: 600">
                                      {{ $page.props.auth.user.balance }}
                                    </h2>
                                    <span>(USD) </span>
                                  </div>
                                  <div class="product-sub bg-primary-light">
                                    <svg
                                      class="invoice-icon"
                                      xmlns="http://www.w3.org/2000/svg"
                                      viewBox="0 0 24 24"
                                    >
                                      <path
                                        d="M22 16.5V19.5C22 20.88 20.88 22 19.5 22H12.36C11.47 22 11.03 20.93 11.65 20.3L17.52 14.3C17.71 14.11 17.97 14 18.23 14H19.5C20.88 14 22 15.12 22 16.5Z"
                                        fill="#006666"
                                      />
                                      <path
                                        d="M18.37 11.2895L15.66 13.9995L13.2 16.4495C12.57 17.0795 11.49 16.6395 11.49 15.7495C11.49 12.5395 11.49 7.25953 11.49 7.25953C11.49 6.98953 11.6 6.73953 11.78 6.54953L12.7 5.62953C13.68 4.64953 15.26 4.64953 16.24 5.62953L18.36 7.74953C19.35 8.72953 19.35 10.3095 18.37 11.2895Z"
                                        fill="#006666"
                                      />
                                      <path
                                        d="M7.5 2H4.5C3 2 2 3 2 4.5V18C2 18.27 2.03 18.54 2.08 18.8C2.11 18.93 2.14 19.06 2.18 19.19C2.23 19.34 2.28 19.49 2.34 19.63C2.35 19.64 2.35 19.65 2.35 19.65C2.36 19.65 2.36 19.65 2.35 19.66C2.49 19.94 2.65 20.21 2.84 20.46C2.95 20.59 3.06 20.71 3.17 20.83C3.28 20.95 3.4 21.05 3.53 21.15L3.54 21.16C3.79 21.35 4.06 21.51 4.34 21.65C4.35 21.64 4.35 21.64 4.35 21.65C4.5 21.72 4.65 21.77 4.81 21.82C4.94 21.86 5.07 21.89 5.2 21.92C5.46 21.97 5.73 22 6 22C6.41 22 6.83 21.94 7.22 21.81C7.33 21.77 7.44 21.73 7.55 21.68C7.9 21.54 8.24 21.34 8.54 21.08C8.63 21.01 8.73 20.92 8.82 20.83L8.86 20.79C9.56 20.07 10 19.08 10 18V4.5C10 3 9 2 7.5 2ZM6 19.5C5.17 19.5 4.5 18.83 4.5 18C4.5 17.17 5.17 16.5 6 16.5C6.83 16.5 7.5 17.17 7.5 18C7.5 18.83 6.83 19.5 6 19.5Z"
                                        fill="#006666"
                                      />
                                    </svg>
                                  </div>
                                </div>
                                <ul class="bubbles">
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-3 col-sm-6">
                            <div class="card small-widget">
                              <div
                                class="card-body total-Progress border-b-warning border-2"
                              >
                                <span class="f-light f-w-500 f-14"
                                  >In Progress</span
                                >
                                <div class="project-details">
                                  <div class="project-counter">
                                    <h2 class="f-w-600">836</h2>
                                    <span class="f-12 f-w-400"
                                      >(This month)
                                    </span>
                                  </div>
                                  <div class="product-sub bg-warning-light">
                                    <svg
                                      class="invoice-icon"
                                      xmlns="http://www.w3.org/2000/svg"
                                      viewBox="0 0 24 24"
                                    >
                                      <path
                                        d="M21 22H3C2.59 22 2.25 21.66 2.25 21.25C2.25 20.84 2.59 20.5 3 20.5H21C21.41 20.5 21.75 20.84 21.75 21.25C21.75 21.66 21.41 22 21 22Z"
                                        fill="#FFAE1A"
                                      />
                                      <path
                                        d="M19.02 3.47967C17.08 1.53967 15.18 1.48967 13.19 3.47967L11.98 4.68967C11.88 4.78967 11.84 4.94967 11.88 5.08967C12.64 7.73967 14.76 9.85967 17.41 10.6197C17.45 10.6297 17.49 10.6397 17.53 10.6397C17.64 10.6397 17.74 10.5997 17.82 10.5197L19.02 9.30967C20.01 8.32967 20.49 7.37967 20.49 6.41967C20.5 5.42967 20.02 4.46967 19.02 3.47967Z"
                                        fill="#FFAE1A"
                                      />
                                      <path
                                        d="M15.61 11.5308C15.32 11.3908 15.04 11.2508 14.77 11.0908C14.55 10.9608 14.34 10.8208 14.13 10.6708C13.96 10.5608 13.76 10.4008 13.57 10.2408C13.55 10.2308 13.48 10.1708 13.4 10.0908C13.07 9.81078 12.7 9.45078 12.37 9.05078C12.34 9.03078 12.29 8.96078 12.22 8.87078C12.12 8.75078 11.95 8.55078 11.8 8.32078C11.68 8.17078 11.54 7.95078 11.41 7.73078C11.25 7.46078 11.11 7.19078 10.97 6.91078C10.9488 6.86539 10.9283 6.82022 10.9084 6.77532C10.7608 6.442 10.3262 6.34455 10.0684 6.60231L4.33995 12.3308C4.20995 12.4608 4.08995 12.7108 4.05995 12.8808L3.51995 16.7108C3.41995 17.3908 3.60995 18.0308 4.02995 18.4608C4.38995 18.8108 4.88995 19.0008 5.42995 19.0008C5.54995 19.0008 5.66995 18.9908 5.78995 18.9708L9.62995 18.4308C9.80995 18.4008 10.06 18.2808 10.18 18.1508L15.9013 12.4295C16.1608 12.1699 16.0629 11.7245 15.7253 11.5804C15.6873 11.5642 15.6489 11.5476 15.61 11.5308Z"
                                        fill="#FFAE1A"
                                      />
                                    </svg>
                                  </div>
                                </div>
                                <ul class="bubbles">
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-3 col-sm-6">
                            <div class="card o-hidden small-widget">
                              <div
                                class="card-body total-Complete border-b-secondary border-2"
                              >
                                <span class="f-light f-w-500 f-14"
                                  >Complete</span
                                >
                                <div class="project-details">
                                  <div class="project-counter">
                                    <h2 class="f-w-600">475</h2>
                                    <span class="f-12 f-w-400"
                                      >(This month)
                                    </span>
                                  </div>
                                  <div class="product-sub bg-secondary-light">
                                    <i class="fa fa-check invoice-icon"></i>
                                  </div>
                                </div>
                                <ul class="bubbles">
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-3 col-sm-6">
                            <div class="card o-hidden small-widget">
                              <div class="card-body total-upcoming">
                                <span class="f-light f-w-500 f-14"
                                  >Upcoming</span
                                >
                                <div class="project-details">
                                  <div class="project-counter">
                                    <h2 class="f-w-600">189</h2>
                                    <span class="f-12 f-w-400"
                                      >(This month)
                                    </span>
                                  </div>
                                  <div class="product-sub bg-light-light">
                                    <i class="fa fa-"></i>
                                  </div>
                                </div>
                                <ul class="bubbles">
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                  <li class="bubble"></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              <!--end teb pane-->

              <div
                class="tab-pane fade shadow rounded p-4"
                id="orders"
                role="tabpanel"
                aria-labelledby="order-history"
              >
                <div class="table-responsive bg-white shadow rounded">
                  <table class="table mb-0 table-center table-nowrap">
                    <thead>
                      <tr>
                        <th scope="col" class="border-bottom">Total Mail</th>
                        <th scope="col" class="border-bottom">Success</th>
                        <th scope="col" class="border-bottom">Total cost</th>
                        <th scope="col" class="border-bottom">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="order in orders" :key="order.id">
                        <td>{{ order.total_mail }}</td>
                        <td>{{ order.success }}</td>
                        <td>
                        {{ order.total_cost }} $
                        </td>
     
                        <td>
                          <a href="javascript:void(0)" class="text-primary">
                            View <i class="uil uil-arrow-right"></i>
                          </a>
                        </td>
                      </tr>

                      <!-- Show message when no orders -->
                      <tr v-if="!orders.length">
                        <td colspan="5" class="text-center p-5">
                          You haven’t any order. Send mail first.
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--end teb pane-->
              <div
                class="tab-pane fade shadow rounded p-4"
                id="down"
                role="tabpanel"
                aria-labelledby="download"
              >
                <div class="row justify-content-center">
                  <div class="mt-4 pt-2 text-center">
                    <ul
                      class="nav nav-pills nav-justified flex-sm-row rounded px-0"
                    >
                      <!-- India -->
                      <li
                        class="nav-item col-12 col-md-6"
                        v-for="template in templates"
                        :key="template.id"
                      >
                        <button
                          class="nav-link rounded w-100"
                          :class="{ active: form.template_id == template.id }"
                          @click="selectTemplate(template.id)"
                        >
                          <div class="text-center py-2">
                            <img
                              :src="template.img"
                              class="avatar avatar-large"
                              alt=""
                            />
                            <h4 class="title fw-normal mt-3 mb-0">
                              {{ template.name }}
                            </h4>
                          </div>
                        </button>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!--end teb pane-->

              <div
                class="tab-pane fade shadow rounded p-4"
                id="address"
                role="tabpanel"
                aria-labelledby="addresses"
              >
                <h6 class="text-muted mb-0">
                  The following addresses will be used on the checkout page by
                  default.
                </h6>

                <div class="row">
                  <div class="col-lg-6 mt-4 pt-2">
                    <div
                      class="d-flex align-items-center mb-4 justify-content-between"
                    >
                      <h5 class="mb-0">Current Balance:</h5>
                      <a
                        href="javascript:void(0)"
                        class="text-primary h5 mb-0"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title=""
                        data-original-title="Edit"
                        ><i class="uil uil-edit align-middle"></i
                      ></a>
                    </div>
                    <div class="pt-4 border-top">
                      <p class="h6">Coming Soon!</p>
                    </div>
                  </div>

                  <div class="col-lg-6 mt-4 pt-2">
                    <h5 class="mb-0">
                      {{ $page.props.auth.user.balance }} USD
                    </h5>
                  </div>
                </div>
              </div>
              <!--end teb pane-->

              <div
                class="tab-pane fade shadow rounded p-4"
                id="account"
                role="tabpanel"
                aria-labelledby="account-details"
              >
                <form @submit.prevent="sendMail">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label class="form-label"
                          >Select Domain
                          <span class="text-danger">*</span></label
                        >
                        <select class="form-control" v-model="mail.smtp_id">
                          <option
                            v-for="smtp in smtps"
                            :key="smtp.id"
                            :value="smtp.id"
                          >
                            {{ smtp.from_address }}
                          </option>
                        </select>
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label"
                          >Organization Name
                          <span class="text-danger">*</span></label
                        >
                        <input
                          name="name"
                          id="last-name"
                          type="text"
                          class="form-control"
                          v-model="mail.name"
                          required
                          placeholder="Createlize"
                        />
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label"
                          >From email <span class="text-danger">*</span></label
                        >
                        <input
                          id="email"
                          type="email"
                          class="form-control"
                          v-model="mail.from"
                          required
                          placeholder="support@domain.com"
                        />
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label">Display Logo (Optional)</label>
                        <input
                          name="name"
                          id="display-name"
                          type="file"
                          class=""
                          @change="handleFileUpload"
                          
                        />
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label class="form-label"
                          >To email (upto 5K)
                          <span class="text-danger">*</span></label
                        >
                        <textarea
    class="form-control"
    v-model="mail.to"
    required
    placeholder="
    example1@gmail.com
    example2@yahoo.com
    example4@domain.com"
    rows="6">
</textarea>
                       
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label class="form-label"
                          >Subject <span class="text-danger">*</span></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          v-model="mail.subject"
                          required
                          placeholder="Welcome to our services"
                        />

                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label class="form-label"
                          >Message <span class="text-danger">*</span></label
                        >
                       <textarea
    class="form-control"
    v-model="mail.message"
    required
    placeholder="say something..."
    rows="6">
</textarea>
                      </div>
                    </div>
                    <div class="col-lg-12 mt-2 mb-0">
                      <button class="btn btn-primary">Send Mail</button>
                    </div>
                    <!--end col-->
                  </div>
                  <!--end row-->
                </form>

                <!-- <h5 class="mt-4">Change password :</h5>
                <form>
                  <div class="row mt-3">
                    <div class="col-lg-12">
                      <div class="mb-3">
                        <label class="form-label">Old password :</label>
                        <input
                          type="password"
                          class="form-control"
                          placeholder="Old password"
                          required=""
                        />
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="mb-3">
                        <label class="form-label">New password :</label>
                        <input
                          type="password"
                          class="form-control"
                          placeholder="New password"
                          required=""
                        />
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="mb-3">
                        <label class="form-label">Re-type New password :</label>
                        <input
                          type="password"
                          class="form-control"
                          placeholder="Re-type New password"
                          required=""
                        />
                      </div>
                    </div>

                    <div class="col-lg-12 mt-2 mb-0">
                      <button class="btn btn-primary">Save Password</button>
                    </div>
                  </div>
                </form> -->
              </div>
              <div
                class="tab-pane fade shadow rounded p-4"
                id="domain1"
                role="tabpanel"
                aria-labelledby="domain"
              >
                gghujhgh
              </div>
              <!--end teb pane-->
            </div>
          </div>
          <!--end col-->
        </div>
        <!--end row-->
      </div>
      <!--end container-->
    </section>
  </AppLayout>
</template>
<style scoped>
span {
  color: aliceblue;
}
</style>