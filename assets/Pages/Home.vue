<script setup>
import AuthenticatedLayout from "../Layouts/AuthenticatedLayout.vue";
</script>

<template>
<AuthenticatedLayout>
    <template #header>
      <h2 
      class="header-text font-pixelify text-3xl font-bold font-style">Palindrome, Anagram and Pangram checker</h2>
    </template>
    <div>
      <div class="flex w-max my-6 mx-auto font-bold bg-green-500 rounded-lg">
        <button class="hover:bg-green-200 w-100">Palindrome</button>
        <button class="hover:bg-green-200">Anagram</button>
        <button class="hover:bg-green-200">Pangram</button>
      </div>
      <div class="flex w-max mx-auto">
        <textarea class="border border-orange-500 h-96 w-96 rounded-xl dark:bg-gray-900 p-12 transition"></textarea>
        <textarea class="border border-orange-500 h-96 w-96 rounded-xl dark:bg-gray-900 p-12 transition ml-12"></textarea>
      </div>
    </div>

</AuthenticatedLayout>
</template>