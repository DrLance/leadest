<template>
  <div class="lead-container">
    <div class="lead-progress" v-if="step < 5">

      <div class="lead-progress__item finish">
        <span class="lead-progress__title">Start</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
        <div class="lead-progress__line"></div>
      </div>

      <div class="lead-progress__item" :class="{active: step === 0 ,finish: step > 0}">
        <span class="lead-progress__title">I am</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
        <div class="lead-progress__line"></div>
      </div>

      <div class="lead-progress__item" :class="{active: step === 1 ,finish: step > 1}">
        <span class="lead-progress__title">General info</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
        <div class="lead-progress__line"></div>
      </div>

      <div class="lead-progress__item" :class="{active: step === 2 ,finish: step > 2}">
        <span class="lead-progress__title">I want to</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
        <div class="lead-progress__line"></div>
      </div>

      <div class="lead-progress__item" :class="{active: step === 3 ,finish: step > 3}">
        <span class="lead-progress__title">Sales</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
        <div class="lead-progress__line"></div>
      </div>

      <div class="lead-progress__item" :class="{active: step === 4 ,finish: step > 4}">
        <span class="lead-progress__title">I want</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
      </div>

    </div>

    <div v-for="(item, index) in questions" :key="item.title">

    <CheckBoxComponent
        v-if="step === index"
        :callback="answerHandler"
        :callbackStep="nextStep"
        :title="item.title"
        :step="index"
        :items="item['items']"
    >
    </CheckBoxComponent>
    </div>

    <FinishComponent v-if="step >= 5"></FinishComponent>

  </div>
</template>

<script>
import CheckBoxComponent from "./CheckBoxComponent";
import FinishComponent from './FinishComponent'

export default {
  props: {
    'answerPath': String,
    'questions': {
      type: Array,
      default: []
    },
    'currentStep': {
      type: Number,
      default: 0
    }
  },
  name: "QuestionComponent",
  components: { FinishComponent, CheckBoxComponent },
  data () {
    return {
      step: this.currentStep,
      answers: {},
    }
  },
  methods: {
    answerHandler: function(answer) {
      this.answers = Object.assign({}, answer, this.answers);
    },
    nextStep: function(step) {
      this.step = step;

      if(this.step < 0) {
        window.history.back();
      } else {
        axios.post(this.answerPath, {answers: this.answers, current_step: this.step}).then(response => {

        });
      }
    },
  },
}
</script>

<style scoped>

</style>
