<template>
    <h1 class="display-6">Defective postamats</h1>
    <main class="mt-4 d-flex flex-column align-items-center">
        <div class="col-sm-12">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="col-sm">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
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
                    <tr v-for="(defective, key) of defectives" :key="key">
                        <td>{{ defective.id }}</td>
                        <td>{{ defective.titles }}</td>
                        <td>{{ defective.description }}</td>
                        <td>{{ defective.created_at }}</td>
                        <td>{{ defective.updated_at }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-dark" @click="showModal('edit', defective)"> <i
                                    class="fa-regular fa-pen-to-square"></i></button>
                            <button type="button" class="btn btn-sm btn-dark" @click="showModal('delete', defective)"><i
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
            defectives: [],
            createModal: false,
            editModal: false,
            deleteModal: false,
            newObject: {
                status: 0,
                system_id: null,
                address: null,
                serial_number: null
            },
            currentDefective: {}
        };
    },

    mounted() {
        let vue = this;
        axios.get('/api/defective')
            .then(function (response) {
                if (response.data.status) {
                    vue.defectives = response.data.defectives;
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    },

    save: function(modal) {
            let vue = this;
            if (modal == 'create') {
                axios.post('/api/defective/create', vue.newObject)
                    .then(function (response) {
                        if (response.data.status) {
                            vue.defectives = response.data.defectives;
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
                axios.post('/api/defective/edit', vue.currentDefective)
                    .then(function (response) {
                        if (response.data.status) {
                            vue.defectives = response.data.defectives;
                            vue.showModal(modal);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            } 
            else if (modal == 'delete') {
               console.log(this.currentDefective);
                axios.post('/api/defective/delete', vue.currentDefective)
                    .then(function (response) {
                        if (response.data.status) {
                            vue.defectives = response.data.defectives;
                            vue.showModal(modal);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
           }
        }
    
}
</script> 
