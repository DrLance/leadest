<template>
  <div class="lead-container__question">
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
      <h2 class="lead-question__title">General info</h2>
      <div class="lead-questions__divider"></div>

      <div class="lead-questions__answer">

        <div class="custom-radio__container">
          <label class="form-label">Website
            <input v-model="website" type="email" name="email" placeholder="example.com" value="" autocomplete="off"/>
          </label>
        </div>

        <div class="custom-radio__container">
          <label class="form-label">Industry
            <input v-model="industry" type="email" name="email" placeholder="type your industry" value="" autocomplete="off"/>
          </label>
        </div>

        <div class="custom-radio__container">
          <label class="form-label">Social networks
            <input v-model="social" type="email" name="email" placeholder="Socials" value="" autocomplete="off"/>
          </label>
        </div>

        <div class="custom-radio__container">
          <label class="form-label">Age of yor business
            <input v-model="age" type="email" name="email" placeholder="3 years" value="" autocomplete="off"/>
          </label>
        </div>

      </div>
      <button class="form-button lead-button" @click="continueHandler">Continue</button>
    </div>

  </div>
</template>

<script>
export default {
  props: ['isActive', 'callback', 'callbackStep'],
  name: "GeneralInfoComponent",
  data () {
    return {
      isActiveIn: this.isActive,
      answer: {},
      website: '',
      industry: '',
      social: '',
      age:'',
    }
  },
  methods: {
    continueHandler: function() {
      const answerObj = { 'General info':
            {
              'Website': this.website,
              'Industry': this.industry,
              'Social networks': this.social,
              'Age of yor business': this.age,

            }
      };

      this.callback(answerObj)

      this.callbackStep(3)
    },
    backStep: function() {

      this.callbackStep(1)
    }
  }
}
</script>

<style scoped>

</style>
