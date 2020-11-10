<template>
  <jet-dialog-modal :show="this.show">

    <template #title>
      {{ getFormTitle }}
    </template>

    <template #content>
      <jet-label for="label_module" value="Label Module" />
      <jet-input type="text" class="mt-2 block w-3/4" v-model="form.label_module" />
      <jet-input-error :message="form.error" class="mt-2" />
    </template>

    <template #footer>
      <jet-secondary-button @click.native="closeDialog">
        Batalkan
      </jet-secondary-button>

      <jet-button class="ml-2" @click.native="simpanData" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
        Simpan
      </jet-button>
    </template>

  </jet-dialog-modal>
</template>

<script>
  import JetLabel from '@/Jetstream/Label'
  import JetInput from '@/Jetstream/Input'
  import JetInputError from '@/Jetstream/InputError'
  import JetButton from '@/Jetstream/Button'
  import JetSecondaryButton from '@/Jetstream/SecondaryButton'
  import JetDialogModal from '@/Jetstream/DialogModal'

  export default {
    props: ['show', 'editMode', 'editData'],
    
    components: {
      JetLabel,
      JetInput,
      JetInputError,
      JetButton,
      JetSecondaryButton,
      JetDialogModal,
    },

    data() {
      return {
        dialogOpenend: this.show,
        formAction: '',

        form: this.$inertia.form({
          label_module: '',
          jenis_module: 'hewan_darat',
          error: ''
        })
      }
    },

    computed: {
      getFormTitle() {
        if(this.editMode === false) {
          this.form.label_module = '';
          this.form._method = 'POST';
          this.formAction = route('admin.peternakan.hewan_darat.store').url();
          return 'Tambah Module Hewan Darat';
        } else {
          this.form.label_module = this.editData.label_module;
          this.form._method = 'PUT';
          this.formAction = route('admin.peternakan.hewan_darat.update', this.editData.id).url();
          return 'Edit Module';
        }
      },
    },

    methods: {
      simpanData() {
        this.form.processing = true;

        axios.post(this.formAction, this.form).then(response => {
          this.form.label_module = '',
          this.form.error = '',
          this.form.processing = false;
          this.sendData(response.data.data);
          this.closeDialog();
        }).catch(error => {
          this.form.processing = false;
          this.form.error = error.response.data.errors.label_module[0];
        });
      },

      closeDialog() {
        this.$emit('closed', true);
      },

      sendData(data) {
        this.$emit('dataUpdated', data);
      }
    }
  }
</script>