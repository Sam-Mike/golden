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
            path: '/login',
            component: Login
        },
        {
            path: '/',
            component: Allocations,
            name:'Allocations'
        },
        {
            path: '/clients',
            component: Clients
        },
        {
            path: '/people',
            component: People
        },
        {
            path: '/trailers',
            component: Trailers
        },
        {
            path: '/trucks',
            component: Trucks
        },
        {
            path: '/trips',
            component: Trips
        },
        {
            path: '/users',
            component: Users
        }
    ]
}