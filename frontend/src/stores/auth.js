import { defineStore } from 'pinia'
import authService from "../services/authService.js";

export const authStore = defineStore('auth', {
  state: () => ({
    user: {
      name: null,
      token: null,
    },
  }),
  getters: {
    isAuthenticated: (state) => !!state.user.name,
    authUser: (state) => state.user.name,
  },
  actions: {
    async login(account_id, password , remember) {
      const response = await authService.login(account_id, password, remember);
      console.log("Đăng nhập thành công");
      this.user.name = response.data.data.account_id;
      this.user.token = response.data.data.tonken;
    },

    // async register(account_id, password, email) {
    //   const response = await authService.register(account_id, password, email);
    //   console.log(response);
    //   // localStorage.setItem('TOKEN', response.data.data.tonken);
    //   // localStorage.setItem('NAME', response.data.data.account_id);
    //   // console.log("Đăng kí thành công");
    // },

    async logout() {
      await authService.logout();
      document.cookie = 'XSRF-TOKEN=; max-age=0';
      this.user.name = null;
    },
  },

  persist: {
    enabled: true,
    strategies: [{
        key: 'user',
        paths: ['user'],
        storage: localStorage,
      }
    ],
  },
})
