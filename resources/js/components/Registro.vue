<template>
<v-container class="center">


    <v-card append>
        <v-card-title>
            {{titulo}}
        </v-card-title>
        <v-divider></v-divider>
        <v-form @submit.prevent="save()">
            <v-layout row wrap>                
                <v-col cols="12" sm="6">
                    <v-text-field color="#00A69D" outlined clearable label="Nombre/s"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6">
                    <v-text-field color="#00A69D" outlined clearable label="Apellido/s"></v-text-field>
                </v-col>
            </v-layout>
            
            <v-layout row wrap>
                <v-col cols="12" sm="6">
                    <v-text-field color="#00A69D" outlined clearable label="Cédula"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6">
                    <v-date-picker v-model="value" :landscape="true" :reactive="true"></v-date-picker>
                 </v-col>
                  
            </v-layout>

            <v-layout row wrap>
                <v-col cols="12" sm="6">
                    <v-text-field color="#00A69D" outlined clearable label="Teléfono"></v-text-field>
                </v-col>
                 <v-col cols="12" sm="6">
                    <v-text-field color="#00A69D" outlined clearable label="Correo Electrónico"></v-text-field>
                </v-col>    
                

                   

            </v-layout>

            <v-layout row wrap>
             <v-col cols="12" sm="6">
                 <v-text-field color="#00A69D" outlined clearable label="Contraseña"></v-text-field>
             </v-col>
                
            <v-col cols="12" sm="6">
                <v-text-field color="#00A69D" outlined clearable label="Confirmar Contraseña"></v-text-field>
             </v-col>

            </v-layout>

            <v-layout row wrap >
                <v-col cols="4" sm="4" justify="center">
                    <v-btn  color="red">Borrar</v-btn>
                    <v-btn type="submit" color="green">Enviar</v-btn>
                </v-col>
            </v-layout>
    
            
        </v-form>

    </v-card>
    </v-container>
</template>




<script>
export default {
    data() {
        return {
            titulo: "Registrate"
        }
    },
}
</script>


<style>
    
</style>