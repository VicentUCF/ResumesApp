<template>
  <div class="my-2">
      <div v-for="(form,i) in target[prop]" :key="i" class="row mb-3">
          <div class="col-sm">
              <div class="card bg-dark">
                  <div class="card-header bg-dark-gray d-sm-flex justify-content-sm-between">
                      <div>
                          <h3>{{ title }}# {{ i }}</h3>
                      </div>
                      <div>
                          <button class="btn btn-danger btm-block" @click="remove(i)">
                              Delete <i class="fa fa-trash"></i>
                          </button>
                      </div>
                  </div>

                  <div class="card-body">
                       <VueFormGenerator
                        :schema ="schema"
                        :model="target[prop][i]"
                        :options="{
                            validateAfterLoad: true,
                            validateAfterChanged: true,
                            validateAsync: true,
                          }"
                        />
                  </div>

                  <div v-for="(subform, j) in subforms" :key="j">
                      <component
                        :is="subform.component"
                        v-bind="{model: target[prop][i], ...subform.props}"

                      />
                  </div>
              </div>
          </div>
      </div>
      <button class="btn btn-primary" type="button" @click="add()">
          Add new
      </button>
  </div>
</template>

<script>
import { component as VueFormGenerator } from 'vue-form-generator';
import mixin from './mixin';
export default {
    name: 'DynamicForm',

    mixins: [mixin],

    components: {
        VueFormGenerator,
    },

    props: {

        schema:{
            type: Object,
            required: true,
        },
        subforms:{
            type: Array,
            required: false,
            default: () => [],
        }
    },

};
</script>

