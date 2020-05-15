<template>
  <v-navigation-drawer app v-model="drawer" :mini-variant.sync="mini"
  permanent color="#00A69D" dark>
    <v-list-item class="px-2">
       <v-app-bar-nav-icon @click="mini = !mini">
         
      </v-app-bar-nav-icon>

        <v-list-item-title>{{user.nombre + ' ' + user.apellido}}</v-list-item-title>

        
      </v-list-item>
  
      <v-divider></v-divider>

      <v-list dense>
        <v-list-item
          v-for="item in items"
          :key="item.title"
          link
        >
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        
      
      
        <v-divider></v-divider>
       
        <v-list-item link @click="logout">
        <v-list-item-icon>
            <v-icon>mdi-power</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>Cerrar Sesión</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
  </v-navigation-drawer>
</template>

<script>

import auth from '../mixins/auth'

export default {
  
  data () {
      return {
        
        drawer: false,
        items: [
          { title: 'Inicio', icon: 'mdi-home-city' },
          { title: 'Mi cuenta', icon: 'mdi-account' },
          { title: 'Crear Pulbicación', icon: 'mdi-folder-plus' },
          {title: 'Mis Publicaciones', icon: 'mdi-folder-account'},
          
          
        ],

        mini: true,
      }
    },
    created() {
      
    },
    mixins: [auth],

      methods: {
        logout() {
          axios.post('/logout')
          .then(response =>{
            window.location.href= "login"
          })
        },      
        
             
    },
}
</script>
