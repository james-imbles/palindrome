<script setup>
import { ref, reactive, watch } from 'vue'
import axios from 'axios'

import AuthenticatedLayout from "../Layouts/AuthenticatedLayout.vue";

const props = defineProps({
  placeholders: Object,
})

const mode = ref('palindrome');
const result = ref(0);

const classMap = [
  'border-orange-500',
  'border-green-500',
  'border-red-500'
]

const data = reactive({
  mode: mode,
  inputOne: props.placeholders[mode.value][0],
  inputTwo: null,
})

watch(mode, (newMode) => {
  data.inputOne = props.placeholders[newMode][0];
  data.inputTwo = props.placeholders[newMode][1] ?? null;
})

watch(result, (newResult) => {
  setTimeout(() => {
    result.value = 0
  }, 2000);
})

function submitForm(){
  axios.post('/logic', data)
  .then(function (response) {
    result.value = response.data.result ? 1 : 2
  })
  .catch(function (error) {
    console.log(error);
  });
}

</script>

<template>
<AuthenticatedLayout>
    <template #header>
      <h2 
      class="header-text font-pixelify text-3xl font-bold">Palindrome, Anagram and Pangram checker</h2>
    </template>
    <div>
      <div class="flex w-max my-6 mx-auto font-bold bg-green-500 rounded-lg font-pixelify">
        <button 
         @click="mode = 'palindrome'"
        :class="`${mode === 'palindrome' ?  'bg-orange-500': ''}`"
        class="rounded-l-lg p-2">Palindrome</button>
        <button 
          @click="mode = 'anagram'"
         :class="`${mode === 'anagram' ?  'bg-orange-500': ''}`"
        class="p-2">Anagram</button>
        <button
          @click="mode = 'pangram'" 
         :class="`${mode === 'pangram' ?  'bg-orange-500': ''}`"
        class="rounded-r-lg p-2">Pangram</button>
      </div>
      <div class="flex w-max mx-auto">
        <textarea
          v-model="data.inputOne"
          :class="classMap[result]"  
          class="text-3xl font-pixelify border h-96 w-96 rounded-xl dark:bg-gray-900 p-12 transition"
        ></textarea>
        <textarea 
          v-if="mode === 'anagram'"
          v-model="data.inputTwo"
          :class="classMap[result]"
          class="text-3xl font-pixelify border  h-96 w-96 rounded-xl dark:bg-gray-900 p-12 transition ml-12"
        ></textarea>
      </div>
      <button 
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      @click="submitForm()">Submit</button>
    </div>

</AuthenticatedLayout>
</template>