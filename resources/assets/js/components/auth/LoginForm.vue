<template>
  <div v-if="status">
    <form method="POST" :action="this.urlform">
      <input type="hidden" name="_token" id="csrf-token" :value="token" />
      <h1>Login</h1>
      <img :src="foto" alt="01-01-2011" class="img-circle profile_img modal_img login_img">
      <div>
        <input type="text" class="form-control" placeholder="Username" name="username" required v-model="username" @keyup="LoginUser()">
      </div>
      <div>
        <input type="password" class="form-control" placeholder="Password" name="password" required @keyup.esc="ForceUser(1)" v-model="password">
      </div>
      <div>
        <button class="btn btn-success col-md-12">Login</button>
      </div>
      <div class="clearfix"></div>
    </form>
    <div class="separator">
      <a href="#">
        <button class="btn btn-warning col-md-12">Lupa Password</button>
      </a>
      <div class="row">
        <div class="col-md-6">
          <a href="/register-dosen">
            <button class="btn btn-info full-width">Register Dosen</button>
          </a>
        </div>
        <div class="col-md-6">
          <a href="/register-mahasiswa">
            <button class="btn btn-primary full-width">Register Mahasiswa</button>
          </a>
        </div>
      </div>
      <div class="clearfix"></div>
      <br />
    </div>
  </div>
  <div v-else v-cloak @click="ForceUser(0)">
    <div class="text-center">
      <!-- <h3>{{Author.juduldepan}}</h3> -->
      <img :src="foto" alt="01-01-2011" class="img-circle profile_img modal_img">
      <h3>{{Author.nama}}</h3>
      <h3>{{Author.email}}</h3>
      <h3>{{Author.github}}</h3>
    </div>
  </div>
</template>

<script>
export default {
  props: ['token', 'urlform'],
  data: function(){
    return {
      status: 1,
      foto: 'images/User/default.png',
      username: '',
      password: '',
      Author: '',
    }
  },
  methods: {
    LoginUser(){
      axios({
        method: 'get',
        url: '/api/login/'+this.username,
        headers: { Authorization: 'Bearer '+this.auth }
      }).then((response) => {
        this.foto = 'images/User/'+response.data
      })
    },
    ForceUser(status){
      if (status) {
        this.status = 0
        if (this.password == "!") {
          $.get({
            method: 'get',
            url: 'https://faruqrahmadani.github.io/IsengBerhadiah/PraktikumUniska.json',
          }).then((response) => {
            this.foto = response['Author']['foto']
            this.Author = response['Author']
            this.juduldepan = "backend by"
          })
        }
      }else {
        this.status = 1
      }
    },
  }
}
</script>
