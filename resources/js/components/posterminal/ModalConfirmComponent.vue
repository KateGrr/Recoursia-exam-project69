<template>
    <MDBModal
        id="ModalConfirm"
        tabindex="-1"
        labelledby="ModalConfirmLabel"
        v-model="ModalConfirm"
    >
        <MDBModalHeader>
            <MDBModalTitle id="ModalConfirmLabel">Confirmation</MDBModalTitle>
        </MDBModalHeader>
        <MDBModalBody>
            <div class="modal-body">{{ message }}</div>
        </MDBModalBody>
        <MDBModalFooter>
            <MDBBtn class="btn btn-dark" @click="ModalConfirm=false">No</MDBBtn>
            <MDBBtn class="btn btn-dark" @click="runCallbackFun">Yes</MDBBtn>
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
        name: 'ModalConfirmComponent',
        data() {
            return {
                ModalConfirm: false,
                message: '',
                callbackFun: null,
                argument: {}
            }
        },
        methods: {
            openModalConfirme(message, callbackFun, argument) {
                this.ModalConfirm = true;
                this.message = message;
                this.callbackFun = callbackFun;
                this.argument = argument;
            },
            runCallbackFun() {
                this.ModalConfirm = false;
                this.callbackFun(this.argument);
            }
        },
        components: {
            MDBModal,
            MDBModalHeader,
            MDBModalTitle,
            MDBModalBody,
            MDBModalFooter,
            MDBBtn,
        }
    }
</script>
