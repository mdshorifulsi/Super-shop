<template>
  <div>
    <div>
      <div class="card-header"> <router-link class="btn btn-primary" to="addbrand">Add brand</router-link>
      </div>
    </div>
    <br>
    <div>
      <div class="card-body">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            brand list
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <label>Search</label>
              <input type="text" v-model="searchTerm" class="form-control" style="width:200px">
              <br>
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>brand Name</th>
                    <th>brand Logo</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="brand,key in filtersearch" :key="brand.id">
                    <td>{{++key}}</td>
                    <td>{{brand.brand_name}}</td>
                    <td><img :src="brand.brand_logo" style="height:120px ; width: 150px;">
                    </td>
                    <td>
                      <router-link :to="{name:'editbrand',params:{id:brand.id}}" class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i>
                      </router-link>
                      <a @click="deletebrand(brand.id)" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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
    return{
      brands:[],
      searchTerm:'',
    }
  },


computed:{

  filtersearch(){
   return this.brands.filter(brand=>{
     return brand.brand_name.match(this.searchTerm);
    })
  }

},

  methods:{


   allbrand(){
    axios.get('/api/brand/')
    .then(({data})=>{this.brands=data})
    .catch()
    
   },

  deletebrand(id){

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
          axios.delete('/api/brand/'+id)
          .then(()=>{
            this.brands=this.brands.filter(brand=>{
             return brand.id!=id
            })
          })
          .catch(()=>{
            this.$router.push({name:'allbrand'})
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
    this.allbrand();

  }


}
</script>


<style>
  
</style>
