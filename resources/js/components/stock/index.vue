<template>
  <div>
    <div>
      <div class="card-body">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>Stock
          </div>
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
                    <th class="text-warning"> stock</th>
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
                    <td class="badge bg-warning">{{ product.stock_quantity }} KG</td>
                    <td><img :src="product.image" style="height:120px ; width: 150px;"></td>
                    <td>
                      <router-link :to="{name:'editstock',params:{id:product.id}}" class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i></router-link>
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
    axios.get('/api/stock/')
    .then(({data })=>{
      this.products=data
    })
    .catch()

   },

  },


  created(){
    this.allproduct();

  }

 
 }
</script>


<style>
  
</style>
