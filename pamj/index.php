<?php

include_once('./Models/student.php');

$students = student::index();

if(isset($_POST['submit'])){
    $reponse = student::create([
        'name'=> $_POST['name'],
        'nis'=> $_POST['nis']
    ]);

    setcookie('message', $response, time() + 10); 

    header("location:index.php");      
}

if(isset($_POST['delete'])){
    $response = student::delete($_POST['id']);

    setcookie('message', $response, time() + 10); 

    header("location:index.php");    
}

?>

<?php include('./layout/top.php');?>
<?php include('./layout/header.php');?>
<!-- content -->



<!-- alert -->
        <div class="bg-slate-100">
            <?php if(isset($_COOKIE['message'])) : ?>
                <div class="p-3 bg-green-600 m-3 rounded-xl text-white">
                <?= $_COOKIE['message'] ?>
                </div>
            <?php endif ?>
            </div>
        <!-- main -->
        <div class="flex">
             <!-- sidebar -->
             <div class="basis-1/4 bg-purple-300 p-3">
                <div class="bg-slate-200 rounded-xl p-4">
                <h1 class="text-3xl mb-2 font-bold">Form Input Nilai</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input class="rounded-xl p-3 block w-full" type="text" name="name" id="nama" placeholder="Masukan Nama Anda">
                        <label for="nis">NIS</label>
                        <input class="rounded-xl p-3 block w-full" type="number" name="nis" id="nis" placeholder="Masukan NIS Anda">
                    </div>
                    <div class="grid gap-2">
                    <button name="submit" class="bg-purple-600 hover:bg-purple-800 p-4 rounded-xl text-white" type="submit">Submit</button>
                </div>
                </form>
            </div>
             </div>
             <!-- content -->
             <div class="basis-3/4 bg-purple-300 p-3">
                <div class="bg-slate-200 rounded-xl p-3">
                    <h1 class="text-3xl mb-6 text-center font-bold"> ୨୧ Tabel Nilai Siswa ˃᷄ꇴ˂᷅ </h1>

                    <table class="w-full">
                        <thead class="">
                            <tr class="bg-purple-800 text-white  border border-gray-500">
                                <th class="px-6 py-3">No.</th>
                                <th class="px-6 py-3">Nama</th>
                                <th class="px-6 py-3">Nilai</th>
                                <th class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-purple-400">
                            <?php foreach ($students as $key => $student) : ?>
                            <tr class="border">
                                <td class="p-4"><?= $key + 1 ?></td>
                                <td><?= $student['name'] ?></td>
                                <td><?= $student['nis'] ?></td>
                                <td>
                                <a href="detail.php?id=<?= $student['id'] ?>"class="text-white hover:bg-blue-800 pt-2 pb-2 pr-3 pl-3 rounded-xl bg-blue-500">Detail</a>
                                <a href="edit.php?id=<?= $student['id'] ?>" class="text-white hover:bg-green-800 pt-2 pb-2 pr-3 pl-3 rounded-xl bg-green-500">Edit</a>
                                <form action="" method="POST" class="inline">
                                    <input type="hidden" name="id" value="<?= $student['id'] ?>">
                                    <button name="delete" type="submit" class="bg-red-500 hover:bg-red-800 p-2 rounded-xl text-white">Hapus</button>
                                </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                    </table>
                </div>
             </div>
        </div>
        <!-- footer -->
        <?php include_once('./layout/footer.php') ?>
    </div>

</body>
</html>