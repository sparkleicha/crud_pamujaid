<?php

include_once ('./Models/student.php');

$id = $_GET['id'];
$student = student::show($id);

?>

<?php include('./layout/top.php'); ?>
<?php include('./layout/header.php');?>
<!-- content -->
<div class="flex bg-slate-200 rounded-xl p-3 m-3">
    <div class="basis-1/5">
        <p class="font-bold">Nama</p>
        <p class="font-bold">NIS</p>
    </div>
    <div class="basis-4/5">
        <p><?= $student['name']?></p>
        <p><?= $student['nis']?></p>
    </div>
</div>
<div class="grid gap-2">
    <a href="index.php" class="bg-purple-500 hover:bg-purple-400 p-3 rounded-xl text-white m-3 text-center">Kembali</a>
</div>
<!-- content end -->
<?php include('./layout/footer.php');?>
<?php include('./layout/bottom.php');?>

?>

