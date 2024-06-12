<div class="container">
    <h1>Login</h1>
    <form method="post" action="">
        <div class="input-container">
          <label for="secretCode" class="input-label">Secret Code</label>
          <input type="password" name="code" id="secretCode" class="secret-code-input" placeholder="1234">
          <input type="hidden" name="first" id="first">
          <span class="eye-icon" onclick="toggleVisibility()">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M12 5C7 5 2.73 8.11 1 12.5C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12.5C21.27 8.11 17 5 12 5ZM12 17.5C9.24 17.5 7 15.26 7 12.5C7 9.74 9.24 7.5 12 7.5C14.76 7.5 17 9.74 17 12.5C17 15.26 14.76 17.5 12 17.5ZM12 9.5C10.34 9.5 9 10.84 9 12.5C9 14.16 10.34 15.5 12 15.5C13.66 15.5 15 14.16 15 12.5C15 10.84 13.66 9.5 12 9.5Z" fill="white" fill-opacity="0.6"/>
              </svg>
          </span>
        </div>
        <button type="submit" class="login-button">SUBMIT</button>
    </form>
</div>

<script>
  function toggleVisibility() {
    var input = document.getElementById('secretCode');
    if (input.type === "password") {
      input.type = "text";
    } else {
      input.type = "password";
    }
  }
</script>
