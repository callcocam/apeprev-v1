require('./bootstrap');

import 'livewire-sortable';

import './alpine';

import 'tw-elements';

//import './slider';

require('./components/Example');



const consultarCNPJ = require("consultar-cnpj");

async function getCNPJ() {
    const token = null;//"INFORME O SEU TOKEN DE ACESSO";
  
    try {
      // O Token é opcional
      const empresa = await consultarCNPJ("40154884000153", token);
      console.log(empresa);
    } catch (e) {
      console.log(e);
    }
  }

  getCNPJ()
  