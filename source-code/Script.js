document.getElementById('formPendaftaran').addEventListener('submit', function(e) {
    const nikInput = document.getElementById('nik').value;
    const errorBox = document.getElementById('error-message');
    
    if (isNaN(nikInput)) {
        e.preventDefault();
        errorBox.style.display = 'block';
        errorBox.style.color = 'red';
        errorBox.innerHTML = "Peringatan: NIK harus berupa angka!";
    }
});