import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '@/stores/auth'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      redirect: '/login'
    },
    {
      path: '/login',
      name: 'login ',
      component: import('../views/LoginView.vue'),
      beforeEnter: (to, from, next) => {
        const authStore = useAuthStore();
        if(authStore.isAuthenticated) next('dashboard')
        else next()
      }
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: import('../views/DashboardView.vue'),
      meta: { requiresAuth: true },
      children: [
        
      ]
    },
  ],
})

router.beforeEach((to, from, next) => {
  const authStore = useAuthStore()
  
  if (to.meta.requiresAuth && !authStore.isAuthenticated) {
    next({ name: 'login' })
  } else {
    next()
  }
})

export default router
