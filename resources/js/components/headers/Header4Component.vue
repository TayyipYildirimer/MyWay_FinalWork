<template>
    <div class="container" style="overflow:hidden;min-height:100vh;">
        <div class="header4-card">
            <v-row class="header4-cardrow" cols="12">
                <v-col cols="6" md="6" sm="12" class="header4-cardcols">
                    <div style="position: absolute;transform: translate(-50%, -50%);top: 50%;left: 42%;">
                        <h1 :class="`${user.emotions}`">{{user.fname}} {{user.lname}}</h1>
                        <div style="display:flex;margin-bottom: 1em;margin-top: 1em;text-transform: capitalize;">
                            <p style="margin:0;">
                                {{ user.category}}
                            </p>
                            <span class="dot"></span>
                            <p style="margin:0;">
                                {{ user.specialization}}
                            </p>
                        </div>
                        <div style="display:flex;margin-bottom: 2em;text-transform: capitalize;">
                            <p style="margin:0;font-size:18px;">
                                {{ user.description}}
                            </p>
                        </div>
                        <v-row class="header3-socialmedia">
                            <ul>
                                <li v-if="user.socialMedia.instagram">
                                    <v-btn :href="user.socialMedia.instagram" elevation="0" fab small text>
                                        <i class="fab fa-instagram fa-lg"></i>
                                    </v-btn>
                                </li>
                                <li v-if="user.socialMedia.facebook">
                                    <v-btn :href="user.socialMedia.facebook" elevation="0" fab small text>
                                        <i class="fab fa-facebook-f fa-lg"></i>
                                    </v-btn>
                                </li>
                                <li v-if="user.socialMedia.pinterest">
                                    <v-btn :href="user.socialMedia.pinterest" elevation="0" fab small text>
                                        <i class="fab fa-pinterest-p fa-lg"></i>
                                    </v-btn>
                                </li>
                                <li v-if="user.socialMedia.linkedin">
                                    <v-btn :href="user.socialMedia.linkedin" elevation="0" fab small text>
                                        <i class="fab fa-linkedin-in fa-lg"></i>
                                    </v-btn>
                                </li>
                                <li v-if="user.socialMedia.twitter">
                                    <v-btn :href="user.socialMedia.twitter" elevation="0" fab small text>
                                        <i class="fab fa-twitter fa-lg"></i>
                                    </v-btn>
                                </li>
                                <li v-if="user.socialMedia.other">
                                    <v-btn :href="user.socialMedia.other" elevation="0" fab small text @click="windowLocate">
                                        <i class="fas fa-users fa-lg"></i>
                                    </v-btn>
                                </li>
                            </ul>
                        </v-row>
                    </div>
                </v-col>
                <v-col cols="6" md="6" sm="12" class="header4-cardcols">
                    <img :src="`${profileImg}`" alt="" class="header4-profileImg">
                </v-col>
            </v-row>
        </div>
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
            
            /*this.user.socialMedia.forEach(element => {
              console.log(element);
              if(!element.includes("https")) {
                this.user.userPhoto.element = null;
              }
            });*/
            this.profileImg = this.user.profileimg;
        },
        methods: {
          windowLocate() {
            window.location.href = `${this.user.socialMedia.other}`;
          }
        }
    }
</script>

<style scoped>

.header4-card{
  width: 75%;
  height: 85vh;
  position: absolute;
  transform: translate(-50%,-50%);
  left: 50%;
  top: 51%;
}
.header4-cardrow{
    -webkit-box-shadow: 0px 0px 5px 2px rgba(0,0,0,0.19); 
    box-shadow: 0px 0px 5px 2px rgba(0,0,0,0.19);
    height: 100%;
    border-radius: 25px 4px 25px 4px;
    overflow: hidden;
}
.header4-cardcols{
  width:50%;
  height:100%;
  background-color:rgb(255, 255, 255);
  float:left;
}

.header4-profileImg{
  border-radius: 3px;
  width: -webkit-fill-available;
  justify-content: center;
  display: flex !important;
  align-items: center;
  position: absolute;
  transform: translate(-50%, -50%);
  top: 50%;
  left: 45%;
  margin: 0;
}

h1{
  font-size: 4.5em !important;
  text-transform: capitalize;
}
.header{
    min-height:100hv;
}
.header p{
  font-weight: 300;
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
  font-size: min(max(41px, 6vw), 109px) !important;
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
  padding: 0.7em;
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
/*.header3-socialmedia ul{
  position: absolute;
  right: 10%;
  bottom: 3%;
}*/

</style>