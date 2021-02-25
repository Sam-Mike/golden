import axios from 'axios';
const api = axios.create({
    baseURL: 'http://10.1.1.50:84/api/',
});
export default api;