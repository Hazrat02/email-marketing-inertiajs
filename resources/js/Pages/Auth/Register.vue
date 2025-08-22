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

const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
  terms: false,
});

const submit = () => {
  form.post(route("register"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <AppLayout>
    <Head title="Register" />

    <section class="cover-user bg-white mt-5 pt-5">
      <div class="container-fluid px-0">
        <div class="row no-gutters position-relative">
          <div
            class="col-lg-6 d-none d-sm-block padding-less img"
            style="background: url('/assets/img/ragister.webp') left center"
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
                      <h4 class="card-title text-center">Signup</h4>
                      <form class="login-form mt-4" @submit.prevent="submit">
                        <div class="col-md-12">
                            <div class="mb-3 position-relative">
                              <label class="form-label"
                                >Your Email
                                <span class="text-danger">*</span></label
                              >
                              <input
                                type="email"
                                class="form-control"
                                placeholder="Email"
                                name="email"
                                required
                                v-model="form.email"
                              />
                                                             <InputError class="mt-1" :message="form.errors.email" />

                            </div>
                          </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3 position-relative">
                              <label class="form-label"
                                >Code
                                <span class="text-danger">*</span></label
                              >
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Code"
                                name="code"
                                v-model="form.code"
                              />
                                                             <InputError class="mt-1" :message="form.errors.code" />

                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3 position-relative">
                              <label class="form-label"
                                >name
                                <span class="text-danger">*</span></label
                              >
                              <input
                              v-model="form.name"
                                type="text"
                                class="form-control"
                                placeholder="Name"
                                name="name"
                                required
                              />
                                <InputError class="mt-1" :message="form.errors.name" />

                            </div>
                          </div>
                          
                          
                          <div class="col-md-12">
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
                                name="password"
                              />
                              <InputError class="mt-1" :message="form.errors.password" />

                            </div>
                          </div>
                          
                          <div class="col-md-12">
                            <div class="mb-3 position-relative">
                              <label class="form-label"
                                >Retype Password
                                <span class="text-danger">*</span></label
                              >
                              <input
                                 v-model="form.password_confirmation"

                                type="password"
                                class="form-control"
                                placeholder="Retype Password"
                                required
                                name="password_confirmation"
                              />
                               <InputError class="mt-1" :message="form.errors.password_confirmation" />

                            </div>
                          </div>
                          <div class="col-md-12">
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
                                  >I Accept
                                  <a href="#" class="text-primary"
                                    >Terms And Condition</a
                                  ></label
                                >
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <button class="btn btn-primary w-100">
                              Register
                            </button>
                          </div>

                          <div class="mx-auto">
                            <p class="mb-0 mt-3">
                              <small class="text-dark me-2"
                                >Already have an account ?</small
                              >

                              <Link
                                class="text-dark fw-bold"
                                :href="route('login')"
                              >
                                Sign In
                              </Link>
                            </p>
                          </div>
                        </div>
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

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="name"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
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
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <InputLabel for="terms">
                    <div class="flex items-center">
                        <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a>
                        </div>
                    </div>
                    <InputError class="mt-2" :message="form.errors.terms" />
                </InputLabel>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Already registered?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard> -->
</template>
