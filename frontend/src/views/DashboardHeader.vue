<template>
  <div class="relative shrink-0 flex justify-between">
    <button class="font-extrabold " @click="$emit('changeValue')">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="w-8 h-8"
        v-if="showSiderbar"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5"
        />
      </svg>

      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="w-8 h-8 duration-300"
        v-if="!showSiderbar"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"
        />
      </svg>
    </button>

    <div class="flex justify-between items-center space-x-4 px-4">
      <a-popover placement="bottomRight" trigger="click" class="flex items-center">
        <button class="inline-flex items-center justify-center">
              <img
              class="h-9 w-9 rounded-full"
              src="@/assets/images/male.png"
              alt=""
          />
        </button>
        <template #content>
          <a-button type="text" class="px-2 py-2 text-sm cursor-pointer logout-btn">
              Logout
          </a-button>
        </template>
      </a-popover>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'
export default {
  props: {
    showSiderbar: { type: Boolean, default: true },
    open: { type: Boolean, default: true }
  },
  setup(props, { emit }) {
    return {}
  }
}
</script>

<style scoped>
.logout-btn:hover {
  color: #fff;
  background-color: #5BABE5;
}
</style>
