let user = document.head.querySelector('meta[name="user"]');

module.exports = {
    computed: {
        user(){
          return JSON.parse(user.content);
        },
        autenticado(){
          return !! user.content;
        }
      },
      guest(){
        return ! this.autenticado;
      },

      admin(){
        return  !! user.esAdmin == "si";
      }
}