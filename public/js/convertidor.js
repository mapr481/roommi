<script>
function api(){
    fetch('https://petroapp-price.petro.gob.ve/price/', {
      method: 'POST', 
      body: JSON.stringify({"fiats" : ["BS", "USD"]}), 
      headers:{ 'Content-Type': 'application/json' }
    })
    .then(function(response){return response.json();})
    .then(response => {
      let valor = 0
      if(response === undefined) {
        document.getElementById('precio').innerHTML = "precioSalida"
      } else {
        valor = parseFloat(response.data.USD.BS).toFixed(2)
        document.getElementById('precio').innerHTML = valor;
        console.log(valor)
      }
    }).catch((error) => {
      document.getElementById('precio').innerHTML = error.message
    })
  }

  api();
</script>