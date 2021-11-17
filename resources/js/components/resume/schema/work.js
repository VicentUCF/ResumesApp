const padding = ['p-0', 'pr-md-1'];
const colMd4 = ['col-md-4', ...padding];
const colMd6 = ['col-md-6', ...padding];


export default {
  fields: [
    //Copmany
    {
      type: 'input',
      inputType: 'text',
      placeholder: 'Company Name',
      label: 'Company',
      model: 'company',
      styleClasses: colMd4,
    },

    //Position
    {
      type: 'input',
      inputType: 'text',
      placeholder: 'Job Title',
      label: 'Position',
      model: 'position',
      styleClasses: colMd4,
    },

    //Webstite
    {
      type: 'input',
      inputType: 'text',
      placeholder: 'https://company.com',
      label: 'Website',
      model: 'website',
      validator: 'url',
      styleClasses: colMd4,
    },

    // Start Date
    {
      type: 'input',
      inputType: 'date',
      format: 'YYYY-MM-DD HH:mm:ss',
      label: 'Start Date',
      model: 'startDate',
      styleClasses: colMd6,
    },
    // End Date
    {
      type: 'input',
      inputType: 'date',
      format: 'YYYY-MM-DD HH:mm:ss',
      label: 'End Date',
      model: 'endDate',
      styleClasses: colMd6,
    },
    // Summary
    {
      type: 'textArea',
      inputType: 'text',
      label: 'Summary',
      placeholder: 'What was this job about?',
      model: 'summary',
    },
  ],
};
