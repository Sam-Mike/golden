import Clients from './components/Clients';
import People from './components/People';
export default {
    mode: 'history',
    routes: [
        {
        path: '/',
        component: Clients
        },
        {
            path: '/people',
            component: People
        }
    ]
}