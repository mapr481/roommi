<template>   
    <v-footer 
      
      dark
      padless
      app
    >
      <v-card
        

        class="flex"
        flat
        tile
      >
        <v-card-title class="color">
          <strong class="subheading subtitle-2">Síguenos en nuestras redes sociales</strong>

          <v-spacer></v-spacer>

          <v-btn
            v-for="icon in icons"
            :key="icon"
            class="mx-4"
            dark
            icon
          >
            <v-icon size="20px">{{ icon }}</v-icon>
          </v-btn>
        </v-card-title>

        <v-card-text class="py-2 white--text text-center">
          {{ new Date().getFullYear() }} — <strong>Roommi</strong>
        </v-card-text>
      </v-card>
    </v-footer>
  
</template>


<script>
  export default {
    data: () => ({
      icons: [
        'mdi-facebook',
        'mdi-twitter',
        'mdi-linkedin',
        'mdi-instagram',
      ],
    }),
  }
</script>