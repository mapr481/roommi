<template>

 <v-app-bar
      fixed
      :collapse="!collapseOn"
      :collapse-on-scroll="collapseOnl"
      app color="#00A69D" dark>

     
        
      <v-toolbar-title >Roommi</v-toolbar-title>
  
      

      
      <v-text-field v-if="collapseOn"  dense class = "inputField input-name p-2 styled-input"
      label="Buscar" outlined rounded append-icon="mdi-magnify">
        
      </v-text-field>
     <v-spacer></v-spacer>
    <v-spacer></v-spacer>
    <div v-if="collapseOn">
      <v-btn v-if="autenticado" color="white" class="mr-3" small outlined @click="logout" >
        Cerrar Sesión
        <v-icon>
          mdi-account
        </v-icon>
      </v-btn>

    <div v-else>
      <v-btn  color="white"  v-if="collapseOn"  class="mr-3" small outlined href="login" >
        Login           
        <v-icon dense >
          mdi-account
        </v-icon>        
      </v-btn>

      <v-btn v-if="collapseOn" color="white" small outlined href="register" >
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
      
      label: 'Buscar'
    }
  },
  methods: {
        logout() {
          axios.post('/logout')
          .then(response =>{
            window.location.href= "/"
          })
        },
  }
    
}
</script>


    
<style >
  .input-name {
    
    width: 10px;
    height:55px;    
    
    
}
</style>
