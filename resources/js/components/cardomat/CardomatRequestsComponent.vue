<template>
    <div class="container">
        <h3 class="text mt-4 mb-3">Requests</h3>
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
            <button class="nav-link" @click="activeTab = 'open'">Open</button>
            </li>
            <li class="nav-item">
            <button class="nav-link" @click="activeTab = 'inWork'">InWork</button>
            </li>
            <li class="nav-item">
            <button class="nav-link" @click="activeTab = 'closed'">Closed</button>
            </li>
            <li class="nav-item">
            <button class="nav-link" @click="activeTab = 'canceled'">Canceled</button>
            </li>
        </ul>
        <table class="table align-middle mb-0 bg-white mt-2">
            <thead class="table-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Status</th>
                <th scope="col">Cardomat</th>
                <th scope="col">Theme</th>
                <th scope="col">Solution</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">
                    <div>
                        <button type="button" class="btn-sm btn btn-light m-1" @click="showModal('create')" data-mdb-ripple-init>
                            <i class="fas fa-plus"></i>
                        </button>
                        <button type="button" class="btn-sm btn btn-light m-1" @click="refreshData" data-mdb-ripple-init>
                            <i class="fa-solid fa-rotate"></i>
                        </button>
                    </div>
                </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(request, key) of filteredRequests" :key="key">
                    <td>{{ request.id }}</td>
                    <td class="status-cell" :data-status="request.status">
                        {{ request.status === 0 ? 'Open' : (request.status === 1 ? 'InWork' : (request.status === 2 ? 'Closed' : (request.status === 3 ? 'Canceled' : '')))}}
                    </td>
                    <td>{{ request.cardomat.serial_number }}</td>
                    <td>{{ request.theme.title }}</td>
                    <td>{{ request.solution?.title }}</td>
                    <td>{{ request.created_at }}</td>
                    <td>{{ request.updated_at }}</td>
                    <td>
                        <div style="display: flex; gap: 3px;">
                            <button v-if="request.status === 1" type="button" class="btn btn-sm btn-dark" @click="showModal('complete', request)">
                                <i class="fa-solid fa-bell-concierge"></i>
                            </button>
                            <button v-if="request.status === 0" type="button" class="btn btn-sm btn-dark" @click="changeStatus(request)">
                                <i class="fa-solid fa-wrench"></i>
                            </button>
                            <button v-if="request.status === 0 || request.status === 1" type="button" class="btn btn-sm btn-dark" @click="changeStatusToCanceled(request, 3)">
                                <i class="fa-solid fa-rectangle-xmark"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <MDBModal id="createModal" tabindex="-1" labelledby="createModalLabel" v-model="createModal">
        <MDBModalHeader>
            <MDBModalTitle id="createModalLabel"  class="text-center">  Add Request </MDBModalTitle>
        </MDBModalHeader>
        <MDBModalBody>
            <form>
                <div class="row mt-4">
                    <label for="createcardomat_id" class="col-sm-4 col-form-label fs-5">Cardomat</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="createcardomat_id" v-model="newRequest.cardomat_id">
                            <option v-for="card in cards" :key="card.id" :value="card.id">{{ card.serial_number }}</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    <label for="createtheme_id" class="col-sm-4 col-form-label fs-5">Theme</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="createtheme_id" v-model="newRequest.theme_id">
                            <option v-for="theme in themes" :key="theme.id" :value="theme.id">{{ theme.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-8">
                        <button type="button" class="btn btn-dark" data-mdb-ripple-init @click="save('create')">Create</button>
                        <button type="button" class="btn btn-secondary" data-mdb-ripple-init @click="showModal('create')">Close</button>
                    </div>
                </div>
            </form>
        </MDBModalBody>
    </MDBModal>

    <MDBModal id="completeModal" tabindex="-1" labelledby="createModalLabel" v-model="completeModal">
        <MDBModalHeader>
            <MDBModalTitle id="createModalLabel"> Сomplete Request </MDBModalTitle>
        </MDBModalHeader>
        <MDBModalBody>
            <form>
                <div class="row mt-4">
                    <label for="completesolution" class="col-sm-4 col-form-label fs-5">Solution</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="completesolution" v-model="currentRequest.solution_id">
                            <option v-for="solution in getFilteredSolutions(currentRequest.theme_id)" :key="solution.id" :value="solution.id">{{ solution.title }}</option>
                        </select>
                        <div class="row-sm-4 text-danger" > {{ error.solution_id}} </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-8">
                        <button type="button" class="btn btn-dark" data-mdb-ripple-init @click="save('complete')">Update</button>
                        <button type="button" class="btn btn-secondary" data-mdb-ripple-init @click="showModal('complete')">Close</button>
                    </div>
                </div>
            </form>
        </MDBModalBody>
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
                themes: [],
                cards: [],
                solutions:[],
                requests: [],
                createModal: false,
                completeModal: false,
                newRequest: {
                    status: 0,
                    cardomat_id: null,
                    theme_id: null,
                },
                currentRequest: {},
                error: {},
                activeTab: 'open',
            };
        },

        
        mounted() {
            this.loadThemes();
            this.loadSolutions();
            this.loadCards();

            let vue = this;
            axios.get('/api/cardomat/requests/all')
            .then(function (response) {
                if (response.data.status) {
                    vue.requests = response.data.requests;
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        },

        computed: {
            filteredRequests() {
                switch (this.activeTab) {
                case 'open':
                    return this.requests.filter(request => request.status === 0);
                case 'inWork':
                    return this.requests.filter(request => request.status === 1);
                case 'closed':
                    return this.requests.filter(request => request.status === 2);
                case 'canceled':
                    return this.requests.filter(request => request.status === 3);
                default:
                    return this.requests;
                }
            },
        },

        methods: {
            loadThemes() {
                axios.get('/api/cardomat/themes/find')
                .then(response => {
                    this.themes = response.data.themes;
                })
                .catch(error => {
                    console.error('Error loading themes', error);
                });
            },

            loadSolutions() {
                axios.get('/api/cardomat/solutions/all')
                .then(response => {
                    this.solutions = response.data.solutions;
                })
                .catch(error => {
                    console.error('Error loading solutions', error);
                });
            },

            loadCards(){
                axios.get('/api/cardomat/all')
                .then(response => {
                    this.cards = response.data.cards;
                })
                .catch(error => {
                    console.error('Error loading cards', error);
                });
            },

            getFilteredSolutions(themeId) {
                return this.solutions.filter(solution => solution.theme_id === themeId);
            },

            showModal: function (modal, request = null) {
                if (modal === 'create') {
                    this.createModal = !this.createModal;
                } else if (modal === 'complete') {
                    this.completeModal = !this.completeModal;
                    if (request != null) {
                        this.currentRequest = request;
                    }
                }
            },

            save: function (modal) {
                let vue = this;
                if (modal === 'create') {
                    axios.post('/api/cardomat/requests/create', vue.newRequest)
                    .then(function (response) {
                        if (response.data.status) {
                            vue.requests = response.data.requests;
                            vue.showModal(modal);
                            vue.newRequest = {
                                status: 0,
                                cardomat_id: null,
                                theme_id: null,
                            };
                        }
                    })
                    .catch((error) => {
                        for (let field in error.response.data.errors) {
                            this.error[field] = error.response.data.errors[field][0];
                        };
                        console.log(error);
                    });
                } else if (modal === 'complete') {
                    axios.post('/api/cardomat/requests/complete', vue.currentRequest)
                    .then(function (response) {
                        if (response.data.status) {
                            vue.requests = response.data.requests;
                            vue.changeStatus(vue.currentRequest);
                            vue.showModal(modal);
                        }
                    })
                    .catch((error) => {
                        for (let field in error.response.data.errors) {
                            this.error[field] = error.response.data.errors[field][0];
                        };
                        console.log(error);
                    });
                }
            },

            changeStatus(request) {
                axios.post('/api/cardomat/requests/changeStatus', {
                    requestId: request.id,
                    newStatus: request.status + 1,
                })
                .then(response => {
                    if (response.data.status) {
                        this.requests = response.data.requests;
                    }
                })
                .catch(error => {
                        console.error('Error changing status', error);
                });
            },

            changeStatusToCanceled(request, newStatus) {
                axios.post('/api/cardomat/requests/changeStatus', {
                    requestId: request.id,
                    newStatus: newStatus,
                })
                .then(response => {
                    if (response.data.status) {
                        this.requests = response.data.requests;
                    }
                })
                .catch(error => {
                        console.error('Error changing status', error);
                });
            },

            refreshData: function () {
                let vue = this;
                axios.get('/api/cardomat/requests/all')
                .then(function (response) {
                    if (response.data.status) {
                        vue.requests = response.data.requests;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            },

        }
    }
</script>

<style src="/public/css/cardomat.css"></style>