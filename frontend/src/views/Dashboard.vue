<template>
  <div class="flex">
    <!-- siderbar -->
    <div
      class="h-screen relative duration-300 p-5 pt-8"
      v-bind:class="{ 'w-20': !showSiderbar, 'w-72': showSiderbar }"
      style="background-color: rgb(66, 80, 140); color: rgb(161, 176, 230)"
    >
      <DashboardSidebar :open="open" />
    </div>
    <!-- main content -->
    <div class="w-[calc(100%-4rem)] ml-auto">
      <!-- header -->
      <div class="bg-white shadow px-4 py-6">
        <DashboardHeader :show-siderbar="showSiderbar" :open="open" @changeValue="onChangeValue"/>
      </div>
      <!-- content -->
      <div class="py-8 text-slate-600 font-semibold">content</div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import DashboardHeader from './DashboardHeader.vue'
import DashboardSidebar from './DashboardSidebar.vue'

export default defineComponent({
  components: {
    DashboardSidebar,
    DashboardHeader
  },

  setup(props, { emit }) {
    const showSiderbar = ref(true)
    const open = ref(true)

    const onChangeValue = () => {
      showSiderbar.value = !showSiderbar.value;
      open.value = !open.value;
    }

    return {
      showSiderbar,
      open,
      onChangeValue,
    }
  }
})
</script>
