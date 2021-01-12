import Clients from './components/Clients';
import People from './components/People';
import Trailers from './components/Trailers';
import Trucks from './components/Trucks';
import Allocations from './components/Allocations';
import Trips from './components/Trips';
import Login from './components/Login';
import Users from './components/Users';

export default {
    routes: [
        {
            path: '/',
            component: Login,
            name: 'login'
        },
        {
            path: '/allocations',
            component: Allocations,
            name: 'allocations',
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/clients',
            component: Clients,
            name: 'clients'
        },
        {
            path: '/people',
            component: People,
            name: 'people'
        },
        {
            path: '/trailers',
            component: Trailers,
            name: 'trailers'
        },
        {
            path: '/trucks',
            component: Trucks,
            name: 'trucks'
        },
        {
            path: '/trips',
            component: Trips,
            name: 'trips'
        },
        {
            path: '/users',
            component: Users,
            name: 'users'
        }
    ]
}