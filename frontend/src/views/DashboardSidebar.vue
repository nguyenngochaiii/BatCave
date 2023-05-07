<template>
  <router-link :to="{ name: 'dashboard' }" class="flex">
    <img class="rounded block float-left mr-2 h-10 w-10" src="@/assets/images/logo.png" />
    <span
      class="text-white origin-left font-medium text-2xl duration-300"
      v-bind:class="{ 'scale-0': !open }"
      >BatCave</span
    >
  </router-link>

  <div
    class="flex items-center rounded-md mt-6 py-2 bg-light-white"
    :class="!open ? 'px-2.5' : 'px-4'"
  >
    <svg
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 24 24"
      stroke-width="1.5"
      stroke="currentColor"
      class="w-6 h-6 float-left"
      :class="open ? 'mr-2' : ''"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
      />
    </svg>
    <input
      type="search"
      placeholder="Tìm kiếm"
      class="text-base bg-transparent w-full text-black focus:outline-none"
      :class="!open ? 'hidden' : ''"
    />
  </div>

  <ul class="pt-2">
    <li
      v-for="(menu, index) in menus"
      key="index"
      class="text-sm flex items-center gap-x-4 p-2 cursor-pointer hover:bg-light-white rounded-md mt-2"
    >
      <span>
      </span>
      <span class="text-base font-medium flex-1 duration-200" :class="!open ? 'hidden' : ''">{{ menu.title }}</span>
    </li>
  </ul>
</template>

<script>
import { ref } from 'vue'
export default {
  props: {
    open: { type: Boolean }
  },

  setup(props, { emit }) {
    const menus = [
      { title: 'Trang chủ' },
      { title: 'Pages' },
      { title: 'Projects', submenu: true, submenuItems: [{ title: 'sub1' }, { title: 'sub2' }] }
    ]

    return {
      menus
    }
  }
}
</script>

<style scoped>
.hover-change-bg {
  font-size: 0.9875rem;
}
.hover-change-bg:hover {
  background-color: rgb(80, 96, 167);
}
</style>
