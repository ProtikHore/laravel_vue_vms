<template>
  <div class="">
        <div class="row">
            <div class="col-md-4">
                 <dashboard-component></dashboard-component>
            </div>
            <div class="col-md-8 mt-2">
                <div>
                    <router-link :to="{name: 'visitor_add'}" class="btn btn-primary btn-sm" id="add">Add</router-link>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 100px"> Id </th>
                                <th> Name </th>
                                <th> Status </th>
                                <th style="width: 170px"> Action </th>
                            </tr>
                        </thead>
                        <tbody v-if="visitors.length">
                            <tr v-for="(visitor, index) in visitors" :key="visitor.id">
                                <td style="width: 100px"> {{ ++index }} </td>
                                <td> {{ visitor.name }} </td>
                                <td> {{ visitor.status }} </td>
                                <td style="width: 170px">
                                    <router-link :to="{name: 'visitor_edit', params: {id: visitor.id}}" class="btn btn-primary btn-sm">Edit</router-link>
                                    <a @click.prevent="deleteVisitor(visitor)" href="#" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                        <tbody v-else>
                            <tr>
                                <td colspan="4">
                                    <h5 class="text-center mt-4 mb-4">No Visitors found.</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    data() {
        return {
            visitors: [],
        }
    },

    methods: {
        loadVisitor() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.get('/api/get/visitor').then(response => {
                    console.log(response);
                    this.visitors = response.data;
                });
            });

            // axios.get('/api/get/visitor').then(response => {
            //     console.log(response);
            // });
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
