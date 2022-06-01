<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, useForm, usePage } from "@inertiajs/inertia-vue3";
import { computed, ref } from "vue";
import Datepicker from "@vuepic/vue-datepicker";
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import "@vuepic/vue-datepicker/dist/main.css";

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

const Status = ["Não Pago", "Pago"];

const form = props.work
  ? useForm({
      date: props.work.date,
      material: props.work.material,
      place: props.work.place,
      paid: Status[props.work.paid],
      freight_value: props.work.freight_value,
      price: props.work.price,
      client_id: props.work.client_id,
    })
  : useForm({
      date: ref(),
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
        <div class="block md:flex md:flex-wrap">
          <div class="mt-4 md:mt-0 md:ml-3">
            <Label value="Data" />
            <Datepicker
              :enableTimePicker="false"
              :maxDate="new Date()"
              :keepActionRow="true"
              :autoApply="true"
              locale="pt"
              cancelText="Cancelar"
              selectText="Selecionar"
              inputClassName="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
              v-model="form.date"
            />
            <InputError :message="errors.date" v-if="hasErrors" />
          </div>
          <div class="mt-4 md:mt-0 md:ml-3">
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
          <div class="mt-4 md:mt-0 md:ml-3">
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
          <div class="mt-4 md:mt-0 md:ml-3">
            <Label value="Valor de Frete" />
            <div class="relative">
              <Input
                id="freight_value"
                label="freight_value"
                type="text"
                class="mt-1 block pr-14"
                v-model="form.freight_value"
              />
              <span class="absolute right-0 top-2.5 right-4">ECV</span>
            </div>
            <InputError :message="errors.freight_value" v-if="hasErrors" />
          </div>
          <div class="mt-4 md:mt-0 md:ml-3">
            <Label value="Preço" />
            <div class="relative">
              <Input
                id="price"
                label="price"
                type="text"
                class="mt-1 block pr-14"
                v-model="form.price"
              />
              <span class="absolute right-0 top-2.5 right-4">ECV</span>
            </div>
            <InputError :message="errors.price" v-if="hasErrors" />
          </div>
          <div class="mt-4 md:mt-0 md:ml-3 md:w-40">
            <Label value="Pago" />
            <vSelect
              placeholder="Selecione uma opção"
              :options="[
                { label: 'Pago', code: '1' },
                { label: 'Não Pago', code: '0' },
              ]"
              v-model="form.paid"
            ></vSelect>
            <InputError :message="errors.paid" v-if="hasErrors" />
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
