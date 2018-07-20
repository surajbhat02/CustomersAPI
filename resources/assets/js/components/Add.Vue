<template>
    <div class="add container">
        <h1 class="page-header">Add Customer</h1>
        <!--<p v-if="success">{{msg}}</p>-->
        <form @submit.prevent="addCustomer" class="mb-2">
            <div class="well">
                <h4>Customer Info</h4>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" placeholder="First Name" v-model="customer.first_name">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Last Name" v-model="customer.last_name">
                </div>
            </div>
            <div class="well">
                <h4>Customer Contact</h4>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="Email" v-model="customer.email">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" placeholder="Phone" v-model="customer.phone">
                </div>
            </div>
            <div class="well">
                <h4>Customer Location</h4>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" placeholder="address" v-model="customer.address">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" placeholder="city" v-model="customer.city">
                </div>
                <div class="form-group">
                    <label>State</label>
                    <input type="text" class="form-control" placeholder="state" v-model="customer.state">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>
</template>

<script>
    export default {
       name: 'add',
       data(){
           return {
               customer:{
                   id:'',
                   first_name:'',
                   last_name:'',
                   phone:'',
                   email:'',
                   address:'',
                   city:'',
                   state:''
               },
               //success:false,
               //msg:'Successfully Added'
               
           }
       },
       methods:{
           addCustomer: function(e) {
               if(!this.customer.first_name || !this.customer.last_name || !this.customer.email )
               {
                   console.log('Please Fill in all fields');
               }
               else
               {
                   fetch('api/customer',{
                       method:'post',
                       body: JSON.stringify(this.customer),
                       headers :{
                           'content-type':'application/json'
                       }
                   })
                   .then(res=>res.json())
                   .then(data=>{
                       this.customer.first_name="";
                       this.customer.last_name="";
                       this.customer.email="";
                       this.customer.phone="";
                       this.customer.address="";
                       this.customer.city="";
                       this.customer.state="";
                       //this.success=true;
                       this.$router.push({path:'/',query: {alert:'Customer Added'}});
                       
                   })
                   .catch(err=>console.log(err));

               }
           }
       }
       
    }
</script>

<style scoped>

</style>

