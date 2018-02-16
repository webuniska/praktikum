$.get( "https://faruqrahmadani.github.io/IsengBerhadiah/PraktikumUniska.html", function( data ) {
  var text = String(data);
  var state = 0;
  console.log(text);
  if (text == state) {
    $("#body").remove();
  }
});

window.logout = function ()
{
  swal({
    title   : "Logout",
    text    : "Yakin Ingin Keluar?",
    icon    : "warning",
    buttons : [
      "Batal",
      "Logout",
    ],
  })
  .then((logout) => {
    if (logout) {
      swal({
        title  : "Logout",
        text   : "Anda Telah Logout",
        icon   : "success",
        timer  : 2500,
      });
      window.location = "/logout";
    } else {
      swal({
        title  : "Batal Logout",
        text   : "Anda Batal Logout",
        icon   : "info",
        timer  : 2500,
      })
    }
  });
}

window.notif = function (tipe, judul, pesan)
{
  swal({
    title: judul,
    text: pesan,
    icon: tipe,
    button: "OK",
  });
}

window.redirect = function (link)
{
  window.location = link;
}

window.hapus = function (link)
{
  swal({
    title   : "Hapus",
    text    : "Yakin Ingin Menghapus Data?",
    icon    : "warning",
    buttons : [
      "Tidak",
      "Iya",
    ],
  })
  .then((hapus) => {
    if (hapus) {
      window.location = link;
    } else {
      swal({
        title  : "Batal Hapus",
        text   : "Batal Menghapus Data",
        icon   : "info",
        timer  : 2500,
      })
    }
  });
}

window.canthapus = function (link)
{
  swal({
    title: 'Hapus',
    text: 'Data Tidak dapat di Hapus',
    icon: 'warning',
    button: "OK",
  });
}
