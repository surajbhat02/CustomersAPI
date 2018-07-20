<template>
    <div class="details container">
        <h1 class="page-header">{{customer.first_name}}</h1>

    </div>
</template>

<script>
    export default {
       name: 'customerdetails',
       data(){
           return {
               customer:''   
           }
       },
       created:function()
       {
           this.fetchCustomer(this.$route.params.id);
       },
       methods:{
           fetchCustomer:function(id){

               fetch('api/customer/'+{id})
               .then(res=>res.json())
               .then(res=>{
                   this.customer=res.data;
                   //console.log(res.data);
               })
               .catch(err=>console.log(err));
           }
       }
    }
</script>

<style scoped>

</style>

