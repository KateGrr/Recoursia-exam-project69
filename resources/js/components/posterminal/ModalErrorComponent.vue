<template>
    <MDBModal
        id="ModalError"
        tabindex="-1"
        labelledby="ModalErrorLabel"
        v-model="ModalError"
    >
        <MDBModalHeader>
            <MDBModalTitle id="ModalErrorLabel">Error</MDBModalTitle>
        </MDBModalHeader>
        <MDBModalBody>
            <div class="modal-body">{{ errorMsg }}</div>
        </MDBModalBody>
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
        name: 'ModalErrorComponent',
        data() {
            return {
                ModalError: false,
                errorMsg: ''
            }
        },
        methods: {
            openModalError(error) {
                this.ModalError = true;
                this.errorMsg = error;
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
