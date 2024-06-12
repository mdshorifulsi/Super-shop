<template>
  <div>
    <div>
      <div class="card-header">Stock Update</div>
      <div class="card-body">
        <form @submit.prevent="ProductUpdate" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputEmail1">Product Quentity</label>
                <input type="text" v-model="form.stock_quantity" class="form-control" aria-describedby="emailHelp" placeholder="Product Quentity">
              </div>
            </div>
            <hr>
          </div>
          <button class="btn btn-primary" type="submit">Update</button>
        </form>
      </div>
    </div>
  </div>
</template>
  
  
  <script>
  
  export default{
    data(){
      return {
        form:{
      	stock_quantity:'', 
      },
    }
  },
  
  methods:{

   ProductUpdate(){
   	let id=this.$route.params.id;
   	axios.post('/api/stock/update/'+id,this.form)
   	.then(()=>{
      Toast.fire({
          icon: 'success',
          title: 'stock Update success'
        })

   		 this.$router.push({name:'allstock'})
   	})
   } 
  },

  created(){

  	let id=this.$route.params.id;
  	axios.get('api/product/'+id)
  	.then(({data})=>{this.form=data})
  	.catch()
  }


  }
  </script>
  <style>
  
  </style>
  