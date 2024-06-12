<template>
  <div>
    <div>
      <div class="card-header">
        <router-link class="btn btn-primary" to="addproduct">Add product</router-link>
      </div>
    </div><br>
    <div>
      <div class="card-body">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          product list</div>
          <div class="card-body">
            <div class="table-responsive">
              <label>Search</label>
              <input type="text" v-model="searchTerm" class="form-control" style="width:200px"><br>
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>id</th>
                    <th> Name</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>purchase</th>
                    <th>Selling </th>
                    <th>discount</th>
                    <th>stock</th>
                    <th>stock status</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="product,key in filtersearch" :key="product.id">
                    <td>{{++key}}</td>
                    <td>{{ product.product_name }}</td>
                    <td>{{ product.cat_name }}</td>
                    <td>{{ product.brand_name }}</td>
                    <td>{{ product.purchase_price }}Tk</td>
                    <td>{{ product.selling_price }}Tk</td>
                    <td>{{ product.discount_price }}Tk</td>
                    <td>{{ product.stock_quantity }}ps</td>
                    <td v-if="product.stock_quantity>0"><span class="badge bg-warning text-dark">available</span>
                    </td>
                    <td v-else="">
                      <span class="badge bg-danger">Stock out</span></td>
                    <td>
                      <img :src="product.image" style="height:120px ; width: 150px;"></td>
                      <td>
                        <router-link :to="{name:'editproduct',params:{id:product.id}}" class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i></router-link>
                        <a @click="deleteproduct(product.id)" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>



  <script>


  export default{

    data(){
    return {
       products:[],
      searchTerm:''
    }

  },

  computed:{
   
    filtersearch(){
    return  this.products.filter(product=>{
      return  product.product_name.match(this.searchTerm)
      })
    }
  },


  methods:{

    allproduct(){
    axios.get('/api/product/')
    .then(({data })=>{
      this.products=data
    })
    .catch()

   },

   deleteproduct(id){

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
        axios.delete('/api/product/'+id)
        .then(()=>{
        	this.products=this.products.filter(product=>{
        		return product.id !=id
        	})
        
      })
      .catch(()=>{
      this.$router.push({name:'allproduct'})
      })
      Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      )
      }
      })

      },
  },


  created(){
    this.allproduct();

  }

 
 }
</script>


<style>
  
</style>
