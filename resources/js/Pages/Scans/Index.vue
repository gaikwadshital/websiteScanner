<template>
    <div>
        <h1 class="mb-8 font-bold text-3xl">Scan History</h1>
        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-6 pt-6 pb-4">Url</th>
                    <th class="px-6 pt-6 pb-4">Scan Started at</th>
                    <th class="px-6 pt-6 pb-4">Completed at</th>
                    <th class="px-6 pt-6 pb-4">Output</th>
                </tr>
                <tr v-for="scan in scans.data" :key="scan.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                    <td class="border-t">
                        <inertia-link class="px-6 py-4 flex items-center focus:text-indigo-500" href="#">
                            {{ scan.url }}
                        </inertia-link>
                    </td>
                    <td class="border-t">
                        <inertia-link class="px-6 py-4 flex items-center focus:text-indigo-500" href="#">
                            {{ scan.started_at }}
                        </inertia-link>
                    </td>
                    <td class="border-t">
                        <inertia-link class="px-6 py-4 flex items-center focus:text-indigo-500" href="#">
                            {{ scan.completed_at }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px">
                        <inertia-link class="px-4 flex items-center" :href="route('scan.show', scan.id)" tabindex="-1">
                            View Output <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
                        </inertia-link>
                    </td>
                </tr>
                <tr v-if="scans.data.length === 0">
                    <td class="border-t px-6 py-4" colspan="4">No scans Yet.</td>
                </tr>
            </table>
        </div>
        <pagination class="mt-6" :links="scans.links" />
    </div>
</template>

<script>
import TextInput from '@/Shared/TextInput'
import LoadingButton from '@/Shared/LoadingButton'
import Icon from '@/Shared/Icon'
import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination'

export default {
  metaInfo: { title: 'Dashboard' },
  layout: Layout,
    components: {
        LoadingButton,
        TextInput,
        Icon,
        Pagination,
    },
    props: {
        scans: Object,
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
