<template>
  <div class="main" :style="{padding: '5px'}">
    <a-button type="primary" size="large" shape="round" style="margin-bottom: 16px; margin-top: 14px;" class="create-btn" block @click="">
        <template #icon></template>Tạo Người dùng mới
    </a-button>
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.create-btn {
    font-weight: bold;
    letter-spacing: .3rem;
    box-shadow: rgba(0,0,0,0.4) 0px 2px 4px, rgba(0,0,0,0.3) 0px 7px 13px -3px, rgba(0,0,0,0.2) 0px -3px 0px inset;
}

.create-btn:hover {
    background-color: #fff;
    border-color: #40a9ff;
    color: #40a9ff;
}
</style>