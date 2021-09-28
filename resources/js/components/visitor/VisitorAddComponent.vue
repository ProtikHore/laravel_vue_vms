<template>
    <div class="row">
        <div class="col-md-4">
            <dashboard-component></dashboard-component>
        </div>
        <div class="col-md-8 mt-2">
            <form @submit.prevent="addVisitor">
                <input name="id" type="hidden" id="id">

                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Name">
                            <div class="text-danger" v-if="addVisitorForm.errors.has('name')" v-html="addVisitorForm.errors.get('name')" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="address">Adress</label>
                            <input name="address" type="text" class="form-control" id="address" placeholder="Address">
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="text" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="mobile_number">Mobile Number</label>
                            <input name="mobile_number" type="text" class="form-control" id="mobile_number" placeholder="Mobile Number">
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <div class="form-group">
                            <label for="where_from">Where From</label>
                            <input name="where_from" type="text" class="form-control" id="where_from" placeholder="Where From">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="where_to">Where To</label>
                            <select name="where_to" class="form-control" id="where_to">
                                <option value="">Select company name</option>
                                <option value="Skycon Solutions (Kormo)">Skycon Solutions (Kormo)</option>
                                <option value="Skydeck">Skydeck</option>
                                <option value="Ibvoght">Ibvoght</option>
                                <option value="Itrat Husain">Itrat Husain</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <div class="form-group">
                            <label for="purpose">Purpose</label>
                            <input name="purpose" type="text" class="form-control" id="purpose" placeholder="Purpose">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input name="company_name" type="text" class="form-control" id="company_name" placeholder="Company Name">
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col" id="add_card_number">
                        <div class="form-group">
                            <label for="visitor_card_id">Card Number</label>
                            <select name="visitor_card_id" class="form-control" id="visitor_card_id">
                                <option value="">Select Card</option>
                                <!-- @foreach ($cardNumbers as $cardNumber)
                                    <option value="{{ $cardNumber->id }}">{{ $cardNumber->card_number }}</option>
                                @endforeach -->
                            </select>
                        </div>
                    </div>
                    <div class="col sr-only" id="edit_card_number">
                        <div class="form-group">
                            <label for="visitor_card_id">Card Number</label>
                            <select name="visitor_card_id" class="form-control" id="visitor_card_id_edit" readonly>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" id="status">
                                <option value="CheckedIn">CheckedIn</option>
                                <option value="CheckedOut">CheckedOut</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="10" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <button type="submit" class="btn btn-primary btn-sm text-center margin_left_fifteen_px" id="form_submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import Form from 'vform'
export default {

    data: () => ({
        addVisitorForm: new Form({
            name: '',
            address: '',
            email: '',
        })
    }),
    methods: {
        addVisitor() {
            let data = new FormData();
            data.append('name', this.addVisitorForm.name);
            data.append('address', this.addVisitorForm.address);
            data.append('email', this.addVisitorForm.email);
            console.log('save');
            // axios.get('/sanctum/csrf-cookie').then(response => {
            //     this.addVisitorForm.post('/api/save/visitor').then(response => {
            //         console.log(response);
            //     });
            // });
            this.addVisitorForm.post('/api/save/visitor', data).then(response => {
                console.log(response);
            });
        }
    },
    mounted() {
        //this.getUserData();
        console.log('Component mounted.')
    }
}
</script>

<style>

</style>
