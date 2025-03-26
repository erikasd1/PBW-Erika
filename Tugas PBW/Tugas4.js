alert('Selamat datang!')

function cekNilai(){
    let nim = document.getElementById("nim").value;
    let nilai = parseInt(document.getElementById("nilai").value);
    let hasil = document.getElementById("hasil");

    if(isNaN(nilai) || nilai < 0 || nilai > 100){
        hasil.innerHTML = "NILAI TIDAK VALID!!";
        hasil.style.color = "red";
        return;
    }

    let nilaiHurufMutu;
    if(nilai >= 80){
        nilaiHurufMutu = "A";
    }else if(nilai >= 70){
        nilaiHurufMutu = "B";
    }else if(nilai >= 60){
        nilaiHurufMutu = "C";
    }else if(nilai >= 50){
        nilaiHurufMutu = "D";
    }else{
        nilaiHurufMutu = "E";
    }

    hasil.innerHTML = `<b>NIM: ${nim} <br> Nilai: ${nilai} <br> Huruf Mutu: ${nilaiHurufMutu}</b>`;
    hasil.style.color = "black";

    alert('Silakan cek nilai mutu-nya.')
}   