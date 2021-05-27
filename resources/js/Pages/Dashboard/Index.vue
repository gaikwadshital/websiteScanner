<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Dashboard</h1>
    <p class="mb-8 leading-normal">Hey there! Welcome to Web Scanner.</p>

      <div class="bg-white rounded-md shadow overflow-hidden max-w-3xl">
          <form @submit.prevent="startScan">
              <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
                  <text-input v-model="form.url" :error="form.errors.url" class="pr-6 pb-8 w-full lg:w-1/2" label="Website Url" type="url" />
              </div>
              <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex items-center">
                  <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Scan</loading-button>
              </div>
          </form>
      </div>
  </div>
</template>

<script>
import Layout from '@/Shared/Layout'
import TextInput from '@/Shared/TextInput'
import LoadingButton from '@/Shared/LoadingButton'

export default {
  metaInfo: { title: 'Dashboard' },
  layout: Layout,
    components: {
        LoadingButton,
        TextInput,
    },
    data() {
        return {
            form: this.$inertia.form({
                url: '',
            }),
        }
    },
    methods: {
        startScan() {
            this.form.post(this.route('scan.store'))
        },
    },
}
</script>
