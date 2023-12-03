<template>
    <div>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">status</th>
                    <th scope="col">system id</th>
                    <th scope="col">address</th>
                    <th scope="col">serial number</th>
                    <th scope="col">created at</th>
                    <th scope="col">updated at</th>
                    <th>
                        <button class="btn-sm btn btn-light me-2" data-mdb-ripple-init data-mdb-ripple-color="dark"
                            @click="addOrEdit('create')" title="Add">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                        <button class="btn-sm btn btn-light me-2" data-mdb-ripple-init data-mdb-ripple-color="dark"
                            @click="switchViewingMode('Existing')" title="Show Posterminals">
                            <i class="fa-solid fa-list-ul"></i>
                        </button>
                        <button class="btn-sm btn btn-light me-2" data-mdb-ripple-init data-mdb-ripple-color="dark"
                            @click="switchViewingMode('Remote')" title="Show Deleted">
                            <i class="fa-solid fa-bars-staggered"></i>
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="posterminal in posterminals">
                    <th scope="row">{{ posterminal.id }}</th>
                    <td :class="'fw-bold'+(posterminal.status == '1'? ' text-success':' text-danger')">{{ posterminal.status == '1'? 'ON':'OFF' }}</td>
                    <td :class="tableRowColor">{{ posterminal.system_id }}</td>
                    <td :class="tableRowColor">{{ posterminal.address }}</td>
                    <td :class="tableRowColor">{{ posterminal.serial_number }}</td>
                    <td :class="tableRowColor">{{ posterminal.created_at }}</td>
                    <td :class="tableRowColor">{{ posterminal.updated_at }}</td>
                    <td>
                        <button :class="'btn-sm btn btn-dark me-2'+(viewingMode=='Existing'?'':' d-none')" data-mdb-ripple-init
                            @click="addOrEdit('update', posterminal)" title="Edit">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                        <button class="btn-sm btn btn-dark me-2" data-mdb-ripple-init
                            @click="deleteOrRestore(posterminal.id)" :title="viewingMode=='Existing'?'Delete':'Restore'">
                            <i :class="'fas fa-trash'+(viewingMode=='Existing'?'':' d-none')"></i>
                            <i :class="'fa-solid fa-trash-can-arrow-up'+(viewingMode=='Existing'?' d-none':'')"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: 'TableComponent',
        mounted() {
            this.showPosterminals();
        },
        data() {
            return {
                posterminals: null,
                viewingMode: 'Existing'
            }
        },
        methods: {
            addOrEdit(modeModalInput, posterminal = null) {
                this.$parent.$refs.modalInput.openModalInput(modeModalInput, posterminal);
            },
            switchViewingMode(mode) {
                if (mode == 'Existing') {
                    this.viewingMode = mode;
                    this.showPosterminals();
                } else {
                    this.$parent.$refs.modalConfirm.openModalConfirme(
                        'Show deleted list?',
                        function(arg) {
                            arg[0].viewingMode = arg[1];
                            arg[0].showPosterminals();
                        },
                        [this, mode]
                    );
                }
            },
            showPosterminals(){
                axios.post('api/posterminal/show'+this.viewingMode)
                .then((data) => {
                    if (data.data[0] == '200') {
                        this.posterminals = data.data[1];
                    } else {
                        this.$parent.$refs.modalError.openModalError(data.data);
                    }
                });
            },
            deleteOrRestore(id) {
                let query = this.viewingMode =='Existing'?'delete':'restore';
                let confirmationQuestion = query.charAt(0).toUpperCase()
                    +query.slice(1)+' posterminal with ID: '+id+' ?';

                this.$parent.$refs.modalConfirm.openModalConfirme(
                    confirmationQuestion,
                    function (arg) {
                        let id = arg[1];
                        axios.post('api/posterminal/'+arg[0], {
                            id: id
                        })
                        .then((data) => {
                            if (data.data == '200') {
                                arg[2]();
                            } else {
                                this.$parent.$refs.modalError.openModalError(data.data);
                            }
                        });
                    },
                    [query, id, this.showPosterminals]
                );
            },
        },
        computed: {
            tableRowColor() {
                return this.viewingMode=='Existing'?'':' text-danger';
            }
        }
    }
</script>
