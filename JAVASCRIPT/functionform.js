function validateForm() {
    var endereco = document.getElementById("endereço").value;
    var problema = document.getElementById("message").value;
    var fileInput = document.getElementById("videoFile");

    if (endereco === "" || problema === "" || fileInput.files.length === 0) {
        alert("Por favor, insira todas as informações necessárias.");
        return false;
    }
    return true;
}