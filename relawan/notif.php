<div class="dropdown2">
    <div class="user-pic">
        <img src="/nuraga/images/notif.png" alt="Profile Picture" class="user-pic" height="50px">
        <div class="dropdown-option2" id="notificationDropdown">
            (tempat notifikasi)
        </div>
    </div>
</div>

<script>
    function showNotification(message) {
    // Buat elemen notifikasi baru
    const notificationElement = document.createElement('div');
    notificationElement.className = 'notification';
    notificationElement.innerHTML = message;

    // Tambahkan notifikasi ke dalam dropdown
    const dropdown = document.getElementById('notificationDropdown');
    dropdown.innerHTML = ''; // Bersihkan isi dropdown sebelum menambah notifikasi baru
    dropdown.appendChild(notificationElement);

    // Tambahkan efek visual atau gaya tambahan jika diperlukan
    dropdown.classList.add('notification-active');
}

// Simulasi perubahan data tabel kegiatan
function simulateDataChange() {
    // Lakukan sesuatu seperti mengambil data dari server atau sumber lainnya
    // ...

    // Setelah mendapatkan perubahan data, tampilkan notifikasi
    showNotification('Data tabel kegiatan telah diperbarui!');
}

// Panggil fungsi simulasi setelah beberapa detik (contoh)
setTimeout(simulateDataChange, 5000); // Simulasi setelah 5 detik

</script>