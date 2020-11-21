//window._ = require('lodash');
import Vue from 'vue';
import AuthComponent from "./components/Auth/AuthComponent";
import ModalRedirectComponent from "./components/Auth/ModalRedirectComponent";
import ResetPasswordComponent from "./components/Auth/ResetPasswordComponent";
import MailVerificationComponent from "./components/Auth/MailVerificationComponent";
import RegisterComponent from "./components/Auth/RegisterComponent";
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

Vue.component('auth-component', AuthComponent);
Vue.component('auth-modal-redirect', ModalRedirectComponent);
Vue.component('auth-reset-password', ResetPasswordComponent);
Vue.component('auth-mail-verification', MailVerificationComponent);
Vue.component('register-component', RegisterComponent);

function validateEmail (email) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

window.axios.defaults.headers.common = {
  'X-Requested-With': 'XMLHttpRequest',
  'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};
const app = document.getElementById('app');
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

Vue.directive('click-outside', {
  bind: function(el, binding, vnode) {
    el.clickOutsideEvent = function(event) {
      // here I check that click was outside the el and his children
      if (!(el == event.target || el.contains(event.target))) {
        // and if it did, call method provided in attribute value
        vnode.context[binding.expression](event);
      }
    };
    document.body.addEventListener('click', el.clickOutsideEvent)
  },
  unbind: function(el) {
    document.body.removeEventListener('click', el.clickOutsideEvent)
  },
});

new Vue({

}).$mount(app);

window.validateEmail = validateEmail;
