<template>
  <div class="lead-container__question" >
    <div class="lead-questions__container">
      <h2 class="lead-question__title">Thank You!</h2>
      <div class="lead-questions__answer">
        <p>It may take up to 30 minutes to fill it up completely, but it<br/>will worth it! New clients!</p>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  props: ['isActive', 'callback', 'callbackStep'],
  name: "FinishComponent",
  data () {
    return {
      isActiveIn: this.isActive,
      answer: {},
    }
  },
  methods: {
    answerHandler: function(answer) {
      const answerObj = {'Sales': answer.currentTarget.textContent };

      this.callback(answerObj);
    },
    continueHandler: function() {
      this.callbackStep(5)
    },
    backStep: function() {
      this.callbackStep(3)
    }
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
</style>
