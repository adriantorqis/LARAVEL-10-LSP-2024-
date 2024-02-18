document.addEventListener("DOMContentLoaded", function () {
    // Add sorting functionality to the table
    $("#laporanTable").DataTable();
});

let prevScrollpos = window.pageYOffset;
const navbar = document.getElementById("navbar");
const headerHeight = document.querySelector(".navbar").offsetHeight;

window.onscroll = function () {
    let currentScrollPos = window.pageYOffset;

    if (currentScrollPos > headerHeight) {
        navbar.style.top = `-${headerHeight}px`;
    } else {
        navbar.style.top = "0";
    }
    prevScrollpos = currentScrollPos;
};

var peraturanLaporan = `
Isi Laporan:
- Laporan harus berisi informasi yang jelas dan akurat mengenai kejadian atau masalah yang dilaporkan.
- Tidak diperkenankan untuk menyampaikan informasi palsu atau menyesatkan dalam laporan.

Bentuk Laporan:
- Laporan dapat dikirimkan melalui formulir online yang telah disediakan.
- Pihak pengguna diharapkan untuk mengisi semua bidang yang diperlukan dalam formulir laporan.

Kategori Laporan:
- Pengguna diminta untuk memilih kategori yang sesuai dengan jenis masalah yang dilaporkan, seperti masalah kebersihan, keamanan, fasilitas umum, dll.

Bukti Pendukung:
- Jika memungkinkan, pengguna disarankan untuk melampirkan bukti-bukti pendukung, seperti foto atau video, yang dapat mendukung isi laporan.

Bahasa dan Etika:
- Laporan harus disampaikan dalam bahasa yang sopan dan baku.
- Tidak diperkenankan untuk menggunakan kata-kata kasar atau menyinggung dalam penyusunan laporan.

Penggunaan Informasi:
- Informasi yang dikirimkan akan diperlakukan dengan kerahasiaan dan hanya digunakan untuk tujuan evaluasi dan tindak lanjut yang diperlukan.

Penyalahgunaan Sistem:
- Tidak diperkenankan untuk menyalahgunakan sistem pengaduan dengan mengirimkan laporan palsu atau tidak berdasarkan fakta.

Pemantauan Laporan:
- Setelah laporan dikirimkan, pengguna akan menerima notifikasi atau nomor referensi yang dapat digunakan untuk memantau status laporan.

Tindak Lanjut:
- Setiap laporan akan ditinjau dan dianalisis untuk menentukan langkah selanjutnya yang akan diambil untuk menyelesaikan masalah yang dilaporkan.`;

// Tampilkan pop-up saat halaman dimuat
window.onload = function () {
    // Membuat pop-up SweetAlert
    swal({
        title: "Peraturan Pengiriman Laporan",
        text: peraturanLaporan,
        icon: "info", // Ikona pop-up (bisa diganti dengan 'warning', 'error', 'success', 'question')
        button: "Mengerti", // Teks pada tombol
    });
};

let slideIndex = 0;

function moveSlide(n) {
    showSlides((slideIndex += n));
}

function showSlides(n) {
    const slides = document.getElementsByClassName("slide");
    if (n >= slides.length) {
        slideIndex = 0;
    }
    if (n < 0) {
        slideIndex = slides.length - 1;
    }
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex].style.display = "block";
}

function initializeGallery() {
    const gallerySlides = document.querySelector(".gallery-slides");
    const thumbnailsContainer = document.querySelector(".thumbnails");

    // Generate thumbnails
    Array.from(gallerySlides.children).forEach((slide, index) => {
        const thumbnail = document.createElement("img");
        thumbnail.src = slide.querySelector("img").src;
        thumbnail.alt = slide.querySelector("img").alt;
        thumbnail.addEventListener("click", () => {
            showSlides((slideIndex = index));
        });
        thumbnailsContainer.appendChild(thumbnail);
    });

    // Auto slideshow
    setInterval(() => {
        moveSlide(1);
    }, 5000); // Change slide every 5 seconds
}

// Initialize gallery
initializeGallery();

document.getElementById("searchBtn").addEventListener("click", function () {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchId");
    filter = input.value.toUpperCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
});
// Add an event listener to detect changes in the dropdown menu
document
    .getElementById("kategoriFilter")
    .addEventListener("change", function () {
        var selectedCategory = this.value; // Get the selected category value

        // Loop through each row in the table body
        var rows = document.querySelectorAll("#data tbody tr");
        rows.forEach(function (row) {
            var categoryCell = row.cells[3]; // Assuming the category is in the fourth cell (index 3)

            // Check if the selected category matches the row's category or if "All Categories" is selected
            if (
                selectedCategory === "all" ||
                categoryCell.textContent.trim() === selectedCategory
            ) {
                row.style.display = ""; // Show the row
            } else {
                row.style.display = "none"; // Hide the row
            }
        });
    });

var startDateInput = document.getElementById("startDate");
var endDateInput = document.getElementById("endDate");

// Add event listeners to detect changes in the date inputs
startDateInput.addEventListener("change", filterTableByDate);
endDateInput.addEventListener("change", filterTableByDate);

// Function to filter the table based on the date range
function filterTableByDate() {
    var startDate = new Date(startDateInput.value);
    var endDate = new Date(endDateInput.value);

    // Loop through each row in the table body
    var rows = document.querySelectorAll("#data tbody tr");
    rows.forEach(function (row) {
        var rowDate = new Date(row.cells[5].textContent); // Assuming the date is in the sixth cell (index 5)

        // Compare the row date with the selected date range
        if (
            (startDate == "Invalid Date" || rowDate >= startDate) &&
            (endDate == "Invalid Date" || rowDate <= endDate)
        ) {
            row.style.display = ""; // Show the row if it's within the selected date range
        } else {
            row.style.display = "none"; // Hide the row if it's outside the selected date range
        }
    });
}
