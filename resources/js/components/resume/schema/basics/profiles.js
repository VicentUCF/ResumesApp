const padding = ['p-0', 'pr-md-1'];
const colMd4 = ['col-md-4', ...padding];
const attributes = { input: { class: 'form-control bg-dark text-light' } };

export default {
  fields: [
    //Network
    {
      type: 'input',
      inputType: 'text',
      placeholder: 'Twitter',
      label: 'Network',
      model: 'network',
      styleClasses: colMd4,
      attributes: attributes,
    },

    //URL
    {
      type: 'input',
      inputType: 'text',
      placeholder: 'https://twitter.com/user',
      label: 'Url',
      model: 'url',
      validator: 'url',
      styleClasses: colMd4,
      attributes: attributes,
    },

    //Username
    {
      type: 'input',
      inputType: 'text',
      placeholder: 'yourname',
      label: 'Username',
      model: 'username',
      styleClasses: colMd4,
      attributes: attributes,
    },
  ],
};
