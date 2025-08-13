import './bootstrap';
import Alpine from 'alpinejs';
import { createApp } from 'vue';
import MainApp from './components/MainApp.vue';
import store from './store'; // Import your Vuex store
import { formatDate } from './filter'; // Import your filter

const app = createApp(MainApp);

// Register the filter globally
app.config.globalProperties.$filters = {
    formatDate
};

app.use(store); // Use Vuex store
app.mount('#app');

window.Alpine = Alpine;
Alpine.start();
