<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-2">
                <div class="card">
                    <form @submit.prevent="login">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" v-model="loginForm.email" class="form-control" placeholder="email" :class="{ 'is-invalid': loginForm.errors.has('email') }">
                            <div class="text-danger" v-if="loginForm.errors.has('email')" v-html="loginForm.errors.get('email')" />
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" v-model="loginForm.password" class="form-control" placeholder="password" :class="{ 'is-invalid': loginForm.errors.has('password') }" >
                            <div class="text-danger" v-if="loginForm.errors.has('password')" v-html="loginForm.errors.get('password')" />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Form from 'vform';

    export default {
        data: () => ({
            loginForm: new Form({
                email: '',
                password: ''
            })
        }),

        methods: {
            login() {
                axios.get('/sanctum/csrf-cookie').then(response => {
                   //console.log('logins');
                   //console.log(response);
                   this.loginForm.post('login').then(response => {
                       console.log(response);
                       this.getUserData();
                       this.$router.push({ name: 'dashboard' });
                   });
                });

                // this.loginForm.post('login').then(response => {
                //     console.log(response);
                //     this.getUserData();
                //     this.$router.push({ name: 'dashboard' });
                // });
            },
            getUserData() {
                axios.get('/sanctum/csrf-cookie').then(response => {
                   axios.get('/api/userall').then(response => {
                        console.log(response);
                    });
                });

                // axios.get('/api/userall').then(response => {
                //     console.log(response);
                // });
            },
        },

        mounted() {
            //this.getUserData();
            console.log('Component mounted.')
        }
    }
</script>
