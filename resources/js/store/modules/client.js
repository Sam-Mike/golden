import api from "../../apis/api";

const state = () => ({ clients: [] })
const getters = {
    activeClients (state) {
        return state.clients.filter((client) => client.activityStatus.id === 1 );
    }
}
const mutations = {
    setClients(state, clients) {
        state.clients = clients
    }
}
const actions = {
    async getClients({ commit }) {
        try {
            const response = await api.get("clients");
            await commit('setClients', response.data.clients);
        }
        catch (error) {
            console.error(error)
        }
    },
    createClients() { },
    updateClients() { },
    activateClients() { },
    deactivateClients() { },
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
