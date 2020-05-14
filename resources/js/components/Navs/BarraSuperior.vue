<template>

 <v-app-bar
      :collapse="!collapseOnScroll"
      :collapse-on-scroll="collapseOnScroll"
      app
      
      color="#00A69D"
      dark
      scroll-target="#scrolling-techniques-6"
    >

     
        
      <v-toolbar-title >Roommi</v-toolbar-title>
  
    
      <v-text-field v-if="collapseOnScroll" dense class = "inputField input-name p-2 styled-input"
      label="Buscar" outlined rounded append-icon="mdi-magnify">
        
      </v-text-field>
     <v-spacer></v-spacer>
    <v-spacer></v-spacer>
       <v-btn  color="white" v-if="collapseOnScroll" class="mr-3" small outlined
       href="login" >Login 
        
        <v-icon dense tag="login" > mdi-account</v-icon>
        
      </v-btn>

        <v-btn v-if="collapseOnScroll" color="white" small outlined
        href="register" >Registrar
        
        <v-icon tag="login"> mdi-account-plus</v-icon>
        
      </v-btn>
      

     

   <v-btn icon color="white" @click="collapseOnScroll = !collapseOnScroll"
   
   hide-details >
       
        <v-icon v-if="!collapseOnScroll">mdi-chevron-right</v-icon>
        <v-icon v-else>mdi-chevron-left</v-icon>
      </v-btn>
      
    </v-app-bar>
  
</template>

<script>
export default {
  data() {
    return {
      collapseOnScroll: true,
      label: 'Buscar'
    }
  },
    
}
</script>


    
<style >
  .input-name {
    
    width: 10px;
    height:55px;    
    
    
}
</style>
