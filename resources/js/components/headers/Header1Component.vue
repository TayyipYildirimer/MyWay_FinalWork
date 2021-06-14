
<template>
    <div class="container">
        <v-row class="header" md="12">
            <v-col md="6">
                <div style="max-width: 70%;margin: 30% auto;">
                  <h1 :class="`${user.emotions}`">{{ user.fname}}<br>
                  {{ user.lname}}</h1><br>
                  <p>{{ user.description}}</p>
                </div>
            </v-col>
            <v-col md="6" style="display:flex;justify-content:center;">
                <img :src="`${profileImg}`" alt="" style="width:80%;height:80%;justify-content:center;display:flex !important;align-items:center;margin-top: 13% !important;">
            </v-col>
        </v-row>
        <div style="">
        <div class="header1-bgcolor">

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
              User: null,
              editor: null,
              profileImg: null,
            }
        },
        created() {
            this.profileImg = this.user.profileimg;
            this.user.userPhoto.forEach(element => 
            console.log());
            console.log(this.user);
        }
    }
</script>

<style scoped>

h1{
  font-weight: 900;
  font-size: 4.5em !important;
  text-transform: capitalize;
}
.header{
    min-height:100hv;
}
.header p{
  font-weight: 300;
}
.cover-container {
  max-width: 42em;
}
.header1-bgcolor{
  height: 100%;
  z-index: -1;
  margin-top:-11%;
  position: absolute;
  margin-left: -25em !important;
  width: 350% !important;
  background-color: lightsteelblue;
}

</style>