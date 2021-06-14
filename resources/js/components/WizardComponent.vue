<template>
  <div style="min-height:85vh; margin:auto;">
    <form
      method="POST"
      enctype="multipart/form-data"
      @submit.prevent="submitWizard"
      style="min-width: 600px;position:absolute;transform:translate(-50%,-50%);left:50%;top:55%;"
    >

      <v-stepper
        style="
          background-color: #2ba9e1 !important;-
        "
        v-model="e1"
      >
      
      <v-stepper-header style="box-shadow: none !important">
        <v-stepper-step :complete="e1 > 1" step="1" color="#2BA9E1">
        </v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step :complete="e1 > 2" step="2" color="#2BA9E1">
        </v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step :complete="e1 > 3" step="3" color="#2BA9E1">
        </v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step :complete="e1 > 4" step="4" color="#2BA9E1">
        </v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step :complete="e1 > 5" step="5" color="#2BA9E1">
        </v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step :complete="e1 > 6" step="6" color="#2BA9E1">
        </v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step :complete="e1 > 7" step="7" color="#2BA9E1">
        </v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step step="9" color="#2BA9E1"> </v-stepper-step>
      </v-stepper-header>
        <v-stepper-items>
          <v-stepper-content step="1">
            <v-card
              class="mb-12"
              color="grey lighten-1"
              height="200px"
              style="background-color: #2ba9e1; box-shadow: none"
            >
              <div class="form-group">
                <h3
                  style="color: white; text-align: center; margin-bottom: 1em"
                >
                  Welke soort creatieve ben je?
                </h3>
                <select
                  required
                  class="form-control"
                  id="category"
                  v-model="formData.category"
                >
                  <option value="" disabled selected>Select a category</option>
                  <option value="fotograaf">Fotograaf</option>
                  <option value="designer">Designer</option>
                  <option value="developer">Developer</option>
                  <option value="marketing">Marketing</option>
                </select>
              </div>
            </v-card>

            <v-btn
              style="
                font-weight: 600;
                font-size: 12px;
                color: #2ba9e1 !important;
                float: right !important;
              "
              color="primary"
              @click="e1 = 2"
            >
              Continue
            </v-btn>
          </v-stepper-content>

          <v-stepper-content step="2">
            <v-card
              class="mb-12"
              color="grey lighten-1"
              height="200px"
              style="background-color: #2ba9e1; box-shadow: none"
            >
              <div class="form-group">
                <h3
                  style="color: white; text-align: center; margin-bottom: 1em"
                >
                  Wat is jouw Specialisatie
                </h3>
                <select
                  class="form-control"
                  id="specialization"
                  v-model="formData.specialization"
                >
                  <option value="" disabled selected>
                    Select your specialization
                  </option>
                  <option value="persfotografie">Persfotografie</option>
                  <option value="modefotografie">Modefotografie</option>
                  <option value="reclamefotografie">Reclamefotografie</option>
                  <option value="industrielefotografie">
                    Industriële fotografie
                  </option>
                  <option value="bedrijfsfotografie">Bedrijfsfotografie</option>
                  <option value="Reisfotografie">Reisfotografie</option>
                  <option value="architectuurfotografie">
                    Architectuurfotografie
                  </option>
                  <option value="medischefotografie">
                    Medische fotografie
                  </option>
                  <option value="frontenddeveloper">Front-end developer</option>
                  <option value="backenddeveloper">Back-end developer</option>
                  <option value="fullstackdeveloper">
                    Full stack developer
                  </option>
                  <option value="databasedeveloper">Database developer</option>
                  <option value="softwareengineer">Software engineer</option>
                  <option value="technicalwebanalyst">
                    Technical web analyst
                  </option>

                  <option value="graphicdesigner">Graphic designer</option>
                  <option value="digitaldesigner">Digital designer</option>
                  <option value="productdesigner">Product designer</option>
                  <option value="interiordesigner">Interior designer</option>
                  <option value="webdesigner">Web designer</option>
                  <option value="uwdesigner">UX/UI designer</option>
                  <option value="socialmediadesigner">
                    Social media designer
                  </option>

                  <option value="strategicmarketing">
                    Strategic marketing
                  </option>
                  <option value="digitalmarketing">Digital marketing</option>
                  <option value="entrepreneurialmarketing">
                    Entrepreneurial marketing
                  </option>
                  <option value="socialmediamarketing">
                    Socialmedia marketing
                  </option>
                  <option value="brandmarketing">Brand marketing</option>
                </select>
              </div>
            </v-card>

            <v-btn
              style="font-weight: 600; font-size: 12px; color: white !important"
              @click="e1 = 1"
              text
            >
              Vorige
            </v-btn>
            <v-btn
              style="
                font-weight: 600;
                font-size: 12px;
                color: #2ba9e1 !important;
                float: right !important;
              "
              color="primary"
              @click="e1 = 3"
            >
              Continue
            </v-btn>
          </v-stepper-content>

          <v-stepper-content step="3">
            <v-card
              class="mb-12"
              color="grey lighten-1"
              height="200px"
              style="background-color: #2ba9e1; box-shadow: none"
            >
              <div class="form-group">
                <h3
                  style="color: white; text-align: center; margin-bottom: 1em"
                >
                  Welke emotie roept u bij anderen op?
                </h3>
                <select
                  class="form-control"
                  id="emotions"
                  v-model="formData.emotions"
                >
                  <option value="" disabled selected>Duid jouw emoties aan</option>
                  <option value="respectabel">Respectabel</option>
                  <option value="betrouwbaar">Betrouwbaar</option>
                  <option value="autoriteit">Autoriteit</option>
                  <option value="schoon">Schoon</option>
                  <option value="modern">Modern</option>
                  <option value="modieus">Modieus</option>
                  <option value="elegant">Elegant</option>
                  <option value="creatief">Creatief</option>
                  <option value="vriendelijk">Vriendelijk</option>
                  <option value="gedurfd">Gedurfd</option>
                  <option value="krachtig">Krachtig</option>
                </select>
              </div>
            </v-card>

            <v-btn
              style="font-weight: 600; font-size: 12px; color: white !important"
              @click="e1 = 2"
              text
            >
              Vorige
            </v-btn>
            <v-btn
              style="
                font-weight: 600;
                font-size: 12px;
                color: #2ba9e1 !important;
                float: right !important;
              "
              color="primary"
              @click="e1 = 4"
            >
              Continue
            </v-btn>
          </v-stepper-content>

          <v-stepper-content step="4">
            <v-card
              class="mb-12"
              color="grey lighten-1"
              height="200px"
              style="background-color: #2ba9e1; box-shadow: none"
            >
              <div class="form-row">
                <h3
                  style="
                    color: white;
                    text-align: center !important;
                    margin: 0 auto 1em;
                  "
                >
                  Wat is jouw leeftijd?
                </h3>
                <input
                  type="number"
                  class="form-control"
                  placeholder="Nummer..."
                  v-model="formData.age"
                />
                <!--<div class="invalid-feedback" v-show="formData.errors.has('age')" v-text="formData.errors.get('age')"></div>-->
              </div>
            </v-card>

            <v-btn
              style="font-weight: 600; font-size: 12px; color: white !important"
              @click="e1 = 3"
              text
            >
              Vorige
            </v-btn>
            <v-btn
              style="
                font-weight: 600;
                font-size: 12px;
                color: #2ba9e1 !important;
                float: right !important;
              "
              color="primary"
              @click="e1 = 5"
            >
              Continue
            </v-btn>
          </v-stepper-content>

          <v-stepper-content step="5">
            <v-card
              class="mb-12"
              color="grey lighten-1"
              height="200px"
              style="background-color: #2ba9e1; box-shadow: none"
            >
              <div class="form-group">
                <h3
                  style="
                    color: white;
                    text-align: center !important;
                    margin: 0 auto 1em;
                  "
                >
                  Beschrijf jezelf in een woord
                </h3>
                <input
                  id="title"
                  type="text"
                  placeholder="Tekst..."
                  class="form-control"
                  v-model="formData.title"
                />
                <!--
                <v-row cols="12" style="border-radius:8px;margin-top: 0.5em; background-color: white;overflow: auto;max-height: 83px;" v-if="colorsArray.length > 0">
                 <v-col cols="3" v-for="(color, index) in colorsArray" :key="index" style="display:flex;">
                   <input style="margin:auto 2px;" v-if="index == 0 || index == 4 || index == 8 || index == 12" type="radio" :id="index" name="color" :value="index">
                   <v-col class="colors" :id="'color' + index" :ref="'color' + index">
 
                   </v-col>
                 </v-col>
                </v-row>
                -->
                <!-- <div class="invalid-feedback" v-show="formData.errors.has('title')" v-text="formData.errors.get('title')"></div>-->
              </div>
            </v-card>

            <v-btn
              style="font-weight: 600; font-size: 12px; color: white !important"
              @click="e1 = 4"
              text
            >
              Vorige
            </v-btn>
            <v-btn
              style="
                font-weight: 600;
                font-size: 12px;
                color: #2ba9e1 !important;
                float: right !important;
              "
              color="primary"
              @click="e1 = 6"
            >
              Continue
            </v-btn>
          </v-stepper-content>

          <v-stepper-content step="6">
            <v-card
              class="mb-12"
              color="grey lighten-1"
              height="200px"
              style="background-color: #2ba9e1; box-shadow: none"
            >
              <div class="form-group">
                <h3
                  style="
                    color: white;
                    text-align: center !important;
                    margin: 0 auto 1em;
                  "
                >
                  Schrijf een quote die je leuk vindt en die jezelf beschrijft
                </h3>
                <input
                  id="shortDesc"
                  type="text"
                  placeholder="Tekst..."
                  class="form-control"
                  v-model="formData.shortdescription"
                />
                <!-- <div class="invalid-feedback" v-show="formData.errors.has('shortdesc')" v-text="formData.errors.get('shortdesc')"></div>-->
              </div>
            </v-card>

            <v-btn
              style="font-weight: 600; font-size: 12px; color: white !important"
              @click="e1 = 5"
              text
            >
              Vorige
            </v-btn>
            <v-btn
              style="
                font-weight: 600;
                font-size: 12px;
                color: #2ba9e1 !important;
                float: right !important;
              "
              color="primary"
              @click="e1 = 7"
            >
              Continue
            </v-btn>
          </v-stepper-content>

          <v-stepper-content step="7">
            <v-card
              color="grey lighten-1"
              height="400px"
              style="background-color: #2ba9e1; box-shadow: none"
            >
              <div class="form-group">
                <h3
                  style="
                    color: white;
                    text-align: center !important;
                    margin: 0 auto 1em;
                  "
                >
                  Kies een profielfoto
                </h3>
                <input
                  id="profileimg"
                  type="file"
                  accept="image/*"
                  style="display: none"
                  class="form-control"
                  @change="previewImage"
                />

                <label for="profileimg" style="display: block; cursor:pointer;">
                  <img
                    :src="profilePhotoPreview"
                    alt="preview"
                    style="
                      display: block;
                      margin-left: auto;
                      margin-right: auto;
                      width: 50%;
                      border-radius: 5%;
                      max-width: 250px;
                    "
                  />
                </label>
              </div>
            </v-card>

            <p style="color:white;text-align:right;">
              Progress: {{ uploadValue.toFixed() }} %
            </p>
            <v-btn
              style="font-weight: 600; font-size: 12px; color: white !important"
              @click="e1 = 6"
              text
            >
              Vorige
            </v-btn>
            <v-btn
              style="
                font-weight: 600;
                font-size: 12px;
                color: #2ba9e1 !important;
                float: right !important;
              "
              color="primary"
              @click="savaAndContinue"
            >
              <!--                Continue-->
              save and continue
            </v-btn>
          </v-stepper-content>

          <v-stepper-content step="8">
            <v-card
          
              color="grey lighten-1"
              height="400px"
              style="background-color: #2ba9e1; box-shadow: none"            >
              <div class="form-group">
                <h3
                  style="
                    color: white;
                    text-align: center !important;
                    margin: 0 auto 1em;
                  "
                >
                  Kies verschillende afbeeldingen dat je op jouw portfolio wil
                  laten tonen
                </h3>
                <label
                  for="otherImages"
                  style="display: block; margin-left: auto; padding: 1.5em; margin-right: auto; border-radius: 7px; cursor: pointer;"
                  class="text-center btn-nav"
                >
                  add images ( {{ otherPhotoPreview.length }} )
                </label>

                <input
                  id="otherImages"
                  type="file"
                  style="display: none"
                  @change="previewOtherImages"
                  multiple
                />
                <div v-if="otherPhotoPreview.length != 0">
                  <v-row style="max-height: 200px;overflow: auto;">
                    <v-col 
                      style="padding:0.2em !important"
                      v-for="photo in otherPhotoPreview" 
                      :key="photo.id">
                        <img
                        :src="photo.url"
                        alt="preview"
                        style="max-height: 100px;"
                        />
                    </v-col>
                  </v-row>
                </div>
              </div>
            </v-card>
            <p style="color:white;text-align:right;">
              Progress:({{numberOfUploaded}}/{{ otherPhotoPreview.length}} ) {{ uploadValue.toFixed() }} %
            </p>
            <v-btn
              style="font-weight: 600; font-size: 12px; color: white !important"
              @click="e1 = 7"
              text
            >
              Vorige
            </v-btn>
            <v-btn
              style="
                font-weight: 600;
                font-size: 12px;
                color: #2ba9e1 !important;
                float: right !important;
              "
              color="primary"
              @click="uploadOtherPic"
            >
              save and Continue
            </v-btn>
          </v-stepper-content>

          <v-stepper-content step="9">
            <v-card
              class="mb-12"
              color="grey lighten-1"
              height="200px"
              style="background-color: #2ba9e1; box-shadow: none"
            >
              <div class="form-group">
                <h3
                  style="
                    color: white;
                    text-align: center !important;
                    margin: 0 auto 1em;
                  "
                >
                  Stel je kort voor
                </h3>
                <v-textarea
                  background-color="#fff"
                  v-model="formData.description"
                  color="#2BA9E1"
                  filled
                  no-resize
                  label=""
                  rows="3"
                  row-height="30"
                  shaped
                ></v-textarea>
              </div>
            </v-card>

            <v-btn
              style="font-weight: 600; font-size: 12px; color: white !important"
              @click="e1 = 8"
              text
            >
              Vorige
            </v-btn>

            <v-btn
              style="
                font-weight: 600;
                font-size: 12px;
                color: #2ba9e1 !important;
                float: right !important;
              "
              type="submit"
              color="primary"
            >
              Create my portfolio
            </v-btn>
          </v-stepper-content>
        </v-stepper-items>
      </v-stepper>
    </form>
    <!---------------->
  </div>
</template>

<script>
import axios from "axios";
import firebase from "firebase";

export default {
  props: [
    'colors',
  ],
  data() {
    return {
      colorsArray: [],
      hoverOnPp: true,
      e1: 1,
      step: 1,
      totalsteps: 3,
      formData: {},
      photoFormData: {},
      authUser: window.authUser,
      profilePhotoPreview: "https://via.placeholder.com/728x728.png?text=Add+Photo",
      profilePhoto: "",
      imageData: null,
      uploadValue: 0,
      otherPhoto: [],
      otherPhotoPreview: [],
      otherImagesData: [],
      picNumbers: null,
      numberOfUploaded:0
    };
  },
  mounted() {
    let i = 0;
    Object.keys(this.$refs).forEach(el => {
      this.$refs[el][0].style.backgroundColor = `#${this.colorsArray[i]}`;
      i++;
    });
  },
  async created() {
   
    let colorsNew = [];
    const colorsParse = JSON.parse(this.colors);
    colorsParse.forEach(function(e,i){
      colorsNew.push(e.color1);
      colorsNew.push(e.color2);
      colorsNew.push(e.color3);
      colorsNew.push(e.color4);
    }); 
    this.colorsArray = colorsNew;
  },
  methods: {
    submitWizard() {
      axios
        .patch(
          `http://127.0.0.1:8000/api/wizard/${this.authUser.id}`,
          this.formData
        )
        .then((response) => {
          console.log(`response is ---- ${response.data["status"]}`);
          if (response.data["status"] === true) {
            window.location.href = `/wizard/second/${this.authUser.id}`;
          }
        })
        .catch((error) => console.log(`error is ---- ${error}`));

         this.otherPhoto.forEach((element)=>{
           this.photoFormData.url = element.url;
           this.photoFormData.user_id = this.authUser.id;
          this.submitOtherPhotos();
        })
    },
    nextStep() {
      this.step++;
    },
    prevStep() {
      this.step--;
    },
    async savaAndContinue() {
      await this.uploadProfileImage();
    },
    submitOtherPhotos(){
            axios
        .post(
          `http://127.0.0.1:8000/api/wizard/otherPhoto`,
          this.photoFormData
        )
        .then((response) => {
          console.log(`response is ---- ${response.data["status"]}`);
          if (response.data["status"] === true) {
           
          }
        })
        .catch((error) => console.log(`error is ---- ${error}`));
    },
    async uploadProfileImage() {
      const storageRef = firebase
        .storage()
        .ref(`${this.imageData.name}`)
        .put(this.imageData);
      storageRef.on(
        `state_changed`,
        (snapshot) => {
          this.uploadValue =
            (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
        },
        (error) => {
          this.profilePhoto =
            "https://via.placeholder.com/728x728.png?text=Add+Photo";
          console.log(error.message);
        },
        () => {
          this.uploadValue = 100;
          storageRef.snapshot.ref.getDownloadURL().then((url) => {

            this.formData.profileimg = url;
            setTimeout(() => {
              this.e1 = 8;
            }, 2000);
          });
        }
      );
    },

    async uploadOthers(imageData, indexId) {
      this.uploadValue = 0;
      const storageRef = firebase
        .storage()
        .ref(`${imageData.name}`)
        .put(imageData);
      storageRef.on(
        `state_changed`,
        (snapshot) => {
          this.uploadValue =
            (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
        },
        (error) => {
          console.log(error.message);
        },
        () => {
          this.uploadValue = 100;
          this.numberOfUploaded++;
          storageRef.snapshot.ref.getDownloadURL().then((url) => {
            var photoObject = {};
            photoObject.id = indexId;
            photoObject.url = url;
            this.otherPhoto.push(photoObject);
       
          });
        }
      );
    },

    previewImage(event) {
      
      this.profilePhotoPreview = URL.createObjectURL(event.target.files[0]);
      this.imageData = event.target.files[0];
    },
    previewOtherImages(event) {     
      var id = 1;
      Array.from(event.target.files).forEach((imageData) => {
        this.otherImagesData.push(imageData); // for database
        
        var photoPreviewObject = {};
        photoPreviewObject.id = id++;
        photoPreviewObject.url = URL.createObjectURL(imageData);
        this.otherPhotoPreview.push(photoPreviewObject);
      });

      this.picNumbers = event.target.files.length;
    },
    uploadOtherPic() {
     
      var index = 1;
      this.otherImagesData.forEach((element) => {
        this.uploadOthers(element, index++);
      });   
        setTimeout(() => {
              this.e1 = 9;
        }, 2000);
    },
  },
};
</script>

<style scoped>
.btn-nav {
  display: block;
  background: #e7f0f3;
  max-width: 200px;
}
.btn-nav:hover {
  background: #bdedfd;
}
.colors{
  width: 30px;
  height: 30px;
}
</style>
