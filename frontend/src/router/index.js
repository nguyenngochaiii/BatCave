import { createRouter, createWebHistory } from 'vue-router'
import { authStore } from '../stores/auth';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { 
      path: '/',
      redirect: '/dashboard',
      component: () => import('@/layouts/DefaultLayout.vue'),
      meta: {requireAuth: true},
      children: [
        {
          path: '/dashboard',
          name: 'dashboard',
          component: () => import('@/views/Dashboard.vue'),
          children: [
            {
              path: '/users',
              name: 'users',
              component: () => import('@/components/users/UserListTable.vue'),
            },
          ],
        },
      ],
    },
    {
      path: '/auth',
      name: 'auth',
      component: () => import('@/layouts/AuthLayout.vue'),
      meta: {isGuest: true},
      children: [
        {
          path: '/login',
          name: 'login',
          component: () => import('@/views/Login.vue')
        },
        {
          path: '/register',
          name: 'register',
          component: () => import('@/views/Register.vue'),
        },
      ]
    }
  ]
})

router.beforeEach((to,from,next) => {
  //Kiểm tra cookie
  const cookieArray = document.cookie.split(';');
  let cookieFlg = false;
  for (let t = 0; t < cookieArray.length; t++) {
    let cookie = cookieArray[t].split('=');
    if (cookie[0].match(/XSRF-TOKEN/)) {
      cookieFlg = true;
      break;
    }
  }

  //Lọc điều hướng router
  const auth = authStore();
  if (to.meta.requireAuth && (!auth.isAuthenticated || !cookieFlg)) {
    next('/login');
    return;
  }else if((auth.isAuthenticated || cookieFlg) && to.meta.isGuest){
    next('/dashboard');
    return;
  }else{
    next();
    return;
  }
})

export default router 
