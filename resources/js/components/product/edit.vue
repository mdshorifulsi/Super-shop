<template>
    <div>
      <div>
      <div class="card-header"> <router-link class="btn btn-primary" to="allproduct">All Product</router-link>
      </div>
    </div>
     <br>
     
    <div>
      <div class="card-header">Update product</div>
      <div class="card-body">
        <h4 class="text-danger" v-if="errors.product_name">{{errors.product_name[0]}}
        </h4>

        <form @submit.prevent="productUpdate" enctype="multipart/form-data">
          
            
            

                <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputEmail1">product name</label>
         <input type="text" v-model="form.product_name" class="form-control" aria-describedby="emailHelp" placeholder="product name">
              </div>

              <div class="col-md-3">
                     <label for="exampleInputEmail1">category</label>
              <select class="form-select" v-model="form.category_id"  aria-label="Default select example" >
        
              <option :value="category.id" v-for="category in categorys">
               {{ category.cat_name}}
              </option>
          
            </select>
              </div>

              <div class="col-md-3">
                     <label for="exampleInputEmail1">Brand</label>
              <select class="form-select" v-model="form.brand_id"  aria-label="Default select example" >
        
              <option :value="brand.id" v-for="brand in brands">
               {{ brand.brand_name}}
              </option>
          
            </select>
              </div>
            
        </div>


        <div class="form-row">

              <div class="col-md-4">
                <label for="exampleInputEmail1">Purchase price</label>
                <input type="text" v-model="form.purchase_price" class="form-control" aria-describedby="emailHelp" placeholder="Purchase price">
              </div>
              <div class="col-md-4">
                <label for="exampleInputEmail1">Selling price</label>
                <input type="text" v-model="form.selling_price" class="form-control" aria-describedby="emailHelp" placeholder="Selling price">
              </div>
              <div class="col-md-4">
                <label for="exampleInputEmail1">Discount price</label>
                <input type="text" v-model="form.discount_price" class="form-control" aria-describedby="emailHelp" placeholder="Discount price">
              </div>
            </div>
            <div class="form-row">
            <div class="col-md-4">
              <label for="exampleInputEmail1">Stock quantity</label>
              <input type="text" v-model="form.stock_quantity" class="form-control" aria-describedby="emailHelp" placeholder="Stock quantity">
            </div>
            <div class="col-md-4">
              <label for="exampleInputEmail1">weight</label>
              <input type="text" v-model="form.weight" class="form-control" aria-describedby="emailHelp" placeholder="weight">
            </div>
            <div class="col-md-4">
              <label for="exampleInputEmail1">color</label>
              <input type="text" v-model="form.color" class="form-control" aria-describedby="emailHelp" placeholder="color">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleFormControlTextarea1">Description </label>
              <textarea class="form-control" v-model="form.description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
          </div>
          <br>
          <div>
            <div class="col-md-4">
              <input type="file" name="image" class="btn btn-info" @change="onImageChange" accept="image/*"/>
            </div>
            <div class="col-md-4">
              <img :src="form.image" style="height:200px ; width: 250px;">
            </div>
          </div>
          <br>
          <button class="btn btn-primary" type="submit">Save</button>
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
        
        category_id:'',
        subcategory_id:'',
        brand_id:'',
        product_name:'',
        purchase_price:'',
        selling_price:'',
        discount_price:'',
        stock_quantity:'',
        image:'',
        description:'',
        model:'',
        size:'',
        color:'',
       
      },
      errors:{},
      categorys:{},
      brands:{},
    }

  },

  methods:{

    onImageChange(event){
        
        let input =event.target;
        if(input.files && input.files[0]){
            let reader=new FileReader();

            reader.onload=(event)=>{
                this.form.image=event.target.result;
      
      }
      reader.readAsDataURL(input.files[0])

}

},
    
productUpdate(){
    let id=this.$route.params.id
      axios.patch('/api/product/'+id,this.form)
      .then(()=>{
          Toast.fire({
          icon: 'success',
          title: 'product Update success'
        })
          this.$router.push({name:'allproduct'})
        })
      .catch(error=>{this.errors=error.response.data.errors})
      
      
    }
  
  },


  created(){

    let id=this.$route.params.id
    axios.get('/api/product/'+id)
    .then(({data})=>{
        this.form=data
    })
    .catch()

    axios.get('/api/category/')
     .then(({data})=>(this.categorys=data))

     axios.get('/api/brand/')
     .then(({data})=>{this.brands=data})
     
  }

 }
</script>
<style>
  
</style>
