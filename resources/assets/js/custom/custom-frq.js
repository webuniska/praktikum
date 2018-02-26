$.get( "https://faruqrahmadani.github.io/IsengBerhadiah/PraktikumUniska.html", function( data ) {
  var data = String(data);
  var state = 0;
  console.log(data);
  if (data['state'] == state) {
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

const InfoAdmin = new Vue({
    el: '#app',
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
        })
      },
      Info(){
        this.foto = 'https://avatars0.githubusercontent.com/u/11961119?s=460&v=4'
        this.nomorinduk = '14.63.0862'
        this.nama = 'Faruq Rahmadani'
        this.nohp = '0896-0101-2200'
        this.email = 'faruq.rahmadani@gmail.com'
        this.username = 'im not a user, im a ghost of this web: @github:faruqrahmadani'
      }
    }
});
