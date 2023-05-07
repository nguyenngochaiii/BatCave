import axios from 'axios';
import {authStore} from './stores/auth'
import {useRouter } from 'vue-router'

const instance = axios.create({
  baseURL: import.meta.env.VITE_API_BASE_URL,
  withCredentials: true,
});

let isRetry = false;

instance.interceptors.response.use(undefined, async (error) => {
  const auth = authStore();
  const router = useRouter();

  if (error) {
    if((error.response.status === 401 || error.response.status === 419) && !isRetry){
      isRetry = true;
      await auth.logout();
      localStorage.removeItem("user");
      router.push({name:"login"}).catch(function(error){return error});
    }
    return Promise.reject(error);
  }
})

export default instance;