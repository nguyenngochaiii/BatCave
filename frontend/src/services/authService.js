import http from '@/httpCommon.js'

export default {
  async login(account_id, password , remember) {
    await http.get('/sanctum/csrf-cookie')
    return http.post(import.meta.env.VITE_API_BASE_PATH + '/login', {
      account_id: account_id,
      password: password,
      remember: remember,
    })
  },
  // async register(account_id, password, email) {
  //   return http.post(import.meta.env.VITE_API_BASE_PATH + '/register', {
  //     account_id: account_id,
  //     password: password,
  //     email: email,
  //   })
  // },
  async logout() {
    return http.post(import.meta.env.VITE_API_BASE_PATH + '/logout');
  },
}
