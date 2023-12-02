<template>
    <title>Posterminal</title>
    <main class="mt-5 d-flex flex-column align-items-center">
        <ModalErrorComponent ref="modalError"></ModalErrorComponent>
        <ModalConfirmConponent ref="modalConfirm"></ModalConfirmConponent>
        <ModalInputComponent ref="modalInput"></ModalInputComponent>
        <TableComponent ref="table"></TableComponent>
    </main>
</template>

<script>
    import ModalErrorComponent from './ModalErrorComponent.vue';
    import ModalConfirmConponent from './ModalConfirmComponent.vue';
    import ModalInputComponent from './ModalInputComponent.vue';
    import TableComponent from './TableComponent.vue';

    export default {
        name: 'MainComponent',
        components: {
            ModalErrorComponent,
            ModalConfirmConponent,
            ModalInputComponent,
            TableComponent
        }
    }
</script>
