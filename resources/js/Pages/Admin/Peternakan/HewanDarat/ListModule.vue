<template>
  <div class="p-6">
    <div class="flex items-baseline justify-between">
      <h6 class="text-xl mb-6">List Module Hewan Darat</h6>
      <jet-button type="'button'" @click.native.prevent="openModal">Tambah</jet-button>
    </div>
    <table class="table-fixed w-full">
      <thead>
        <tr>
          <th class="w-1/12 border py-2 px-4">No</th>
          <th class="border py-2 px-4">Label Module</th>
          <th class="border py-2 px-4">User Terdaftar</th>
          <th class="w-2/12 border py-2 px-4">Opsi</th>
        </tr>
      </thead>
      <tbody>
        <tr v-if="this.datas.length == 0">
          <td class="border py-2 px-4 text-center" colspan="4">Belum ada data</td>
        </tr>
        <tr v-else v-for="(data, index) in this.datas" :key="data.id">
          <td class="border py-2 px-4">{{ index + 1 }}</td>
          <td class="border py-2 px-4">{{ data.label_module.charAt(0).toUpperCase() + data.label_module.slice(1) }}</td>
          <td class="border py-2 px-4">{{ '0 User' }}</td>
          <td class="border py-2 px-4">
            <jet-secondary-button @click.native="setEditData(data)">Edit</jet-secondary-button>
            <jet-danger-button @click.native="showDeletionDialog(data)" class="ml-1">Hapus</jet-danger-button>
          </td>
        </tr>
      </tbody>
    </table>
    
    <form-tambah-module @dataUpdated="updateData" @closed="onButtonCancel" :show="this.modalShow" :editMode="this.editMode" :editData="this.editData" />

    <jet-confirmation-modal :show="isDeletionModalShown">
      <template #title>
        {{ getDeletionDialogTitle }}
      </template>

      <template #content>
        Apakah Anda yakin ingin menghapus data ini?
      </template>

      <template #footer>
        <jet-secondary-button @click.prevent.native="isDeletionModalShown = false">
          Batalkan
        </jet-secondary-button>

        <jet-danger-button @click.native="deleteData" class="ml-2" :class="{ 'opacity-25': isDeletionInProgress }" :disabled="isDeletionInProgress">
          Hapus
        </jet-danger-button>
      </template>
    </jet-confirmation-modal>

  </div>
</template>

<script>
  import FormTambahModule from './FormTambahModule'
  import JetConfirmationModal from '@/Jetstream/ConfirmationModal'
  import JetModal from '@/Jetstream/Modal'
  import JetSecondaryButton from '@/Jetstream/SecondaryButton'
  import JetDangerButton from '@/Jetstream/DangerButton'
  import JetButton from '@/Jetstream/Button'

  export default {
    components: {
      FormTambahModule,
      JetConfirmationModal,
      JetModal,
      JetDangerButton,
      JetSecondaryButton,
      JetButton
    },

    props: ['data'],
    
    data() {
      return {
        isDeletionModalShown: false,
        isDeletionInProgress: false,
        deletionData: null,
        
        datas: this.data,
        modalShow: false,
        editMode: false,
        editData: null,
      }
    },

    computed: {
      getDeletionDialogTitle() {
        const data = this.deletionData != null ? this.deletionData.label_module : '';

        return `Hapus Data ${data}`;
      }
    },

    methods: {
      openModal() {
        this.modalShow = !this.modalShow;
      },

      onButtonCancel(value) {
        this.modalShow = !value;
        this.editMode = false;
        this.editData = {};
      },

      updateData(data) {
        this.datas = data;
      },

      setEditData(data) {
        this.editMode = true;
        this.editData = data;
        this.openModal();
      },

      showDeletionDialog(data) {
        this.isDeletionModalShown = !this.isDeletionModalShown;
        this.deletionData = data;
      },
      
      deleteData() {
        const form = this.$inertia.form({
          _method: 'DELETE'
        });
        
        this.isDeletionInProgress = true;
        
        axios.post(route('admin.peternakan.hewan_darat.destroy', this.deletionData.id).url(), form)
          .then(response => {
            this.isDeletionInProgress = false;
            this.datas = response.data.data;
            this.isDeletionModalShown = false;
          });
      },
    }
  }
</script>