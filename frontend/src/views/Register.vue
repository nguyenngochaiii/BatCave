<template>
  <div>
    <!-- <img class="mx-auto h-12 w-auto" src="@/assets/image/Logo.png"
        alt="Your Company" /> -->
    <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
      Đăng ký tài khoản
    </h2>
    <p class="mt-2 text-center text-sm text-gray-600">
      Or
      {{ ' ' }}
      <router-link class="font-medium text-indigo-600 hover:text-indigo-500" :to="{ name: 'login' }"
        >Đăng nhập tài khoản</router-link
      >
    </p>
  </div>
  <a-form :model="formState" autocomplete="off" class="mt-8 space-y-6" @submit="submit">
    <a-input type="hidden" name="remember" value="true" />
    <div class="-space-y-px rounded-md shadow-sm">
      <div>
        <label for="fullname" class="sr-only">Tên đăng nhập</label>
        <a-input
          id="fullname"
          name="name"
          type="text"
          autocomplete="name"
          required=""
          v-model:value="formState.account_id"
          class="relative block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
          placeholder="Tên đăng nhập"
        />
      </div>
      <div class="pt-2">
        <label for="email-address" class="sr-only">Địa chỉ email</label>
        <a-input
          id="email-address"
          name="email"
          type="email"
          autocomplete="email"
          required=""
          v-model:value="formState.email"
          class="relative block w-full border-0 rounded-md py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
          placeholder="Địa chỉ email"
        />
      </div>
      <div class="pt-2">
        <label for="password" class="sr-only">Mật khẩu</label>
        <a-input
          id="password"
          name="password"
          type="password"
          autocomplete="current-password"
          required=""
          v-model:value="formState.password"
          class="relative block w-full border-0 rounded-md py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
          placeholder="Mật khẩu"
        />
      </div>
      <div class="pt-2">
        <label for="c_password" class="sr-only">Xác nhận mật khẩu</label>
        <a-input
          id="c_password"
          name="c_password"
          type="password"
          autocomplete="current-password"
          required=""
          class="relative block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
          placeholder="Xác nhận mật khẩu"
        />
      </div>
    </div>

    <div>
      <!-- <button type="submit" :disabled="disabled" -->
      <button
        type="submit"
        class="group relative flex w-full justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
      >
        <span class="absolute inset-y-0 left-0 flex items-center pl-3"> </span>
        Đăng ký
      </button>
    </div>
  </a-form>
</template>

<script>
import { reactive } from 'vue'
import { useRouter } from 'vue-router'
import { authStore } from '../stores/auth';

export default {
  setup() {
    const formState = reactive({
      account_id: '',
      password: '',
      email: ''
    })

    const auth = authStore();
    const router = useRouter()

    const submit = async () => {
      try {
        await Promise.all([auth.register(formState.account_id, formState.password, formState.email)]);
        router.push('/dashboard');
      } catch (error) {
        console.log(error);
      }
    }

    return {
      submit,
      formState
    }
  }
}
</script>
