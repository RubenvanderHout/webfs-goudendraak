import './bootstrap';

import App from './App.vue'
import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';

const app = createApp(App);

app.component('example-component', ExampleComponent);

app.mount('#app');