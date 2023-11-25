<template>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Status</th>
                <th scope="col">System ID</th>
                <th scope="col">Address</th>
                <th scope="col">Serial number</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th class="float-right">
                    <button type="button" class="btn-sm btn btn-light" >
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <button type="button" class="btn-sm btn btn-light" @click="deleted" data-mdb-ripple-init>
                        <i class="fa-solid fa-eraser"></i>
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
            </tr>
        </tbody>
    </table>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                postamats: [{
                    id: 1,
                    status: 1,
                    system_id: 'PST0001',
                    address: 'Abay st., 102',
                    serial_number: 'S123456789',
                    created_at: '01.01.2023',
                    updated_at: '02.02.2023'
                }],
            };
        },

        mounted() {
            let vue = this;
            axios.get('/api/all')
            .then(function(response) {
                if (response.data.status) {
                    vue.postamats = response.data.postamats;
                } 
            })
        }
    }
</script>
