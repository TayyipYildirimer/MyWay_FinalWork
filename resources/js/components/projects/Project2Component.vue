<template>
    <section class="container" style="margin:6em 0;position:relative;">
        <div v-if="user.project">
          <h3 style="width:100%;text-align:center;margin:2em auto 1em;" :class="`${user.emotions}`">Projecten</h3>
            <v-row cols="12" >
                <v-col md="6" sm="12" sx="12" v-for="project in user.project" :key="project.id">
                    <div v-if="project.url && project.url.length == 11">
                        <div class="videoContainer">
                            <iframe :src="`https://www.youtube.com/embed/${project.url}`"
                                    frameborder="0"
                                    allowfullscreen
                                    class="video">
                            </iframe>
                        </div>
                        
                        <div style="padding:1em;">
                            <h4 :class="`${user.emotions}`" style="width:80%;float:left;">{{project.projectnaam}}</h4>
                            <small style="width:20%;">{{project.werkduur}}</small>
                            <p style="width:100%;float:left">{{project.beschrijving}}</p>
                        </div>
                    </div>
                    <a v-else target="_blank" :href="project.url" style="text-decoration:none;">
                    <div :style="[colorDark ? {'background-color': `#${user.imgColors[colorDarkNumber]}`} : {'background-color': `#${user.imgColors[colorLightNumber]}`},
                                         colorDark?{'color': 'white'}:{'color': 'black'}]"  class="project2-div">
                        <h4 :class="`${user.emotions}`" style="width:80%;float:left;">{{project.projectnaam}}</h4>
                        <small style="width:20%;">{{project.werkduur}}</small>
                        <p style="width:100%;float:left">{{project.beschrijving}}</p>
                              Bezoek dit project
                    </div>
                    </a>
                </v-col>
            </v-row>
        </div>
    </section>
</template>

<script>
    export default {
        props: [
            'user',
        ],
        data() {
            return {
              isloaded: null,
              styleObject: {
                  background: 'black',
              },//this.user.imgColors[this.colorDarkNumber]
              colorDark: false,
              secondIndex: 3,
              colorDarkNumber: 0,
              colorLight: false,
              colorLightNumber: 0,
              userProjectUrl: [],
              User: null,
              editor: null,
              profileImg: null,
              url: null,
            }
        },
        async mounted() {
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
                };
            });
            console.log(this.user);

            this.user.project.forEach((element, index) => {
              let videoUrl =  this.user.project[index].url;

              if(videoUrl.includes("youtube")){
                  this.userProjectUrl.push(this.getVideoId(videoUrl));
                  this.user.project[index].url = this.getVideoId(videoUrl);
              } else {
                  this.userProjectUrl.push(videoUrl);
              }
            });
            this.isloaded = true;
        },
        created() {
        },
        methods: {
          getVideoId(url) {
            let results = url.match("v=([a-zA-Z0-9]+)&?");
            let videoId = results[1];
            return videoId;
          },
        }
    }
</script>

<style scoped>

.project2-div{
    max-width: 100% !important;
    max-height: 100% !important;
    padding: 2em;
    width:100%;
    height:100%;
    transition:1s;
    filter: grayscale(0);
}
.project2-div:hover {
    padding:2.2em;
    filter: grayscale(0.8);
}
.videoContainer{
    position: relative;
    width: 100%;
    height: 0;
    padding-bottom: 56.25%;
}
.video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>
