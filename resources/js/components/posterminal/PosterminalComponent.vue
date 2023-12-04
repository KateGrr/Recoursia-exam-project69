<template>
    <title>Posterminal</title>
    <main class="mt-5 d-flex flex-column align-items-center">
        <ModalErrorComponent ref="modalError"></ModalErrorComponent>
        <ModalConfirmComponent ref="modalConfirm"></ModalConfirmComponent>
        <ModalInputComponent ref="modalInput"></ModalInputComponent>
        <TableComponent ref="table"></TableComponent>
    </main>
</template>

<script>
    import ModalErrorComponent from './ModalErrorComponent.vue';
    import ModalConfirmComponent from './ModalConfirmComponent.vue';
    import ModalInputComponent from './ModalInputComponent.vue';
    import TableComponent from './TableComponent.vue';

    export default {
        name: 'MainComponent',
        components: {
            ModalErrorComponent,
            ModalConfirmComponent,
            ModalInputComponent,
            TableComponent
        }
    }
</script>
