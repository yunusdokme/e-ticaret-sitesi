function hesaplaToplam(urunID) {
    var urunAdetInput = document.getElementById("urunAdet-" + urunID);
    var urunAdet = parseInt(urunAdetInput.value);
  
    // Adet değerini güncelle
    var adetInput = document.getElementById("adetInput-" + urunID);
    adetInput.value = urunAdet;
  
    // AJAX isteği göndererek toplam fiyatı güncelleyin
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var toplamFiyatSpan = document.getElementById("toplamFiyat");
                toplamFiyatSpan.innerHTML = xhr.responseText;
            }
        }
    };
    xhr.open("GET", "fiyat.php?urunID=" + urunID + "&urunAdet=" + urunAdet, true);
    xhr.send();
  }
  