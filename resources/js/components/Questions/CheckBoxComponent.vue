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
      <h2 class="lead-question__title">{{ this.title }}</h2>
      <div class="lead-questions__divider"></div>

      <div class="lead-questions__answer">

        <div class="custom-radio__container" v-for="(item, index) in answers" :key="item.name">
          <div v-if="item.type==='checkbox'">
            <input class="custom-radio" name="color" type="radio" :id="item.name" :checked="item.selected">
            <label :for="item.name" @click="answerHandler(index)">{{ item.name }}</label>
          </div>
          <label
              v-if="item.type === 'input'"
              class="form-label"
          >{{ item.name }}
            <input
                v-model="inputModels[item.name]"
                :placeholder="item.placeholder"
                autocomplete="off"
                @input="inputChangeHandler(item.mask, item.name)"
            />
          </label>
          <div
              class="multiply-wrapper"
              v-if="item.type === 'multiply'"
          >
            <div class="multiply-container">
              <label
                  class="form-label"
              >{{ item.name }}
                <input
                    v-model="inputModels[item.name]"
                    :placeholder="item.placeholder"
                    autocomplete="off"
                />
              </label>
              <button
                  class="form-button"
                  @click="addMultiplyHandler"
              >
                +
              </button>
            </div>
            <label
                class="form-label"
                v-for="input in inputModelChild"
                :key="input.name"
            >
              <input
                  v-model="inputModelChild[input.name]"
                  :placeholder="item.placeholder"
              />
            </label>
          </div>
          <label
              v-if="item.type === 'select'"
              class="form-label"
          >{{ item.name }}
            <select
                v-model="inputModels[item.name]"
                :placeholder="item.placeholder"
                autocomplete="off"
            >
              <option
                  v-for="(option, index) in item.data"
                  :value="option"
                  :key="index"
                  v-bind:selected="index === 0"
              >{{option}}</option>
            </select>
          </label>
        </div>

      </div>
      <button class="form-button lead-button" @click="continueHandler">Continue</button>
    </div>

  </div>
</template>

<script>
export default {
  props: ['callback', 'callbackStep', 'title', 'items', 'step'],
  name: 'CheckBoxComponent',
  data () {
    return {
      answer: {},
      answers: this.items,
      inputModels: {},
      inputModelChild: [],
    }
  },
  created () {
    this.items.forEach((item, ind) => {
      if(item.data && item.data.length) {
        this.selectChangeHandler(item.name, item.data[0])
      }
    });
  },
  mounted () {
    this.answers.forEach((item, ind) => {
      if(item.selected) {
        this.answerHandler(ind);
      }



    });
  },
  methods: {
    answerHandler: function (index) {
      this.answers = this.answers.filter((item, ind) => {
        item.selected = false;
        item.selected = ind === index
        return item
      });

      const answerObj = { [this.title]: this.answers[index]['name'] };

      this.callback(answerObj);

    },
    addMultiplyHandler: function () {
      let r = Math.random().toString(36).substring(7);
      this.inputModelChild.push({ name: r })
    },
    continueHandler: function () {

      let resultInputModels = Object.assign({}, this.inputModels);

      this.items.forEach(item => {

        if(item.type === 'multiply') {
          resultInputModels[item.name] = [];
          resultInputModels[item.name].push(this.inputModels[item.name]);

          this.inputModelChild.forEach(childItem => {
            resultInputModels[item.name].push(this.inputModelChild[childItem.name]);
          });

        }

      });

      this.callback(resultInputModels);

      this.callbackStep(this.step + 1);
    },
    backStep: function () {
      this.callbackStep(this.step - 1 );
    },
    inputChangeHandler(mask, name) {
      let filterValue = this.inputModels[name].replace(mask, '');
      this.inputModels[name] = mask + filterValue;
      console.log(mask, name);
    },
    selectChangeHandler(name, value) {
      this.inputModels[name] = value;
    }
  },
}
</script>

<style scoped>

.multiply-wrapper {
  display: flex;
  flex-direction: column;
}

.multiply-container {
  display: flex;
}

.multiply-container .form-button {
  height: 48px;
  width: 48px;
  margin: 0;
  margin-bottom: 12px;
  margin-left: 24px;
  align-self: flex-end;
  font-size: 34px;
}

.multiply-container .form-label {
  width: 100%;
}

</style>
