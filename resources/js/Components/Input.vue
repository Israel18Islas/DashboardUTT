<template>
  <div>
    <label v-if="label" :for="id" class="font-bold block">
      {{ label }}
    </label>
    <input
      :id="id"
      :type="type"
      :value="modelValue"
      @input="updateInput"
      class="border w-full p-1"
    />
  </div>
</template>

<script>
export default {
  name: "BaseInput",
  props: {
    id: {
      type: String,
      default: "",
    },
    label: {
      type: String,
      default: "",
    },
    modelValue: {
      type: [String, Number],
      default: "",
    },
    type: {
      type: String,
      default: "text",
    }
  },
  methods: {
    updateInput(event) {
      this.$emit("update:modelValue", event.target.value);
    }
  }
};
</script>
