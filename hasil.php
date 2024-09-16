<!doctype html>
<html lang="en">

<?php include 'components/head.php' ?>

<body class="min-h-screen">
    <header class="hero relative mx-auto flex h-[300px] max-w-5xl items-center justify-center sm:bg-white">
        <div class="absolute px-7 text-center text-white">
            <h1 class="text-4xl font-bold xs:text-5xl">Beasiswa Pendidikan Indonesia</h1>
            <p class="mt-2 text-[16px] xs:text-lg">
                Website ini menampilkan daftar beasiswa pendidikan di Indonesia. <br />
                Gali potensi anda, dan jadi cendikiawan!
            </p>
        </div>
    </header>
    <nav class="sticky top-0 z-10 mx-auto w-full max-w-5xl border-b border-slate-300 bg-slate-100 py-[11px]">
        <ul id="nav-menu"
            class="absolute top-[52px] z-20 hidden h-dvh w-full items-start bg-slate-100 md:static md:flex md:h-auto md:bg-transparent">
            <li
                class="md: transition-transform hover:opacity-55 active:translate-y-px active:scale-[.98] active:opacity-85 md:active:scale-90">
                <a href="index.php"
                    class="flex h-full w-full px-3 py-2 text-[14px] font-semibold text-slate-900 md:inline md:py-[14px] md:font-bold lg:text-sm">Pilihan
                    Beasiswa</a>
            </li>
            <li
                class="md: transition-transform hover:opacity-55 active:translate-y-px active:scale-[.98] active:opacity-85 md:active:scale-90">
                <a href="#"
                    class="flex h-full w-full px-3 py-2 text-[14px] font-semibold text-slate-900 md:inline md:py-[14px] md:font-bold lg:text-sm">Daftar</a>
            </li>
            <li
                class="md: transition-transform hover:opacity-55 active:translate-y-px active:scale-[.98] active:opacity-85 md:active:scale-90">
                <a href="hasil.php"
                    class="flex h-full w-full px-3 py-2 text-[14px] font-semibold text-slate-900 md:inline md:py-[14px] md:font-bold lg:text-sm">Hasil</a>
            </li>
        </ul>
    </nav>
    <main class="mx-auto mt-5 mb-16 flex max-w-5xl flex-col px-3 xl:px-0">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 ">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase ">
                                        Nama Beasiswa</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase ">
                                        Nama</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase ">
                                        Email</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase ">
                                        Pilihan</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase ">
                                        Status Ajuan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                <?php
                                include 'database/connection.php';
                                $scholarships = mysqli_query($db, "SELECT * FROM detail_beasiswa");
                                foreach ($scholarships as $row):
                                    ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                        <?= $row['nama_beasiswa'] ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        <?= $row['nama_pendaftar'] ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        <?= $row['email'] ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        <?= $row['pilihan'] ?>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-semibold <?= $row['status_ajuan'] == 'Belum di verifikasi' ? 'text-yellow-400' : 'text-green-400' ?> ">
                                        <?= $row['status_ajuan'] ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <?php include('components/footer.php'); ?>

    <?php include 'components/script.php' ?>
    <script>
    $(document).ready(function() {
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        if (status) {
            let message = '';
            let alertClass = '';

            switch (status) {
                case 'sukses':
                    message = 'Berhasil Mendaftar!';
                    alertClass = 'alert-success bg-green-100 border-green-400 text-green-700';
                    break;
                case 'sukses_ubah':
                    message = 'Pendaftaran Berhasil Dirubah!';
                    alertClass = 'alert-success bg-green-100 border-green-400 text-green-700';
                    break;
                case 'sukses_hapus':
                    message = 'Pendaftaran Berhasil Dihapus!';
                    alertClass = 'alert-success bg-green-100 border-green-400 text-green-700';
                    break;
                default:
                    message = 'Terjadi Kesalahan!';
                    alertClass = 'alert-danger bg-red-100 border-red-400 text-red-700';
            }

            $('<div>', {
                class: `alert ${alertClass} p-3 border rounded-md font-semibold text-lg text-center`,
                text: message
            }).prependTo('main');

            setTimeout(function() {
                let newUrl = window.location.protocol + "//" + window.location.host + window.location
                    .pathname;
                window.history.replaceState({
                    path: newUrl
                }, '', newUrl);
            }, 3000);
        }
    });
    </script>
</body>

</html>