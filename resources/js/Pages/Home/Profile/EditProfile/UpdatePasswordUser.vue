<script setup>
import InputError from './profileComponent/InputError.vue';
import InputLabel from './profileComponent/InputLabel.vue';
import PrimaryButton from './profileComponent/PrimaryButton.vue';
import TextInput from './profileComponent/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

// const passwordInput = ref(null);
// const currentPasswordInput = ref(null);


const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.post(route("profile.update_password"), {
        onFinish: () => route("profile.index"),
    });
};
</script>

<template>
    <form @submit.prevent="updatePassword" class="rounded-lg col-md-4 ">
        <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-right font-extrabold text-[30px]">Password Setting</h4>
            </div>
            <div class="row mt-2">
                <InputLabel for="current_password" value="Old Password" />

                <TextInput id="current_password" ref="currentPasswordInput" v-model="form.current_password" type="password"
                    class="mt-1 block w-full" autocomplete="current-password" />

                <InputError :message="form.errors.current_password" class="mt-2" />
            </div>

            <div class="row mt-3">
                <InputLabel for="password" value="New Password" />

                <TextInput id="password" ref="passwordInput" v-model="form.password" type="password"
                    class="mt-1 block w-full" autocomplete="new-password" />

                <InputError :message="form.errors.password" class="mt-2" />
            </div>

            <div class="row mt-3">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput id="password_confirmation" v-model="form.password_confirmation" type="password"
                    class="mt-1 block w-full" autocomplete="new-password" />

                <InputError :message="form.errors.password_confirmation" class="mt-2" />
            </div>

            <div class="row mt-10">
                <PrimaryButton class="col-md-3" :disabled="form.processing">Save Password
                </PrimaryButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </div>
    </form>
</template>
