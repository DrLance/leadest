<template>
  <div class="modal" v-if="isVisible">

    <div class="modal-wrapper">

      <div class="modal-close" @click="closeModal">
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
              d="M6.99999 5.58599L11.95 0.635986L13.364 2.04999L8.41399 6.99999L13.364 11.95L11.95 13.364L6.99999 8.41399L2.04999 13.364L0.635986 11.95L5.58599 6.99999L0.635986 2.04999L2.04999 0.635986L6.99999 5.58599Z"
              fill="#2A3196"/>
        </svg>
      </div>

      <div class="modal-container">
        <p class="modal-title">Reset your password</p>
        <form class="login-form" method="post" v-on:submit.prevent="sendReset">
          <label class="form-label">Your Email
            <input v-model="email" type="email" name="email" placeholder="Enter your email..." value="" autocomplete="off"/>
          </label>
          <small class="alert-danger">{{ errorMessage }}</small>
          <button class="form-button">
            Reset Password
          </button>
        </form>
      </div>

    </div>

  </div>
</template>

<script>
export default {
  props: ['isVisible', 'callback'],
  name: "ResetPasswordComponent",
  data () {
    return {
      isVisibleIn: this.isVisible,
      email: '',
      errorMessage: ''
    };
  },
  methods: {
    closeModal () {
      this.isVisibleIn = false;
      this.callback(false);
    },
    sendReset () {
      this.errorMessage = '';
      if (validateEmail(this.email)) {
        axios.post('/reset-password', { email: this.email }).then(response => {
          this.errorMessage = response.data.message;

          setTimeout(() => this.callback(false), 1000);

        }).catch(resp => {
          this.errorMessage = 'Server Error';
          setTimeout(() => this.callback(false), 1000);
        });
      } else {
        this.errorMessage = 'Invalid Email';
      }

    }
  }
}
</script>

<style scoped>
.alert-danger {
  margin-top: -6px;
}
</style>
