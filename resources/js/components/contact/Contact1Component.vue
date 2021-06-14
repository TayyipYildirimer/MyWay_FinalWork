<template>
    <section class="container" style="overflow:hidden;margin-top:3em;position:relative;min-height: 50vh;"
        v-if="user.userPhoto">
        <v-row cols="12" v-if="user.profileimg" style="background-color: white;padding: 2em;border-radius: 0.25rem;">
            <v-col md="4">
                <div class="contact1-imgWrapper" :style="`background-image:url(${user.profileimg});margin: auto;`">
                </div>
            </v-col>
            <v-col md="8">
                <div class="contact1-text">
                    <h3 :class="`${user.emotions}`">
                        {{user.fname}} {{user.lname}}
                    </h3>
                    <p>
                        {{user.description}}
                    </p>
                    <a style="text-decoration:none;" :href="`mailto:${user.email}?subject=Mail from My Way`">
                    <button :style="[colorDark ? {'background-color': `#${user.imgColors[colorDarkNumber]}`} : {'background-color': `#${user.imgColors[colorLightNumber]}`},
                                     colorDark?{'color': 'white'}:{'color': 'black'}]" type="button" class="btn btn-warning">
                          Contacteer me
                    </button></a>
                </div>
            </v-col>
        </v-row>
    </section>
</template>

<script >
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
                }, //this.user.imgColors[this.colorDarkNumber]
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
    } 
</script>

<style scoped>

.contact1-imgWrapper {
    width: 200px;
    height: 200px;
    /* overflow: hidden; */
    background-position: center;
    background-size: cover;
    border-radius: 50%;
}

.contact1-img {
    width: auto;
    height: 100%;
    margin-left: -50px;
}

.contact1-text {
    width:100% !important;
    position: absolute;
    transform: translate(-50%, -50%);
    left: 50%;
    top: 50%;
}
</style>
