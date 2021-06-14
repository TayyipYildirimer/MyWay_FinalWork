<template>
    <div>
        <div>
            <v-card style="z-index: 1 !important;">
                <v-navigation-drawer style="margin-top:5.5em !important;" permanent fixed>
                    <v-list v-if="authUser != null">
                        <v-list-item class="px-2">
                            <v-list-item-avatar v-if="authUser.profileimg">
                                <v-img :src="authUser.profileimg"></v-img>
                            </v-list-item-avatar>
                        </v-list-item>

                        <v-list-item>
                            <v-list-item-content>
                                <v-list-item-title class="text-h6" v-if="authUser.fname && authUser.lname">
                                    {{authUser.fname}} {{authUser.lname}}
                                </v-list-item-title>
                                <v-list-item-subtitle v-if="authUser.email">{{authUser.email}}</v-list-item-subtitle>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list>

                    <v-divider></v-divider>
                    <v-row style="min-width:100%;margin: 1em 0;">
                        <v-text-field color="#2BA9E1" single-line filled label="Prepend inner"
                            prepend-inner-icon="mdi-magnify" style="max-width: 80%;margin: auto;max-height: 70px;">
                        </v-text-field>
                        <v-btn
                            style="width: 80%;margin:0 auto;background-color: #ececec;box-shadow: none;border-radius: 0px 0px 4px 4px;">
                            Zoek op
                        </v-btn>
                    </v-row>
                    <v-divider></v-divider>

                    <v-list nav dense>
                        <v-list-item link>
                            <v-list-item-title>Filters</v-list-item-title>
                        </v-list-item>
                        <v-list-item class="item" link>
                            <v-list-item-icon>
                                <v-icon small>fas fa-briefcase</v-icon>
                            </v-list-item-icon>
                            <v-list-item-title>Werkgebied</v-list-item-title>
                        </v-list-item>
                        <v-list-item class="item" link>
                            <v-list-item-icon>
                                <v-icon small>fas fa-map-marker-alt</v-icon>
                            </v-list-item-icon>
                            <v-list-item-title>Plaats</v-list-item-title>
                        </v-list-item>
                        <v-list-item class="item" link>
                            <v-list-item-icon>
                                <v-icon small>fas fa-file-contract</v-icon>
                            </v-list-item-icon>
                            <v-list-item-title>Ervaring</v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-navigation-drawer>
            </v-card>
        </div>
          <div style="">
            <v-row cols="12" style="max-width: 80%;margin-left: 20%;margin-top: 8%;">
                    <v-col md="4" sm="6" v-for="(user, index) in users" :key="index">
                        <template>
                            <v-card class="mx-auto" max-width="400">
                                <v-img class="white--text align-end" height="200px" :src="user.profileimg">
                                </v-img>
                                <v-card-title style="text-transform: capitalize;">{{user.fname}} {{user.lname}}
                                    </v-card-title>
                                <v-card-subtitle style="text-transform: capitalize;" class="pb-0">
                                    {{user.category}} <span class="dot"></span> {{user.specialization}}
                                </v-card-subtitle>

                                <v-card-text class="text--primary">
                                    <div></div>

                                    <div>" {{user.shortdescription}} "</div>
                                </v-card-text>

                                <v-card-actions>
                                    <v-btn style="text-decoration:none;" target="_blank" color="orange" text :href="`/portfolio/${user.id}`">
                                        Profiel bezoeken
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </template>
                    </v-col>
            </v-row>
          </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: [
        'users',
    ],
    data() {
        return {
            authUser: window.authUser,
            isLoading: false,
            items: [],
            model: null,
            search: null,
            tab: null,
        }
    },
    async mounted() {
        /**this.user.imgColors.forEach((element, index) => {
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
        **/
        this.isloaded = true;
    },
    methods: {
        submitProjectData() {
            console.log(this.projectData);
            this.projectData.forEach((project, index) => {
                console.log(project, index);
                axios
                    .patch(`http://127.0.0.1:8000/api/project/${project.id}`,
                        project
                    )
                    .then((response) => {
                        console.log(`response is ---- ${response.data["status"]}`);
                        if (response.data["status"] === true) {}
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
.dot {
  height: 8px;
  width: 8px;
  margin: auto 0.7em;
  background-color: #858585;
  border-radius: 50%;
  display: inline-block;
}

</style>