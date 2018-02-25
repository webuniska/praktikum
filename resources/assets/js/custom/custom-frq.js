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

window.ubahstatusperiode = function (id)
{
  swal({
    title   : "Ubah Status",
    text    : "Yakin Ingin Mengubah Status Periode?",
    icon    : "warning",
    buttons : [
      "Tidak",
      "Iya",
    ],
  })
  .then((hapus) => {
    if (hapus) {
      window.location = '/data-periode/'+id+'/status';
    } else {
      swal({
        title  : "Batal",
        text   : "Batal Merubah Status Data Periode",
        icon   : "info",
        timer  : 2500,
      })
    }
  });
}

window.statusmateriperiode = function (id,route)
{
  window.location = '/data-materiperiode/'+id+'/status/'+route;
}

const app = new Vue({
    el: '#InfoAdmin',
    data: {
      foto: '',
      nomorinduk: '',
      nama: '',
      nohp: '',
      email: '',
      username: '',
    },
    methods: {
      adminJson(id){
        axios.get('http://localhost:8000/json/data-admin/'+id).then((response) => {
          this.foto = 'images/User/'+response.data.foto
          this.nomorinduk = response.data.nomorinduk
          this.nama = response.data.nama
          this.nohp = response.data.nohp
          this.email = response.data.email
          this.username = response.data.user.username
          console.log(response.data.user.username)
        })
      }
    }
});
