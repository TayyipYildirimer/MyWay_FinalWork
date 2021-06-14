<template>
    <section class="container" style="margin-top:3em;" v-if="user.userPhoto">
        <div v-if="user.profileimg">
            
        <div class="contact2-bgColor">
            <div style="padding-top:3em;">
                <div class="contact2-imgWrapper" :style="`background-image:url(${user.profileimg});margin: auto;`">
                </div>
            </div>
            <div style="text-align:center;margin-top:1em;padding-bottom:3em;">
                <div class="contact2-text">
                    <h3 :class="`${user.emotions}`">
                        Hallo! Ik ben {{user.fname}} {{user.lname}}
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
            </div>
            </div>
        </div>
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
