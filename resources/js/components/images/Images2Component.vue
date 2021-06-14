  <template>
    <section class="container" style="overflow:hidden;margin-top:3em;position:relative;min-height: 100vh;" v-if="user.userPhoto">
      <h3 style="width:100%;text-align:center;margin-top:1em;" :class="`${user.emotions}`">Fotogalerij</h3>
      <v-carousel
        style="position: absolute;transform: translate(-50%,-50%);left: 50%;top: 50%;"
        cycle
        interval="5000"
        :show-arrows="false" 
        v-if="user.userPhoto && (user.userPhoto.length > 0)">
        <v-carousel-item
          v-for="photo in user.userPhoto"
          :key="photo.id"
          :src="photo.url"
        ></v-carousel-item>
      </v-carousel>
    </section>
</template>

<script>
    export default {
        props: [
            'user',
        ],
        data() {
            return {
              borderBox: false,
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
        computed : {
            getImagesClass() {
              let userPhotoLength = this.user.userPhoto.length;
              if (userPhotoLength == 1) {
                  return 'col-md-12 images1-soloImage';
              } else if (userPhotoLength == 2) {
                  return 'col-md-6';
              }
              if (userPhotoLength >= 3 && (userPhotoLength % 3) == 0) {
                  return 'col-md-4';
              }
              if (userPhotoLength >= 4 && (userPhotoLength % 2) == 0) {
                  return 'col-md-3 padding0';

              }
            },
        },
        async mounted() {
            this.checkDivide();

             if (this.user.userPhoto.length >= 4 && (this.user.userPhoto.length % 2) == 0) {
                  this.borderBox = true;
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
          checkDivide() {
              
          },
        }
    }
</script>

<style scoped>

.v-image__image--cover {
    background-size: contain !important;
}
.height-carousel{
    height:800px;
}
.images1-image{
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); 
	-webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); 
	-moz-box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); 
}
.images1-soloImage{
    position: absolute;
    transform: translate(-50%, -50%);
    left: 50%;
    top: 50%;
    width: 40%;
    filter: grayscale(0) !important;
    transition:1s;
}
.images1-soloImage:hover {
    filter: grayscale(1) !important;

}
.boxShadow0{
    box-shadow: 0 0 0 rgba(0, 0, 0, 0.0) !important; 
	-webkit-box-shadow: 0 0 0 rgba(0, 0, 0, 0.0) !important; 
	-moz-box-shadow: 0 0 0 rgba(0, 0, 0, 0.0) !important;
    filter: grayscale(0) !important;
    transition:1s;
}
.boxShadow0:hover{
    filter: grayscale(1) !important;
}
.padding0{
    padding: 0 !important;
}
</style>
