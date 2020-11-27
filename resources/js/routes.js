import Clients from './components/Clients';
import People from './components/People';
import Trailers from './components/Trailers';
import Trucks from './components/Trucks';
import Allocations from './components/Allocations';
import Trips from './components/Trips';

export default {
    routes: [
        {
            path: '/',
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
            path: '/truck_trailer_driver',
            component: Allocations
        },
        {
            path: '/allocations',
            component: Trips
        }
    ]
}