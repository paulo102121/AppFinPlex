function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
function filterAsync(arr) {
    return Promise.map(arr, num => {
        if (num === 3) return num;
    })
        .filter(num => num !== undefined)
}

function contaItems(count) {
    var data =[];
    for (var i = 0; i < count; i++) {
        data.push(getRandomColor());
    }
    return data;
}

window.onload = (event) => {


const labels = [
'Mercado',
'February',
'March',
'April',
'May',
'June',
'Jul',
'dwdw',
'dsdwd',
'dsdad',
'afwf'
];

const cor = contaItems(labels.length);


const data = {
labels: get_listaCategoriaReceita,
datasets: [{
label: 'My First dataset',
backgroundColor: cor,
borderColor: cor,
data: get_ListaValoresReceita,
}]
};

const config = {
type: 'bar',
data,
options: {
  plugins: {
    legend: {
      position: 'topo'
    }
  }
}
};



var myChart = new Chart(
document.getElementById('myChart'),
{
type: 'pie',
config,
data,
options: {
  maintainAspectRatio: false,
      plugins: {
      title: {
        display: true,
        text: 'Total de receita por categoria',
      }
    }
}
}
);




/* ------------------------ Gráfico de Linha ---------------------*/

const dataGrafico2 = {
  labels: get_lista_categoria,
  datasets: [{
  label: 'Total de despesa por categoria',
  backgroundColor: ['black'],
  borderColor: '#E8E8E8',
  data: get_listaValores,
  }]
};


var myChart2 = new Chart(
  document.getElementById('myChart2'),
  {
  type: 'line',
  config,
  data: dataGrafico2,
  options: {
    maintainAspectRatio: false
  }
  }
);




/* ------------------------ Gráfico de Barras ---------------------*/
const labelCategorias = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];

const dataCategorias = {
  labels:labelCategorias,
  datasets: [{
    label: 'Despesas',
    backgroundColor: ['#F64E60'],
    borderColor: '#F64E60',
    data: get_listaValoresDespesaMes,
  },
  {
    label: 'Receitas',
    backgroundColor: ['#0BB783'],
    borderColor: '#B4FE98',
    data: get_listaValoresReceitaMes,
  }]
};

var myChart3 = new Chart(
  document.getElementById('myChart3'),
  {
      responsive: true,
      type: 'bar',
      data: dataCategorias,
      options: {
        maintainAspectRatio: false //Deixa o gráfico responsivo,
      }
  }
);

};
