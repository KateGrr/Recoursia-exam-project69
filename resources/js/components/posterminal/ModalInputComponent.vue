<template>
    <MDBModal
        id="ModalInput"
        tabindex="-1"
        labelledby="ModalInputLabel"
        v-model="ModalInput"
    >
        <MDBModalHeader>
            <MDBModalTitle id="ModalInputLabel">{{ (mode == 'create'?'Add':'Edit')+' Posterminal' }}</MDBModalTitle>
        </MDBModalHeader>
        <MDBModalBody>
            <div :class="'row mt-4'+(posterminal.id!='0'?'':' d-none')">
                <span class="col-sm-4 fs-5">ID</span>
                <div class="col-sm-4">
                    {{ posterminal.id }}
                </div>
            </div>

            <fieldset class="row mt-4">
                <legend class="col-form-label col-sm-4 pt-0 fs-5">Status</legend>
                <div class="col-sm d-flex">
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio"
                            name="status" id="statusOff" value="0" v-model="posterminal.status" checked>
                        <label class="form-check-label fs-6" role="button" for="statusOff">OFF</label>
                    </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio"
                            name="status" id="statusOn" value="1" v-model="posterminal.status">
                        <label class="form-check-label fs-6" role="button" for="statusOn">ON</label>
                    </div>
                </div>
                <div class="col-sm-4 text-danger">
                    {{ error.status }}
                </div>
            </fieldset>

            <div class="row mt-4">
                <label for="lname" class="col-sm-4
                col-form-label fs-5">System id</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                        id="lname" v-model="posterminal.system_id">
                </div>
                <div class="col-sm-4 text-danger">
                    {{ error.system_id }}
                </div>
            </div>

            <div class="row mt-4">
                <label for="email" class="col-sm-4
                col-form-label fs-5">Address</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                        id="email" v-model="posterminal.address">
                </div>
                <div class="col-sm-4 text-danger">
                    {{ error.address }}
                </div>
            </div>

            <div class="row mt-4 mb-4">
                <label for="mobile" class="col-sm-4
                col-form-label fs-5">Serial number</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"
                        id="mobile" v-model="posterminal.serial_number">
                </div>
                <div class="col-sm-4 text-danger">
                    {{ error.serial_number }}
                </div>
            </div>
        </MDBModalBody>
        <MDBModalFooter>
            <div class="col">
                <MDBBtn class="btn btn-dark"
                    @click="createOrUpdate">
                    {{ mode == 'create'?'Create':'Update' }}
                </MDBBtn>
            </div>
            <div class="col text-danger">
                {{ error.other }}
            </div>
        </MDBModalFooter>
    </MDBModal>
</template>

<script>
    import {
        MDBModal,
        MDBModalHeader,
        MDBModalTitle,
        MDBModalBody,
        MDBModalFooter,
        MDBBtn,
    } from 'mdb-vue-ui-kit';

    export default {
        name: 'ModalInputComponent',
        data() {
            return {
                ModalInput: false,
                mode: null,
                posterminal: {},
                error: {},
            };
        },
        methods: {
            openModalInput(mode, posterminal) {
                this.ModalInput = true;
                this.mode = mode;
                this.error = {};
                if (posterminal==null) {
                    this.posterminal = {
                        id: '0',
                        status: '0',
                        system_id: '',
                        address: '',
                        serial_number: ''
                    };
                } else {
                    this.posterminal = {
                        id: posterminal.id,
                        status: posterminal.status,
                        system_id:posterminal.system_id,
                        address:posterminal.address,
                        serial_number:posterminal.serial_number
                    };
                }
            },
            closeModalInput() {
                this.ModalInput = false;
                this.mode = null;
            },
            createOrUpdate(){
                this.error = {};
                axios.post('api/posterminal/'+this.mode, this.posterminal)
                .then((data) => {
                    if (data.data == '200') {
                        this.closeModalInput();
                        this.$parent.$refs.table.showPosterminals();
                    } else {
                        this.error['other'] = data.data;
                    }
                }).catch((error) => {
                    for (let field in error.response.data.errors) {
                        this.error[field] = error.response.data.errors[field][0];
                    }
                });
            },
        },
        components: {
            MDBModal,
            MDBModalHeader,
            MDBModalTitle,
            MDBModalBody,
            MDBModalFooter,
            MDBBtn,
        },
    }
</script>
