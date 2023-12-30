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
                            <button type="button" class="btn btn-sm btn-light" @click="showModal('create')" title="Create">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(request, key) of requests" :key="key">
                        <td>{{ request.id }}</td>
                        <td :class= "'fw-bold '+(request.status == 0 ? 'text-success': 1 ? 'text-warning': 2 ? 'text-primary': 'text-danger')">
                            {{ request.status == 0 ? 'OPENED': 1 ?'IN WORK': 2 ? 'CLOSED' : 'CANCELED' }}
                        </td>
                        <td>{{ request.postamat.system_id }}</td>
                        <td>{{ request.theme.title }}</td>
                        <td>{{ request.solution == null ? 'unassigned' : request.solution.title }}</td>
                        <td>{{ request.created_at }}</td>
                        <td>{{ request.updated_at }}</td>
                        <td>
                            <button :class="'btn-sm btn btn-dark me-2' + (request.status == 0 ? '' : ' d-none')" data-mdb-ripple-color-init 
                                @click="showModal('update', request)" title="In work">
                                <i class="fa-solid fa-toolbox"></i>
                            </button>
                            <button :class="'btn-sm btn btn-dark me-2' + (request.status == 1 ? '' : ' d-none')" data-mdb-ripple-color-init
                                @click="showModal('close', request)" title="Close">
                                <i class="fa-solid fa-check"></i>
                            </button>
                            <button :class="'btn-sm btn btn-dark me-2' + (request.status == 0 || request.status == 1 ? '' : ' d-none')" data-mdb-ripple-color-init
                                @click="showModal('cancel', request)" title="Cancel">
                                <i class="fa-solid fa-ban"></i>
                            </button>
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
                                        {{  postamat.system_id }}
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
            <MDBBtn color="secondary" @click="showModal('create')">Cancel</MDBBtn>
            <MDBBtn color="primary" @click="save('create')">Open request</MDBBtn>
        </MDBModalFooter>
    </MDBModal>

    <MDBModal id="updateRequestModal" tabindex="-1" labelledby="updateRequestModalLabel" v-model="updateModal">
        <MDBModalHeader>
            <MDBModalTitle id="updateRequestModalLabel"> In work </MDBModalTitle>
        </MDBModalHeader>
        <MDBModalBody>
            <form id="form">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">Are you sure you want to take this request in work?</div>
                        <div class="row">
                            <label for="postamat_system_id" class="col-md-4 form-label">Postamat</label>
                            <div class="col-md-7">
                                <select class="form-select" id="postamat_system_id" v-model="currentRequest.postamat_id">
                                    <option disabled selected v-for="postamat in postamats" :value="postamat.id">
                                        {{  postamat.system_id }}
                                    </option>
                                </select>
                            </div>         
                        </div>
                    
                        <div class="row row2 pt-4">
                            <label for="theme_title" class="col-md-4 form-label">Theme</label>
                            <div class="col-md-7">
                                <select class="form-select" id="theme_title" v-model="currentRequest.theme_id">
                                    <option disabled selected v-for="theme in themes" :value="theme.id">
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
            <MDBBtn color="secondary" @click="showModal('update')">No</MDBBtn>
            <MDBBtn color="primary" @click="save('update')">Yes</MDBBtn>
        </MDBModalFooter>
    </MDBModal>

    <MDBModal id="closeRequestModal" tabindex="-1" labelledby="closeRequestModalLabel" v-model="closeModal">
        <MDBModalHeader>
            <MDBModalTitle id="closeRequestModalLabel"> Close the request </MDBModalTitle>
        </MDBModalHeader>
        <MDBModalBody>
            <form id="form">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <label for="postamat_system_id" class="col-md-4 form-label">Postamat</label>
                            <div class="col-md-7">
                                <select class="form-select" id="postamat_system_id" v-model="currentRequest.postamat_id">
                                    <option disabled selected v-for="postamat in postamats" :value="postamat.id">
                                        {{  postamat.system_id }}
                                    </option>
                                </select>
                            </div>         
                        </div>
                    
                        <div class="row row2 pt-4">
                            <label for="theme_title" class="col-md-4 form-label">Theme</label>
                            <div class="col-md-7">
                                <select class="form-select" id="theme_title" v-model="currentRequest.theme_id">
                                    <option disabled selected v-for="theme in themes" :value="theme.id">
                                        {{  theme.title }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row row3 pt-4">
                            <label for="solution_title" class="col-md-4 form-label">Select solution</label>
                            <div class="col-md-7">
                                <select class="form-select" id="solution_title" v-model="currentRequest.solution_id">
                                    <option disabled selected value="">select solution</option>
                                    <option v-for="solution in solutions" :value="solution.id">
                                        {{  solution.title }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </MDBModalBody>
        <MDBModalFooter>
            <MDBBtn color="secondary" @click="showModal('update')">Cancel</MDBBtn>
            <MDBBtn color="primary" @click="save('update')">Close request</MDBBtn>
        </MDBModalFooter>
    </MDBModal>
    
    <MDBModal id="cancelRequestModal" tabindex="-1" labelledby="cancelRequestModalLabel" v-model="cancelModal">
        <MDBModalHeader>
            <MDBModalTitle id="cancelRequestModalLabel"> Cancel request </MDBModalTitle>
        </MDBModalHeader>
        <MDBModalBody>
            <form id="form">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">Are you sure to cancel this request?</div>
                        <div class="row">
                            <label for="postamat_system_id" class="col-md-4 form-label">Postamat</label>
                            <div class="col-md-7">
                                <select class="form-select" id="postamat_system_id" v-model="currentRequest.postamat_id">
                                    <option disabled selected v-for="postamat in postamats" :value="postamat.id">
                                        {{  postamat.system_id }}
                                    </option>
                                </select>
                            </div>         
                        </div>
                    
                        <div class="row row2 pt-4">
                            <label for="theme_title" class="col-md-4 form-label">Theme</label>
                            <div class="col-md-7">
                                <select class="form-select" id="theme_title" v-model="currentRequest.theme_id">
                                    <option disabled selected v-for="theme in themes" :value="theme.id">
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
            <MDBBtn color="secondary" @click="showModal('cancel')">No</MDBBtn>
            <MDBBtn color="primary" @click="save('cancel')">Yes</MDBBtn>
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
                updateModal: false,
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
                } else if (modal == 'update') {
                    this.updateModal = !this.updateModal;
                    if (request != null) {
                        this.currentRequest = request;
                    }
                } else if (modal == 'cancel') {
                    this.cancelModal = !this.cancelModal;
                    if (request != null) {
                        this.currentRequest = request;
                    }
                } else if (modal == 'close') {
                    this.closeModal = !this.closeModal;
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
                            console.log(error);
                        });
                } else if (modal == 'update') {
                    this.error = {};
                    axios.post('/api/postamat/requests/update', vue.currentRequest)
                    .then(function(response) {
                        if (response.data.status) {
                            vue.requests = response.data.requests;
                            vue.showModal(modal);
                            vue.currentRequest.status = 1;
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
                } else if (modal == 'close') {
                    this.error = {};
                    axios.post('/api/postamat/requests/update', vue.currentRequest)
                    .then(function(response) {
                        if (response.data.status) {
                            vue.requests = response.data.requests;
                            vue.showModal(modal);
                            vue.currentRequest.status = 2;
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
                } else if (modal == 'cancel') {
                    this.error = {};
                    axios.post('/api/postamat/requests/update', vue.currentRequest)
                    .then(function(response) {
                        if (response.data.status) {
                            vue.requests = response.data.requests;
                            vue.showModal(modal);
                            vue.currentRequest.status = 3;
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
                }
            }
        }
    }

</script>
