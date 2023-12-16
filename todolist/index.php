<?php
require("db.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="./style.css" rel="stylesheet">
</head>
<body class="bg-black">

<?php
    $sql = "SELECT * FROM list ";
    if (isset($_GET["search"])){
        $search = $_GET["search"];
        $sql .= "WHERE atday LIKE '%$search%'";
    }
    $result = mysqli_query($connection, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

<div>
    <div class="flex mx-auto p-5 border-2 border-white rounded bg-gradient-to-t from-blue-700 via-blue-800 to-gray-900">
        <div class=" w-full gap-2 grid grid-cols-4 " >
            <h1 class="mt-1.5 font-semibold text-2xl block  text-white rounded  md:hover:bg-transparent md:border-0 ">
            Let Do This</h1>
            <form action="" class=" col-span-2 flex flex-row justify-center gap-2">
            <input type="search" placeholder="xx/xx/xxxx" name ="search" class=" text-black border-black border-2 px-4  focus:ring-2 focus:ring-gray-300" />
            <button type="submit"
                class="text-lg bg-transparent text-black bg-white hover:bg-black font-semibold  py-2 px-4 border border-black border-2 hover:border-transparent hover:text-white">
                Find
            </button>
            </form>
            <div class="flex flex-row justify-end mr-5 gap-2">
            <button 
                class="text-lg bg-transparent bg-white text-black hover:bg-black font-semibold hover:text-cyan-300 py-2 px-4 border border-black border-2 hover:border-transparent hover:text-white">
                <a href="./add.php">Add</a>
            </button>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto p-10  ">
    <div class="">
        <?php foreach ($rows as $row):
        ?>
        <div class="w-full max-w-auto rounded-xl bg-[radial-gradient(ellipse_at_right,_var(--tw-gradient-stops))] from-blue-700 via-blue-800 to-gray-900 border-2 border-white  shadow dark:bg-gray-800 dark:border-gray-700 mb-2">
            <div class="px-5 pb-3">
                <div class="grid grid-cols-3 py-2">
                    <div class="flex flex-row justify-start items-center ml-3"><h5 class="mt-2 lg:text-3xl md:text-mb font-semibold text-white"><?php echo $row["id"]; ?></h5></div>
                    <div class="flex flex-row justify-center items-center"><h5 class="span-col-2 text-xl font-semibold tracking-tight text-white dark:text-white"><?php echo $row["do"]; ?></h5></div>
                    <div class="flex flex-row justify-center items-center"><h5 class="span-col-2 text-xl font-semibold tracking-tight text-white dark:text-white"><?php echo $row["atday"]; ?></h5></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>

</body>
</html>

<?php
mysqli_close($connection);
?>