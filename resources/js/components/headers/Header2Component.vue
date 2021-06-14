
<template>
    <div class="container" style="max-height:100vh;">
        <v-row class="header" md="12">
            <v-col md="6">
                <div style="max-width: 70%;margin: 30% auto;">
                    <p style="margin:0;">
                        Portfolio van
                    </p>
                  <h1 :class="`${user.emotions}`">{{ user.fname}}<br>
                  {{ user.lname}}</h1><br>
                  <div style="display:flex;margin-top: -2em;margin-bottom: 2em;text-transform: capitalize;">
                    <p style="margin:0;">
                      {{ user.category}}
                    </p>
                    <span class="dot"></span>
                    <p style="margin:0;">
                      {{ user.specialization}}
                    </p>
                  </div>
                  <v-btn color="#eeeeee" style="overflow:hidden;"><span>Neem contact op</span>
                  </v-btn>
                </div>
            </v-col>
            <v-col md="6" style="display:flex;justify-content:center;">
                <div style="">
                  <div :style="`background-color:#${user.imgColors[0]}`" class="header1-bgcolor">
                  </div>
                </div>
                <img :src="`${profileImg}`" alt="" style="min-height:350px;max-height:470px;justify-content:center;display:flex !important;align-items:center;margin-top: 13% !important;">
            </v-col>
        </v-row>
        
        <v-btn @click="windowScroll" outlined small fab class="mx-2 scrollBtn" :style="[colorDark ? {'background-color': `#${user.imgColors[colorDarkNumber]}`} : {'background-color': `#${user.imgColors[colorLightNumber]}`}]">
          <i :style="[colorDark?{'color': 'white'}:{'color': 'black'}]" class="fas fa-angle-double-down"></i>
        </v-btn>
    </div>
</template>

<script>
    export default {
        props: [
            'user',
        ],
        data() {
            return {
              User: null,
              editor: null,
              profileImg: null,
            }
        },
        created() {
            this.profileImg = this.user.profileimg;
            this.user.userPhoto.forEach(element => 
            console.log());
            console.log(this.user);
        },
        methods: {
          windowScroll() {
            let pageHeight = window.innerHeight;
            window.scrollBy({top:pageHeight, left:0, behavior: 'smooth'});
          },
        }
    }
</script>

<style scoped>

h1{
  font-size: 4.5em !important;
  text-transform: capitalize;
}
.header{
    min-height:100hv;
}
.header p{
  font-weight: 500;
}
.cover-container {
  max-width: 42em;
}
.header1-bgcolor{
  height: 150%;
  z-index: -1;
  margin-top: -19%;
  position: absolute;
  margin-left: 0em !important;
  width: 37% !important;
}
div button{
  font-weight: 500;
  border: 1px solid #ababab !important;
  border-color:#ababab !important;
  border-radius: 50px;
  box-shadow: 0px 0px 0px 1px rgba(0,0,0,0) !important;
  -webkit-box-shadow: 0px 0px 0px 1px rgba(29, 24, 24, 0) !important;
  -moz-box-shadow: 0px 0px 0px 1px rgba(0,0,0,0) !important;
}
div button:hover{
    background-color: white;
}
.v-btn__content i:before{
  opacity: 0.1;
  color:darkgray;
  font-size: 58px !important;
  height: 60px !important;
  width: 41px !important;
}
.dot {
  height: 10px;
  width: 10px;
  background-color: #bbb;
  margin: auto 0.7em;
  background-color: #343434;
  border-radius: 50%;
  display: inline-block;
}

.scrollBtn{
    z-index: 99;
    position:fixed;
    left:90%;
    top:90%;
}
</style>