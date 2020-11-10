<template>
  <app-layout>
    <template #header>
      <div class="flex items-center">
        <inertia-link :href="route('user.peternakan.index')" class="font-semibold text-xl text-gray-800 leading-tight">
          Peternakan
        </inertia-link>
        <span class="ml-2">
          &gt;
        </span>
        <div class="ml-2">
          Ayam
        </div>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

          <div class="p-6">
            <h6 class="text-xl font-semibold mb-6">
              Fase Peternakan Ayam
            </h6>
            <p class="leading-8 mb-4">
              Pada module ini, kami akan membantu Anda untuk melalui tahapan-tahapan peternakan ayam secara professional. Didukung oleh <i>guide-guide</i> yang telah disusun oleh para pakar peternak, kami menjamin hasil maksimal yang akan menguntungkan Anda sebagai peternak. Dengan menekan tombol setuju di akhir halaman ini, Anda akan terdaftar pada program <i>guidance</i> kami.
            </p>
          </div>

          <div class="border-l-4 leading-8 px-6 py-4 border-red-300 bg-red-50">
            Perlu diingat bahwa setiap <i>loss</i> yang Anda alami bukan sepenuhnya tanggung jawab kami.
          </div>

          <div class="leading-8 p-6">
            Pada module ini, Anda akan melalui 6 tahapan. Tahapan-tahapan tersebut adalah:
          </div>

          <div class="border-l-4 leading-8 px-6 py-4 border-gray-300 bg-gray-50 border-b">
            <div class="font-bold">1. Persiapan.</div> 
            <div class="ml-4">
              Anda harus menginput beberapa data, yang nantinya data tersebut akan kami gunakan sebagai data analitik. Seluruh data yang Anda simpan tidak akan terlihat oleh orang lain, termasuk kami namun tidak terbatas pada developer yang menggunakan data Anda untuk pembuatan dan improvisasi analitik.
            </div>
          </div>
          <div class="border-l-4 leading-8 px-6 py-4 border-gray-300 bg-gray-50 border-b">
            <div class="font-bold">2. Pemilihan Lokasi Kandang.</div>
            <div class="ml-4">
              Sebuah tahapan krusial yang Anda harus ikuti, hal ini juga berdampak pada keberlangsungan kegiatan ternak Anda. Disini Anda akan kami pandu untuk menentukan kondisi ideal sebuah kandang.
            </div>
          </div>
          <div class="border-l-4 leading-8 px-6 py-4 border-gray-300 bg-gray-50 border-b">
            <div class="font-bold">3. Fase Pemeliharaan</div>
            <div class="ml-4">
              Pada tahapan ini, Anda diharuskan untuk menginput data-data setiap hari sebanyak <i>n</i>-hari (banyaknya hari bisa Anda tentukan sendiri pada tahap pertama).
            </div>
          </div>
          <div class="border-l-4 leading-8 px-6 py-4 border-gray-300 bg-gray-50">
            <div class="font-bold">4. Panen</div>
            <div class="ml-4">
              Tahapan akhir yang akan Anda lakukan. Seperti sebelumnya, Anda diwajibkan untuk menginput beberapa data sebagai data analitik kami.
            </div>
          </div>

          <div class="p-6 leading-8">
            Setelah semua tahapan di atas selesai. Kami akan memberikan Anda laporan-laporan analitik. Laporan analitik yang kami generate, berupa:
          </div>
          <div class="border-l-4 leading-8 px-6 py-4 border-b border-green-300 bg-green-50">
            <div class="font-bold">1. Laporan General</div>
            <div class="ml-4">
              Laporan dari keseluruhan tahapan yang Anda telah input, beserta analitiknya.
            </div>
          </div>
          <div class="border-l-4 leading-8 px-6 py-4 border-green-300 bg-green-50">
            <div class="font-bold">2. Laporan Keuangan</div>
            <div class="ml-4">
              Laporan dari biaya-biaya yang telah Anda keluarkan selama mengikuti guidance ini.
            </div>
          </div>
            
          <div class="p-6">
            <div class="flex flex-row-reverse">

              <jet-confirms-password @confirmed="ikutiGuidance" :title="'Konfirmasi Password'" :content="'Konfirmasi password Anda untuk mengikutin guidance ini.'" :button="'Ikuti Guide Ini'" :cancel="'Batalkan'">
                <jet-button type="button" :class="{ 'opacity-25': mengkonfirmasi }" :disabled="mengkonfirmasi">
                  Ikuti Guidance Ini
                </jet-button>
              </jet-confirms-password>
              
            </div>
          </div>
          
        </div>
      </div>
    </div>

    <jet-dialog-modal :show="isDialogSuccessShown">
      <template #title>
        <span class="text-green-500">Berhasil</span>
      </template>

      <template #content>
        Anda telah terdaftar
      </template>

      <template #footer>
        <inertia-link :href="route('user.peternakan.ayam.app')">
          Buka Dashboard
        </inertia-link>
      </template>
    </jet-dialog-modal>

    <jet-dialog-modal :show="isDialogFailedShown">
      <template #title>
        <span class="text-red-500">Gagal</span>
      </template>

      <template #content>
        Pendaftaran gagal, mohon tunggu beberapa saat lagi.
      </template>
      
      <template #footer>
        <jet-secondary-button>
          Tutup Modal
        </jet-secondary-button>
      </template>
    </jet-dialog-modal>
    
  </app-layout>
</template>

<script>
  import AppLayout from '@/Layouts/AppLayout'
  import JetButton from '@/Jetstream/Button'
  import JetConfirmsPassword from '@/Jetstream/ConfirmsPassword'
  import JetDialogModal from '@/Jetstream/DialogModal'
  import JetSecondaryButton from '@/Jetstream/SecondaryButton'

  export default {
    components: {
      AppLayout,
      JetButton,
      JetConfirmsPassword,
      JetDialogModal,
      JetSecondaryButton,
    },

    data() {
      return {
        isDialogSuccessShown: false,
        isDialogFailedShown: false,
        mengkonfirmasi: false
      }
    },

    methods: {
      ikutiGuidance() {
        axios.post(route('user.peternakan.ayam.store').url(), {
          userId: this.$page.user.id
        }).then(response => {
          console.log(response);
        }).catch(error => {
          console.log(error);
        });
      }
    }
  }
</script>