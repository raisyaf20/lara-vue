import { createApp } from "vue";
import "./style.css";
import App from "./App.vue";
// Import Bootstrap and BootstrapVue CSS files (order is important)
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import router from "./router";

// Make BootstrapVue available throughout your project

const app = createApp(App);
app.use(router);
app.mount("#app");
