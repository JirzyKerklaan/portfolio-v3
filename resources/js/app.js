import './bootstrap';
import './components/components.js';
import { createApp, defineAsyncComponent } from 'vue';

const el = document.getElementById('contact');

if (el) {
    createApp({})
        .component('jk-popup', defineAsyncComponent(() => import('./vue/Popup.vue')))
        .component('jk-contact-form', defineAsyncComponent(() => import('./vue/ContactForm.vue')))
        .mount(el);
}
