import atributes from "./atributes.js";

export default {
  fields: [
    // Title
    {
      type: 'input',
      inputType: 'text',
      label: 'Title',
      placeholder: 'Award Title',
      model: 'title',
      styleClasses: ['col-md-4', 'p-0', 'pr-md-1'],
      atributes: atributes,
    },
    // Date
    {
      type: 'input',
      inputType: 'date',
      label: 'Date',
      model: 'date',
      styleClasses: ['col-md-4', 'p-0', 'pr-md-1'],
      atributes: atributes,
    },
    // Awarder
    {
      type: 'input',
      inputType: 'text',
      label: 'Awarder',
      placeholder: 'Company',
      model: 'awarder',
      styleClasses: ['col-md-4', 'p-0'],
      atributes: atributes,
    },
    // Summary
    {
      type: 'textArea',
      inputType: 'text',
      label: 'Summary',
      placeholder: 'There is no spoon.',
      model: 'summary',
      atributes: atributes,
    },
  ],
};
