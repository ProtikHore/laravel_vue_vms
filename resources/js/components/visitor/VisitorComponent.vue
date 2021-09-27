<template>
  <div class="">
        <div class="row">
            <div class="col-md-4">
                 <dashboard-component></dashboard-component>
            </div>
            <div class="col-md-8 mt-2">
                <div class="card">
                    <h2>This is Visitor</h2>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    methods: {
        loadVisitor() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.get('/api/get/visitor').then(response => {
                    console.log(response);
                });
            });
        }
    },
    mounted() {
        this.loadVisitor();
        console.log('asas');
    }
}
</script>

<style>

</style>
