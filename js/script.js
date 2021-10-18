// var keyword = document.getElementById("keyword");
// var container = document.getElementById("container");
// var searchButton = document.getElementById("serch-button");

// keyword.addEventListener("keyup", function () {
//   //   buat variabel untuk ajax
//   var xhr = new XMLHttpRequest();

//   // Cek, kesiapan ajax
//   xhr.onreadystatechange = function () {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//       container.innerHTML = xhr.responseText;
//     }
//   };

//   //   Aktifkan ajax
//   xhr.open("GET", "ajax/mahasiswa.php?keyword=" + keyword.value, true);
//   xhr.send();
// });

// Aktifkan jquery
$(document).ready(function () {
  $("#keyword").on("keyup", function () {
    $("#container").load("ajax/mahasiswa.php?keyword=" + $("#keyword").val());
  });
});
