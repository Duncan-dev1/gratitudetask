<template>
    <div>
        <div class="row">
            <div class="col-lg-12 button-container">
                <button type="button" @click="loadAssignmentForm" class="btn btn-rounded btn-success margin-inline add-facility">Assign</button>
            </div>
        </div>
        <div class="assignments-table" v-show="!assignmentMode">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Reg</th>
                        <th scope="col">Category</th>
                        <th scope="col">Mechanic</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="assignment in assignments">
                        <th scope="row">1</th>
                        <td>{{assignment.car}}</td>
                        <td>{{assignment.category}}</td>
                        <td>{{assignment.mechanic}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card" v-show="assignmentMode">
            <div class="row">
                <div class="col-md-9">
                    <!--Add location form -->
                    <div id="add-facility-location-form">
                        <form
                            @submit.prevent="
                                AssignmentEditMode
                                    ? editAssignment()
                                    : storeAssignment()
                            "
                        >
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Car*</label>
                                    <select
                                        v-model="form.car_id"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': form.errors.has(
                                                'car_id'
                                            )
                                        }"
                                        required="required"
                                    >
                                        <option value=""
                                            >-- Select Car 
                                            --</option
                                        >
                                        <option
                                            v-for="car in cars"
                                            :value="car.id"
                                            :key="car.id"
                                        >
                                            {{ car.registration_number }}
                                        </option>
                                    </select>
                                    <has-error
                                        :form="form"
                                        field="car_id"
                                    ></has-error>
                                </div>
                                <div class="form-group">
                                    <label>Category*</label>
                                    <select
                                        v-model="form.category_id"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': form.errors.has(
                                                'category_id'
                                            )
                                        }"
                                        required="required"
                                    >
                                        <option value=""
                                            >-- Select Category 
                                            --</option
                                        >
                                        <option
                                            v-for="category in categories"
                                            :value="category.id"
                                            :key="category.id"
                                        >
                                            {{ category.category_name }}
                                        </option>
                                    </select>
                                    <has-error
                                        :form="form"
                                        field="category_id"
                                    ></has-error>
                                </div>
                                <div class="form-group">
                                    <label>Mechanic*</label>
                                    <select
                                        v-model="form.mechanic_id"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': form.errors.has(
                                                'mechanic_id'
                                            )
                                        }"
                                        required="required"
                                    >
                                        <option value=""
                                            >-- Select Mechanic 
                                            --</option
                                        >
                                        <option
                                            v-for="mechanic in mechanics"
                                            :value="mechanic.id"
                                            :key="mechanic.id"
                                        >
                                            {{ mechanic.name }}
                                        </option>
                                    </select>
                                    <has-error
                                        :form="form"
                                        field="mechanic_id"
                                    ></has-error>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button
                                    type="button"
                                    id="del-add-calendar"
                                    class="btn btn-light waves-effect"
                                    data-dismiss="modal"
                                >
                                    Cancel
                                </button>
                                <button
                                    type="submit"
                                    id="add-calendar-button"
                                    class="btn btn-success waves-effect waves-light"
                                    :disabled="form.busy"
                                >
                                    <i
                                        v-if="assignmentButton"
                                        class="fa fa-spinner fa-spin"
                                    ></i
                                    >{{ AssignmentEditMode ? "Update" : "Save" }}
                                </button>
                                <div style="margin-top: 1rem">
                                    <alert-error
                                        :form="form"
                                        message="There were some problems with your input. Please check the form for error messages"
                                    ></alert-error>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End of Add location form -->
                </div>
            </div>
        </div>
   </div>
</template>
<script>

export default {
    props : ['existingassignments', 'cars', 'categories', 'mechanics'],

    data(){
        return{
            assignments:this.existingassignments,
            assignmentButton:false,
            AssignmentEditMode:false,
            assignmentMode:false,

            form:new Form({
                car_id:'',
                category_id:'',
                mechanic_id:'',
            })
        }
    },

    methods:{
        loadAssignmentForm(){ 
            this.assignmentMode=true
        },

        storeAssignment(){
            axios.post('car-assignment',{
                car_id:this.form.car_id,
                category_id:this.form.category_id,
                mechanic_id:this.form.mechanic_id
            })
            .then( ({ data }) => {
                this.assignments = data.existingassignments;  
                this.assignmentMode = false
            })
            .catch( ({ error }) => {

            })
        }
    },

}
</script>

<style scoped>
.button-container {
  display: flex;
  justify-content: flex-end;
  margin-top: 10px;
  margin-bottom: 10px;
}
</style>