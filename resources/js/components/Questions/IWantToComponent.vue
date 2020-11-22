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
      <h2 class="lead-question__title">I want to</h2>
      <div class="lead-questions__divider"></div>

      <div class="lead-questions__answer">

        <div class="custom-radio__container">
          <input class="custom-radio" name="color" type="radio" id="individual" value="individual">
          <label for="individual" @click="answerHandler">Find first leads</label>
        </div>

        <div class="custom-radio__container">
          <input class="custom-radio" name="color" type="radio" id="project" value="project">
          <label for="project" @click="answerHandler">Expand agent/referral programm</label>
        </div>

        <div class="custom-radio__container">
          <input class="custom-radio" name="color" type="radio" id="startup" value="Startup (10-100 people)">
          <label for="startup" @click="answerHandler">Customer development</label>
        </div>

      </div>
      <button class="form-button lead-button" @click="continueHandler">Continue</button>
    </div>

  </div>
</template>

<script>
export default {
  props: ['isActive', 'callback', 'callbackStep'],
  name: "IWantToComponent",
  data () {
    return {
      isActiveIn: this.isActive,
      answer: {},
    }
  },
  methods: {
    answerHandler: function(answer) {
      const answerObj = {'I want to': answer.currentTarget.textContent };
      this.callback(answerObj);
    },
    continueHandler: function() {
      this.callbackStep(4)
    },
    backStep: function() {
      this.callbackStep(2)
    }
  }
}
</script>

<style scoped>

</style>
