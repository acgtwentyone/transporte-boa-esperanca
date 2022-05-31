<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, useForm, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

import Input from "@/Components/Input.vue";
import InputError from "@/Components/InputError.vue";
import Label from "@/Components/Label.vue";
import Button from "@/Components/Button.vue";

const errors = computed(() => usePage().props.value.errors);
const hasErrors = computed(() => Object.keys(errors.value).length > 0);

const props = defineProps({
  work: {
    type: Object,
    default: undefined,
  },
});

const form = props.work
  ? useForm({
      name: props.work.name,
      phone: props.work.phone,
      address: props.work.address,
    })
  : useForm({
      name: "",
      phone: "",
      address: "",
    });

const submit = () => {
  if (props.work) {
    form.put(route("works.update", props.work), {
      onSuccess: () => {
        form.reset();
      },
    });
  } else {
    form.post(route("works.store"), {
      onSuccess: () => {
        form.reset();
      },
    });
  }
};
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{
          props.work ? "Alterar Informaçoes de trabalho" : "Registrar Trabalho"
        }}
        <hr class="mt-3" />
      </h2>
    </template>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
      <form @submit.prevent="submit">
        <div class="block md:flex">
          <div>
            <Label value="Nome" />
            <Input
              id="name"
              label="name"
              type="text"
              class="mt-1 block w-full"
              v-model="form.name"
            />
            <InputError :message="errors.name" v-if="hasErrors" />
          </div>

          <div class="mt-3 md:mt-0 md:ml-3">
            <Label value="Telefone" />
            <Input
              id="phone"
              label="Telefone"
              type="text"
              class="mt-1 block w-full"
              v-model="form.phone"
            />
            <InputError :message="errors.phone" v-if="hasErrors" />
          </div>
          <div class="mt-3 md:mt-0 md:ml-3">
            <Label value="Endereço" />
            <Input
              id="address"
              label="Endereço"
              type="text"
              class="mt-1 block w-full"
              v-model="form.address"
            />
            <InputError :message="errors.address" v-if="hasErrors" />
          </div>
        </div>

        <div class="flex items-center justify-end mt-4">
          <Button
            class="ml-4"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            {{ props.work ? "Atualizar" : "Registrar" }}
          </Button>
        </div>
      </form>
    </div>
  </BreezeAuthenticatedLayout>
</template>
