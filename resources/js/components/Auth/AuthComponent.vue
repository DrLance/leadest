<template>
  <div class="login">
    <auth-modal-redirect :is-visible="isRedirect"></auth-modal-redirect>
    <auth-reset-password :is-visible="isResetPassword" :callback="showReset"></auth-reset-password>
    <div class="login-container">
      <h2 class="login-header">Log In</h2>
      <div class="container">
        <a class="google-button" href="/redirect">
          <img src="/img/google-icon.svg" alt="google logo"/>
          Log in with Google
        </a>
        <div class="login-divider">
          <h4>or log in with mail</h4>
          <div class="login-divider__background"></div>
        </div>

        <div class="alert alert-danger">
          <ul>

            <li v-for="error in errors" :key="error" >
              {{error}}
            </li>

          </ul>
        </div>

        <form class="login-form" method="post" action="/login" v-on:submit.prevent="login">
          <label class="form-label">Email
            <input v-model="email" type="email" name="email" placeholder="Enter your email..." value="" autocomplete="off"/>
          </label>
          <label class="form-label">Password
            <input v-model="password" type="password" name="password" placeholder="••••••••••" value="" autocomplete="off"/>
          </label>
          <button class="form-button">
            Log In
          </button>
        </form>
        <div class="login-footer">
          <div>
            <a class="link" @click="showReset(true)">Forgot a password?</a>
          </div>
          <div class="login-footer__text-container">
            <p class="login-footer__text">Don’t have account?</p>
            <a class="link-sing-up" href="/register">Sign Up</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AuthComponent",
  data () {
    return {
      errors: [],
      email: '',
      password: '',
      isRedirect: false,
      isResetPassword: false,
    }
  },
  methods: {
    login: function(){
      axios.post('/login', {
        password: this.password,
        email: this.email
      }).then(response => {
        const {data} = response;
        this.errors = data.data.errors;

        if(!data.error) {
          this.isRedirect = true;

          setTimeout(function(){
            window.location = data.data.url;
          }, 300);

        }

      })
    },
    showReset(param) {
      this.isResetPassword = param;
    }
  }
}
</script>

<style scoped>

</style>
