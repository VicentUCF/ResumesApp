const padding = ['p-0', 'pr-md-1'];
const colMd4 = ['col-md-4', ...padding];

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
    },

    //Username
    {
      type: 'input',
      inputType: 'text',
      placeholder: 'yourname',
      label: 'Username',
      model: 'username',
      styleClasses: colMd4,
    },
  ],
};
