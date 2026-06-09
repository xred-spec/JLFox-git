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
      component: () =>  import('../views/LoginView.vue'),
      beforeEnter: (to, from, next) => {
        const authStore = useAuthStore();
        if(authStore.isAuthenticated) next('dashboard')
        else next()
      }
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: () => import('../views/DashboardView.vue'),
      meta: { requiresAuth: true },
      children: [
        {
          path: '/bordados',
          name: 'bordados',
          component: () => import('../views/BordadosView.vue'),
          meta: { requiresAuth: true },
          children: [
            {
            path: '/colores-hilo',
            name: 'colores-hilo',
            component: () => import('../views/ColoresHiloView.vue'),
            meta: { requiresAuth: true }
            },
            {
              path: '/sub-bordados',
              name: 'sub-bordados',
              component: () => import('../views/SubBordadosView.vue'), 
              meta: { requiresAuth: true }
            },
          ]
        },
        {
          path: '/forros',
          name: 'forros',
          component: () => import('../views/ForrosView.vue'),
          meta: { requiresAuth: true }
        },
        {
          path: '/telas',
          name: 'telas',
          component: () => import('../views/TelasView.vue'),
          meta: { requiresAuth: true },
          children: [
            {
            path: '/tipos-tela',
            name: 'tipos-tela',
            component: () => import('../views/ForrosView.vue'), //CAMBIAR
            meta: { requiresAuth: true }
            },
            {
              path: '/colores-tela',
              name: 'colores-tela',
              component: () => import('../views/ForrosView.vue'), // CAMBIAR
              meta: { requiresAuth: true }
            },
          ]
        }
      ]
    },
  ],
})

router.beforeEach((to, from) => {
  const authStore = useAuthStore()
  
  if (to.meta.requiresAuth && !authStore.isAuthenticated) {
    return '/login'
  } else {
    return true
  }
})

export default router
