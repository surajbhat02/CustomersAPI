<template>
    <div class="customers container">
        <Alert v-if="alert" v-bind:message="alert"/>
        <h1 class="page-header">Manage Customers</h1>

        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="customer in customers" v-bind:key="customer.id">
                    <td>{{customer.first_name}}</td>
                    <td>{{customer.last_name}}</td>
                    <td>{{customer.email}}</td>
                    <td><router-link class="btn btn-light btn-block" v-bind:to="'/customer/'+ customer.id">View</router-link></td>
                </tr>
            </tbody>

        </table>
    </div>
</template>

<script>
    import Alert from './Alert'

    export default {
       name: 'customers',
       data(){
           return {
               customers:[],
               alert:''
           }
       },
       created: function(){
           if(this.$route.query.alert)
           {
               this.alert=this.$route.query.alert;
           }
           this.fetchCustomers();
       },
       methods:{
           fetchCustomers: function()
           {
               fetch('api/customers')
               .then(res=>res.json())
               .then(res=>{
                   this.customers=res.data;
                   //console.log(res.data);
               })
               .catch(err=>console.log(err));
           }
       },
       components:{
           Alert
       }
    }
</script>

<style scoped>

</style>

