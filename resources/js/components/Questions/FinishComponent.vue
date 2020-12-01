<template>
  <div class="lead-container__question" >
    <div class="lead-questions__container">
      <h2 class="lead-question__title">Thank You!</h2>
      <div class="lead-questions__answer">
        <p>It may take up to 30 minutes to fill it up completely, but it<br/>will worth it! New clients!</p>
      </div>
      <button @click="continueHandler" class="form-button">Go to the dashboard</button>
    </div>

  </div>
</template>

<script>
export default {
  name: "FinishComponent",
  data () {
    return {

    }
  },
  methods: {
    continueHandler: function() {
      window.location = '/dashboard'
    },

  }
}
</script>

<style scoped>

.lead-container__question {
  margin-top: 175px;
}

.lead-questions__container {
  display: flex;
  flex-direction: column;
  align-items: center;
  max-width: 100%;
}

.lead-questions__answer p {
  text-align: center;
}

.lead-questions__container .form-button {
  padding-right: 24px;
  padding-left: 24px;
}

</style>
