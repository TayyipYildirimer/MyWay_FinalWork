<template>
    <div class="container" style="overflow:hidden;max-height:100vh;margin-top:-21px;">
        <div>
            <div style="">
                <div class="header5-bgcolor"
                    :style="[colorDark ? {'background-color': `#${user.imgColors[colorDarkNumber]}`} : {'background-color': `#${user.imgColors[colorLightNumber]}`} ]">
                </div>
            </div>
            <v-row>
                <h1 :class="`${user.emotions}`" style="width:100%;text-align:center;text-transform: capitalize;" :style="[colorDark?{'color': 'white'}:{'color': 'black'}]">{{user.fname}} {{user.lname}}</h1>
                <h2 :class="`${user.emotions}`" style="width:100%;text-align:center;" :style="[colorDark?{'color': 'white'}:{'color': 'black'}]">{{user.shortdescription}}</h2>
            </v-row>
            <div>
                <v-col cols="6" md="6" sm="12" class="header5-cardcols">
                    <img :src="`${profileImg}`" alt="" class="header5-profileImg">
                    <v-row class="header5-socialmedia">
                        <ul> 
                            <li v-if="user.socialMedia.instagram">
                                <v-btn :href="user.socialMedia.instagram" class="mx-2" fab small :style="[colorDark ? {'background-color': `#${user.imgColors[colorDarkNumber]}`} : {'background-color': `#${user.imgColors[colorLightNumber]}`}]">
                                    <i :style="[colorDark?{'color': 'white'}:{'color': 'black'}]" class="fab fa-instagram fa-lg"></i>
                                </v-btn>
                            </li>
                            <li v-if="user.socialMedia.facebook">
                                <v-btn :href="user.socialMedia.facebook" class="mx-2" fab small :style="[colorDark ? {'background-color': `#${user.imgColors[colorDarkNumber]}`} : {'background-color': `#${user.imgColors[colorLightNumber]}`}]">
                                    <i :style="[colorDark?{'color': 'white'}:{'color': 'black'}]" class="fab fa-facebook-f fa-lg"></i>
                                </v-btn>
                            </li>
                            <li v-if="user.socialMedia.pinterest">
                                <v-btn :href="user.socialMedia.pinterest" class="mx-2" fab small :style="[colorDark ? {'background-color': `#${user.imgColors[colorDarkNumber]}`} : {'background-color': `#${user.imgColors[colorLightNumber]}`}]">
                                    <i :style="[colorDark?{'color': 'white'}:{'color': 'black'}]" class="fab fa-pinterest-p fa-lg"></i>
                                </v-btn>
                            </li>
                            <li v-if="user.socialMedia.linkedin">
                                <v-btn :href="user.socialMedia.linkedin" class="mx-2" fab small :style="[colorDark ? {'background-color': `#${user.imgColors[colorDarkNumber]}`} : {'background-color': `#${user.imgColors[colorLightNumber]}`}]">
                                    <i :style="[colorDark?{'color': 'white'}:{'color': 'black'}]" class="fab fa-linkedin-in fa-lg"></i>
                                </v-btn>
                            </li>
                            <li v-if="user.socialMedia.twitter">
                                <v-btn :href="user.socialMedia.twitter" class="mx-2" fab small :style="[colorDark ? {'background-color': `#${user.imgColors[colorDarkNumber]}`} : {'background-color': `#${user.imgColors[colorLightNumber]}`}]">
                                    <i :style="[colorDark?{'color': 'white'}:{'color': 'black'}]" class="fab fa-twitter fa-lg"></i>
                                </v-btn>
                            </li>
                            <li v-if="user.socialMedia.other">
                                <v-btn :href="user.socialMedia.other" class="mx-2" fab small :style="[colorDark ? {'background-color': `#${user.imgColors[colorDarkNumber]}`} : {'background-color': `#${user.imgColors[colorLightNumber]}`}]"
                                    @click="windowLocate">
                                    <i :style="[colorDark?{'color': 'white'}:{'color': 'black'}]" class="fas fa-users fa-lg"></i>
                                </v-btn>
                            </li>
                        </ul>
                    </v-row>
                </v-col>
                <v-btn @click="windowScroll" outlined small fab class="mx-2 scrollBtn" :style="[colorDark ? {'background-color': `#${user.imgColors[colorDarkNumber]}`} : {'background-color': `#${user.imgColors[colorLightNumber]}`}]">
                  <i :style="[colorDark?{'color': 'white'}:{'color': 'black'}]" class="fas fa-angle-double-down"></i>
                </v-btn>
            </div>
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
              styleObject: {
                  background: 'black',
              },//this.user.imgColors[this.colorDarkNumber]
              colorDark: false,
              colorDarkNumber: 0,
              colorLight: false,
              colorLightNumber: 0,
              User: null,
              editor: null,
              profileImg: null,
              url: null,
            }
        },
        async mounted() {
          //this.url = this.user.socialMedia.other;
          let socialMediaUrls = this.user.socialMedia;
            for (const element in socialMediaUrls) {
              if(this.user.socialMedia[element] != null){
                if(!this.user.socialMedia[element].includes("https")) {
                  this.user.socialMedia[element] = null;
                }
              }
            }
            this.user.imgColors.forEach((element, index) => {
                let r = parseInt(element.substr(0, 2), 16),
                    g = parseInt(element.substr(2, 2), 16),
                    b = parseInt(element.substr(4, 2), 16);

                if(r <= 90 && g <= 90 && b <= 90){
                  this.colorDark = true;
                  this.colorDarkNumber = index;
                };
                if(r >= 180 && g >= 180 && b >= 180){
                  this.colorLight = true;
                  this.colorLightNumber = index;
                  console.log(this.colorLightNumber,g,b);
                };
            });
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
  section{
      margin-top:0 !important;
  }
@media screen and (max-width: 600px) {
  .header5-cardcols {
    max-width: 100% !important;
  }
  .header5-profileImg {
      filter: grayscale(0) !important;
  }
  .row ul {
    text-align-last: center;
    z-index: 99;
    display: inline-grid !important;
    margin: auto !important;
    position: absolute !important;
    transform: translate(-50%, -50%) !important;
    left: 96% !important;
    bottom: 42% !important;
  }
  .scrollBtn {
    display: none;
  }
  .header5-bgcolor {
    height: 100px;
    position: relative;
  }
  .header5-bgcolor {
    content:"";
    position: absolute;
    height: 100%;
    width: 4000px;
    left: -2000px;
    z-index: -1;
  }
}
@media screen and (min-width: 600px) {
  .header5-bgcolor {
    height: 100px;
    position: relative;
  }
  .header5-bgcolor {
    content:"";
    position: absolute;
    height: 100%;
    width: 4000px;
    left: -2000px;
    z-index: -1;
  }
}

.header5-cardcols {
    margin: 1em auto;
    width: 100%;
    height: 100%;
}

.header5-profileImg {
    filter: grayscale(1);
    border-radius: 6px;
    width: -webkit-fill-available;
    justify-content: center;
    display: flex !important;
    align-items: center;
    transition: 1s;
}

.header5-profileImg:hover {
    filter: grayscale(0);
    -webkit-box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.10);
    box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.10);
}

.header5-socialmedia ul li {
    display: inline;
}
.scrollBtn{
    z-index: 99;
    position:fixed;
    left:90%;
    top:90%;
}

.mx-2 {
    text-decoration: none;
}

.row h1{
    font-weight: bold;
    font-size: 70px;
}
.row h2{
    margin-top:-0.3em;
}
.header {
    min-height: 100hv;
}

.header p {
    font-weight: 300;
}

.cover-container {
    max-width: 42em;
}

.header1-bgcolor {
    height: 150%;
    z-index: -1;
    min-width: 250%;
    margin-top: -19%;
    position: absolute;
    margin-left: -50% !important;
    width: 37% !important;
}

.header3-title {
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

.header3-circle {
    /*font-size: 18em !important;*/
    font-size: 18vw !important;
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
.row ul{
    text-align-last: center;
    display: flex;
    margin: auto;
    position: absolute;
    transform: translate(-50%, -50%);
    left: 50%;
    bottom: 21%;
}
</style>
