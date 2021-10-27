document.getElementById("elem").addEventListener("click", () =>
  window.scrollTo({
    top: 500,
    behavior: "smooth"
  })
);

function setMinKeluar(){
  document.getElementById("tgl_keluar").setAttribute("min", document.getElementById("tgl_masuk").value)
  document.getElementById("tgl_keluar").value = null
}

function toogleSidebar() {
  const side = document.querySelector(".mySidebar");
  side.classList.toggle("sidebar-hide");
}