<template>
  <div style="overflow:hidden;">
    <div style="position:relative">
      <div class="second-bgcolor">
      </div>
      {{colors}}
      <v-stepper
        v-model="e6"
        vertical
      >
      <!-- STEP 1 -->
        <form
            method="POST"
            enctype="multipart/form-data"
            @submit.prevent="submitUser"
            style=""
          >
        <v-stepper-step
          color="#2BA9E1"
          class="second-v-stepper-step"
          :complete="e6 > 1"
          step="1"
        >
        <div style="margin-left:1em;">
          <h4 class="second-title">Kleurenpalet</h4>
          <small>Gegenereerd aan de hand van uw profielfoto.</small>
        </div>
        </v-stepper-step>
        <v-stepper-content step="1">
          <v-card
            style="box-shadow: none;"
            color="grey lighten-1"
            class="mb-12"
            height="200px"
          >
            <input
              style="display:none;"
              type="text"
              class="form-control"
              v-model="userData.category"
            />
            <v-row cols="12" style="border-radius:8px;margin-top: 0.5em; background-color: white;">
              <h4 style="margin:1em;text-align:center;font-size:100%;width:100%;">MyWay heeft automatisch een kleurenpalet gegenereerd, alleen voor jou.<br> Je kunt de kleuren later nog aanpassen, maar we raden je aan om er eerst eens naar te kijken.</h4>
              <div style="display:flex;margin: 20px auto;height: 140px;">
                 <div :class="'palette color'+index" v-for="(element, index) in colorsArray" :key="index" :style="'background-color:#'+element">

                 </div>
              </div>
            </v-row>
          </v-card>
          <v-btn
            type="submit"
            class="second-continue"
            style="float:right;"
            color="#666666"
            @click="e6 = 2"
          >
            Continue
          </v-btn>
        </v-stepper-content>
        </form>
        <v-divider style="margin:0 3em;"></v-divider>

              <!-- STEP 2 -->
        <v-stepper-step
          color="#2BA9E1"
          class="second-v-stepper-step"
          :complete="e6 > 2"
          step="2"
        >
        <div style="margin-left:1em;">
          <h4 class="second-title">Sociale media</h4>
          <small>Koppel uw sociale media.</small>
        </div>
        </v-stepper-step>
        <form
            method="POST"
            enctype="multipart/form-data"
            @submit.prevent="submitSocialMedia"
            style=""
          >
        <v-stepper-content step="2">
          <v-card
            style="box-shadow: none;"
            color="grey lighten-1"
            class="mb-12"
            height="200px"
          >
          <v-row cols="12">
            <v-col class="second-input" style="width: 100%;margin-bottom: 10px;" cols="4">
              <i class="fab fa-facebook-f login-input-icon"></i>
              <input
                type="text"
                class="form-control"
                placeholder="Facebook Url..."
                v-model="formData.facebook"
              />
            </v-col>
            <v-col class="second-input" style="width: 100%;margin-bottom: 10px;" cols="4">
              <i class="fab fa-instagram login-input-icon"></i>
              <input
                type="text"
                class="form-control"
                placeholder="Instagram Url..."
                v-model="formData.instagram"
              />
            </v-col>
            <v-col class="second-input" style="width: 100%;margin-bottom: 10px;" cols="4">
              <i class="fab fa-pinterest-p login-input-icon"></i>
              <input
                type="text"
                class="form-control"
                placeholder="Pinterest Url..."
                v-model="formData.pinterest"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col class="second-input" style="width: 100%;margin-bottom: 10px;" cols="4">
              <i class="fab fa-linkedin-in login-input-icon"></i>
              <input
                type="text"
                class="form-control"
                placeholder="Linkedin Url..."
                v-model="formData.linkedin"
              />
            </v-col>
            <v-col class="second-input" style="width: 100%;margin-bottom: 10px;" cols="4">
              <i class="fab fa-twitter login-input-icon"></i>
              <input
                type="text"
                class="form-control"
                placeholder="Twitter Url..."
                v-model="formData.twitter"
              />
            </v-col>
            <v-col class="second-input" style="width: 100%;margin-bottom: 10px;" cols="4">
              <i class="fas fa-users login-input-icon"></i>
              <input
                type="text"
                class="form-control"
                placeholder="Andere social media Url..."
                v-model="formData.other"
              />
            </v-col>
          </v-row>
          </v-card>
          <v-btn
            type="submit"
            class="second-continue"
            style="float:right;"
            color="666666"
            @click="e6 = 3"
          >
            Continue
          </v-btn>
          <v-btn  @click="e6 = 1" text>
            Cancel
          </v-btn>
        </v-stepper-content>
        </form>
        <v-divider style="margin:0 3em;"></v-divider>
        <!-- STEP 3 -->

          <v-stepper-step
            color="#2BA9E1"
            class="second-v-stepper-step"
            :complete="e6 > 3"
            step="3"
          >
          <div style="margin-left:1em;">
            <h4 class="second-title">Projecten</h4>
            <small>Voeg uw eerdere projecten toe.</small>
          </div>
          </v-stepper-step>
          <v-stepper-content step="3">
            <v-card
              style="box-shadow: none;min-height:200px;"
              color="grey lighten-1"
              class="mb-12"
            >
              <v-row cols="12" style="margin:0 !important;" justify="center">
                <v-dialog
                  v-model="dialog"
                  persistent
                  max-width="600px"
                >
                  <template v-slot:activator="{ on, attrs }">
                    <v-col>
                      <v-btn
                        color="primary"
                        dark
                        v-bind="attrs"
                        v-on="on"
                      >
                      <i style="margin-right:0.5em;" class="fas fa-plus-circle"></i>
                        Add project
                      </v-btn>
                    </v-col>
                  </template>
                  <div ref=""></div>
                  <v-card>
                    <v-card-title>
                      <span class="headline">Project details</span>
                    </v-card-title>
                    <v-card-title style="padding-top: 0;margin-top: -0.5em;">
                      <p style="font-size:12px;line-height: 140%;">Voeg een project toe dat je in je portfolio wilt demonstreren. 
                        Je kunt een YouTube-videolink of een website-url toevoegen, maak je geen zorgen, 
                        onze website is slim genoeg om te herkennen welke het is.</p>
                    </v-card-title>
                    <form
                      ref="form"
                      method="POST"
                      enctype="multipart/form-data"
                      @submit.prevent="submitProject"
                      style=""
                    >
                      <v-card-text>
                        <v-container>
                          <v-row>
                            <v-col
                              cols="12"
                              sm="6"
                              md="6"
                            >
                              <v-text-field
                                value=""
                                color="#2ba9e1"
                                autocomplete="false"
                                label="Projectnaam*"
                                required
                                v-model="projectData.projectnaam"
                              ></v-text-field>
                            </v-col>
                            <v-col
                              cols="12"
                              sm="6"
                              md="6"
                            >
                              <v-text-field
                                color="#2ba9e1"
                                autocomplete="false"
                                label="Werkduur"
                                v-model="projectData.werkduur"
                              ></v-text-field>
                            </v-col>
                            <v-col cols="12">
                              <v-textarea
                                color="#2ba9e1"
                                name="input-7-1"
                                autocomplete="false"
                                label="Beschrijving project"
                                required
                                v-model="projectData.beschrijving"
                              ></v-textarea>
                            </v-col>
                            <v-col cols="12">
                              <v-text-field
                                color="#2ba9e1"
                                autocomplete="false"
                                label="Project Url*"
                                type="text"
                                required
                                v-model="projectData.url"
                              ></v-text-field>
                            </v-col>
                          </v-row>
                        </v-container>
                        <small>*indicates required field</small>
                      </v-card-text>
                      <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                          color="blue darken-1"
                          text
                          @click="dialog = false"
                        >
                          Close
                        </v-btn>
                        <v-btn
                          type="submit"
                          style="background-color:#2ba9e1 !important;color:white !important;"
                          text
                          @click="dialog = false"
                        >
                          Save
                        </v-btn>
                      </v-card-actions>
                    </form>
                  </v-card>
                </v-dialog>
              </v-row>
              <v-row>
                <v-col cols="12">
                  <v-col>
                  <h4>Totaal projecten</h4>
                  <h1 ref="projectArrayLengthRef">{{projectsArrayLength}}</h1>
                  </v-col>
                  <v-col cols="4" v-for="(project, index) in projectsArray" :key="index" style="float:left;display:none;">
                    <a target="_blank" style="text-decoration: none;color: black;font-weight: 500;" v-if="project.url" :href="project.url">
                      <v-card class="project-card">
                        <p style="margin:1em 0;text-align:center;" v-if="project.projectnaam">{{project.projectnaam}}</p>
                        <p style="margin: 1em 2em 1em 1em;font-size:12x;overflow: hidden;max-width: 30ch;text-overflow: ellipsis;white-space: nowrap;" 
                           v-if="project.beschrijving">
                          {{project.beschrijving}}
                        </p>
                        <small style="text-align:right; margin: 1em;" v-if="project.werkduur">{{project.werkduur}}</small>
                      </v-card>
                    </a>
                  </v-col>
                </v-col>
              </v-row>
            </v-card>
          <v-btn  @click="e6 = 2" text>
            Cancel
          </v-btn>
            <v-btn
              class="second-continue"
              style="float:right;"
              color="#666666"
              @click="e6 = 4"
            >
              Continue
            </v-btn>
          </v-stepper-content>
        <!-- STEP 4 -->
        <v-divider style="margin:0 3em;"></v-divider>

        <v-stepper-step
          color="#2BA9E1"
          class="second-v-stepper-step"
          :complete="e6 > 4"
          step="4"
        >
        <div style="margin-left:1em;">
          <h4 class="second-title">Genereer portfolio</h4>
          <small>Voltooi en verzend het formulier.</small>
        </div>
        </v-stepper-step>

        <v-stepper-content step="4">
          <v-card
            style="box-shadow: none;"
            color="grey lighten-1"
            class="mb-12"
          >
            <v-row cols="12" style="border-radius:8px;margin-top: 0; background-color: white;">
              <h4 style="margin:1em;text-align:center;font-size:100%;width:100%;">
                <span style="text-transform:capitalize;">{{authUser.fname}} {{authUser.lname}}</span> uw portfolio wordt gegenereerd zodra u op de knop <span style="font-weight:600;">portfolio genereren</span> drukt.<br>
                Je ontvangt een proefversie 5 dagen, deze verloopt op: 
                <span style="font-weight: 600;font-size: 110%;margin-top:1em;">{{expirationDate}}</span>.
              </h4>
              <v-row cols="12" style="max-width:100%;">
                <img style="max-width:30%;margin:auto;text-align:center;" src="/images/calendar.gif">
              </v-row>
            </v-row>
          </v-card>
          <v-btn
            type="submit"
            class="second-continue"
            style="float:right;"
            color="666666"
            @click.prevent="goToPortfolio"
          >
            Portfolio Genereren
          </v-btn>
          <v-btn  @click="e6 = 3" text>
            Cancel
          </v-btn>
        </v-stepper-content>
      </v-stepper>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: [
    'colors',
  ],
  data() {
    return {
      expirationDate: null,
      refs: null,
      dialog: false,
      e6: 1,
      userData: {},
      formData: {},
      projectData: {
        projectnaam: null,
        werkduur: null,
        beschrijving: null,
        url: null,
      },
      colorsArray: [],
      projectsArray: [],
      projectsArrayLength: 0,
      step: 1,
      totalsteps: 3,
      authUser: window.authUser,
    };
  },
  mounted() {
    this.getDate();
    /*Object.keys(this.$refs).forEach(el => {
      console.log(this.$refs[el]);
      this.$refs.el.style.backgroundColor = `#${this.colorsArray[i]}`;
      i++;
    });*/
    this.refs = this.$refs;
  },
  async created() {
    this.colorsToArray();
    //console.log(this.increase_brightness('#000000', 50));
   
  },
  methods: {
    submitSocialMedia() {
      this.formData.user_id = this.authUser.id;
        axios
        .post(
          `http://127.0.0.1:8000/api/second/socialMedia`,
          this.formData
        )
        .then((response) => {
          console.log(`response is ---- ${response.data["status"]}`);
          if (response.data["status"] === true) {
           
          }
        })
        .catch((error) => console.log(`error is ---- ${error}`));
    },
    submitUser() {
      this.userData.imgColors = this.colorsArray;
      axios
        .patch(
          `http://127.0.0.1:8000/api/wizard/${this.authUser.id}`,
          this.userData
        )
        .then((response) => {
          console.log(`response is ---- ${response.data["status"]}`);
          if (response.data["status"] === true) {
            console.log('user updated');
            //window.location.href = `/wizard/second/${this.authUser.id}`;
          }
        })
      .catch((error) => console.log(`error is ---- ${error}`));
    },
    submitProject() {
      this.projectData.user_id = this.authUser.id;
        axios
        .post(
          `http://127.0.0.1:8000/api/second/projects`,
          this.projectData
        )
        .then((response) => {
          console.log(`response is ---- ${response.data["status"]}`);
          if (response.data["status"] === true) {
           console.log('projectData saved');
          }
        })
        .catch((error) => console.log(`error is ---- ${error}`));
        this.projectsArray.push(this.projectData);
        this.projectsArrayLength++;
    },
    nextStep() {
      this.step++;
    },
    prevStep() {
      this.step--;
    },
    goToPortfolio() {
      window.location.href = `/portfolio/${this.authUser.id}`;
    },
    async colorsToArray() {
      let e;
      let self = this;
      let colorsArray= [];
      let colorsNew= JSON.parse(this.colors);

      if(colorsNew.length >= 4){
        
        e = self.increase_brightness(colorsNew[0], 0);
        colorsArray.push(e);
        e = self.increase_brightness(e, 25);
        colorsArray.push(e);
        e = self.increase_brightness(e, 50);
        colorsArray.push(e);
        e = self.increase_brightness(colorsNew[3], 1);
        colorsArray.push(e);
      }

      this.colorsArray = colorsArray;
    },
    increase_brightness(hex, percent) {
      hex = hex.replace(/^\s*#|\s*$/g, '');

      if(hex.length == 3){
          hex = hex.replace(/(.)/g, '$1$1');
      }

      var r = parseInt(hex.substr(0, 2), 16),
          g = parseInt(hex.substr(2, 2), 16),
          b = parseInt(hex.substr(4, 2), 16);

      if(r <= 80 && g <= 80 && b <= 80){
        r = r+20;
        g = g+20;
        b = b+20;
      };
      if(percent == 1){
        r = r-10;
        g = g-10;
        b = b-10;

        if(r <= 80 || g <= 80 | b <= 80){
          r = r+10;
          g = g+10;
          b = b+10;
        }
      };
      return ((0|(1<<8) + r + (256 - r) * percent / 100).toString(16)).substr(1) +
         ((0|(1<<8) + g + (256 - g) * percent / 100).toString(16)).substr(1) +
         ((0|(1<<8) + b + (256 - b) * percent / 100).toString(16)).substr(1);
    },
    getDate() {
      let currentDate = new Date();
      //alert(currentDate);
      currentDate.setDate(currentDate.getDate() + 5); 
      this.expirationDate = currentDate.getDate()+"/"+(currentDate.getMonth() + 1)+"/"+currentDate.getFullYear();
    }
  }
};
</script>

<style scoped>
.second-title{
    font-size:19px !important;
}
.second-bgcolor{
    height: 200%;
    position: fixed;
    margin-top: -13em;
    margin-left: -25em !important;
    width: 350% !important;
    background-color: #2ba9e1;
}
.second-continue{
    background-color: #2ba9e1 !important;
    border-color: #2ba9e1 !important;
    float: right;
    color: white !important;
}
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
.palette{
  width:140px;
  transition:0.5s;
}
.palette:hover{
  width:160px;
}
.second-input input{
  margin: auto;
  /**width: 70%;**/
  font-weight: 500;
  padding: 10px;
  text-indent: 8%;
  text-align: left;
  margin: auto;
}
.login-input-icon{
  position: absolute;
  padding: 11px;
  /**left: 15%;**/
  color: #7a7a7a;
}
.v-label--active{
  left: -20px !important;
}
.project-card{
  padding:1em;
  box-shadow:0 1px 4px 0 rgb(0 0 0 / 9%), 0 1px 4px 0 rgb(0 0 0 / 9%), 0 1px 4px 0 rgb(0 0 0 / 9%);
}
</style>
