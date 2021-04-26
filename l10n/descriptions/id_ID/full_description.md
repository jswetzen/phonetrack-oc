# Aplikasi PhoneTrack di Nextcloud

PhoneTrack adalah aplikasi di nextcloud yang digunakan untuk melacak serta menyimpan posisi lokasi dari perangkat mobile.

PhoneTrack menerima informasi log dari perangkat mobile dan menampilkan-nya secara dinamis di peta.

🌍 Bantu kami untuk alih bahasa di [PhoneTrack Crowdin project](https://crowdin.com/project/phonetrack).

⚒ Silahkan kunjungi alternatif lain untuk membantu kami di [contribution guidelines](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/CONTRIBUTING.md).

Bagaimana cara menggunakan PhoneTrack :

* Buatlah sesi pelacakan.
* Berikan alamat log \* ke perangkat mobile. Pilihlah [metode log](https://gitlab.com/eneiluj/phonetrack-oc/wikis/userdoc#logging-methods) yang sesuai.
* PhoneTrack dapat memantau lokasi sesi perangkat baik secara langsung maupun tidak, atau bahkan dapat di bagikan kepada pihak lain.

(\*) Pastikan untuk memberi nama atas perangkat pada alamat url (hindari merubah di menu pengaturan pada aplikasi). Rubalah "yourname" dengan nama yang di-inginkan. Perubahan nama perangkat di menu pengaturan aplikasi hanya dapat bekerja di aplikasi pelacakan Owntracks, Traccar dan OpenGTS.

Pada halaman utama PhoneTrack, saat memantau sebuah sesi, anda dapat melakukan beberapa hal, antara lain :

* 📍 Menampilkan lokasi lampau
* ⛛ Titik penyaring
* ✎ Rubah/tambah/hapus titik secara manual
* ✎ Rubah perangkat (ganti nama, merubah bentuk/warna, pindahkan ke sesi lain)
* ⛶ Membuat area "geofencing" untuk perangkat
* ⚇ Membuat peringatan atas sebuah perangkat jika saling berdekatan
* 🖧 Berbagi sesi ke pengguna Nextcloud lainnya atau ke pihak lain (hanya lihat)
* 🔗 Membuat alamat untuk di bagi secara umum dengan beberapa batasan (saring, nama perangkat, posisi terakhir dan "geofencing" sederhana)
* 🖫 Impor/ekspor sebuah sesi dalam format GPX (satu berkas dengan satu pelacakan untuk setiap perangkat atau satu berkas untuk satu perangkat)
* 🗠 Menampilkan statistik sesi
* 🔒 [Pesan nama perangkat](https://gitlab.com/eneiluj/phonetrack-oc/wikis/userdoc#device-name-reservation) sehingga hanya yang di perbolehkan saja menggunakan nama tersebut
* 🗓 Perpindahan sesi ekspor otomatis dan penghapusan otomatis (harian/mingguan/bulanan)
* ◔ Memilih untuk menentukan ketika jumlah kuota titik telah habis (hapus titik sebelumnya atau membatasi log)

Public page and public filtered page work like main page except there is only one session displayed, everything is read-only and there is no need to be logged in.

This app is tested on Nextcloud 17 with Firefox 57+ and Chromium.

This app is compatible with theming colors and accessibility themes !

This app is under development.

## Install

See the [AdminDoc](https://gitlab.com/eneiluj/phonetrack-oc/wikis/admindoc) for installation details.

Check [CHANGELOG](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/CHANGELOG.md#change-log) file to see what's new and what's coming in next release.

Check [AUTHORS](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/AUTHORS.md#authors) file to see complete list of authors.

## Known issues

* PhoneTrack **now works** with Nextcloud group restriction activated. See [admindoc](https://gitlab.com/eneiluj/phonetrack-oc/wikis/admindoc#issue-with-phonetrack-restricted-to-some-groups-in-nextcloud).

Any feedback will be appreciated.