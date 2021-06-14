<template>
    <section class="container" style="margin-top:3em;position:relative;min-height: 100vh;">
        <!--<div style="">
            <div class="project1-bgcolor">
            </div>
        </div>-->
        <h3 style="width:100%;text-align:center;margin-top:2em;" :class="`${user.emotions}`">Projecten</h3>
        <div v-if="user.project && user.project.length == 1" style="width: 100%;position: absolute;transform: translate(-50%, -50%);left: 50%;top: 50%;"> 
            <div style="width: 75%; margin:auto;">
              <v-row style="background-color: white;" md="12" sm="12" xs="12" cols="12">
                <v-col class="project1-iframe" v-if="user.project[0].url" md="4" sm="12" xs="12">
                  <div style="width:100%;height:100%;">
                    <iframe width="560"
                            height="315"
                            :src="`https://www.youtube.com/embed/${user.project[0].url}`"
                            frameborder="0"
                            allowfullscreen
                            class="video">
                    </iframe>
                  </div>
                </v-col>
                <v-col style="min-height: 240px;" md="8" sm="12" xs="12">
                  <v-row style="display: inline;">
                    <h4 :class="`${user.emotions}`" v-if="user.project[0].projectnaam" class="card-title">{{user.project[0].projectnaam}}</h4>
		    	    <p v-if="user.project[0].beschrijving" class="card-text">{{user.project[0].beschrijving}}</p>
                  </v-row>
                  <v-row>
                      <v-col md="6" sm="12" xs="12" style="float:left;">
                          <small v-if="user.project[0].werkduur">Werkduur: {{user.project[0].werkduur}}</small>
                      </v-col>
                      <v-col md="6" sm="12" xs="12" style="float:left;text-align:right;">
                        <button :style="[colorDark ? {'background-color': `#${user.imgColors[colorDarkNumber]}`} : {'background-color': `#${user.imgColors[colorLightNumber]}`},
                                         colorDark?{'color': 'white'}:{'color': 'black'}]" :href="user.project[0].url" v-if="user.project[0].url.length != 11" type="button" class="btn btn-warning">
                          Ga naar link
                        </button>
                      </v-col>
                  </v-row>
		    	</v-col>
              </v-row>
            </div>
        </div>

        <div v-if="user.project && user.project.length > 1 && (user.project.length <= 3 || user.project.length >= 7)" class="project1-triplePoject" style="width: 100%;position: absolute;transform: translate(-50%, -50%);left: 50%;top: 50%;"> 
		    	<div class="row">
		    		<div style="margin: 0.2em 0" class="col-6 col-sm-6 col-md-4 col-lg-4 project1-card" v-for="project in user.project" :key="project.id">
		    			<div class="card" style="width: 300px;margin: auto;min-height:100%;">
		    				<div class="card-body">
                                <div v-if="project.url && project.url.length == 11" class="videoContainer">
                                   <iframe width="560"
                                           height="315"
                                           :src="`https://www.youtube.com/embed/${project.url}`"
                                           frameborder="0"
                                           allowfullscreen
                                           class="video">
                                   </iframe>
                                </div>
                                <h4 :class="`${user.emotions}`" v-if="project.projectnaam" class="card-title">{{project.projectnaam}}</h4>
		    				 	<p v-if="project.beschrijving" class="card-text">{{project.beschrijving}}</p>
                                <small v-if="user.project[0].werkduur">Werkduur: {{user.project[0].werkduur}}</small>
		    				 	<button :style="[colorDark ? {'background-color': `#${user.imgColors[colorDarkNumber]}`} : {'background-color': `#${user.imgColors[colorLightNumber]}`},
                                                 colorDark?{'color': 'white'}:{'color': 'black'}]" v-if="project.url.length != 11" :href="project.url" type="button" class="btn btn-warning">
                                    Ga naar link
                                </button>
		    				</div>
		    			</div>
		    		</div>
		    	</div>
        </div>

        <div v-if="user.project && user.project.length > 3 && user.project.length <= 6" class="row project1-carousel">
		    <div class="col-12 col-sm-12">
		    	<div id="inam" class="carousel slide" data-ride="carousel">
		    		<div class="carousel-inner">
		    			<div class="carousel-item active">
		    				 <div class="container">
		    				 	<div class="row">
		    				 		<div style="margin: 0.2em 0" class="col-6 col-sm-6 col-md-4 col-lg-4" v-for="index in 3" :key="index">
		    				 			<div class="card" style="width: 300px;margin: auto;min-height:100%;">
		    				 				<div class="card-body">
                                                <div v-if="userProjectUrl[index] && userProjectUrl[index].length == 11" class="videoContainer">
                                                   <iframe width="560" 
                                                           height="315" 
                                                           :src="`https://www.youtube.com/embed/${userProjectUrl[index]}`"
                                                           frameborder="0" 
                                                           allowfullscreen 
                                                           class="video">
                                                   </iframe>
                                                </div>
		    				 					<h4 :class="`${user.emotions}`" v-if="user.project[index] && user.project[index].projectnaam" class="card-title">{{user.project[index].projectnaam}}</h4>
		    				 					<p v-if="user.project[index] && user.project[index].beschrijving" class="card-text">{{user.project[index].beschrijving}}</p>
		    				 					<button v-if="userProjectUrl[index] && userProjectUrl[index].length != 11" :href="user.project[index].url" :style="[colorDark ? {'background-color': `#${user.imgColors[colorDarkNumber]}`} : {'background-color': `#${user.imgColors[colorLightNumber]}`},
                                                        colorDark?{'color': 'white'}:{'color': 'black'}]" type="button" class="btn btn-warning">
                                                    Ga naar link
                                                </button>
		    				 				</div>
		    				 			</div>
		    				 		</div>
		    				 	</div>
		    				 </div>
		    			</div>
		    			<div class="carousel-item">
		    				 <div class="container">
		    				 	<div class="row">
		    				 		<div class="col-6 col-sm-6 col-md-4 col-lg-4" v-for="project in user.project.slice(3)" :key="project.id">
		    				 			<div class="card" style="width: 300px;margin: auto;min-height:100%;">
		    				 				<div class="card-body">
                                                <div v-if="project.url && project.url.length == 11" class="videoContainer">
                                                  <iframe width="560" 
                                                          height="315" 
                                                          :src="`https://www.youtube.com/embed/${project.url}`"
                                                          frameborder="0" 
                                                          allowfullscreen 
                                                          class="video">
                                                  </iframe>
                                                </div>
                                                <h4 :class="`${user.emotions}`" v-if="project.projectnaam" class="card-title">{{project.projectnaam}}</h4>
		    				 					<p v-if="project.beschrijving" class="card-text">{{project.beschrijving}}</p>
		    				 					<button v-if="project.url.length != 11" :style="[colorDark ? {'background-color': `#${user.imgColors[colorDarkNumber]}`} : {'background-color': `#${user.imgColors[colorLightNumber]}`},
                                                        colorDark?{'color': 'white'}:{'color': 'black'}]" :href="project.url" type="button" class="btn btn-warning">Ga naar link</button>
		    				 				</div>
		    				 			</div>
		    				 		</div>
		    				 	</div>
		    				 </div>
		    			</div>
		    		</div>
		    		<a href="#inam" class="carousel-control-prev" data-slide="prev"
                       style="position: absolute;transform: translate(-50%, -50%);top: 50%;left: 1.5%;">
		    		  <span class="carousel-control-prev-icon"></span>
		    		</a>
		    		<a href="#inam" class="carousel-control-next" data-slide="next" 
                       style="position: absolute;transform: translate(-50%, -50%);top: 50%;right: -15.5%;">
		    		  <span class="carousel-control-next-icon"></span>
		    		</a>
		    	</div>
		    </div>
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
            let videoId = results[1]; // watch you need.
            return videoId;
          },
        }
    }
</script>

<style scoped>

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
.card-title{
    margin-top:0.5em !important;
}
.project1-carousel{
    width:100% !important;
    position: absolute;
    transform: translate(-50%, -50%);
    left: 50%;
    top: 50%;
}
.carousel-control-prev-icon,
.carousel-control-next-icon {
  height: 100px;
  width: 100px;
  background-size: 100%, 100%;
  border-radius: 50%;
  background-image: none;
}

.carousel-control-next-icon:after
{
  content: '>';
  font-size: 55px;
  color: black;
}

.carousel-control-prev-icon:after {
  content: '<';
  font-size: 55px;
  color: black;
}
@media screen and (max-width: 1295px) {
   .project1-carousel{ 
       width: 100% !important;
   }
   .carousel-control-prev-icon{
       left: 2% !important;
   }
   .carousel-control-next-icon{
       right: -17% !important;
   }
}

@media screen and (max-width: 960px) {
    .project1-iframe{
        min-height: 300px;
        min-width: 100% !important;
    }
    section{
        min-height: 116%;
    }
    .project1-triplePoject{
        min-height: 118%;
        position: unset !important;
        transform: none !important;
    }
    .project1-card{
        max-width: 100% !important;
        margin: auto !important;
    }
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
}
.project1-bgcolor {
    background-color: white;
    height: 100%;
    z-index: -99;
    /* margin-top: -31%; */
    transform: translate(-50%, -50%);
    position: absolute;
    top: 50%;
    left: 50%;
    /* margin-left: -25em !important; */
    width: 130% !important;
}
.header5-bgcolor {
    height: 161%;
    z-index: -1;
    margin-top: -31%;
    position: absolute;
    margin-left: -25em !important;
    width: 350% !important;
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
    position:absolute;
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
