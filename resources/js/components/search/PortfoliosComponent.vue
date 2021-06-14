<template>
    <div>
        {{users}}
        {{users}}
    </div>
</template>

<script >
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
            this.isloaded = true;
        },
        methods: {
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
.item{
    background-color: #ececec !important;
}
</style>
