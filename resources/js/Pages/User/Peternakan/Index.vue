<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Peternakan
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

          <div>
            <div class="text-xl p-6">
              Modul peternakan yang tersedia:
            </div>
            <inertia-link :href="route('user.peternakan.ayam.index')" class="block border-l-4 border-gray-400 text-lg p-4 bg-gray-50 transition duration-200 ease-in-out hover:bg-gray-100">
              Ayam
            </inertia-link>
          </div>
          
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
  import AppLayout from '@/Layouts/AppLayout'

  export default {
    components: {
      AppLayout,
    }
  }
</script>