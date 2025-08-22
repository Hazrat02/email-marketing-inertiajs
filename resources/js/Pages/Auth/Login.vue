<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AppLayout from "../../Layouts/AppLayout.vue";

defineProps({
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form
    .transform((data) => ({
      ...data,
      remember: form.remember ? "on" : "",
    }))
    .post(route("login"), {
      onFinish: () => form.reset("password"),
    });
};
</script>

<template>
  <AppLayout>
    <Head title="Log in" />



    <section class="cover-user bg-white mt-5">
      <div class="container-fluid px-0">
        <div class="row no-gutters position-relative">
          <div
            class="col-lg-6 d-none d-sm-block padding-less img"
            style="background: url('/assets/img/login.webp') left center"
            data-jarallax='{"speed": 0.5}'
          ></div>
          <!-- end col -->

          <div class="col-lg-8 offset-lg-4 cover-my-30">
            <div class="cover-user-img d-flex align-items-center">
              <div class="row justify-content-center m-0">
                <div class="col-lg-7 col-md-9 col-12">
                  <div class="text-center">
                    <Link :href="route('home')">
                      <img src="/assets/img/logo.webp" height="20" alt="" />
                    </Link>
                  </div>

                  <div
                    class="card login-page border-0 shadow mt-4"
                    style="z-index: 1"
                  >
                    <div class="card-body p-4">
                      <h4 class="card-title text-center">Login</h4>
                      <form class="login-form mt-4" @submit.prevent="submit">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="mb-3 position-relative">
                              <label class="form-label"
                                >Your Email
                                <span class="text-danger">*</span></label
                              >
                              <input
                                 v-model="form.email"
                                type="email"
                                class="form-control"
                                placeholder="Email"
                                name="email"
                                required
                              />
                               <InputError class="mt-1" :message="form.errors.email" />

                            </div>
                          </div>
                          <!--end col-->

                          <div class="col-lg-12">
                            <div class="mb-3 position-relative">
                              <label class="form-label"
                                >Password
                                <span class="text-danger">*</span></label
                              >
                              <input
                                 v-model="form.password"
                                type="password"
                                class="form-control"
                                placeholder="Password"
                                required
                              />
                                              <InputError class="mt-2" :message="form.errors.password" />

                            </div>
                          </div>
                          <!--end col-->

                          <div class="col-lg-12">
                            <div class="d-flex mb-3 justify-content-between">
                              <div class="form-check">
                                <input
                                  class="form-check-input"
                                  type="checkbox"
                                  value=""
                                  id="flexCheckDefault"
                                />
                                <label
                                  class="form-check-label"
                                  for="flexCheckDefault"
                                  >Remember me</label
                                >
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

                          <div class="col-lg-12 mb-0">
                            <button class="btn btn-primary w-100" type="submit">
                              Sign in
                            </button>
                          </div>
                          <!--end col-->

                          <div class="col-12 text-center">
                            <p class="mb-0 mt-3">
                              <small class="text-dark me-2"
                                >Don't have an account ?</small
                              >
                              <Link
                                class="text-dark fw-bold"
                                :href="route('register')"
                              >
                                Sign Up
                              </Link>
                            </p>
                          </div>
                          <!--end col-->
                        </div>
                        <!--end row-->
                      </form>
                    </div>
                  </div>
                </div>
                <!--end col-->
              </div>
              <!--end row-->
            </div>
            <!-- end about detail -->
          </div>
          <!-- end col -->
        </div>
        <!--end row-->
      </div>
      <!--end container fluid-->
    </section>
    <!--end section-->
  </AppLayout>

  <!-- <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="current-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox v-model:checked="form.remember" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Forgot your password?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard> -->
</template>
