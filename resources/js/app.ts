import './bootstrap';
import { createApp } from 'vue';
import SearchDishesComponent from './components/SearchDishesComponent.vue';

const app = createApp({});

app.component('search-component', SearchDishesComponent);

app.mount('#app');
