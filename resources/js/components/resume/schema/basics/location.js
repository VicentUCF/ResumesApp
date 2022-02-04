import atributes from "../atributes.js";

const padding = ['p-0', 'pr-md-1'];
const colMd4 = ['col-md-4', ...padding];
const colMd6 = ['col-md-6', ...padding];

export default {
  fields: [
    //Address
    {
      type: 'input',
      inputType: 'text',
      placeholder: '2712 Brodway St',
      label: 'Adress',
      model: 'adress',
      styleClasses: colMd4,
      atributes: atributes,
    },

    //Address
    {
      type: 'input',
      inputType: 'text',
      placeholder: '46614',
      label: 'Postal Code',
      model: 'postalCode',
      styleClasses: colMd4,
      atributes: atributes,
    },

    //City
    {
      type: 'input',
      inputType: 'text',
      placeholder: 'Cullera',
      label: 'City',
      model: 'city',
      styleClasses: colMd4,
      atributes: atributes,
    },

    //Country Code
    {
      type: 'input',
      inputType: 'text',
      placeholder: 'ES',
      label: 'Country Code',
      model: 'countryCode',
      styleClasses: colMd6,
      atributes: atributes,
    },

    //Region
    {
      type: 'input',
      inputType: 'text',
      placeholder: 'Valenica',
      label: 'Region',
      model: 'region',
      styleClasses: colMd6,
      atributes: atributes,
    },
  ],
};
