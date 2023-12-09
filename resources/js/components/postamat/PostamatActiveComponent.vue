<template>
    <main class="mt-4 d-flex flex-column align-items-center">
        <div class="col-sm-12">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="col-sm">ID</th>
                        <th scope="col" class="col-sm">Status</th>
                        <th scope="col">System ID</th>
                        <th scope="col">Address</th>
                        <th scope="col">Serial number</th>
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
                    <tr v-for="(postamat, key) of postamats" :key="key">
                        <td>{{ postamat.id }}</td>
                        <td>{{ postamat.status }}</td>
                        <td>{{ postamat.system_id }}</td>
                        <td>{{ postamat.address }}</td>
                        <td>{{ postamat.serial_number }}</td>
                        <td>{{ postamat.created_at }}</td>
                        <td>{{ postamat.updated_at }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-dark" @click="showModal('edit', postamat)"> <i
                                    class="fa-regular fa-pen-to-square"></i></button>
                            <button type="button" class="btn btn-sm btn-dark" @click="showModal('delete', postamat)"><i
                                    class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

</template>

<script>
    import axios from 'axios';
   
    export default {
        
        data() {
            return {
                postamats: [],
                createModal: false,
                editModal: false,
                deleteModal: false,
                newObject: {
                    status: 0,
                    system_id: null,
                    address: null,
                    serial_number: null
                },
                currentPostamat: {}
            };
        },

        mounted() {
            let vue = this;
            axios.get('/api/postamat/all')
                .then(function (response) {
                    if (response.data.status) {
                        vue.postamats = response.data.postamats;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        methods: {
            showModal: function (modal, postamat = null) {
                if (modal == 'create') {
                    this.createModal = !this.createModal;
                } else if (modal == 'edit') {
                    this.editModal = !this.editModal;
                    if (postamat != null) {
                        this.currentPostamat = postamat;
                    }
                } else if (modal == 'delete') {
                    this.deleteModal = !this.deleteModal;
                    if (postamat != null) {
                        this.currentPostamat = postamat;
                    }
                }
            },



            save: function(modal) {
                let vue = this;
                if (modal == 'create') {
                    axios.post('/api/postamat/create', vue.newObject)
                        .then(function (response) {
                            if (response.data.status) {
                                vue.postamats = response.data.postamats;
                                vue.showModal(modal);
                                vue.newObject = {
                                    status: 0,
                                    system_id: null,
                                    address: null,
                                    serial_number: null
                                };
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                } else if (modal == 'edit') {
                    axios.post('/api/postamat/edit', vue.currentPostamat)
                        .then(function (response) {
                            if (response.data.status) {
                                vue.postamats = response.data.postamats;
                                vue.showModal(modal);
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                } 
                else if (modal == 'delete') {
                   console.log(this.currentPostamat);
                    axios.post('/api/postamat/delete', vue.currentPostamat)
                        .then(function (response) {
                            if (response.data.status) {
                                vue.postamats = response.data.postamats;
                                vue.showModal(modal);
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
               }
            }
        }
    }

</script>
