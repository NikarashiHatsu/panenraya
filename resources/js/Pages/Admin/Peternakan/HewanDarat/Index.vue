<template>
  <app-layout>
    <template #header>
      <div class="flex items-center">
        <inertia-link :href="route('admin.peternakan.index')">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Peternakan
          </h2>
        </inertia-link>
        <span class="ml-4">
          &gt;
        </span>
        <p class="ml-4">Hewan Darat</p>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <list-module :data="$page.modulePeternakans" />
        </div>
      </div>
    </div>
    
  </app-layout>
</template>

<script>
  import AppLayout from '@/Layouts/AppLayout'
  import ListModule from './ListModule'
  import JetDialogModal from '@/Jetstream/DialogModal'
  import JetButton from '@/Jetstream/Button'

  export default {
    components: {
      AppLayout,
      ListModule,
      JetDialogModal,
      JetButton
    }
  }
</script>