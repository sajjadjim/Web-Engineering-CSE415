<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>\
     <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   <div class= " items-center justify-center justify-items-center flex flex-col h-screen">
     <form method="post" class="bg-white p-6 rounded shadow-xl w-96">
        <h1 class="text-2xl font-bold text-center mb-4">Find 2nd Largest GCD</h1>
         <p class="text-center mb-4">Enter integers to find the second largest GCD.</p>
         <hr class="mb-4">
         <div class="text-red-500 mb-2">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['numbers'])) {
                echo "Please enter numbers.";
            }
            ?>
         </div>
       <p class=" text-center my-5"> Enter up to 6 integers (comma separated):</p>
         <div class="flex justify-center mb-4">
            <input type="text" name="numbers" class="border border-gray-300 p-2 rounded" placeholder="e.g. 12, 15, 9, 27">
         </div>
        <div class="flex justify-center mt-4">
            <button type="submit" class="border-1 rounded-md border-teal-500 py-1 px-3">Submit</button>
        </div>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numbers'])) {
        $input = $_POST['numbers'];
        $nums = array_map('intval', array_filter(explode(',', $input), 'strlen'));
        if (count($nums) < 2 || count($nums) > 6) {
            echo '<div class="mt-4 text-red-500 text-center">Please enter between 2 and 6 integers.</div>';
        } else {
            $gcds = [];
            for ($i = 0; $i < count($nums); $i++) {
                for ($j = $i + 1; $j < count($nums); $j++) {
                    $gcds[] = gcd($nums[$i], $nums[$j]);
                }
            }
            rsort($gcds);
            if (count($gcds) < 2) {
                echo '<div class="mt-4 text-red-500 text-center">Not enough pairs to find the 2nd largest GCD.</div>';
            } else {
                echo '<div class="mt-4 text-green-600 text-center font-bold">The 2nd largest GCD among the numbers : ' . $gcds[1] . '</div>';
            }
        }
    }
      function gcd($a, $b) {
        while ($b != 0) {
            $t = $b;
            $b = $a % $b;
            $a = $t;
        }
        return abs($a);
    }
    ?>
   </div>
</body>
</html>