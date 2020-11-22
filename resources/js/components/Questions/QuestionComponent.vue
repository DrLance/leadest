<template>
  <div class="lead-container">
    <div class="lead-progress">

      <div class="lead-progress__item finish">
        <span class="lead-progress__title">Start</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
        <div class="lead-progress__line"></div>
      </div>

      <div class="lead-progress__item" :class="{active: step === 1 ,finish: step > 1}">
        <span class="lead-progress__title">I am</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
        <div class="lead-progress__line"></div>
      </div>

      <div class="lead-progress__item" :class="{active: step === 2 ,finish: step > 2}">
        <span class="lead-progress__title">General info</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
        <div class="lead-progress__line"></div>
      </div>

      <div class="lead-progress__item" :class="{active: step === 3 ,finish: step > 3}">
        <span class="lead-progress__title">I want to</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
        <div class="lead-progress__line"></div>
      </div>

      <div class="lead-progress__item" :class="{active: step === 4 ,finish: step > 4}">
        <span class="lead-progress__title">Sales</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
        <div class="lead-progress__line"></div>
      </div>

      <div class="lead-progress__item" :class="{active: step === 5 ,finish: step > 5}">
        <span class="lead-progress__title">I want</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
      </div>

    </div>

    <iam-component v-if="this.step === 1" :callback="answerHandler" :callbackStep="nextStep"></iam-component>
    <GeneralInfoComponent v-if="this.step === 2" :callback="answerHandler" :callbackStep="nextStep"></GeneralInfoComponent>
    <IWantToComponent v-if="this.step === 3" :callback="answerHandler" :callbackStep="nextStep"></IWantToComponent>
    <SalesComponent v-if="this.step === 4" :callback="answerHandler" :callbackStep="nextStep"></SalesComponent>
    <IWantComponent v-if="this.step === 5" :callback="answerHandler" :callbackStep="nextStep"></IWantComponent>


  </div>
</template>

<script>
import IamComponent from "./IamComponent";
import GeneralInfoComponent from "./GeneralInfoComponent";
import IWantComponent from "./IWantComponent";
import SalesComponent from "./SalesComponent";
import IWantToComponent from "./IWantToComponent";

export default {
  props: ['answerPath'],
  name: "QuestionComponent",
  components: { IWantToComponent, SalesComponent, IWantComponent, GeneralInfoComponent, IamComponent },
  data () {
    return {
      step: 1,
      answers: {},
    }
  },
  methods: {
    answerHandler: function(answer) {
      //this.answers = { answer, ...this.answers };
      this.answers = Object.assign({}, answer, this.answers);
      console.log(this.answers)
    },
    nextStep: function(step) {
      this.step = step;
    },
    backStep: function() {
      this.step--;
    }
  },
  watch: {
    step: function (val) {
      if(val === 6) {
        axios.post(this.answerPath, {answers: this.answers}).then(response => {
          this.step = 1;
        });
      }
    },
  }
}
</script>

<style scoped>

</style>
