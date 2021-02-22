import api from "../../apis/api";

const state = () => ({
    clients: [],
    editClient: {
        id: "updateClientModal",
        content: {}
    }
})
const getters = {
    activeClients(state) {
        return state.clients.filter((client) => client.activityStatus.id === 1);
    },
    inactiveClients(state) {
        return state.clients.filter((client) => client.activityStatus.id === 3);
    }
}
const mutations = {
    setClients(state, clients) {
        state.clients = clients;
    },
    setEditClient(state, item) {
        state.editClient.content = item;
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
    async createClient({ dispatch }, newClient) {
        try {
            await api.post("clients", {
                clientName: newClient.name,
                clientAddress: newClient.address,
                clientPhoneNumber: newClient.phoneNumber,
                clientContactPersonName: newClient.contactPersonName,
                clientMobile: newClient.mobile,
                clientEmail: newClient.email,
            });
            dispatch("getClients");
        } catch (error) {

            console.log(error)
        }
    },
    async updateClients({ dispatch },) {
        try {
            await api.patch("clients/");
            dispatch("getClients");
        } catch { }
    },
    async deactivateClients({ dispatch },) {
        try {
            await api.patch();
            dispatch("getClients");
        } catch { }
    },
    async activateClients({ dispatch },) {
        await api.patch();
        dispatch("getClients");
    },
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
