function mostrar() {
  let senha = document.getElementById("senha");
  let b = document.getElementById("mos");

  if (senha.type === "password") {
    senha.type = "text";
    b.textContent = "Ocultar Senha";
  } else {
    senha.type = "password";
    b.textContent = "Mostrar Senha";
  }
}
