import App from './vue/components/app.vue'
import Formulario from './vue/components/formulario.vue'
import Criarformulario from './vue/components/criarfomulario.vue'
import Homepage from './vue/components/homepage.vue'
import Login from './vue/components/loginPage.vue'

export const routes = [
    {
		path: '/',
        component: App
    },
	{
		path: '/home',
        component: Homepage
    },
    {
		path:'/formulario',
        component: Formulario
    },
    {
		path:'/criar',
        component: Criarformulario
    },
    {
		path:'/loginpage',
        component: Login
    },
];