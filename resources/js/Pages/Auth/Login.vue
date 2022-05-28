<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeError from "@/Components/InputError.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

const errors = computed(() => usePage().props.value.errors);
const hasErrors = computed(() => Object.keys(errors.value).length > 0);

defineProps({
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form.post(route("login"), {
    onSuccess: () => {
      form.reset()
    },
  });
};
</script>

<template>
  <BreezeGuestLayout>
    <Head title="Entrar" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>

    <form @submit.prevent="submit">
      <div>
        <BreezeLabel value="Email" />
        <BreezeInput
          id="email"
          label="Email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          autofocus
          autocomplete="username"
        />
        <BreezeError :message="errors.email" v-if="hasErrors"/>
      </div>

      <div class="mt-4">
        <BreezeLabel value="Password" />
        <BreezeInput
          id="password"
          label="Palavra passe"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          autocomplete="current-password"
        />
        <BreezeError :message="errors.password" v-if="hasErrors"/>
      </div>

      <div class="block mt-4">
        <label class="flex items-center">
          <BreezeCheckbox name="remember" v-model:checked="form.remember" />
          <span class="ml-2 text-sm text-gray-600">Lembrar</span>
        </label>
      </div>

      <div class="flex items-center justify-end mt-4">
        <Link
          v-if="canResetPassword"
          :href="route('password.request')"
          class="underline text-sm text-gray-600 hover:text-gray-900"
        >
          Esqueceu a sua palavra passe?
        </Link>

        <BreezeButton
          class="ml-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Entrar
        </BreezeButton>
      </div>
    </form>
  </BreezeGuestLayout>
</template>
