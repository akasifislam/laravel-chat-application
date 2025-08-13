import { createStore } from 'vuex';
import axios from 'axios';

const store = createStore({
    state: {
        users: [],
        messages: [],
    },
    mutations: {
        SET_USER_LIST(state, users) {
            state.users = users;
        },
        SET_MESSAGE_LIST(state, messages) {
            state.messages = messages;
        },
        ADD_MESSAGE(state, message) {
            state.messages.push(message);
        }
    },
    actions: {
        async fetchUserList({ commit }) {
            try {
                const response = await axios.get('/api/users');
                commit('SET_USER_LIST', response.data);
            } catch (error) {
                console.error('Error fetching user list:', error);
            }
        },
        async fetchMessages({ commit }, userId) {
            try {
                const response = await axios.get(`/api/messages/${userId}`);
                commit('SET_MESSAGE_LIST', response.data.message);
            } catch (error) {
                console.error('Error fetching messages:', error);
            }
        },
        addMessage({ commit }, message) {
            commit('ADD_MESSAGE', message);
        }
    },
    getters: {
        getUsers(state) {
            return state.users;
        },
        getMessages(state) {
            return state.messages;
        }
    }
});

export default store;
