

    let addcategory=require('./components/category/create.vue').default
    let allcategory=require('./components/category/index.vue').default
    let editcategory=require('./components/category/edit.vue').default

    let addbrand=require('./components/brand/create.vue').default
    let allbrand=require('./components/brand/index.vue').default
    let editbrand=require('./components/brand/edit.vue').default

    let addproduct=require('./components/product/create.vue').default
    let allproduct=require('./components/product/index.vue').default
    let editproduct=require('./components/product/edit.vue').default

    let allstock=require('./components/stock/index.vue').default
    let editstock=require('./components/stock/edit.vue').default

    let pos=require('./components/pos/index.vue').default
    
    let allorder=require('./components/order/index.vue').default
    let orderdetails=require('./components/order/order_details.vue').default



    let dashboard=require('./components/dashboard/dashboard.vue').default

    export const routes = [


      
      { path: '/addcategory', component: addcategory,name:'addcategory' },
      { path: '/allcategory', component: allcategory,name:'allcategory' },
      { path: '/editcategory', component: editcategory,name:'editcategory' },
      
      { path: '/addbrand', component: addbrand,name:'addbrand' },
      { path: '/allbrand', component: allbrand,name:'allbrand' },
      { path: '/editbrand', component: editbrand,name:'editbrand' },
      
      { path: '/addproduct', component: addproduct,name:'addproduct' },
      { path: '/allproduct', component: allproduct,name:'allproduct' },
      { path: '/editproduct', component: editproduct,name:'editproduct' },

      { path: '/allstock', component: allstock,name:'allstock' },
      { path: '/editstock', component: editstock,name:'editstock' },
      
      { path: '/pos', component: pos,name:'pos' },


      { path: '/allorder', component: allorder,name:'allorder' },
      { path: '/orderdetails', component: orderdetails,name:'orderdetails' },

      
      { path: '/dashboard', component: dashboard,name:'dashboard' },


    
      
    ]