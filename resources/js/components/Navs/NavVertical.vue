<template>  
  
  <v-navigation-drawer v-if="autenticado" app v-model="drawer" :mini-variant.sync="mini"
  permanent color="#00A69D" dark>
    <v-list-item class="px-2">
       <v-app-bar-nav-icon @click="mini = !mini">
         
      </v-app-bar-nav-icon>

        <v-list-item-title>Bienvenido, {{user.nombre + ' ' + user.apellido}}</v-list-item-title>

        
      </v-list-item>
  
      <v-divider></v-divider>

      
      <v-list dense>
        
        <v-list-item link>
          <v-list-item-icon>
            <v-icon>
              mdi-home
            </v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>
              Inicio
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link>
          <v-list-item-icon>
            <v-icon>
              mdi-account
            </v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>
              Mi cuenta
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link v-if="user.esAdmin === 'si' ">
          <v-list-item-icon>
            <v-icon>
              mdi-account-supervisor
            </v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>
              Usuarios
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link>
          <v-list-item-icon>
            <v-icon>
              mdi-folder-plus
            </v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>
              Crear Publicación
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
         

         <v-list-item link>
          <v-list-item-icon>
            <v-icon>
              mdi-folder-account
            </v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>
              Mis Publicaciones
            </v-list-item-title>
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

export default {
  
  data () {
      return {
        
        drawer: false,
       
        mini: true,
      }
    },
    created() {
      
    },
    
      methods: {
        logout() {
          axios.post('/logout')
          .then(response =>{
            window.location.href= "/"
          })
        },      
        
             
    },
}
</script>
