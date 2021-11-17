const padding = ['p-0', 'pr-md-1'];
const colMd4 = ['col-md-4', ...padding];
const colMd6 = ['col-md-6', ...padding];

export default {
  fields: [
    //Picture
    {
      type: 'resume-image',
      label: 'Resume Profile Image',
      model: 'picture',

    },

    //Name
    {
      type: 'input',
      inputType: 'text',
      placeholder: 'Your Name',
      label: 'Name',
      model: 'name',
      styleClasses: colMd4,
    },

    //Label
    {
      type: 'input',
      inputType: 'text',
      placeholder: 'Programmer',
      label: 'Label',
      model: 'label',
      styleClasses: colMd4,
    },

    //E-Mail
    {
      type: 'input',
      inputType: 'text',
      placeholder: 'yourname@email.com',
      label: 'Email',
      model: 'email',
      validator: 'email',
      styleClasses: colMd4,
    },

    //Phone
    {
      type: 'input',
      inputType: 'tel',
      placeholder: '987251672',
      label: 'Phone',
      model: 'phone',
      styleClasses: colMd6,
    },

    //Website
    {
      type: 'input',
      inputType: 'text',
      placeholder: 'http://yourwebsite.com',
      label: 'Website',
      model: 'website',
      validator: 'url',
      styleClasses: colMd6,
    },

    //Summary
    {
      type: 'textArea',
      inputType: 'text',
      placeholder: 'A little bit about yourself',
      label: 'Summary',
      model: 'summary',
    },
  ],
};