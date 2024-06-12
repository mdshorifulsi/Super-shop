<template>
  <div>
    <div class="row" >

          <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5"><strong> Today Sell</strong></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left"><strong>{{todaySell}} Taka </strong> </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5"><strong> today Cash</strong> </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left"><strong>{{todayincome}} Taka</strong></span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5"><strong> Today todaydue</strong> </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left"><strong>{{todaydue}} Taka</strong></span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="allproduct">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Product</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
            <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="pos">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Point of sale (POS)</strong></span>
                  </router-link> 
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="allstock">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Stock</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  <router-link class="nav-link" to="allorder">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><strong>Order</strong></span>
                  </router-link>
                </div>
              </div>
            </div>
          </div>        
        </div><br>
      </div>
</template>


<script>

export default{


  data(){
    return {
     todaySell:'',
     todayincome:'',
     todaydue:'',
   
     
    }

  },

  methods:{

   TodaySell(){
      axios.get("/api/todaysell/")
      .then(({data})=>(this.todaySell=data))
      .catch()
    
    },

     Todayincome(){
      axios.get("/api/todayincome/")
      .then(({data})=>(this.todayincome=data))
      .catch()
    
    },

     Todaydue(){
      axios.get("/api/todaydue/")
      .then(({data})=>(this.todaydue=data))
      .catch()
    
    },


  },
  created(){
    this.TodaySell();
    this.Todayincome();
    this.Todaydue();
    this.Todayexpense();
  }
 
 }
</script>


<style>
  
</style>
