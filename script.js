function validarLogin() {
  const user = document.getElementById('username').value.trim();
  const pass = document.getElementById('password').value.trim();
  const msg = document.getElementById('mensagem');

  if (user === "admin" && pass === "minhasenha123") {
    msg.textContent = "Login bem-sucedido!";
    msg.className = "message success";
  } else {
    msg.textContent = "Usuário ou senha incorretos.";
    msg.className = "message error";
  }
}
