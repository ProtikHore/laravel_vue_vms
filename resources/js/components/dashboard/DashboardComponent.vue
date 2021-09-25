<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-2">
                <div class="card">
                    <li class="nav-item">
                        <router-link :to="{name: 'visitor'}" class="nav-link">Visitor</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'visitorCard'}" class="nav-link">Visitor Card</router-link>
                    </li>
                    <li>
                        <button type="button" class="btn btn-warning" @click.prevent="logout">Logout</button>
                    </li>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        logout() {
            console.log('hello');
            axios.post('/logout').then(response => {
                console.log(response);
                this.$router.push({ name: 'login' });
            });
        }
    },
    mounted() {
        console.log('dashboard');
    }
}
</script>
