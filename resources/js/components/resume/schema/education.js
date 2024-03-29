import atributes from "./atributes.js";

export default {
  fields: [
    // Institution
    {
      type: 'input',
      inputType: 'text',
      label: 'Institution',
      placeholder: 'University or Institution name',
      model: 'institution',
      styleClasses: ['col-md-4', 'p-0', 'pr-md-1'],
      atributes: atributes,
    },
    // Area
    {
      type: 'input',
      inputType: 'text',
      label: 'Area',
      placeholder: 'Computer Science',
      model: 'area',
      styleClasses: ['col-md-4', 'p-0', 'pr-md-1'],
      atributes: atributes,
    },
    // Study Type
    {
      type: 'input',
      inputType: 'text',
      label: 'Study Type',
      placeholder: 'Bachelor of Science',
      model: 'studyType',
      styleClasses: ['col-md-4', 'p-0'],
      atributes: atributes,
    },
    // Start Date
    {
      type: 'input',
      inputType: 'date',
      format: 'YYYY-MM-DD HH:mm:ss',
      label: 'Start Date',
      model: 'startDate',
      styleClasses: ['col-md-4', 'p-0', 'pr-md-1'],
      atributes: atributes,
    },
    // End Date
    {
      type: 'input',
      inputType: 'date',
      format: 'YYYY-MM-DD HH:mm:ss',
      label: 'End Date',
      model: 'endDate',
      styleClasses: ['col-md-4', 'p-0', 'pr-md-1'],
      atributes: atributes,
    },
    // GPA
    {
      type: 'input',
      inputType: 'number',
      label: 'GPA',
      model: 'gpa',
      validor: 'number',
      styleClasses: ['col-md-4', 'p-0'],
      atributes: atributes,
    },
  ],
};
