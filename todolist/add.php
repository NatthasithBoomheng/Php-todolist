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
</head>
<body class="bg-black">
    <div>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"):
           ?>
            <?php 
            $do = mysqli_real_escape_string($connection, $_POST["do"]);
            $day = mysqli_real_escape_string($connection, $_POST["day"]);
            $sql = "INSERT INTO list (do, atday) VALUES ('$do','$day');";
            $result = mysqli_query($connection, $sql);
            ?>
            <?php if ($result):?>
                    <div class="flex flex-col justify-center mt-2">
                    <div class="border-2 border-white p-5 flex flex-col justify-center bg-[radial-gradient(ellipse_at_right,_var(--tw-gradient-stops))] from-blue-700 via-blue-800 to-gray-900">
                    <h3 class="text-lg font-semibold mb-2 text-white">Success, Well done</h3>
                    <button class="text- bg-transparent text-black bg-white hover:bg-black font-semibold hover:text-cyan-300 p-1.5 px-14 border border-black border-2 hover:border-transparent hover:text-white">
                        <a href="./index.php">Go Back</a>
                    </button>
                    </div>
                    </div>
            <?php else: ?>
                    <div class="flex flex-col justify-center mt-2 bg-[radial-gradient(ellipse_at_right,_var(--tw-gradient-stops))] from-blue-700 via-blue-800 to-gray-900">
                    <div class="border-2 border-black p-5 flex flex-col justify-center">
                    <h3 class="text-lg font-semibold">Add Wrong</h3>
                    <button class="text- bg-transparent text-black hover:bg-black font-semibold hover:text-cyan-300 p-1.5 px-14 border border-black border-2 hover:border-transparent hover:text-white">
                        <a href="./index.php">Add Again</a>
                    </button>
                    </div>
                    </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="container mx-auto p-10 ">
                <form method="post" class=" border-2 border-black p-5 grid grid-cols-3 bg-[radial-gradient(ellipse_at_right,_var(--tw-gradient-stops))] from-blue-700 via-blue-800 to-gray-900">
                    <div>
                    <label class="text-lg font-semibold text-white">Thing to do : </label>
                    <input type="text" name="do" placeholder="do anything" class="border-2 border-black p-1.5 ml-2"">
                    </div>
                    <div>
                    <label class="text-lg font-semibold text-white">Day :</label>
                    <input type="text" name="day" placeholder="xx/xx/xxxx" class="border-2 border-black p-1.5 ml-2">
                    </div>
                    <div class="flex flex-row  justify-center">
                    <button type="submit" class="text- bg-transparent text-black bg-white hover:bg-black font-semibold p-1.5 px-14  border-black border-2 hover:border-transparent hover:text-white">Add</button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

<?php mysqli_close($connection);
?>