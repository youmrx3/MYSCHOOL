
  <link href="../styles/login.css" rel="stylesheet" />


  <div id="id01" class="modal">

    <form class="modal-content animate" action="/authentication.php" method="post">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close"
          title="Close Modal">&times;</span>
      </div>

      <div class="login-container">
        <label for="uname"><b>email </b></label>
        <input type="text" placeholder="Enter Username" name="email" required></br>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit" name="login">
          <algine="center">Login
        </button></algine>
      </div>

      <div class="login-container" style="background-color:#faf7f7">
        <button type="button" onclick="document.getElementById('id01').style.display='none'"
          class="cancelbtn">Cancel</button>
      </div>
    </form>
  </div>

  <script>
    var modal = document.getElementById('id01');

    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
