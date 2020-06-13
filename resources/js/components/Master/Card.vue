<template>
    <v-app> 

        <div class="mt-5">

        <div class="mt-5">     
            <v-container> 
                <v-row justify="center">
                    <v-col cols="10">

                        <v-card color="#F2B705" fixed href="/admin/users" shaped>                   
                            <v-card-title class="subtitle-1">                                                 
                                Usuarios
                                <v-spacer></v-spacer>                     
                                <v-icon>mdi-chevron-right</v-icon>                                        
                            </v-card-title>                    
                        </v-card >

                        <v-card color="#F2B705" fixed href="/admin/publications" class="mt-3" shaped>        
                            <v-card-title class="subtitle-1">                         
                                Publicaciones
                                <v-spacer></v-spacer>                     
                                <v-icon>mdi-chevron-right</v-icon>                                        
                            </v-card-title>                    
                        </v-card >

                        <v-card color="#F2B705" fixed href="/user/account" class="mt-3" shaped>        
                            <v-card-title class="subtitle-1">                         
                                Mi cuenta
                                <v-spacer></v-spacer>                     
                                <v-icon>mdi-chevron-right</v-icon>                                        
                            </v-card-title>                    
                        </v-card >

                        <v-card color="#F2B705" fixed href="/user/publications" class="mt-3" shaped>        
                            <v-card-title class="subtitle-1">                         
                                Mis publicaciones
                                <v-spacer></v-spacer>                     
                                <v-icon>mdi-chevron-right</v-icon>                                        
                            </v-card-title>                    
                        </v-card >

                        <v-card color="#F2B705" fixed href="/admin/stats" class="mt-3" shaped>        
                            <v-card-title class="subtitle-1">                         
                                Estadísticas de la página
                                <v-spacer></v-spacer>                     
                                <v-icon>mdi-chevron-right</v-icon>                                        
                            </v-card-title>                    
                        </v-card >

                    </v-col>     
                </v-row>                     
            </v-container> 
        </div>   
        </div>    
    </v-app>
</template>

<script>
export default {
    
}
</script>

<style>
    
</style>