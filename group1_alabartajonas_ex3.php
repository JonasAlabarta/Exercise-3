<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP File Operations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
        }
        pre {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            overflow-x: auto;
        }
        .output {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>PHP File Operations</h1>

    <form method="post">
        <fieldset>
            <legend>Choose filename:</legend>
            <label><input type="radio" name="filename" value="Aphrodite (Aphrodite).txt"> Aphrodite (Aphrodite) lyrics</label><br>
            <label><input type="radio" name="filename" value="Superpowers.txt"> Superpowers lyrics</label><br>
            <button type="submit">Submit</button>
        </fieldset>
    </form>

    <div class="output">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['filename'])) {
                $filename = $_POST['filename'];

                if (empty($filename)) {
                    echo "<p>No file selected. Please choose a filename.</p>";
                } else {
                    if (file_exists($filename)) {
                        echo "<p>The file '<strong>$filename</strong>' already exists.</p>";
                    } else {
                        $content = "Hello, this is a test file.\nThis file is created to demonstrate PHP file functions.";
                        file_put_contents($filename, $content);
                        echo "<p>The file '<strong>$filename</strong>' has been created and content has been written.</p>";
                    }

                    $fileContent = file_get_contents($filename);
                    ?>
                    <h2>Content of the file:</h2>
                    <pre><?php echo htmlspecialchars($fileContent); ?></pre>
                    <?php
                }
            } else {
                echo "<p>No file selected. Please choose a filename.</p>";
            }
        }
        ?>
    </div>
</body>
</html>

