let user = document.head.querySelector('meta[name="user"]');

module.exports = {
    computed: {
        user(){
          return JSON.parse(user.content);
        }
      },
}