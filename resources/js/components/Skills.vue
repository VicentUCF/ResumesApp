<template>

    <div class="card">
        <div class="card-header">Skills</div>

        <div class="card-body">

            <div v-for="(input, i) in inputs" :key="i" class="d-flex p-0 mb-2">
                <div class='col-10'>
                    <input
                        placeholder="Javascript"
                        type="text"
                        class="form-control"
                        name ="skills[]"
                        v-model="inputs[i]"
                    >
                </div>
                <div class="col-2">
                    <button class="btn btn-danger" @click.prevent="remove(i)">
                        Delete
                    </button>
                </div>
            </div>

            <div>
                <button class="ml-3 btn btn-primary " @click.prevent="add()">
                    Add
                </button>
            </div>
        </div>
    </div>

</template>

<script>
    export default {

        props:{
            skills: {
                type: Array,
                default: () => ([]),
            }
        },

        mounted() {
            console.log('Component mounted.')
        },

        data() {
            return{
                inputs: this.skills,
            }
        },

        methods: {
            add(){
                this.inputs.push('');
            },

            remove(i){
                this.inputs.splice(i, 1);
            }
        }
    }
</script>
