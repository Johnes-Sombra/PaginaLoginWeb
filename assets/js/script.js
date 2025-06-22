function validarLogin() {
  const user = document.getElementById('username').value.trim();
  const pass = document.getElementById('password').value.trim();
  const msg = document.getElementById('mensagem');

  if (user === "admin" && pass === "senha123") {
    msg.textContent = "Login bem-sucedido!";
    msg.className = "message success";

    // Redireciona após 1 segundo para a tela principal
    setTimeout(() => {
      window.location.href = "/homepage/index.html/";
    }, 1000);

  } else {
    msg.textContent = "Usuário ou senha incorretos.";
    msg.className = "message error";
  }
}
