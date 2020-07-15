import Login from './components/pages/Login.vue';
import AllCollections from './components/pages/AllCollections.vue';

export const routes = [
    {
        name: 'Login',
        path: '/',
        component: Login
    },
    {
        name: 'AllCollections',
        path: '/collections',
        component: AllCollections
    }
];