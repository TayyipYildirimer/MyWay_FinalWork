
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <div>
                        {{ User }} User<br>
                        {{ user.category }} user<br>
                    </div>
                </div>
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
            }
        },
        created() {
            //console.log(this, 'foto');
            this.user.userPhoto.forEach(element => 
            console.log());
            console.log(this.user);
            //this.User = JSON.parse(this.user);
            //this.editor = this.User.description;
            //console.log(this.User, 'This user');
        }
    }
</script>