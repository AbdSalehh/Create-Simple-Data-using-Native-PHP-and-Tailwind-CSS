<!DOCTYPE html>
<html lang="en">

<?php include 'components/head.php' ?>

<body>
    <?php
    include 'components/header.php';
    include 'components/navbar.php';
    ?>
    <main class="max-w-5xl mx-auto">
        <div
            class="relative mb-4 flex items-center justify-center text-center text-2xl font-bold text-slate-900 xs:text-3xl mt-7">
            <p>Daftar Beasiswa</p>
            <div class="absolute -bottom-2 h-[3px] w-20 bg-slate-900"></div>
        </div>
        <section class="mt-3 grid w-full grid-cols-1 gap-5 py-5 sm:mt-0 sm:gap-3 sm:pr-5 md:grid-cols-3">
            <?php
            include 'database/connection.php';
            $scholarships = mysqli_query($db, "SELECT * FROM daftar_beasiswa");
            $i = 1;
            foreach ($scholarships as $scholarship):
                ?>
            <article class="flex flex-col gap-3 border border-gray-300 rounded-lg p-3 bg-gray-200">
                <div class="relative">
                    <img src=<?= $scholarship['image'] ?> alt="alam"
                        class="h-52 w-full rounded-md object-cover object-bottom" />
                </div>
                <h1 class="text-xl font-extrabold text-slate-800"><?= $scholarship['name'] ?></h1>
                <p class="line-clamp-5 text-justify text-sm">
                    <?= $scholarship['descriptions'] ?>
                </p>
                <a href="daftar.php?id=<?= $scholarship['id'] ?>"
                    class="rounded bg-slate-800 py-2 text-center font-semibold text-white transition-transform active:translate-y-px active:scale-95 active:opacity-85">Daftar
                    Paket</a>
            </article>
            <?php $i++ ?>
            <?php endforeach; ?>
        </section>
    </main>

    <?php include './components/footer.php' ?>
</body>

</html>