<template>
  <div>
    <div>
      <div class="card-header">
        <router-link class="btn btn-primary" to="allcategory">All Brand</router-link>
      </div>
    </div>
    <br>
    <div>
      <div class="card-header">Brand Insert</div>
      <div class="card-body">
        <form @submit.prevent="brandInsert" enctype="multipart/form-data">
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
          <button class="btn btn-primary" type="submit">submit</button>
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
      brand_name:'',
      brand_logo:'',
    },
  }

},

  methods:{
    brandInsert(){
      axios.post('/api/brand/',this.form)
      .then(()=>{
        Toast.fire({
          icon: 'success',
          title: 'Brand added success'
        })
      this.$router.push({name:'allbrand'})
    })
  },

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
      }
    }

</script>


<style>

</style>
