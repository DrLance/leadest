<template>
  <div class="modal">

    <div class="modal-wrapper">

      <div class="modal-close" @click="closeModal">
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
              d="M6.99999 5.58599L11.95 0.635986L13.364 2.04999L8.41399 6.99999L13.364 11.95L11.95 13.364L6.99999 8.41399L2.04999 13.364L0.635986 11.95L5.58599 6.99999L0.635986 2.04999L2.04999 0.635986L6.99999 5.58599Z"
              fill="#2A3196"/>
        </svg>
      </div>

      <div class="modal-container">
        <p class="modal-text">Please check your mail to verify registration on Leadest.pro</p>
        <div class="modal-loading">
        </div>
      </div>

    </div>

  </div>
</template>

<script>
export default {
  props: {
    isVisible: Boolean,
  },
  name: "MailVerificationComponent",
  data () {
    return {
      isVisibleIn: this.isVisible,
    };
  },
  methods: {
    closeModal () {
      this.isVisibleIn = false;
    }
  }
}
</script>

<style scoped>

</style>
