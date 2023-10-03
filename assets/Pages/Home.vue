<script setup>
import { ref, reactive } from 'vue'
import axios from 'axios'

import AuthenticatedLayout from "../Layouts/AuthenticatedLayout.vue";

const mode = ref('palindrome');

const data = reactive({
  mode: mode,
  inputOne: null,
  inputTwo: null,
})

function submitForm(){
  axios.post('/logic', data)
  .then(function (response) {
    console.log(response);
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
          class="text-3xl font-pixelify border border-orange-500 h-96 w-96 rounded-xl dark:bg-gray-900 p-12 transition"
        ></textarea>
        <textarea 
          v-if="mode === 'anagram'"
          v-model="data.inputTwo"
          class="text-3xl font-pixelify border border-orange-500 h-96 w-96 rounded-xl dark:bg-gray-900 p-12 transition ml-12"
        ></textarea>
      </div>
      <button 
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      @click="submitForm()">Submit</button>
    </div>

</AuthenticatedLayout>
</template>