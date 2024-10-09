<?php
session_start();

if (!isset($_SESSION['quotes'])) {
    $_SESSION['quotes'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quote = $_POST['quote'];
    $author = $_POST['author'];
    $kategori = $_POST['kategori'];
    $tanggal = $_POST['tanggal'];

    $_SESSION['quotes'][] = [
        'quote' => $quote,
        'author' => $author,
        'kategori' => $kategori,
        'tanggal' => $tanggal
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pemograman web</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <style>
        .form-container {
            background-color: #4db6ac;
            border-radius: 10px;
            padding: 20px;
            color: white;
        }
        .form-container .form-control,
        .form-container .form-select {
            background-color: rgba(255, 255, 255, 0.9);
        }
        .form-container .btn-submit {
            background-color: #45a049;
            border: none;
        }
        .form-container .btn-submit:hover {
            background-color: #3d8b3d;
        }
    </style>
</head>
<body>
<header class="navhead">
      <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Ikhsan Fillah Hidayat</a>
            <ul class="navbar-nav me-auto mb-3 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="home.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">about me</a>
              </li>
              <li class="nav-item"></li>
                <a class="nav-link" href="quote.php">Quote</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <section>
    <div class="container mt-4">
        <!-- Button to toggle form -->
        <button id="toggleBtn" class="btn btn-primary mb-3" onclick="toggleForm()">Add Quote</button>

        <!-- Form for adding quote -->
        <div id="quoteForm" style="display:none;">
            <div class="form-container">
                <h2 class="mb-4">Tambah Quote</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="mb-3">
                        <label for="quote" class="form-label">Quote</label>
                        <input type="text" class="form-control" id="quote" name="quote" placeholder="Silahkan isi quote" required>
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Silahkan isi author" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select" id="kategori" name="kategori" required>
                            <option value="" selected disabled>Pilih Kategori</option>
                            <option value="Pendidikan">Pendidikan</option>
                            <option value="Romance">Romance</option>
                            <option value="Komedi">Komedi</option>
                            <option value="Umum">Umum</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-light btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Display the submitted quote -->
        <div id="quoteList" class="mt-4">
            <h2>Daftar Quote</h2>
            <?php if (empty($_SESSION['quotes'])) {
        echo "<p>quote masih kosong.</p>";
    } else {
        foreach ($_SESSION['quotes'] as $quote) {
            echo "<div class='quote-item' style='background-color: #4db6ac; color: white; padding: 10px; margin-bottom: 10px; border-radius: 5px;'>";
            echo "<h3 style='margin-top: 0;'>" . htmlspecialchars($quote['kategori']) . " <span style='float: right;'>" . htmlspecialchars($quote['tanggal']) . "</span></h3>";
            echo "<p>" . htmlspecialchars($quote['quote']) . "</p>";
            echo "<p><strong>" . htmlspecialchars($quote['author']) . "</strong></p>";
            echo "</div>";
        }
    } ?>
        </div>
    </div>
    </section>

    <script>
    function toggleForm() {
            var form = document.getElementById("quoteForm");
            var btn = document.getElementById("toggleBtn");
            if (form.style.display === "none") {
                form.style.display = "block";
                btn.textContent = "Sembunyikan Form";
            } else {
                form.style.display = "none";
                btn.textContent = "Tambah Quote";
            }
        }
    </script>
    <section id="about" class="footer">
        <footer class="footer2">
            <h3>@Designed by 123230219</h3>
          </footer>
    </section>
    
</body>
</html>