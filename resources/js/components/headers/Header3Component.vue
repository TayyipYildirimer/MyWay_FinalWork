
<template>
    <div class="container" style="overflow:hidden;max-height:100vh;margin-bottom:14em;">
        <div style="">
          <div class="header1-bgcolor" :style="`background-color:#${user.imgColors[1]}`">
          </div>
        </div>
        <v-row><h1 class="header3-title" :class="`${user.emotions}`">{{ user.title }}</h1></v-row>
        <div class="header3-circle" :style="`background-color:#${user.imgColors[2]}`"></div>
        <v-row class="header" md="12">
            <p style="margin-top:1em;" class="header3-text" :class="`${user.emotions}`">{{ user.fname }} {{user.lname}}</p>
            <v-col md="12" style="display:flex;justify-content:center;">
                <img :src="`${profileImg}`" alt="" style="width: 50%;
                                                          justify-content: center;
                                                          display: flex !important;
                                                          align-items: center;
                                                          margin-top: 5% !important;">
            </v-col>
        </v-row>
        <v-row class="header3-socialmedia">
          <ul>
            <li v-if="user.socialMedia.instagram">
              <v-btn class="mx-2"
                     elevation="0"
                     fab
                     small
                     color="#fff">
                <i class="fab fa-instagram fa-lg"></i>
              </v-btn>
            </li>
            <li v-if="user.socialMedia.facebook">
              <v-btn class="mx-2"
                     elevation="0"
                     fab
                     small
                     color="#fff">
                <i class="fab fa-facebook-f fa-lg"></i>
              </v-btn>
            </li>
            <li v-if="user.socialMedia.pinterest">
              <v-btn class="mx-2"
                     elevation="0"
                     fab
                     small
                     color="#fff">
                <i class="fab fa-pinterest-p fa-lg"></i>
              </v-btn>
            </li>
            <li v-if="user.socialMedia.linkedin">
              <v-btn class="mx-2"
                     elevation="0"
                     fab
                     small
                     color="#fff">
                <i class="fab fa-linkedin-in fa-lg"></i>
              </v-btn>
            </li>
            <li v-if="user.socialMedia.twitter">
              <v-btn class="mx-2"
                     elevation="0"
                     fab
                     small
                     color="#fff">
                <i class="fab fa-twitter fa-lg"></i>
              </v-btn>
            </li>
            <li v-if="user.socialMedia.other">
              <v-btn class="mx-2"
                     elevation="0"
                     fab
                     small
                     color="#fff"
                     @click="windowLocate">
                <i class="fas fa-users fa-lg"></i>
              </v-btn>
            </li>
          </ul>
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
              url: null,
            }
        },
        mounted() {
          //this.url = this.user.socialMedia.other;
          let socialMediaUrls = this.user.socialMedia;
            for (const element in socialMediaUrls) {
              if(this.user.socialMedia[element] != null){
                if(!this.user.socialMedia[element].includes("https")) {
                  this.user.socialMedia[element] = null;
                }
              }
            }
        },
        created() {
            this.profileImg = this.user.profileimg;
        },
        methods: {
          windowLocate() {
            window.location.href = `${this.user.socialMedia.other}`;
          },
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
.cover-container {
  max-width: 42em;
}
.header1-bgcolor{
  height: 150%;
  z-index: -1;
  min-width: 250%;
  margin-top: -19%;
  position: absolute;
  margin-left: -50% !important;
  width: 37% !important;
}
.header3-title{
  /*font-size: 18em !important;*/
  font-size: min(max(52px, 10vw), 200px) !important;
  text-align: center;
  color: white;
  min-width: 100%;
  position: absolute;
  left: 50%;
  margin: 0;
  transform: translate(-50%, -50%);
  top: 50%;
}
.header3-circle{
  /*font-size: 18em !important;*/
  font-size: 18vw!important;
  color: white;
  position: absolute;
  left: 50%;
  margin: 0;
  transform: translate(-50%, -50%);
  top: 50%;
  z-index: -1;
  padding: 1em;
  border-radius: 100%;
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
.header3-text{
  opacity: 1;
  font-size: 1.5em !important;
  border-radius: 0px;
  padding-left: 0.3em;
  padding-right: 0.3em;
  font-weight: 600 !important;
  color: white;
  text-transform: capitalize;
  transition:1s;
  cursor: default;
}
.header3-text::first-letter{
  font-size: 1.1em !important;
  padding-left: 1px;
  padding-right: 1px;
  border-bottom: 4px solid #ffffff;
}
.header3-text:hover{
  opacity: 0.85;
}
.header3-socialmedia ul li{
  display: inline;
}
.header3-socialmedia ul{
  position: absolute;
  right: 10%;
  bottom: 3%;
}

.scrollBtn{
    z-index: 99;
    position:fixed;
    left:90%;
    top:90%;
}

</style>