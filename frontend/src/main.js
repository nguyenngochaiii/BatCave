import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'
import 'ant-design-vue/dist/antd.css';
import Antd from 'ant-design-vue';
import './assets/css/main.css'
import piniaPersist from 'pinia-plugin-persist'
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'


const app = createApp(App)
const pinia = createPinia()
pinia.use(piniaPersist)

app.use(pinia)
.component("font-awesome-icon", FontAwesomeIcon)
.use(router)
.use(Antd)
.mount('#app')
