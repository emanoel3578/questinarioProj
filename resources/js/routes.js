import App from './vue/components/app.vue'
import Formulario from './vue/components/formulario.vue'
import Criarformulario from './vue/components/criarfomulario.vue'

export const routes = [
    {
		path: '/',
        component: App
    },
	{
		path: '/home',
        component: App
    },
    {
		path:'/formulario',
        component: Formulario
    },
    {
		path:'/criar',
        component: Criarformulario
    },
];