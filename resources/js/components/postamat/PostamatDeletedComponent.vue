<template>
    <h2 class="h2">Deleted postamats</h2>
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
                        <th class="float-right"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(deletedPostamat, key) of deletedPostamats" :key="key">
                        <td>{{ deletedPostamat.id }}</td>
                        <td>{{ deletedPostamat.status }}</td>
                        <td>{{ deletedPostamat.system_id }}</td>
                        <td>{{ deletedPostamat.address }}</td>
                        <td>{{ deletedPostamat.serial_number }}</td>
                        <td>{{ deletedPostamat.created_at }}</td>
                        <td>{{ deletedPostamat.updated_at }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-dark" @click="showModal('restore', deletedPostamat)"> <i
                                    class="fa-solid fa-trash-can-arrow-up"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <MDBModal id="restoreModal" tabindex="-1" labelledby="restoreModalLabel" v-model="restoreModal">
        <MDBModalHeader>
            <MDBModalTitle id="deleteModalLabel"> Restore postamat </MDBModalTitle>
        </MDBModalHeader>
        <MDBModalBody>Are you sure you want to restore this postamat?</MDBModalBody>
        <MDBModalFooter>
            <MDBBtn color="primary" @click="confirm('restore')"><i class="fa-solid fa-check"></i></MDBBtn>
            <MDBBtn color="secondary" @click="showModal('restore')"><i class="fa-solid fa-xmark"></i></MDBBtn>
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
                restoreModal: false,
                deletedPostamats: [],
                currentDeletedPostamat: {},
            };
        },

        mounted() {
            let vue = this;
            axios.get('/api/postamat/showDeleted')
            .then((response) => {
                if (response.data.status) {
                    vue.deletedPostamats = response.data.deletedPostamats;
                }
            })
            .catch((error) => {
                console.log(error);
            });
        },

        methods: {
            showModal: function (modal, deletedPostamat = null) {
                if (modal == 'restore') {
                    this.restoreModal = !this.restoreModal;
                    if (deletedPostamat != null) {
                        this.currentDeletedPostamat = deletedPostamat;
                    }
                }
            },

            confirm: function (modal) {
                let vue = this;
                if (modal == 'restore') {
                    axios.post(`/api/postamat/restore`, vue.currentDeletedPostamat)
                    .then((response) => {
                        if (response.data.status) {
                            vue.deletedPostamats = response.data.deletedPostamats;
                            vue.showModal(modal);
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
