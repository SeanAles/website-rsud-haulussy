@extends('visitor.layout.main')

@section('title', 'Tarif Pelayanan')

@section('style')
    <style>
        #table {
            z-index: 1;
            background-color: white;
            padding: 0;
        }

        .witdh-fit {
            white-space: nowrap;
            width: 1%;
        }

        .text-center {
            text-align: center;
        }

        #pilihanGambar {
            width: 90%;
            /* Default width for small screens */
            height: 60px;
            /* Adjust the height as needed */
            font-size: 16px;
            /* Adjust the font size as needed */
            background-color: #f0f0f0;
            /* Background color of the dropdown */
            color: #333;
            /* Text color */
            border: 2px solid #ccc;
            /* Border color and size */
            border-radius: 5px;
            /* Rounded corners */
            padding: 5px;
            /* Padding inside the dropdown */
            margin: 0 auto;
            /* Center the dropdown */
        }

        #pilihanGambar option {
            background-color: #fff;
            /* Background color of options */
            color: #333;
            /* Text color of options */
        }

        #displayedImage {
            width: 90%;
            transition: opacity 0.5s ease-in-out; /* Transition effect */
            opacity: 0; /* Start with the image hidden */
            /* Default width for small screens */
        }

        @media (min-width: 768px) {
            #pilihanGambar {
                width: 20%;
                /* Width for medium and large screens */
            }

            #displayedImage {
                width: 35%;
                /* Width for larger screens */
            }
        }
    </style>
@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Tarif Pelayanan</h1>
        <p class="text-danger">(Berdasarkan Tarif Retribusi - Perda Maluku No. 2 Thn 2024)</p>
    </div>

    <div class="text-center">
        <select id="pilihanGambar">
            <option value="{{ asset('visitor/assets/img/tarif/IGD.png') }}">IGD</option>
            <option value="{{ asset('visitor/assets/img/tarif/ICU.png') }}">ICU</option>
            <option value="{{ asset('visitor/assets/img/tarif/Laboratorium Klinik.png') }}">Laboratorium Klinik</option>
            <option value="{{ asset('visitor/assets/img/tarif/Hemostasis.png') }}">Hemostasis</option>
            <option value="{{ asset('visitor/assets/img/tarif/Tinja.png') }}">Tinja</option>
            <option value="{{ asset('visitor/assets/img/tarif/Fungsi Ginjal.png') }}">Fungsi Ginjal</option>
            <option value="{{ asset('visitor/assets/img/tarif/Profil Lipid.png') }}">Profil Lipid</option>
            <option value="{{ asset('visitor/assets/img/tarif/Glukosa.png') }}">Glukosa</option>
            <option value="{{ asset('visitor/assets/img/tarif/Jantung.png') }}">Jantung</option>
            <option value="{{ asset('visitor/assets/img/tarif/Imunoserologi.png') }}">Imunoserologi</option>
            <option value="{{ asset('visitor/assets/img/tarif/Imunologi Otomatik.png') }}">Imunologi Otomatik</option>
            <option value="{{ asset('visitor/assets/img/tarif/PT (Penanda Tumor).png') }}">PT (Penanda Tumor)</option>
            <option value="{{ asset('visitor/assets/img/tarif/Mikrobiologi.png') }}">Mikrobiologi</option>
            <option value="{{ asset('visitor/assets/img/tarif/Mikrobiologi Mikroskopik.png') }}">Mikrobiologi Mikroskopik</option>
            <option value="{{ asset('visitor/assets/img/tarif/Narkoba.png') }}">Narkoba</option>
            <option value="{{ asset('visitor/assets/img/tarif/Histopatologi.png') }}">Histopatologi</option>
            <option value="{{ asset('visitor/assets/img/tarif/Biopsi Khusus.png') }}">Biopsi Khusus (Hati Esofagus, Gaster  Colon Gunjal)</option>
            <option value="{{ asset('visitor/assets/img/tarif/Sitopatologi.png') }}">Sitopatologi</option>
            <option value="{{ asset('visitor/assets/img/tarif/Kultur.png') }}">Kultur</option>
            <option value="{{ asset('visitor/assets/img/tarif/ICCU.png') }}">ICCU</option>
            <option value="{{ asset('visitor/assets/img/tarif/Radiologi.png') }}">Radiologi</option>
            <option value="{{ asset('visitor/assets/img/tarif/Kamar Operasi.png') }}">Kamar Operasi</option>
            <option value="{{ asset('visitor/assets/img/tarif/Rawat Inap.png') }}">Rawat Inap </option>
            <option value="{{ asset('visitor/assets/img/tarif/Pemeriksaan Dokter.png') }}">Pemeriksaan Dokter/Visite</option>
            <option value="{{ asset('visitor/assets/img/tarif/VIP Kamar Khusus.png') }}">VIP Kamar Khusus</option>
            <option value="{{ asset('visitor/assets/img/tarif/Ruangan Bedah.png') }}">Ruangan Bedah</option>
            <option value="{{ asset('visitor/assets/img/tarif/Ruangan Anak.png') }}">Ruangan Anak</option>
            <option value="{{ asset('visitor/assets/img/tarif/Tindakan Obstetri Ginekologi.png') }}">Tindakan Obstetri Ginekologi</option>
            <option value="{{ asset('visitor/assets/img/tarif/Perinatologi.png') }}">Perinatologi</option>
            <option value="{{ asset('visitor/assets/img/tarif/Neonatologi.png') }}">Neonatologi</option>
            <option value="{{ asset('visitor/assets/img/tarif/Poliklinik.png') }}">Poliklinik</option>
            <option value="{{ asset('visitor/assets/img/tarif/Klinik Paru New.png') }}">Klinik Paru</option>
            <option value="{{ asset('visitor/assets/img/tarif/Klinik Jantung.png') }}">Klinik Jantung</option>
            <option value="{{ asset('visitor/assets/img/tarif/Kinik Anak New.png') }}">Klinik Anak</option>
            <option value="{{ asset('visitor/assets/img/tarif/Klinik Mata.png') }}">Klinik Mata</option>
            <option value="{{ asset('visitor/assets/img/tarif/Fisioterapi.png') }}">Fisioterapi</option>
            <option value="{{ asset('visitor/assets/img/tarif/EMG.png') }}">EMG</option>
            <option value="{{ asset('visitor/assets/img/tarif/Klinik Obstetri Ginekologi.png') }}">Klinik Obstetri Ginekologi</option>
            <option value="{{ asset('visitor/assets/img/tarif/Gizi.png') }}">Gizi</option>
            <option value="{{ asset('visitor/assets/img/tarif/Klinik THT.png') }}">Klinik THT</option>
            <option value="{{ asset('visitor/assets/img/tarif/Klinik Kulit Kelamin.png') }}">Klinik Kulit Kelamin</option>
            <option value="{{ asset('visitor/assets/img/tarif/Tindakan Neurologi.png') }}">Tindakan Neurologi</option>
            <option value="{{ asset('visitor/assets/img/tarif/CT Scan.png') }}">CT Scan</option>
            <option value="{{ asset('visitor/assets/img/tarif/Ambulans.png') }}">Ambulans</option>
        </select>
        <br><br>
        <img id="displayedImage" src="{{ asset('visitor/assets/img/tarif/IGD.png') }}" alt="Medical Service Image">
    </div>
@endsection

@section('script')
    <script>
        document.getElementById("pilihanGambar").addEventListener("change", function() {
            var selectedImageURL = this.value; // Mengambil URL gambar dari nilai dropdown yang dipilih
            var imgElement = document.getElementById("displayedImage");

            // Fade out the image
            imgElement.style.opacity = 0;

            setTimeout(function() {
                imgElement.src = selectedImageURL;
                imgElement.style.opacity = 1;
            }, 500); // Match this duration with the CSS transition duration
        });


        // Initial load, fade in the image
        window.onload = function() {
            document.getElementById("displayedImage").style.opacity = 1;
        };
    </script>
@endsection
