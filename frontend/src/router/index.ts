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
            component: () => import('../views/TiposTelasView.vue'), 
            meta: { requiresAuth: true }
            },
            {
              path: '/colores-tela',
              name: 'colores-tela',
              component: () => import('../views/ColoresTelasView.vue'), 
              meta: { requiresAuth: true }
            },
          ]
        },
        {
          path: '/prendas',
          name: 'prendas',
          component: () => import('../views/PrendasView.vue'),
          meta: { requiresAuth: true },
          children: [
            {
            path: '/tipos-prendas',
            name: 'tipos-prenda',
            component: () => import('../views/TiposPrendasView.vue'), 
            meta: { requiresAuth: true }
            },
            {
              path: '/sub-prendas',
              name: 'sub-prendas',
              component: () => import('../views/SubPrendasView.vue'), 
              meta: { requiresAuth: true }
            },
          ]
        },
        {
          path: '/procesos',
          name: 'procesos',
          component: () => import('../views/ProcesosView.vue'),
          meta: { requiresAuth: true },
          children: [
            {
            path: '/sub-procesos',
            name: 'sub-procesos',
            component: () => import('../views/SubProcesosView.vue'), 
            meta: { requiresAuth: true }
            },
            {
              path: '/prendas-procesos',
              name: 'prendas-procesos',
              component: () => import('../views/PrendasProcesosView.vue'), 
              meta: { requiresAuth: true }
            },
            {
              path: '/prendas-sub-procesos',
              name: 'prendas-sub-procesos',
              component: () => import('../views/PrendasSubProcesos.vue'), 
              meta: { requiresAuth: true }
            },
          ]
        },
        {
          path: '/produccion',
          name: 'produccion',
          component: () => import('../views/ProduccionView.vue'),
          meta: { requiresAuth: true },
          children: [
            {
            path: '/pendientes',
            name: 'pendientes',
            component: () => import('../views/ProduccionPendientesView.vue'), 
            meta: { requiresAuth: true }
            },
            {
            path: '/proceso',
            name: 'proceso',
            component: () => import('../views/ProduccionProcesoView.vue'), 
            meta: { requiresAuth: true }
            },
            {
            path: '/terminados',
            name: 'terminados',
            component: () => import('../views/ProduccionTerminadosView.vue'), 
            meta: { requiresAuth: true }
            },
          ]
        },
        {
          path: '/inventario',
          name: 'inventario',
          component: () => import('../views/InventarioView.vue'),
          meta: { requiresAuth: true }
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
