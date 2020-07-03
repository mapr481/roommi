<template>

 <v-app-bar
      fixed
      :collapse="!collapseOn"
      
      app color="#00A69D" dark>

     
        
      <v-toolbar-title>
        <a href="/" placeholder="ROOMMI">
        <v-img src="https://i.ibb.co/1mpt8VZ/logomiguel1.png"
        max-width="130"        
        >       
        </v-img>
        </a>
      </v-toolbar-title>
  
      
      <v-form action="/api/search" @submit="buscar()" v-if="collapseOn">
        <v-text-field label="Buscar" class="mt-4 p-2" name="buscar" v-model="buscar">

        </v-text-field>
      </v-form>
      
      
     <v-spacer></v-spacer>
    <v-spacer></v-spacer>
    <v-btn  color="white"  v-if="collapseOn"  class="mr-3" small outlined href="/view" >
        Ver Publicaciones           
        <v-icon dense >
          mdi-aspect-ratio
        </v-icon>
       </v-btn>  
    <div v-if="collapseOn">
      <v-btn v-if="autenticado" color="white" class="mr-3" small outlined @click="logout" >
        Cerrar Sesión
        <v-icon>
          mdi-account
        </v-icon>
      </v-btn>

    <div v-else>
      <v-btn  color="white"  v-if="collapseOn"  class="mr-3" small outlined href="/login" >
        Login           
        <v-icon dense >
          mdi-account
        </v-icon>        
      </v-btn>

      <v-btn v-if="collapseOn" color="white" small outlined href="/register" >
          Registrar          
          <v-icon >
            mdi-account-plus
          </v-icon>          
        </v-btn>
      </div>
  </div>   
            
   <v-btn icon color="white" @click="collapseOn = !collapseOn"
   
   hide-details >
       
        <v-icon v-if="!collapseOn">mdi-chevron-right</v-icon>
        <v-icon v-else>mdi-chevron-left</v-icon>
      </v-btn>
      
    </v-app-bar>
  
</template>

<script>


export default {
  data() {
    return {
      collapseOn: true,
      buscar: '',
      label: 'Buscar'
    }
  },
  methods: {
        logout() {
          
          axios.post('/logout')
          .then(response =>{
            window.location.href= "/"
          }),
          localStorage.clear()
        },

        buscar(){
          
          axios.post('api/search/', {
            buscar: this.buscar
          })
        }
       
  }
    
}
</script>


    
<style >
  .input-name {
    
    width: 10px;
    height:55px;    
    
    
}
</style>
