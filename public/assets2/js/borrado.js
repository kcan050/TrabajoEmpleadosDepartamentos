
const deleteElement = (id, name, rute) => {
       console.log(id,name,rute);
      const form = document.getElementById('form');
      const spans = document.querySelectorAll('.nombre');
      console.log(id,name,rute);
      spans.forEach((span) => {
            span.innerText = name;
      });

      form.action = `https://informatica.ieszaidinvergeles.org:10028/laraveles/empleados/public/${rute}/${id}`;
};

