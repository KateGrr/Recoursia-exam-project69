<template>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Status</th>
                <th scope="col">System ID</th>
                <th scope="col">Address</th>
                <th scope="col">Serial number</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th class="float-right">
                    <button type="button" class="btn-sm btn btn-light" @click="showModal('create')">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <button type="button" class="btn-sm btn btn-light" @click="deleted" data-mdb-ripple-init>
                        <i class="fa-solid fa-eraser"></i>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(postamat, key) of postamats" :key="key">
                <td>{{ postamat.id }}</td>
                <td>{{ postamat.status }}</td>
                <td>{{ postamat.system_id }}</td>
                <td>{{ postamat.address }}</td>
                <td>{{ postamat.serial_number }}</td>
                <td>{{ postamat.created_at }}</td>
                <td>{{ postamat.updated_at }}</td>
            </tr>
        </tbody>
    </table>

    <MDBModal id="createModal" tabindex="-1" labelledby="createModalLabel" v-model="createModal">
        <MDBModalHeader>
            <MDBModalTitle id="createModalLabel"> Add Postamat </MDBModalTitle>
        </MDBModalHeader>
        <MDBModalBody>
            <form>
                <div class="mb-3">
        
                    <fieldset class="row">
                        <legend class="col-form-label col-sm-4 pt-0 fs-5">Status</legend>
                        <div class="col-sm d-flex">
                            <div class="form-check m-2">
                                <input class="form-check-input" type="radio" name="status" id="statusOff" value="0" checked v-model="newObject.status">
                                <label class="form-check-label fs-6" for="statusOff">OFF</label>
                            </div>
                            <div class="form-check m-2">
                                <input class="form-check-input" type="radio" name="status" id="statusOn" value="1" v-model="newObject.status">
                                <label class="form-check-label fs-6" for="statusOn">ON</label>
                            </div>
                        </div>
                    </fieldset>

                    <div class="row mt-4">
                        <label for="system_id" class="col-sm-4 col-form-label fs-5">System id</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="system_id" v-model="newObject.system_id">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <label for="address" class="col-sm-4 col-form-label fs-5">Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="address" v-model="newObject.address">
                        </div>
                    </div>

                    <div class="row mt-4 mb-4">
                        <label for="serial_number" class="col-sm-4 col-form-label fs-5">Serial number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="serial_number" v-model="newObject.serial_number">
                        </div>
                    </div>
                </div>
            </form>

        </MDBModalBody>
        <MDBModalFooter>
            <MDBBtn color="secondary" @click="showModal('create')">Close</MDBBtn>
            <MDBBtn color="primary" @click="save('create')">Save</MDBBtn>
        </MDBModalFooter>
    </MDBModal>
</template>

<script>
    import axios from 'axios';
    import {
        MDBModal,
        MDBModalHeader,
        MDBModalTitle,
        MDBModalBody,
        MDBModalFooter,
        MDBBtn,
    } from 'mdb-vue-ui-kit';
    export default {
        components: {
            MDBModal,
            MDBModalHeader,
            MDBModalTitle,
            MDBModalBody,
            MDBModalFooter,
            MDBBtn,
        },
        data() {
            return {
                postamats: [],
                createModal: false,
                newObject: {
                    status: 0,
                    system_id: null,
                    address: null,
                    serial_number: null
                }
            };
        },

        mounted() {
            let vue = this;
            axios.get('/api/all')
                .then(function (response) {
                    if (response.data.status) {
                        vue.postamats = response.data.postamats;
                    }
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
 
        methods: {
            showModal: function (modal) {
                if (modal == 'create') {
                    this.createModal = !this.createModal;
                }
            },

            save: function (modal) {
                console.log(this.newObject);
                let vue = this;
                if (modal == 'create') {
                    axios.post('/api/create', vue.newObject)
                    .then(function(response) {
                        if (response.data.status) {
                            vue.postamats = response.data.postamats;
                            vue.showModal(modal);
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
                }
            }
        }
    }

</script>
