<?php 
include_once("./Models/student.php");

$student = student::show($_GET['id']);

if(isset($_POST['submit'])){
    $response = student::update([
        'id'=> $_POST['id'],
        'name' => $_POST['name'],
        'nis'=>$_POST['nis']
    ]);
    

   setcookie('message', $response, time() + 10 );
   header("Location: index.php");
}

?>

<?php include('./layout/top.php');?>
<?php include('./layout/header.php');?>

<!-- content -->
            <div class="bg-purple-200 rounded-xl p-4">
                <h1 class="text-3xl mb-2">Form Input Nilai</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input value="<?= $student['name']?>" type="text" class="rounded-xl p-3 block w-full" name="name" id="nama" placeholder="Masukan Nama Anda">
                        <label for="nis">NIS</label>
                        <input value="<?= $student['nis']?>" class="rounded-xl p-3 block w-full" type="number" name="nis" id="nis" placeholder="Masukan NIS Anda">
                        <input type="hidden" name="id" value="<?= $student['id']?>">
                    </div>
                    <div class="grid gap-2">
                    <button name="submit" class="bg-purple-600 hover:bg-purple-800 p-4 rounded-xl text-white" type="submit">Submit</button>
                </div>
                </form>
            </div>
<?php include('./layout/footer.php');?>
<?php include('./layout/bottom.php');?>

