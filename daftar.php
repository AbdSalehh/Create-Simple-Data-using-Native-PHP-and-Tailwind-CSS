<!doctype html>
<html lang="en">

<?php include 'components/head.php' ?>

<body class="bg-slate-100">
    <?php
    include 'components/navbar.php';
    include 'database/connection.php';

    $id_beasiswa = isset($_GET['id']) ? $_GET['id'] : null;
    if ($id_beasiswa) {
        $nama_beasiswa = mysqli_query($db, "SELECT * FROM daftar_beasiswa WHERE id = " . mysqli_real_escape_string($db, $id_beasiswa));
        $result = mysqli_fetch_assoc($nama_beasiswa);
    } else {
        die("ID beasiswa tidak ditemukan");
    }

    ?>
    <main class="mx-auto mb-16 max-w-5xl flex flex-col gap-7 mt-7 px-4 xl:px-0">
        <div class="border border-gray-300 rounded-lg p-5 bg-gray-100">
            <div class="flex flex-col md:flex-row gap-5">
                <div class="w-full md:w-1/2 bg-center bg-cover h-auto rounded-md"
                    style="background-image: url(<?= $result['image'] ?>)"></div>
                <div class="w-full md:w-1/2">
                    <h1 id="nama-wisata" class="text-3xl font-bold text-slate-800"><?php echo $result['name'] ?></h1>
                    <p class="text-slate-800 text-sm leading-7 mt-1"><?php echo $result['descriptions'] ?></p>
                </div>
            </div>
        </div>
        <form action="controller.php" method="POST" id="form-pendaftaran"
            class="flex flex-col gap-5 border border-gray-300 rounded-lg p-5 bg-gray-100">
            <h1 class="text-3xl font-bold text-slate-800">Form Pendaftaran Beasiswa</h1>
            <input type="text" value="<?php echo $result['name'] ?>" name="nama_beasiswa" hidden />
            <div>
                <label for="nama_pendaftar" class="block mb-2 text-sm font-medium text-gray-800">
                    Masukkan Nama:</label>
                <input type="text" id="nama_pendaftar" name="nama_pendaftar"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Saleh" required />
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-800">
                    Masukkan Email:</label>
                <input type="email" min="0" id="email" name="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="name@gmail.com" required />
            </div>
            <div>
                <label for="nomor" class="block mb-2 text-sm font-medium text-gray-800">
                    Nomor HP:</label>
                <input type="number" id="nomor" name="nomor"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required />
            </div>
            <div>
                <label for="semester" class="block mb-2 text-sm font-medium text-gray-800">
                    Semester saat ini:</label>
                <select name="semester" id="semester"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <?php
                    $i = 1;
                    while ($i <= 8) {
                        echo "<option value='$i'>Semester $i</option>";
                        $i++;
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="IPK" class="block mb-2 text-sm font-medium text-gray-800">
                    IPK terakhir:</label>
                <input type="number" id="IPK" name="IPK" value="3"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required />
            </div>
            <div>
                <label for="pilihan" class="block mb-2 text-sm font-medium text-gray-800">
                    Pilihan Beasiswa:</label>
                <select name="pilihan" id="pilihan"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value='Beasiswa Biasa'>Beasiswa Biasa</option>
                    <option value='Beasiswa Utama'>Beasiswa Utama</option>
                </select>
            </div>
            <div>
                <label for="berkas" class="block mb-2 text-sm font-medium text-gray-800">
                    Upload Berkas Syarat:</label>
                <input type="file" id="berkas" name="berkas" accept=".pdf, .jpg, .zip"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required />
            </div>
            <div class="flex flex-wrap gap-3 w-full">
                <button type="submit" id="daftar"
                    class="mt-5 text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-8 py-2.5 text-center disabled:cursor-not-allowed disabled:bg-sky-200">Daftar</button>
                <a href="index.php" id="batal"
                    class="mt-5  border border-slate-300 bg-slate-200 hover:bg-slate-400 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-8 py-2.5 text-center">Batal</a>
            </div>
        </form>
    </main>
    <?php include('components/footer.php');
    include('components/script.php'); ?>

    <script>
    function cekIPK() {
        let ipk = parseFloat($("#IPK").val());
        const pilihanBeasiswa = $("#pilihan");
        const uploadBerkas = $("#berkas");
        const daftarButton = $("#daftar");

        if (ipk < 3) {
            pilihanBeasiswa.prop('disabled', true);
            uploadBerkas.prop('disabled', true);
            daftarButton.prop('disabled', true);
        } else {
            pilihanBeasiswa.prop('disabled', false);
            uploadBerkas.prop('disabled', false);
            daftarButton.prop('disabled', false);
            pilihanBeasiswa.focus();
        }
    }

    $(document).ready(function() {
        let ipkInput = $("#IPK");
        ipkInput.on("input", cekIPK);

        $("#form-pendaftaran").validate({
            rules: {
                nama_pendaftar: {
                    required: true
                },
                email: {
                    required: true
                },
                nomor: {
                    required: true
                },
                semester: {
                    required: true,
                },
                IPK: {
                    required: true,
                },
                pilihan: {
                    required: true,
                },
                berkas: {
                    required: true,
                }
            },

            messages: {
                nama_pendaftar: {
                    required: "Masukkan Nama"
                },
                email: {
                    required: "Masukkan Email"
                },
                nomor: {
                    required: "Masukkan Nomor"
                },
                semester: {
                    required: "Masukkan Semester"
                },
                IPK: {
                    required: "Masukkan IPK"
                },
                pilihan: {
                    required: "Masukkan Pilihan Beasiswa"
                },
                berkas: {
                    required: "Masukkan Berkas"
                }
            },

            submitHandler: function(form) {
                form.submit();
            }
        })
    });
    </script>
</body>

</html>