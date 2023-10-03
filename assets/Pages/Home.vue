<script setup>
import { ref } from 'vue'
import AuthenticatedLayout from "../Layouts/AuthenticatedLayout.vue";

const mode = ref('palindrome');

</script>

<template>
<AuthenticatedLayout>
    <template #header>
      <h2 
      class="header-text font-pixelify text-3xl font-bold font-style">Palindrome, Anagram and Pangram checker</h2>
    </template>
    <div>
      <div class="flex w-max my-6 mx-auto font-bold bg-green-500 rounded-lg">
        <button 
         @click="mode = 'palindrome'"
        :class="`${mode === 'palindrome' ?  'bg-orange-500': ''}`"
        class="rounded-l-lg p-2">Palindrome</button>
        <button 
          @click="mode = 'anagram'"
         :class="`${mode === 'anagram' ?  'bg-orange-500': ''}`"
        class="p-2">Anagram</button>
        <button
          @click="mode = 'panagram'" 
         :class="`${mode === 'panagram' ?  'bg-orange-500': ''}`"
        class="rounded-r-lg p-2">Pangram</button>
      </div>
      <div class="flex w-max mx-auto">
        <textarea class="border border-orange-500 h-96 w-96 rounded-xl dark:bg-gray-900 p-12 transition"></textarea>
        <textarea class="border border-orange-500 h-96 w-96 rounded-xl dark:bg-gray-900 p-12 transition ml-12"></textarea>
      </div>
    </div>

</AuthenticatedLayout>
</template>