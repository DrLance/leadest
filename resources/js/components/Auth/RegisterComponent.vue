<template>
  <div class="login">
    <auth-mail-verification :callback="hideVerificationHandle" v-if="showVerification"></auth-mail-verification>
    <div class="login-container">
      <h2 class="login-header">Sign up for Leadest</h2>
      <div class="container">
        <a class="google-button" href="/redirect">
          <img src="/img/google-icon.svg" alt="google logo"/>
          Sign up with Google
        </a>
        <div class="login-divider">
          <h4>or sign up with mail</h4>
          <div class="login-divider__background"></div>
        </div>

        <div class="alert alert-danger">
          <ul>

            <li v-for="error in errors" :key="error" >
              {{error}}
            </li>

          </ul>
        </div>

        <form class="login-form" method="post" v-on:submit.prevent="register">
          <label class="form-label">Email
            <input v-model="email" type="email" name="email" placeholder="Enter your email..." value="" autocomplete="off"/>
          </label>
          <label class="form-label">Password
            <input v-model="password" type="password" name="password" placeholder="••••••••••" value="" autocomplete="off"/>
          </label>
          <button class="form-button" :disabled="btnDisabled">
            Sign In
          </button>
        </form>
        <div class="login-footer">
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "RegisterComponent",
  data () {
    return {
      errors: [],
      email: '',
      password: '',
      showVerification: false,
      btnDisabled: false,
    }
  },
  methods: {
    register: function() {

      this.errors = [];

      if(validateEmail(this.email)) {

        this.btnDisabled = true;

        axios.post('/register', {
          password: this.password,
          email: this.email
        }).then(response => {
          const { data } = response;
          this.errors = data.data.errors;

          if (!data.error) {

            this.showVerification = true;

            setTimeout(function() {
              window.location = data.data.url;
            }, 1000);

          }

          this.btnDisabled = false;

        });
      } else {
        this.errors.push('Email not valid');
      }
    },
    hideVerificationHandle(param) {
      this.showVerification = param;
    }
  }
}
</script>

<style scoped>

</style>
