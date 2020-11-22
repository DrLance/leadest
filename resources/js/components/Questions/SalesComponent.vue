<template>
  <div class="lead-container__question" >
    <div class="lead-question__back">

      <div class="lead-back" @click="backStep">
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
              d="M3.52325 6.16664H13.6666V7.83331H3.52325L7.99325 12.3033L6.81492 13.4816L0.333252 6.99998L6.81492 0.518311L7.99325 1.69664L3.52325 6.16664Z"/>
        </svg>
        Back
      </div>

    </div>

    <div class="lead-questions__container">
      <h2 class="lead-question__title">Sales</h2>
      <div class="lead-questions__divider"></div>

      <div class="lead-questions__answer">

        <div class="custom-radio__container">
          <input class="custom-radio" name="color" type="radio" id="individual" value="individual">
          <label for="individual" @click="answerHandler">I talk with leads myself</label>
        </div>

        <div class="custom-radio__container">
          <input class="custom-radio" name="color" type="radio" id="project" value="project">
          <label for="project" @click="answerHandler">I have salespersons</label>
        </div>

      </div>
      <button class="form-button lead-button" @click="continueHandler">Continue</button>
    </div>

  </div>
</template>

<script>
export default {
  props: ['isActive', 'callback', 'callbackStep'],
  name: "SalesComponent",
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

</style>
