<template>
      <v-navigation-drawer
        style="position: fixed;z-index:99;"
        permanent
        expand-on-hover
      >
        <!---->
        <v-list>
          <v-list-item class="px-2">
            <v-list-item-avatar>
              <v-img :src="user.profileimg"></v-img>
            </v-list-item-avatar>
          </v-list-item>

          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="text-h6">
                {{user.fname+' '+ user.lname}}
              </v-list-item-title>
              <v-list-item-subtitle>{{user.email}}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list>

        <v-row cols="12">
            <v-col cols="12">
            <v-btn :click="copyUrl()" style="background-color:white !important;box-shadow: none !important;margin-left:1em;">
              Kopieer portfolio URL
            </v-btn>
          </v-col>
        </v-row>
        
        <v-divider></v-divider>

        <v-list
          v-if="user"
          nav
          dense
        >
          <template>
            <v-expansion-panels style="overflow:hidden;" focusable>
              <v-expansion-panel>
                <v-expansion-panel-header style="overflow:hidden"> <v-icon style="margin-left:-0.6em;margin-right:1.5em;font-size:15px;">fas fa-user-cog small</v-icon><p >Persoonlijke gegevens</p></v-expansion-panel-header>
                <v-expansion-panel-content>
                    <template>
                          <form method="POST" enctype="multipart/form-data" @submit.prevent="submitPersonalData">
                              <v-text-field
                                v-model="personalData.fname"
                                label="Voornaam"
                                required
                              ></v-text-field>
                              <v-text-field
                                v-model="personalData.lname"
                                label="Achternaam"
                                required
                              ></v-text-field>
                              <v-text-field
                                v-model="personalData.age"
                                label="Leeftijd"
                                type="number"
                                required
                              ></v-text-field>
                              <v-text-field
                                v-model="personalData.category"
                                label="Werkgebied"
                                type="text"
                                required
                              ></v-text-field>
                              <v-text-field
                                v-model="personalData.specialization"
                                label="Specialisatie"
                                type="text"
                                required
                              ></v-text-field>
                            <v-btn
                              class="mr-4"
                              type="submit"
                              style="width:100%;background-color:white;overflow-x:hidden;"
                            >
                              Gegevens opslaan
                            </v-btn>
                          </form>
                    </template>
                </v-expansion-panel-content>
              </v-expansion-panel>

              <v-expansion-panel>
                <v-expansion-panel-header style="overflow:hidden"> <v-icon style="margin-left:-0.6em;margin-right:1.5em;font-size:15px;">fas fa-info small</v-icon><p>Account<br> informatie</p></v-expansion-panel-header>
                <v-expansion-panel-content>
                    <template>
                          <form method="POST" enctype="multipart/form-data" @submit.prevent="submitAccountData">
                              <v-select
                                :items="items"
                                label="Emoties"
                                v-model="accountData.emotions"
                              ></v-select>
                              <v-text-field
                                v-model="accountData.title"
                                label="Zelfbeschrijvings woord"
                                required
                              ></v-text-field>
                              <v-text-field
                                v-model="accountData.shortdescription"
                                label="Korte beschrijving"
                                required
                              ></v-text-field>
                              <v-textarea
                                v-model="accountData.description"
                                label="Lange beschrijving"
                                type="text"                               
                                no-resize
                                rows="3"
                                row-height="30"
                                required
                              ></v-textarea>
                              <div id="app">
                                  <small style="text-align:center;margin:1em 0 0.5em;">Kleurenpalet</small>
                                <v-app id="inspire">
                                  <v-row >
                                      <p style="margin-top:1.5em">Kleur 1</p>
                              			<v-text-field style="margin-left:-0.5em !important;" v-model="accountData.imgColors[0]" hide-details class="ma-0 pa-0" >
                              				<template v-slot:append>
                              					<v-color-picker class="ma-2" style="cursor:auto !important;max-width: 189px !important;" mode="hexa" v-model="accountData.imgColors[0]" />
                              				</template>
                              			</v-text-field>
                              		</v-row>
                                      
                                  <v-row >
                                      <p style="margin-top:1.5em">Kleur 2</p>
                              			<v-text-field style="margin-left:-0.5em !important;" v-model="accountData.imgColors[1]" hide-details class="ma-0 pa-0" >
                              				<template v-slot:append>
                              					<v-color-picker class="ma-2" style="cursor:auto !important;" mode="hexa" v-model="accountData.imgColors[1]" />
                              				</template>
                              			</v-text-field>
                              		</v-row>
                                      
                                  <v-row >
                                      <p style="margin-top:1.5em">Kleur 3</p>
                              			<v-text-field style="margin-left:-0.5em !important;" v-model="accountData.imgColors[2]" hide-details class="ma-0 pa-0" >
                              				<template v-slot:append>
                              					<v-color-picker class="ma-2" style="cursor:auto !important;" mode="hexa" v-model="accountData.imgColors[2]" />
                              				</template>
                              			</v-text-field>
                              		</v-row>
                                      
                                  <v-row >
                                      <p style="margin-top:1.5em">Kleur 4</p>
                              			<v-text-field style="margin-left:-0.5em !important;" v-model="accountData.imgColors[3]" hide-details class="ma-0 pa-0" >
                              				<template v-slot:append>
                              					<v-color-picker class="ma-2" style="cursor:auto !important;" mode="hexa" v-model="accountData.imgColors[3]" />
                              				</template>
                              			</v-text-field>
                              		</v-row>
                                </v-app>
                              </div>
                            <v-btn
                              class="mr-4"
                              type="submit"
                              style="width:100%;background-color:white;margin-top:2.5em;overflow-x:hidden;"
                            >
                              Gegevens opslaan
                            </v-btn>
                          </form>
                    </template>
              </v-expansion-panel-content>
              </v-expansion-panel>

              <v-expansion-panel>
                <v-expansion-panel-header style="overflow:hidden"> <v-icon style="margin-left:-0.6em;margin-right:1.5em;font-size:15px;">fas fa-hashtag small</v-icon><p>Social media</p></v-expansion-panel-header>
                <v-expansion-panel-content>
                  
                    <template>
                          <form method="POST" enctype="multipart/form-data" @submit.prevent="submitSocialData">
                              <v-text-field
                                v-model="socialData.facebook"
                                label="Facebook"
                                required
                              ></v-text-field>
                              <v-text-field
                                v-model="socialData.instagram"
                                label="Instagram"
                                required
                              ></v-text-field>
                              <v-text-field
                                v-model="socialData.pinterest"
                                label="Pinterest"
                                type="text"
                                required
                              ></v-text-field>
                              <v-text-field
                                v-model="socialData.linkedin"
                                label="Linkedin"
                                type="text"
                                required
                              ></v-text-field>
                              <v-text-field
                                v-model="socialData.twitter"
                                label="Twitter"
                                type="text"
                                required
                              ></v-text-field>
                              <v-text-field
                                v-model="socialData.other"
                                label="Other"
                                type="text"
                                required
                              ></v-text-field>
                            <v-btn
                              class="mr-4"
                              type="submit"
                              style="width:100%;background-color:white;overflow-x:hidden;"
                            >
                              Gegevens opslaan
                            </v-btn>
                          </form>
                    </template>
                </v-expansion-panel-content>
              </v-expansion-panel>
              
              <v-expansion-panel>
                <v-expansion-panel-header style="overflow:hidden"> <v-icon style="margin-left:-0.6em;margin-right:1.5em;font-size:15px;">fas fa-file-contract small</v-icon><p>Projecten</p></v-expansion-panel-header>
                <v-expansion-panel-content>
                   <template v-if="projectData && projectData.length > 0">
                      <form method="POST" enctype="multipart/form-data" @submit.prevent="submitProjectData" style="margin-top:1.5em;">
                      <div v-for="(project, index) in projectData" :key="index">
                          <p style="font-weight:600">Project {{index + 1}}</p>
                          <v-text-field
                            v-model="project.projectnaam"
                            label="Projectnaam"
                            required
                          ></v-text-field>
                          <v-text-field
                            v-model="project.werkduur"
                            label="Werkduur"
                            required
                          ></v-text-field>
                          <v-text-field
                            v-model="project.beschrijving"
                            label="Project beschrijving"
                            type="text"
                            required
                          ></v-text-field>
                          <v-text-field
                            v-model="project.url"
                            label="Project url"
                            type="text"
                            required
                          ></v-text-field>
                      </div>
                        <v-btn
                          class="mr-4"
                          type="submit"
                          style="width:100%;background-color:white;overflow-x:hidden;"
                        >
                          Gegevens opslaan
                        </v-btn>
                      </form>
                   </template>
                </v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>
          </template>
        </v-list>
      </v-navigation-drawer>
</template>

<script >
import axios from "axios";
import {TheMask} from 'vue-the-mask';

    export default {
        components: {TheMask},
        props: [
            'user',
        ],
        data() {
            return {
                items: [ 'respectabel','betrouwbaar' , 'autoriteit', 'schoon', 'modern', 'modieus', 'creatief', 'vriendelijk', 'gedurfd', 'krachtig'],
                dialog: false,
                color: '#1976D2FF',
		            mask: '!#XXXXXXXX',
		            menu: false,
                personalData: {
                    fname: this.user.fname,
                    lname: this.user.lname,
                    age: this.user.age,
                    category: this.user.category,
                    specialization: this.user.specialization,
                },
                accountData: {
                    emotions: this.user.emotions,
                    title: this.user.title,
                    shortdescription: this.user.shortdescription,
                    description: this.user.description,
                    imgColors: this.user.imgColors,
                },
                socialData: {
                    user_id : this.user.id,
                    facebook: this.user.socialMedia.facebook,
                    instagram: this.user.socialMedia.instagram,
                    pinterest: this.user.socialMedia.pinterest,
                    linkedin: this.user.socialMedia.linkedin,
                    twitter: this.user.socialMedia.twitter,
                    other: this.user.socialMedia.other,
                },
                projectData: this.user.project,
                borderBox: false,
                isloaded: null,
                styleObject: {
                    background: 'black',
                }, //this.user.imgColors[this.colorDarkNumber]
                colorDark: false,
                secondIndex: 3,
                colorDarkNumber: 0,
                colorLight: false,
                colorLightNumber: 0,
                User: null,
                editor: null,
                profileImg: null,
            }
        },
        async mounted() {
            this.user.imgColors.forEach((element, index) => {
                let r = parseInt(element.substr(0, 2), 16),
                    g = parseInt(element.substr(2, 2), 16),
                    b = parseInt(element.substr(4, 2), 16);

                if (r <= 90 && g <= 90 && b <= 90) {
                    this.colorDark = true;
                    this.colorDarkNumber = index;
                };
                if (r >= 180 && g >= 180 && b >= 180) {
                    this.colorLight = true;
                    this.colorLightNumber = index;
                };
            });

            this.isloaded = true;
        },
        methods: {
            submitPersonalData() {
                axios
                  .patch(
                    `http://127.0.0.1:8000/api/wizard/${this.user.id}`,
                    this.personalData
                  )
                  .then((response) => {
                    console.log(`response is ---- ${response.data["status"]}`);
                    if (response.data["status"] === true) {
                    }
                  })
                  .catch((error) => console.log(`error is ---- ${error}`));
                  window.location.reload();
            },
            submitAccountData() {
                this.accountData.imgColors.forEach((element, index) => {
                    let arrayColor = element.replace(/^\s*#|\s*$/g, '');
                    this.accountData.imgColors[index] = arrayColor;
                });
  
                axios
                  .patch(
                    `http://127.0.0.1:8000/api/wizard/${this.user.id}`,
                    this.accountData
                  )
                  .then((response) => {
                    console.log(`response is ---- ${response.data["status"]}`);
                    if (response.data["status"] === true) {
                    }
                  })
                  .catch((error) => console.log(`error is ---- ${error}`));
                  window.location.reload();
            },
            submitSocialData() {
              console.log(this.socialData);
              axios
                  .post(
                    `http://127.0.0.1:8000/api/second/socialMedia`,
                    this.socialData
                  )
                  .then((response) => {
                    console.log(`response is ---- ${response.data["status"]}`);
                    if (response.data["status"] === true) {
                    }
                  })
                  .catch((error) => console.log(`error is ---- ${error}`));
                  window.location.reload();
            },
            submitProjectData() {
                  console.log(this.projectData);
                  this.projectData.forEach((project, index) => {
                    console.log(project,index);
                    axios
                      .patch(`http://127.0.0.1:8000/api/project/${project.id}`,
                      project
                    )
                    .then((response) => {
                      console.log(`response is ---- ${response.data["status"]}`);
                      if (response.data["status"] === true) {
                      }
                    })
                    .catch((error) => console.log(`error is ---- ${error}`));
                  });
                  window.location.reload();
            },
            async copyUrl() {
              let url = `http://127.0.0.1:8000/portfolio/${this.user.id}`;
              await navigator.clipboard.writeText(url);
            },
            reloadPage() {
              window.location.reload();
            },
        }
    }
</script>

<style scoped>

.v-color-picker {
  max-width:190px !important;
}
.v-btn{
  box-shadow: 0px 0px 1px 1px rgb(0 0 0 / 35%) !important;
  -webkit-box-shadow: 0px 0px 1px 1px rgb(0 0 0 / 35%) !important;
  -moz-box-shadow: 0px 0px 1px 1px rgb(0 0 0 / 35%) !important;
  font-size: 12px !important;
}
.contact2-bgColor {
    position: relative;
}
.contact2-bgColor:before {
    content:"";
    background-color:white;
    position: absolute;
    height: 100%;
    width: 4000px;
    left: -2000px;
    z-index: -1;
}
.contact2-imgWrapper {
    width: 200px;
    height: 200px;
    /* overflow: hidden; */
    background-position: center;
    background-size: cover;
    border-radius: 50%;
}

.contact2-img {
    width: auto;
    height: 100%;
    margin-left: -50px;
}

.contact2-text {
    width:100% !important;
}
</style>
