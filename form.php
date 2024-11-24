<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="style.css" />
    <script>
      function validateForm() {
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const matkul = document.querySelector('input[name="matkul"]:checked');
        const password = document.getElementById("password").value;
        const file = document.getElementById("file").files[0];

        if (!name || name.length < 3) {
          alert("Nama harus diisi dan minimal 3 karakter!");
          return false;
        }
        if (!email.includes("@")) {
          alert("Email tidak valid!");
          return false;
        }
        if (!matkul) {
          alert("Pilih salah satu mata kuliah!");
          return false;
        }
        if (!password || password.length < 6) {
          alert("Password minimal 6 karakter!");
          return false;
        }
        if (
          !file ||
          file.size > 2 * 1024 * 1024 ||
          file.type !== "text/plain"
        ) {
          alert("File harus berupa teks (txt) dan maksimal 2MB!");
          return false;
        }
        return true;
      }
    </script>
  </head>
  <body>
    <div class="form-container">
      <h2>Form Pendaftaran</h2>
      <form
        action="process.php"
        method="POST"
        enctype="multipart/form-data"
        onsubmit="return validateForm()"
      >
        <label for="name">Nama Lengkap:</label>
        <input type="text" id="name" name="name" required />

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />

        <label>Mata Kuliah yang Disukai:</label>
        <div class="radio-group">
          <label><input type="radio" name="matkul" value="asd" /> ASD</label>
          <label><input type="radio" name="matkul" value="pbo" /> PBO</label>
          <label
            ><input type="radio" name="matkul" value="pemweb" /> Pemweb</label
          >
        </div>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <label for="file">Upload File (txt):</label>
        <input type="file" id="file" name="file" accept=".txt" required />

        <button type="submit">Kirim</button>
      </form>
    </div>
  </body>
</html>
