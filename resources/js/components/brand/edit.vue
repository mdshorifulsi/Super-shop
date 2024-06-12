<template>
  <div>
    <div>
      <div class="card-header">
        <router-link class="btn btn-primary" to="allbrand">All Brand</router-link>
      </div>
    </div><br>
    <div>
      <div class="card-header">Brand Update</div>
      <div class="card-body">
       
        <form @submit.prevent="brandUpdate" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-8">
                <label for="exampleInputEmail1">Brand name</label>
                <input type="text" v-model="form.brand_name" class="form-control" aria-describedby="emailHelp" placeholder="Brand name">
              </div>
            </div>
            <hr>
            <div class="form-row">
              <div class="col-md-4">
                <input type="file" name="brand_logo" class="btn btn-info" @change="onImageChange" accept="image/*"/>
              </div>
              <div class="col-md-8">
                <img :src="form.brand_logo" style="height:200px ; width: 250px;">
              </div>
            </div>
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
    return{
      form:{
       	brand_name:'',
      	brand_logo:'', 
      },
    }
  
  },
  
  methods:{

    onImageChange(event){
      let input =event.target;
      if(input.files && input.files[0]){
        let reader=new FileReader();
        reader.onload=(event)=>{
          this.form.brand_logo=event.target.result;
        }
      reader.readAsDataURL(input.files[0])
    }
  },

   brandUpdate(){

   	let id=this.$route.params.id;
   	axios.patch('/api/brand/'+id,this.form)
   	.then(()=>{
      Toast.fire({
          icon: 'success',
          title: 'Brand Update success'
        })

   		 this.$router.push({name:'allbrand'})
   	})
   }  
  },

  created(){

    let id=this.$route.params.id;
    axios.get('api/brand/'+id)
    .then(({data})=>{this.form=data})
  	.catch()
  }

  }
  
  </script>
  <style>
  
  </style>
  