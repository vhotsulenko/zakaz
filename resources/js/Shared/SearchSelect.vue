<template>
  <div class="flex items-center">
       <!-- <div class="uk-margin"> -->
    <form class="uk-search uk-search-default">
        <a href="" class="uk-search-icon-flip" uk-search-icon></a>
        <input class="uk-search-input" type="search" placeholder="Search zakaz" v-model="inputValue" ref="labelInput" v-on:input="scrollToElement(inputValue)">
    </form>
  </div>
</template>

<script>
//import Dropdown from '@/Shared/Dropdown'

export default {
  components: {
    //Dropdown,
  },
  props: {
    modelValue: String,
    maxWidth: {
      type: Number,
      default: 300,
    },
  },
  emits: ['update:modelValue', 'reset'],
}
</script>