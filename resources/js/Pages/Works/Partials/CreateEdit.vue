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
  client: {
    type: Object,
    default: undefined,
  },
  from_client: {
    type: Number,
    default: 0,
  },
});

const form = props.work
  ? useForm({
      date: props.work.date,
      material: props.work.material,
      place: props.work.place,
      paid: props.work.paid,
      freight_value: props.work.freight_value,
      price: props.work.price,
      client_id: props.work.client_id,
    })
  : useForm({
      date: "",
      material: "",
      place: "",
      paid: "",
      freight_value: "",
      price: "",
      client_id: props.client.id,
    });

const submit = () => {
  if (props.work) {
    form.put(
      route("works.update_work", {
        work: props.work,
        from_client: props.from_client,
      }),
      {
        onSuccess: () => {
          form.reset();
        },
      }
    );
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
            <Label value="Data" />
            <Input
              id="date"
              label="date"
              type="text"
              class="mt-1 block w-full"
              v-model="form.date"
            />
            <InputError :message="errors.date" v-if="hasErrors" />
          </div>
          <div>
            <Label value="Material" />
            <Input
              id="material"
              label="material"
              type="text"
              class="mt-1 block w-full"
              v-model="form.material"
            />
            <InputError :message="errors.material" v-if="hasErrors" />
          </div>
          <div>
            <Label value="Lugar" />
            <Input
              id="place"
              label="place"
              type="text"
              class="mt-1 block w-full"
              v-model="form.place"
            />
            <InputError :message="errors.place" v-if="hasErrors" />
          </div>
          <div v-if="props.work">
            <Label value="Pago" />
            <Input
              id="paid"
              label="paid"
              type="text"
              class="mt-1 block w-full"
              v-model="form.paid"
            />
            <InputError :message="errors.paid" v-if="hasErrors" />
          </div>
          <div>
            <Label value="Valor de Frete" />
            <Input
              id="freight_value"
              label="freight_value"
              type="text"
              class="mt-1 block w-full"
              v-model="form.freight_value"
            />
            <InputError :message="errors.freight_value" v-if="hasErrors" />
          </div>
          <div>
            <Label value="Preço" />
            <Input
              id="price"
              label="price"
              type="text"
              class="mt-1 block w-full"
              v-model="form.price"
            />
            <InputError :message="errors.price" v-if="hasErrors" />
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
