<script setup>
import AuthenticatedLayout from "../Layouts/AuthenticatedLayout.vue";
</script>

<template>
<AuthenticatedLayout>
    <template #header>
      <h2 
      class="header-text font-pixelify text-3xl font-bold font-style">Palindrome, Anagram and Pangram checker</h2>
    </template>
    <div class="flex w-max mx-auto">
      <textarea class="border border-orange-500 h-96 w-96 rounded-xl dark:bg-gray-900 p-12 transition"></textarea>
      <textarea class="border border-orange-500 h-96 w-96 rounded-xl dark:bg-gray-900 p-12 transition ml-12"></textarea>
    </div>
</AuthenticatedLayout>
</template>