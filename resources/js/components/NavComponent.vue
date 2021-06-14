<template>
    <div class="row-nav">
      <div class="container">
      <v-row cols="12" style="overflow:hidden; margin:0;">
        <v-col cols="4">
          <a href="/">
           <img src="/images/logo.png" style="width:70px;">
          </a>
        </v-col>
        <v-col cols="8" style="margin:auto 0 !important;">
          <ul id="horizontal-list" style="margin:0;">
              <li>
                  <a class="btn-nav" href="/home">
                      Home
                  </a>
              </li>
              <li>
                  <a class="btn-nav" href="/search">
                      Zoekplatform
                  </a>
              </li>
              <li>
                  <a class="btn-nav" href="#">
                      Prijzen
                  </a>
              </li>
              <li v-if="authUser === null" style="margin-left:200px;">
                  <a class="btn-nav" href="/login">
                      Inloggen
                  </a>
              </li>
              <li v-if="authUser != null" style="margin-left:200px;">
                  <a class="btn-nav" :href="`/portfolio/${authUser.id}`">
                      Mijn portfolio
                  </a>
              </li>
          </ul>
        </v-col>
      </v-row>
        </div>

    </div>
</template>

<script>// @ts-nocheck

    export default {
      data() {
        return {
          authUser: window.authUser
        }
      },
      created() {
         console.log(this.authUser);
      },
      methods: {
        yourMethodName() {
          console.log(this.authUser);
       }
      }
    }
</script>

<style scoped>
.row-nav {
  z-index:99;
  position: fixed;
  width: 100%;
  background-color:white;
  box-shadow: 0px 4px 4px 0px rgb(17 102 153 / 9%);
  -webkit-box-shadow: 0px 4px 4px 0px rgb(17 102 153 / 9%);
  -moz-box-shadow: 0px 4px 4px 0px rgb(17 102 153 / 9%);
}
ul#horizontal-list {
  text-align: right;
	min-width: 696px;
	list-style: none;
}
ul#horizontal-list li {
	display: inline;
  text-transform: uppercase;
  font-weight: 600;
  font-size: 12px;
}
li a {
  text-decoration: none;
  color: dimgray;
  transition: ease 350ms;
  
  display: inline-block;
  padding: 0px 20px 5px;
  position: relative;
}
.btn-nav:after {
  color: #2BA9E1;
  background: none repeat scroll 0 0 transparent;
  bottom: 0;
  content: "";
  display: block;
  height: 2px;
  left: 50%;
  position: absolute;
  background: #2BA9E1;
  transition: width 0.3s ease 0s, left 0.3s ease 0s;
  width: 0;
}
.btn-nav:hover:after{
  width: 100%; 
  left: 0; 
}
.btn-nav:hover{
  color: #2BA9E1;
}
</style>