<template>
    <h1 class="h1">Postamat requests</h1>
    <main class="mt-4 d-flex flex-column align-items-center">
        <div class="col-sm-12">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="col-sm">ID</th>
                        <th scope="col" class="col-sm">Status</th>
                        <th scope="col">Postamat</th>
                        <th scope="col">Theme</th>
                        <th scope="col">Solution</th>
                        <th scope="col">Created</th>
                        <th scope="col">Updated</th>
                        <th class="float-right">
                            <button type="button" class="btn btn-sm btn-light" @click="showModal('create')">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(request, key) of requests" :key="key">
                        <td>{{ request.id }}</td>
                        <td :class= "'fw-bold'+(request.status == '0'? 'text-success':'1'? 'text-warning':'2'? 'text-primary': 'text-danger')">
                            {{ request.status == '0'? 'Open':'1'?'InWork':'2'?'Closed': 'Canceled' }}
                        </td>
                        <td>{{ request.postamat.system_id }}</td>
                        <td>{{ request.theme.title }}</td>
                        <td>{{ request.solution.title }}</td>
                        <td>{{ request.created_at }}</td>
                        <td>{{ request.updated_at }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-dark" @click="showModal('edit', postamat)"> <i
                                    class="fa-regular fa-pen-to-square"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <MDBModal id="createRequestModal" tabindex="-1" labelledby="createRequestModalLabel" v-model="createModal">
        <MDBModalHeader>
            <MDBModalTitle id="createRequestModalLabel"> Open a request </MDBModalTitle>
        </MDBModalHeader>
        <MDBModalBody>
            <form id="form">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <label for="postamat_system_id" class="col-md-4 form-label">Select postamat</label>
                            <div class="col-md-7">
                                <select class="form-select" id="postamat_system_id" v-model="newObject.postamat_id">
                                    <option disabled selected value="">select postamat</option>
                                    <option v-for="postamat in postamats" :value="postamat.id">
                                        {{  postamat.title }}
                                    </option>
                                </select>
                            </div>         
                        </div>
                    
                        <div class="row row2 pt-4">
                            <label for="theme_title" class="col-md-4 form-label">Select theme</label>
                            <div class="col-md-7">
                                <select class="form-select" id="theme_title" v-model="newObject.theme_id">
                                    <option disabled selected value="">select theme</option>
                                    <option v-for="theme in themes" :value="theme.id">
                                        {{  theme.title }}
                                    </option>
                                </select>
                            </div>
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
                requests: [],
                postamats: [],
                solutions: [],
                themes: [],
                createModal: false,
                editModal: false,
                newObject: {
                    status: 0,
                    postamat_id: null,
                    theme_id: null,
                    solution_id: null
                },
                currentRequest: {},
            };
        },

        mounted() {
            let vue = this;
            axios.get('/api/postamat/requests/index')
                .then(function (response) {
                    if (response.data.status) {
                        vue.requests = response.data.requests;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            axios.get('/api/postamat/index')
                .then(function (response) {
                    if (response.data.status) {
                        vue.postamats = response.data.postamats;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });    
            axios.get('/api/postamat/themes/index')
                .then(function (response) {
                    if (response.data.status) {
                        vue.themes = response.data.themes;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            axios.get('/api/postamat/solutions/index')
                .then(function (response) {
                    if (response.data.status) {
                        vue.solutions = response.data.solutions;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });        
        },

        methods: {
            showModal: function (modal, request = null) {
                if (modal == 'create') {
                    this.createModal = !this.createModal;
                } else if (modal == 'edit') {
                    this.editModal = !this.editModal;
                    if (request != null) {
                        this.currentRequest = request;
                    }
                } else if (modal == 'delete') {
                    this.deleteModal = !this.deleteModal;
                    if (request != null) {
                        this.currentRequest = request;
                    }
                }
            },



            save: function (modal) {
                let vue = this;
                if (modal == 'create') {
                    this.error = {};
                    axios.post('/api/postamat/requests/create', vue.newObject)
                        .then(function (response) {
                            if (response.data.status) {
                                vue.requests = response.data.requests;
                                vue.showModal(modal);
                                vue.newObject = {
                                    status: 0,
                                    postamat_id: null,
                                    theme_id: null,
                                    solution_id: null
                                };
                            }
                        })
                        .catch((error) => {
                            for (let field in error.response.data.errors) {
                                this.error[field] = error.response.data.errors[field][0];
                            };
                            console.log(error);
                        });
                } else if (modal == 'edit') {
                    this.error = {};
                    axios.post('/api/postamat/requests/edit', vue.currentRequest)
                    .then(function(response) {
                        if (response.data.status) {
                            vue.requests = response.data.requests;
                            vue.showModal(modal);
                            vue.currentRequest.status = 1;
                        }
                    })
                    .catch((error) => {
                        for (let field in error.response.data.errors) {
                            this.error[field] = error.response.data.errors[field][0];
                        };
                        console.log(error);
                    });
                }
            }
        }
    }

</script>
