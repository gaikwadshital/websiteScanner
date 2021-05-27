<template>
    <div class="p-6 bg-indigo-800 min-h-screen flex justify-center items-center">
        <div class="w-full max-w-md">
            <form class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden" @submit.prevent="register">
                <div class="px-10 py-12">
                    <h1 class="text-center font-bold text-3xl">Join us!</h1>
                    <div class="mx-auto mt-6 w-24 border-b-2"/>
                    <text-input v-model="form.name" :error="form.errors.name" class="mt-10" label="Name" type="text"
                                autofocus autocapitalize="on"/>
                    <text-input v-model="form.company_name" :error="form.errors.company_name" class="mt-10"
                                label="Company Name" type="text" autofocus autocapitalize="on"/>
                    <text-input v-model="form.email" :error="form.errors.email" class="mt-10" label="Email" type="email"
                                autocapitalize="off"/>
                    <text-input v-model="form.password" :error="form.errors.password" class="mt-6" label="Password"
                                type="password"/>
                </div>
                <div class="px-10 py-4 bg-gray-100 border-t border-gray-100 flex">
                    <loading-button :loading="form.processing" class="ml-auto btn-indigo" type="submit">Create
                    </loading-button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import TextInput from '@/Shared/TextInput'
import LoadingButton from '@/Shared/LoadingButton'

export default {
    metaInfo: {title: 'Register'},
    components: {
        LoadingButton,
        TextInput,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                company_name: '',
                email: '',
                password: '',
            }),
        }
    },
    methods: {
        register() {
            this.form.post(this.route('register.store'))
        },
    },
}
</script>
